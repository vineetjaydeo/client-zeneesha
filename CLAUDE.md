# Zeneesha — Claude Code reference

Client: Zeneesha (Workday consulting). Built by iKawn. Repo: `vineonardo/client-zeneesha`.
Bespoke WordPress theme "iKawn WP ZEN". **No build step, no preprocessor, no React.**
jQuery is deliberately deregistered (`functions.php:33`) — `main.js` is vanilla by mandate.

**Credentials are in `CLAUDE.local.md` (gitignored). Never put a secret in this file — it is tracked and pushes to GitHub.**

## Current work: v5

Spec: `docs/superpowers/specs/2026-07-17-zeneesha-v5-design-system-design.md` — read it first.
Live: https://erisagent.com/zeneesha-v5/

v5 = cut over. `front-page.php` now unconditionally includes `templates/page-home-v3.php`;
the `zeneesha_is_v3_mount()` URL gate and `page-home-v2.php` are deleted.

## Deploy

```bash
export ZENEESHA_SSH_PASSWORD='...'          # CLAUDE.local.md
ZENEESHA_MOUNT=zeneesha-v5 PYTHONPATH=tmp/deploy_deps python3 deploy_v3.py
```

- **`PYTHONPATH=tmp/deploy_deps` is mandatory** — paramiko is vendored there, not installed globally. Do not "clean" `tmp/deploy_deps`.
- **Never run `deploy.py`.** It is the only script that writes to the main `/zeneesha` mount, it ignores exit codes so failures pass silently, and it re-seeds `svc_*` meta into the shared DB. Use `deploy_v3.py`.
- `erisagent.com` is iKawn staging. There is no production yet; `zeneesha.com` is not wired up.

## Gotchas that will waste your time

- **Bump `$v`** (`functions.php:133`) on every CSS/JS change or you ship stale styles and think your edit failed. Busts CSS and JS together.
- **All mounts share one database** (`cp -a` copies `wp-config.php` verbatim). Theme files are per-mount; page/meta writes are global. Not verified on-server — check `grep DB_NAME` per mount before assuming isolation.
- **`page-ams-support.php` is the one page where editing the PHP does nothing.** It reads `svc_*` via `zf()`, which prefers the DB, and `deploy.py` already seeded those keys. Clear the meta first.
- **Content lives in PHP, not WordPress.** Large config arrays at the top of each template. No custom post types. ACF is now only meaningful for `page-topic` (as fallback), `page-home-v3`, `page-ams-support`, and the careers/resources repeaters.
- `HANDOFF.md` is stale (dated 2026-05-29) and actively misleading — its "two-file rule" and its password are both wrong. Trust the spec.

## Verification

There is no test suite. The regression harness is screenshot + computed-style diffing:

```bash
cd tmp/baseline
node capture.js zeneesha-v5 --out ../baseline-v5
node compare.js computed.json ../baseline-v5/computed.json   # non-zero exit = something moved
```

`tmp/baseline/computed.json` is the v4 ground truth: 435 elements × 12 pages × 3 viewports.

## Client rules

- **No em/en dashes in PHP content strings** — client has flagged repeatedly. Note their own V3 copy decks contain them; unresolved conflict.
- **Never AI-generate people/office photos.** Unsplash/Pexels only. Client is explicit.
