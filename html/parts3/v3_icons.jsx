// ── Zeneesha V3 Icons ──────────────────────────────────
const ZMark = ({ size = 36, className = '' }) => (
  <img src="assets/zeneesha-mark.png" width={size} height={size} alt="Zeneesha" className={className} style={{ display: 'block' }} />
);

const LogoFull = ({ height = 38, className = '' }) => (
  <img src="assets/zeneesha-logo.png" alt="Zeneesha , Partners in Growth" className={className} style={{ height, width: 'auto', display: 'block' }} />
);

const LogoFullLight = ({ height = 38, className = '' }) => (
  <img src="assets/zeneesha-logo-light.png" alt="Zeneesha , Partners in Growth" className={className} style={{ height, width: 'auto', display: 'block' }} />
);

const stroke = { fill: 'none', stroke: 'currentColor', strokeWidth: 1.5, strokeLinecap: 'round', strokeLinejoin: 'round' };

const IconArrow = ({ size = 14, className = '' }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" className={className} {...stroke}>
    <path d="M5 12h14M13 6l6 6-6 6" />
  </svg>
);

const IconClose = ({ size = 14 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke}>
    <path d="M6 6l12 12M18 6L6 18" />
  </svg>
);

const IconWhatsApp = ({ size = 26 }) => (
  <svg width={size} height={size} viewBox="0 0 32 32" aria-hidden="true">
    <path fill="#fff" d="M16 3C8.8 3 3 8.8 3 16c0 2.3.6 4.5 1.7 6.4L3 29l6.8-1.8c1.9 1 4 1.6 6.2 1.6 7.2 0 13-5.8 13-13S23.2 3 16 3z"/>
    <path fill="#25D366" d="M16 4.8c-6.2 0-11.2 5-11.2 11.2 0 2.1.6 4.1 1.6 5.8l-1.1 4 4.1-1.1c1.6 1 3.5 1.5 5.6 1.5 6.2 0 11.2-5 11.2-11.2S22.2 4.8 16 4.8zm6.6 15.9c-.3.8-1.7 1.5-2.3 1.6-.6.1-1.4.1-2.2-.1-.5-.2-1.2-.4-2.1-.8-3.7-1.6-6.1-5.4-6.3-5.6-.2-.3-1.5-2-1.5-3.8s.9-2.7 1.3-3.1c.3-.4.7-.4 1-.4h.7c.2 0 .5-.1.8.6.3.7 1 2.5 1.1 2.7.1.2.1.4 0 .6-.1.2-.2.4-.4.6l-.5.6c-.2.2-.4.4-.2.7.2.3.9 1.5 2 2.5 1.4 1.3 2.6 1.7 2.9 1.8.3.1.5.1.7-.1.2-.2.8-.9 1-1.2.2-.3.4-.3.7-.2.3.1 1.9.9 2.2 1 .3.2.5.2.6.4.1.2.1.9-.2 1.7z"/>
  </svg>
);

const IconCorner = ({ size = 18 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke}>
    <path d="M7 7h10v10" />
    <path d="M7 17L17 7" />
  </svg>
);

Object.assign(window, { ZMark, LogoFull, LogoFullLight, IconArrow, IconClose, IconWhatsApp, IconCorner });
