# Zeneesha v5 — page migration state

**Updated:** 2026-07-17 · Branch: `codex/zeneesha-home-v3-20260617` · Spec: `docs/superpowers/specs/2026-07-17-zeneesha-v5-design-system-design.md`

Read the spec first, then this. This file records what was **verified on disk/live**, including
several places the spec and `CLAUDE.md` are provably wrong. Where they conflict, this file wins.

---

## Where we are

`279e0c9` landed the token layer + primitives. **Token layer is complete and exactly to spec** —
all 23 tokens present, values match. No page migrated yet.

Done this session (uncommitted):
- `critical.css` `.section-title` now consumes `letter-spacing:var(--ls-tight)` (was 0 consumers).
- `critical.css` `:root` gained `--fs-card-title-display: clamp(29px,3vw,44px)`, lifted verbatim
  from `main.css:3135`.
- `tmp/baseline/capture.js` extended with a `card-title` role (`h3, h4`) — the harness previously
  recorded **zero** card titles, so it was blind to the element we are about to change.
- Froze the v4 ground truth at `tmp/baseline/computed.v4-groundtruth.frozen.json`.
- Stood up a **`zeneesha-v6` scratch mount** for the verify loop (live, HTTP 200, ver=2.3.0).

---

## Decisions locked by V this session

| # | Decision |
|---|---|
| **D5** | **Migrate by FAMILY, not per page.** D3's per-page order assumed CSS independence that does not exist (see below). Order: utility family (5) → ams family (2) → shared `form-cta` partial → topic → home-v3. |
| **D6** | **Verify on the `zeneesha-v6` scratch mount; promote to v5 only when the diff is clean.** The harness can only measure what is deployed, so every unverified state would otherwise go live on the mount the client reviews. |
| **D7** | `.section-title` consumes `--ls-tight` (-.02em). Without it, migrating a legacy title reverts tracking from -.035em to `normal` — visible loosening at 58px on top of the D2 size drop. |
| **D8** | Benefit-card `h3` maps to the new `--fs-card-title-display`, **not** `.card-title` (22px), which would cut it -49.1% into a `min-height:280px` / `flex-end` card. D2 constrains section titles, not card titles. |

---

## The blocker that invalidates the spec's method

**`critical.css:415-422` says "swap the class, never add alongside". That advice only covers
(0,1,0) equal-specificity ties, and it is NOT the situation on the real pages.**

The utility/ams families style **bare tags** via **(0,1,1) descendant selectors**
(`.utility-next-root h2`). Primitives are **(0,1,0)**. The legacy rule wins **on specificity**,
regardless of source order, and there is **no class on the `h2` to swap**.

⇒ Migration must **DELETE or RESCOPE the legacy rules** and **add classes to bare tags**.
Adding a primitive alone is inert.

## Pages are not independent — the real topology

| Stratum | Bound pages |
|---|---|
| `.utility-next-root` (`main.css:3043-3045`, `:3059`, `:3061`, `:3245`, `:3251`) | partnership, careers, resources, contact, about |
| `.ams-next-root` (`main.css:2803-2805`) | service, ams-support — **dead on the 5 above**, where `.utility-next-root` (`:3042`) redefines all six `--ams-*` byte-identically, later, at equal specificity |
| `templates/partials/form-cta.php` | resources, partnership, service, ams-support, about |

Every page has a unique root class (`partnership-next-root`, `careers-next-root`, …) if rescoping
is ever needed. `partnership-next-root` / `resources-next-root` / `contact-next-root` /
`about-next-root` currently have **0 CSS rules** — hooks only.

---

## Verified-wrong claims in tracked docs (fix these — task #7)

1. **CLAUDE.md**: "435 elements × 12 pages × 3 viewports" implies 15,660 records. Actual: **435
   records total** = 145 elements × 3 viewports across 12 pages. Off by 36×.
2. **CLAUDE.md**: "`deploy.py` … is the only script that … re-seeds `svc_*` meta into the shared
   DB." **False.** `deploy_v3.py` seeds `svc_*` too (`L198-217`), writes 17 pages, and deletes
   Yoast meta on 6 topic pages — all global via the shared DB. `deploy.py`'s real distinguishing
   sins: writes to `/zeneesha`, **never calls `recv_exit_status`** (failures pass silently),
   hardcoded rotated password at `:31`.
3. **Spec DoD**: "delete `--ams-*`/`--utility-next-*` duplicate palettes". **`--utility-next-*`
   does not exist** — `.utility-next-root` reuses the `--ams-*` names. One duplicate palette.
4. **`capture.js` footgun**: defaults are `mount=zeneesha-v4, out=__dirname`, so a bare
   `node capture.js` **overwrites the v4 ground truth in place**. Always pass both args.
5. **The whole harness is gitignored.** `.gitignore:9` excludes `tmp/*` (only `tmp/deploy_deps/`
   is re-included), so `capture.js`, `compare.js`, the frozen v4 ground truth, and every baseline
   exist **only on this machine and are untracked**. D3 rests entirely on this harness and none of
   it is version-controlled — a lost machine or a stray `rm -rf tmp` ends the ability to prove any
   page migration. Worth a decision: move the harness out of `tmp/` and track it.

## Live bugs found (pre-existing, not introduced here)

- **Shared CTA heading renders 68px on Partnership but 48px on Home.** `.cta-heading` (0,1,0)
  loses to `.utility-next-root h2` (0,1,1). `main.css:2966/2968` exist purely to rescue the colors
  `:3043` kills; they become deletable once `:3043` goes. Fix with the partial (task #6).
- **Partnership hero has no critical-path geometry.** `critical.css:257-263` targets
  `.ams-next-hero`; the markup is `.utility-next-hero`. Hero layout only resolves when `main.css`
  lands ⇒ above-the-fold reflow — the exact failure the primitives block was written to prevent.
- **`critical.css` references `--ams-surface/ink/accent/muted/line` but defines none of them**
  (only `main.css:2793` does). critical.css is inlined at `wp_head` prio 5; main.css is a later
  request ⇒ all five are **undefined during critical render**. Same family as the `--fs-hero-*` /
  `--dark` bugs the spec catalogues. Collapsing `--ams-*` → `:root` tokens fixes it.
- **`deploy_v3.py` never deletes** (upload is additive-only) ⇒ `page-home-v2.php`, deleted locally
  in `15de78a`, **still exists on every mount**. Needs manual server-side removal.

---

## The verify loop (D6)

```bash
cd /Users/vineet/htdocs/ikawn-clients/Zeneesha
# 1. edit theme files
# 2. BUMP $v in theme/functions.php:133 (now 2.3.0) — load-bearing: skip it and capture
#    reads cached CSS, compare.js reports "visually inert", and you conclude your edit was a no-op
export ZENEESHA_SSH_PASSWORD='...'                     # CLAUDE.local.md
ZENEESHA_MOUNT=zeneesha-v6 PYTHONPATH=tmp/deploy_deps python3 deploy_v3.py   # PYTHONPATH mandatory
cd tmp/baseline
node capture.js zeneesha-v6 --out ../baseline-v6-ext   # NEVER a bare `node capture.js`
node compare.js ../baseline-v4-ext/computed.json ../baseline-v6-ext/computed.json
# exit 0 = inert · exit 2 = something moved
# clean ⇒ ZENEESHA_MOUNT=zeneesha-v5 … deploy_v3.py, then commit
# dirty ⇒ revert, reassess. v5 never saw it.
```

- `compare.js` diffs **only** `computed.json` (10 props, strict `!==`, zero tolerance). The 36 PNGs
  are eyeball-only and **never pixel-diffed**.
- `compare.js` bug: the `PAGE ADDED`/`PAGE REMOVED` branches `continue` without incrementing the
  counters, so a wholly missing page can exit **0**. Matters on the `--only` path.
- **Reference baseline is `../baseline-v4-ext/computed.json`** (extended, has card titles).
  `tmp/baseline/computed.json` is the original 435-record v4 file — no h3/h4, stale by design.

## Baseline reconciliation — DONE (v4-ext vs v6-ext, 2026-07-17)

`compared 744 elements | 132 changed | 0 added | 0 removed` (744 > 435 because card titles are now
captured). Classified:

| Transition | Count | Verdict |
|---|---:|---|
| `fontFamily: Jost, monospace → Jost, sans-serif` | 75 | ✅ intended — the spec's Courier-flash defect fix |
| `fontWeight: 800 → 700` | 9 | ✅ intended — D4 "`800` maps to `700`" |
| `maxWidth: 339.43→349.61px` / `462.858→476.741px` | 48 | ❌ **UNEXPLAINED — see task #10** |

**Note the harness cannot see D4's headline effect.** Synthetic vs real bold both compute to
`font-weight:700`; it is a rasterisation difference, so `compare.js` is blind to it. The 56
synthetic-bold declarations are verifiable **only** by eyeballing `tmp/baseline-v*-ext/shots/`.
The `800→700` rows above are a different, genuinely-computed part of D4.

### The 48 maxWidth rows — RESOLVED: intended. Accept them; do NOT "fix" them.

`.topic-section-heading` (`main.css:1281`, `max-width:24ch`) was **never touched**. The trigger is
`functions.php:186`: v4 **never served Jost 700**, so `font-weight:700` fell back to **Jost 600**.
`ch` = advance of `0` in the *resolved* face. Measured live: v4's "Jost 700" zero-advance is
`0.64285888671875em`, **byte-identical to Jost 600** (proving fallback); v6 is `0.662139892578125em`
(real 700). Ratio **1.029993** = the +3.00%. Arithmetic closes 4/4:
`24 × 30px × 0.64285889 = 462.858` ✓ · `× 0.66213989 = 476.741` ✓ (desktop, 16x);
`24 × 22px × …= 339.429 / 349.610` ✓ (mobile+tablet both clamp to 22px, 32x).

**It is cosmetic AND load-bearing.** Mobile/tablet: not even binding (parent 326px < 339.43). Desktop:
binding, but all 16 headings keep identical line counts/heights. **Counterfactual: pinning
`max-width:462.858px` on v6 makes "How to choose the first use cases" wrap 1→2 lines.** The glyphs
got 3% wider; `24ch` grew 3% to still hold 24 characters. The +3% *prevents* a regression.
`.prose`/`--measure-prose:68ch` (zero consumers) and the `monospace→sans-serif` change are both
**red herrings** — inert here. ⇒ **Re-baseline; accept all 48.**

**Correction to `279e0c9`'s commit message (and the spec's D4 framing): there was NO synthetic bold.**
Blink only synthesizes when the matched face is `< 600`; Jost 600 isn't. D4's real effect is
SemiBold 600 → true Bold 700. The harness is blind to it either way (both compute to
`font-weight:700`) — it leaks into the diff *only* through `ch`.

### ⚠ REAL regression the harness structurally cannot see (open design call — task #10)

The font is heavier, so **9 headings wrap 1→2 lines at 390px across 5 of the 6 topic pages**
(`max-width` confirmed non-binding there — this is the font, not the token):

| page | heading |
|---|---|
| workday-ams | "The operating rhythm that works" · "How Zeneesha approaches AMS" |
| workday-data-migration | "Why migration is not just upload" · "Data classification and retention" |
| workday-mid-market | "How to prioritise a lean backlog" · "Reporting and analytics maturity" |
| workday-release-management-r1-r2 | "Communication and enablement" · "Release calendar and milestones" |
| post-go-live-deployment | "Why go-live is not the finish line" |

**`capture.js:54` samples only `workday-ai`** as the "representative topic page" — the template
serves 6 (`topic-content.php:352`). `workday-ai` is the **only** one that does not reflow, which is
precisely why the harness reported clean. **Harness gap: 5 topic pages are unmeasured.** Also
unmeasured: `.topic-h1` (`main.css:1253`, `22ch`, weight 700) shifted identically
(792.002→815.756px desktop) and is invisible only because `ROLE_SELECTORS` (`capture.js:12-13`) has
no `h1` entry. Neither reflows.

**Decision needed from V:** are the 1→2 line mobile wraps acceptable as the cost of the intended
true-bold (D4)? Not fixable by touching `24ch` — that would re-break the measure.

## Client-reported fixes (2026-07-17, home-v3) — IN PROGRESS

Both on `page-home-v3.php`. Uncommitted, NOT yet deployed. Need `$v` bump + deploy to v6 + verify.

1. **DONE (edit applied):** calculator section title "The hidden cost of your Workday value gap."
   (`page-home-v3.php:234`, `<h2 class="section-heading">`, no inline style) rendered 44px vs
   siblings' 58px. Cause: it sits in `.calculator-copy`, so `main.css:261` pinned it to
   `clamp(30px,3.2vw,44px)`. **Fixed `main.css:261` → `font-size:var(--fs-section-title)`** (58px,
   D2-canonical). No mobile override touches it. `max-width:560px` kept.

   **STATUS: both edits below are DONE + verified (php -l clean). `$v` bumped 2.3.0→2.3.1,
   deploying to v6 now. After deploy: hard-refresh v6 and eyeball (a) calculator title matches
   the 58px section titles, (b) all 8 FAQ questions read the client's exact words, (c) desktop
   questions sit on one line, mobile wraps. Then promote to v5 and commit if clean.**

2. **DONE (verified):** FAQ questions were all 8 shortened/reworded from client copy.
   - `$faqs` array in `page-home-v3.php`, `q` values at lines 736/745/763/781/789/798/805/816.
   - Restoring the 8 EXACT client strings (verbatim; ASCII apostrophes; NO em/en dashes).
   - **Single-line fix chosen by V:** keep 2-col grid, shrink desktop question font at
     `main.css:1777` from `16px` → `clamp(13px,1.05vw,16px)`, keep `white-space:nowrap`. Desktop
     (≥1024px) only — mobile 390px keeps wrapping (physically can't single-line a 72-char question
     in ~282px; the nowrap rule is desktop-only so mobile is already correct).
   - FAQ set is unique to home-v3 (not duplicated across templates).

### Flagged, NOT touched: 4 pre-existing em dashes
`page-home-v3.php:438, 448, 458, 478` (service-card `body` fields, e.g. "roadmaps — an honest
assessment") violate the client no-dash rule but predate this work — the "unresolved conflict"
CLAUDE.md notes. Left as-is. Clean up separately if the client wants.

## Next

1. **Resolve task #10 first** — do not start the family migration on top of an unexplained delta.
2. Utility family (task #3): delete/rescope `.utility-next-root` strata, add primitives to the 5
   templates. Expect all `h2` 68px→58px (−10px desktop, D2-intended). Benefit `h3` must stay
   43.2px via `--fs-card-title-display`. Dropping `ams-next-root` from those 5 roots is a
   zero-pixel change.
3. Then tasks #4 → #6 → #5 → #8 → #9 per D5.
