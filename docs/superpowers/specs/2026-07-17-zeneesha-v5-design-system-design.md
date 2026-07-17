# Zeneesha v5 — Design System & Typography Consolidation

**Date:** 2026-07-17
**Status:** Approved (decisions locked below)
**Sub-project:** 1 of 4 (design system → content → SEO → backend/WP config)
**Target:** `https://erisagent.com/zeneesha-v5/`

---

## Problem

The theme has no type system. Measured, not estimated:

| Dimension | Now | Target |
|---|---:|---:|
| Distinct section-title font-sizes | **29** (37 w/ responsive) | 2 |
| Font-size declarations using a token | **0 / 553 (0.0%)** | ≥90% |
| Distinct font-sizes (all) | 138 | 8–10 |
| Distinct line-heights | 49 | 4–5 |
| Distinct text colors | 97 | 8–12 |
| Distinct `.section-sub` max-widths | 16 | 1–2 |
| Distinct section vertical paddings | 28 | 2–3 |
| Live font-size tokens | **0** | full scale |

Three structural causes:

1. **The token layer was abandoned at birth.** 12 vars in `critical.css:3-16`; `--white` is dead; the only two typographic ones (`--fs-hero-small/large`) are used once each and immediately overridden by `critical.css:185`. Never a scale — only 553 hand-written numbers.
2. **Four generations of "the system" ship simultaneously**, appended, never removed: `main.css:1000` v1.2.0 → `:1332` "Utility page repairs" → `:2796` "AMS NEXT — *proposed*" → `:2983`/`:3048` "client-approved". `.ams-next-root` (`:2801`) and `.utility-next-root` (`:3049`) redeclare the whole palette as `--ams-*` — a token system duplicating the token system. A block still labelled *proposed* is live and is the base layer for two later systems.
3. **The client-approved page is not self-consistent** — `page-home-v3.php` has 7 title sizes across 9 sections, one inline `style=` at `:729`, and three rules written for it (`main.css:1471`, `:1474`, `:1512`) that lose the cascade and render nothing.

Consequence: **the stated goal (uniform section titles) cannot be met without changing a client-approved page.** Decision D2 governs how far.

---

## Decisions (locked)

| # | Decision | Rationale |
|---|---|---|
| **D1** | **Cut over.** v5 = the real theme. `page-home-v3.php` becomes `front-page.php`; delete `zeneesha_is_v3_mount()` (`functions.php:152`), `page-home-v2.php`, and the 4 vestigial ACF groups. | The mount gate is staging scaffolding that cannot ship. Once home-v3 *is* the front page, any mount renders it naturally — the gate becomes unnecessary, not merely removable. |
| **D2** | **Two-token title scale.** `--fs-section-title` = `clamp(38px,4.2vw,58px)` (modal, already wins 3/9 sections; 2 more within 2px). `--fs-section-title-lg` = `clamp(44px,5vw,70px)` reserved for display moments (Case Studies — QA'd at 850px composition width). Calculator / Testimonials / CTA visibly grow to canonical. | Achieves consistency while preserving the one deviation that was a deliberate, signed-off design choice. |
| **D3** | **Baseline → strangle page-by-page.** Screenshot all pages × 3 viewports from live v4 first. Then tokens → primitives → one page at a time, each migrate/screenshot/diff/delete-dead-strata/commit. | No test suite exists. CSS has no compiler. Screenshot diffing is the only available proof, and per-page scope makes any regression localizable and revertible. |
| **D4** | **Fix font weights.** Load Jost 700; drop unused 300. | 56 declarations (`700`×46, `800`×10) currently render synthetic bold — Google Fonts serves only `300;400;500;600` (`functions.php:188`). Weight 300 is loaded and never used. Visible change, but a defect fix. `800` maps to `700`. |

---

## Architecture

**Both layers live in `critical.css`, not `main.css.`** `critical.css` is inlined into `<head>` at `functions.php:177`; `main.css` is a separate request. A token defined in `main.css` is undefined during critical render — precisely why `--fs-hero-*` was stillborn.

### Layer 1 — Tokens (`critical.css :root`)

- **Type scale:** `--fs-section-title`, `--fs-section-title-lg`, `--fs-section-sub`, `--fs-body`, `--fs-body-sm`, `--fs-card-title`, `--fs-eyebrow`
- **Line height:** `--lh-tight` (1.08) · `--lh-snug` (1.3) · `--lh-normal` (1.65) · `--lh-relaxed` (1.8)
- **Letter spacing:** `--ls-tight` (-.02em) · `--ls-eyebrow` (.22em)
- **Measure:** `--measure-sub` (760px) · `--measure-prose` (68ch)
- **Spacing:** `--space-section` (5.25rem) · `--space-section-sm` (3.5rem) · `--nav-height` (96px) / `--nav-height-scrolled` (72px)
- **Color:** existing palette + `--dark` (**currently used 12× and never defined** — silently inherits) + `--navy-rgb: 30,58,138` / `--slate2-rgb: 71,85,105` / `--white-rgb: 255,255,255`

**The alpha token is the structural fix.** 97 text colors exist because there is no alpha token: `rgba(30,58,138,…)` is hardcoded **236 times** across ~20 alpha values, re-typing `--navy`'s channels by hand. `rgba(var(--navy-rgb), .5)` collapses the single largest source of drift and makes the palette changeable.

### Layer 2 — Primitives

Six semantic classes consuming only tokens: `.section-title` · `.section-title--lg` · `.section-sub` · `.section-label` · `.prose` · `.card-title`.

`.section-label` already exists (`critical.css:345`) but declares **no color**, relying on a hand-added `.text-redorange` utility plus 5 contextual overrides. Primitive absorbs the color. Note **34 distinct eyebrow class names** exist across templates for one visual primitive; `.section-label` is used in only 6 of 12 templates — About/Contact/Resources/Partnership/Service each rolled their own.

---

## Migration order

Smallest first — prove the method before touching the approved page:

Partnership (93) → Contact (122) → Resources (110) → About (176) → Careers (300) → Topic (440) → Service (467) → AMS (613) → **home-v3 (932) last**

Per page: migrate → screenshot → diff vs baseline → delete that page's dead strata → `php -l` → commit. Dirty unintended diff ⇒ revert that page, reassess. Never carry an unexplained regression forward.

---

## Defect fixes folded in (zero or near-zero visual risk)

| Defect | Count | Location |
|---|---:|---|
| `--dark` used but never defined → silent inherit | 12 rules | `main.css:1019,1022,1069,1080,1110,1128,1154,1162,1203,1231,1239,1253` |
| `'Jost',monospace` → eyebrows flash Courier during swap | 41 | throughout; → `'Jost',sans-serif` |
| `#526176` vs `#536176` one-digit typo pair | 2 | text greys |
| Provably dead rules (lose cascade, render nothing) | 4 | `main.css:408`, `:1471`, `:1474`, `:1512` |
| Inline `style=` font-size on approved page | 1 | `page-home-v3.php:729` |
| `.py-28` = `5.25rem` (Tailwind's py-28 is 7rem); overridden 3 ways | 1 | `main.css:149` — rename to token |
| `--nav-height` hardcoded as 3 different guesses (72px/100px) at a 96/72px value | 5 | `main.css:570,591,604,862,1333,1354` |

---

## Definition of done

- One section-title size + one reserved display size (D2)
- ≥90% of font-size declarations reference a token (from 0.0%)
- One generation of CSS, not four — `--ams-*`/`--utility-next-*` duplicate palettes deleted
- `page-home-v2.php`, the mount gate, and 4 vestigial ACF groups deleted (D1)
- All pages diffed against baseline; every delta intended or explained
- `php -l` clean on all templates
- Live and verified at `https://erisagent.com/zeneesha-v5/`

## Out of scope (sub-projects 2–4)

Unbuilt v3 content (hover-hotspot Challenges interaction; 5 services vs current 3); on-page SEO; backend/forms; credential rotation; `deploy.py` removal.

---

## Known hazards

- **`deploy.py` must not be run.** Only script writing to the main `/zeneesha` mount; ignores exit codes (failures pass silently); authenticates off a hardcoded password default (`:31`) even with no env var set. Use `deploy_v3.py`/`deploy_v4.py`.
- **Mounts share one database** (created via `cp -a`, copying `wp-config.php` verbatim). Theme files are per-mount; page/meta writes are global. *Inferred from the copy method + `deploy.py:301` comment — verify with `grep DB_NAME` per mount before assuming isolation.*
- **`page-ams-support.php` reads ACF fields `deploy.py` already seeded into the shared DB.** `zf()` prefers DB over PHP fallback, so editing that template's copy does nothing until the meta is cleared. The one page where "edit the PHP" is wrong.
- **Bump `$v`** (`functions.php:133`, now `2.1.196`) on every CSS/JS change or you ship stale styles and think the edit failed. Busts CSS and JS together — they cannot be versioned independently.
- **`tmp/deploy_deps/` vendors paramiko**, which is not installed globally. `PYTHONPATH=tmp/deploy_deps` is required or no deploy runs.
- **Secret in git history:** SSH password hardcoded at `deploy.py:31`, reused for WP admin, already pushed to GitHub. Rotation — not deletion — is the fix. Sub-project 4.

## Deploy

```bash
cd /Users/vineet/htdocs/ikawn-clients/Zeneesha
export ZENEESHA_SSH_PASSWORD='...'          # see deploy.py:31 / HANDOFF.md
ZENEESHA_MOUNT=zeneesha-v5 PYTHONPATH=tmp/deploy_deps python3 deploy_v3.py
```
