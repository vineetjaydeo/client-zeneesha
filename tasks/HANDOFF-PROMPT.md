# Session handoff — Zeneesha v5 (paste this into a fresh session on the Mac Air)

Continue the Zeneesha v5 work. Read `CLAUDE.md`, then `tasks/todo.md` (full verified state,
decisions D1-D8, the family-migration topology, harness facts, and open items). Then do the tasks
below. Branch: `codex/zeneesha-home-v3-20260617`.

## ⚠️ FIRST — this machine is new (moved from Mac mini). Two gitignored things did NOT transfer:

1. **`CLAUDE.local.md`** (SSH/deploy password) is gitignored — it is NOT in the repo. You cannot
   deploy or verify until you recreate it. Get it from the Mac mini or from V. It holds:
   Hostinger host `62.72.28.13`, port `65002`, user `u552605462`, and the SSH password used as
   `ZENEESHA_SSH_PASSWORD`.
2. **`tmp/`** is gitignored (`tmp/*`, except `tmp/deploy_deps/`). So on this machine you are missing:
   - `tmp/deploy_deps/` (vendored paramiko) — **required** for deploy. If absent, `deploy_v3.py`
     won't run. Re-vendor paramiko into `tmp/deploy_deps/` (`pip install --target tmp/deploy_deps
     paramiko`) or copy the dir from the Mac mini.
   - The screenshot/computed-style harness (`tmp/baseline/`): `capture.js`, `compare.js`,
     `node_modules` (playwright), and every baseline (`baseline-v4-ext/`, `baseline-v6-ext/`,
     `computed.v4-groundtruth.frozen.json`). **None of this is version-controlled.** Copy
     `tmp/baseline/` from the Mac mini, or you lose the ability to prove any migration is
     render-neutral. (This is itself an open risk noted in todo.md — consider moving the harness
     out of `tmp/` and tracking it.)
   - Note `capture.js` was extended to capture card titles (h3/h4) — that edit lives only in the
     untracked `tmp/`, so copy it, don't regenerate a stale version.

## State of play (all VERIFIED, deployed to the zeneesha-v6 scratch mount, theme v2.3.1)
- Token layer + primitives are complete and to spec (commit 279e0c9). Plus uncommitted-until-this-
  commit fixes: `.section-title` gained `letter-spacing:var(--ls-tight)`; `:root` gained
  `--fs-card-title-display`.
- Two client fixes on `page-home-v3.php`, live+verified on `erisagent.com/zeneesha-v6/`:
  calculator section title now `var(--fs-section-title)` (58px, matches siblings); all 8 FAQ
  questions restored to the client's EXACT text with desktop single-line via
  `main.css:1777 font-size:clamp(13px,1.05vw,16px)` (mobile wraps — unavoidable at 390px).
- No page has been migrated yet. `zeneesha-v5` (the real client mount) does NOT have the v6 fixes
  yet — promote when V approves.

## TASK 1 (new) — calculator copy/visual split to 50-50
`main.css:259` currently: `.calculator-grid{grid-template-columns:minmax(0,4.5fr) minmax(420px,6.5fr);...}`
(≈41% copy / 59% visual). Change to a **50-50 split** so the copy column is wider and the now-58px
calculator section title ("The hidden cost of your Workday value gap.") has room to display cleanly.
- Suggested: `grid-template-columns:minmax(0,1fr) minmax(0,1fr)` (drop the 420px min or keep a
  sensible min on the visual side — check the calculator widget/right-column min-width at ~1024px
  before removing `minmax(420px,...)`, or it may overflow on tablet).
- The heading has `max-width:560px` (main.css:261); at 50-50 the column is wider so 560px may now
  under-fill — consider raising/removing it so the title uses the new width. Judgement call; eyeball it.
- Verify: deploy to v6, `node capture.js zeneesha-v6 --out ../baseline-v6-ext`, diff vs
  `baseline-v4-ext`; then hard-refresh and eyeball the calculator section at 1440/768/390.
- Bump `$v` (`functions.php:133`, now 2.3.1) before deploying. No em/en dashes in PHP strings.

## TASK 2 — promote v6 → v5 once V approves the client fixes, then continue
After V confirms the calculator + FAQ look right on v6: `ZENEESHA_MOUNT=zeneesha-v5
PYTHONPATH=tmp/deploy_deps python3 deploy_v3.py`. Then resume the paused page migration per
`tasks/todo.md` (family order: utility → ams → form-cta → topic → home-v3).

## OPEN DECISIONS still needing V (do not proceed past them blindly)
- **task #10**: D4 true-bold wraps 9 topic-page headings 1→2 lines on mobile. Accept as cost of
  the intended bold, or revisit? Also fix the harness gap: `capture.js:54` samples only
  `workday-ai` (the one topic page that does NOT reflow) — add the other 5 topic pages + an h1
  role before trusting any topic diff.
- 4 pre-existing em dashes (`page-home-v3.php:438/448/458/478`) — known CLAUDE.md conflict, left alone.

## Deploy loop (from repo root, after recreating CLAUDE.local.md + tmp/deploy_deps)
```bash
export ZENEESHA_SSH_PASSWORD='...'   # from CLAUDE.local.md
# edit -> BUMP $v (functions.php:133) -> deploy v6 -> capture -> compare -> (clean) promote v5
ZENEESHA_MOUNT=zeneesha-v6 PYTHONPATH=tmp/deploy_deps python3 deploy_v3.py
cd tmp/baseline && node capture.js zeneesha-v6 --out ../baseline-v6-ext
node compare.js ../baseline-v4-ext/computed.json ../baseline-v6-ext/computed.json  # exit 2 = moved
```
NEVER run a bare `node capture.js` (overwrites the v4 ground truth). NEVER run `deploy.py`.
