// Zeneesha Z mark + wordmark — official logo images
const ZMark = ({ size = 36, className = '' }) => (
  <img src="assets/zeneesha-mark.png" width={size} height={size} alt="Zeneesha" className={className} style={{ display: 'block' }} />
);

const LogoFull = ({ height = 38, className = '' }) => (
  <img src="assets/zeneesha-logo.png" alt="Zeneesha — Partners in Growth" className={className} style={{ height, width: 'auto', display: 'block' }} />
);

// Wordmark kept as no-op render so nav doesn't show text next to the logo lockup
const Wordmark = () => null;

// Stroke-only icons, 1.5px, consistent 24 viewBox
const stroke = { fill: 'none', stroke: 'currentColor', strokeWidth: 1.5, strokeLinecap: 'round', strokeLinejoin: 'round' };

const IconArrow = ({ size = 14, className = '' }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" className={className} {...stroke}>
    <path d="M5 12h14M13 6l6 6-6 6" />
  </svg>
);

const IconFinance = ({ size = 28 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke} className="ic-stroke">
    <path d="M3 20h18" />
    <path d="M6 20V10M10 20V7M14 20V12M18 20V5" />
    <circle cx="6" cy="10" r="1.4" />
    <circle cx="10" cy="7" r="1.4" />
    <circle cx="14" cy="12" r="1.4" />
    <circle cx="18" cy="5" r="1.4" />
  </svg>
);

const IconHCM = ({ size = 28 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke} className="ic-stroke">
    <circle cx="9" cy="8" r="3" />
    <path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6" />
    <circle cx="17" cy="6" r="2.2" />
    <path d="M14 14.5c.9-.6 2-1 3-1 2.8 0 5 2.2 5 5" />
  </svg>
);

const IconAnalytics = ({ size = 28 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke} className="ic-stroke">
    <circle cx="12" cy="12" r="9" />
    <path d="M12 3v9l7 4" />
    <path d="M12 12l-6 4.5" />
  </svg>
);

const IconManaged = ({ size = 28 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke} className="ic-stroke">
    <path d="M12 3l8 3v5c0 5-3.6 8.5-8 10-4.4-1.5-8-5-8-10V6l8-3z" />
    <path d="M9 12l2 2 4-4" />
  </svg>
);

const IconQuote = ({ size = 40, className = '' }) => (
  <svg width={size} height={size} viewBox="0 0 40 40" {...stroke} className={className}>
    <path d="M12 26c-3 0-5-2-5-5s2-5 5-5c0-4 3-7 7-7M28 26c-3 0-5-2-5-5s2-5 5-5c0-4 3-7 7-7" />
  </svg>
);

const IconWhatsApp = ({ size = 26 }) => (
  <svg width={size} height={size} viewBox="0 0 32 32" aria-hidden="true">
    <path fill="#fff" d="M16 3C8.8 3 3 8.8 3 16c0 2.3.6 4.5 1.7 6.4L3 29l6.8-1.8c1.9 1 4 1.6 6.2 1.6 7.2 0 13-5.8 13-13S23.2 3 16 3z"/>
    <path fill="#25D366" d="M16 4.8c-6.2 0-11.2 5-11.2 11.2 0 2.1.6 4.1 1.6 5.8l-1.1 4 4.1-1.1c1.6 1 3.5 1.5 5.6 1.5 6.2 0 11.2-5 11.2-11.2S22.2 4.8 16 4.8zm6.6 15.9c-.3.8-1.7 1.5-2.3 1.6-.6.1-1.4.1-2.2-.1-.5-.2-1.2-.4-2.1-.8-3.7-1.6-6.1-5.4-6.3-5.6-.2-.3-1.5-2-1.5-3.8s.9-2.7 1.3-3.1c.3-.4.7-.4 1-.4h.7c.2 0 .5-.1.8.6.3.7 1 2.5 1.1 2.7.1.2.1.4 0 .6-.1.2-.2.4-.4.6l-.5.6c-.2.2-.4.4-.2.7.2.3.9 1.5 2 2.5 1.4 1.3 2.6 1.7 2.9 1.8.3.1.5.1.7-.1.2-.2.8-.9 1-1.2.2-.3.4-.3.7-.2.3.1 1.9.9 2.2 1 .3.2.5.2.6.4.1.2.1.9-.2 1.7z"/>
  </svg>
);

const IconArrowLong = ({ size = 20 }) => (
  <svg width={size} height={size} viewBox="0 0 40 24" {...stroke}>
    <path d="M2 12h34M28 4l8 8-8 8" />
  </svg>
);

const IconPlus = ({ size = 14 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke}>
    <path d="M12 5v14M5 12h14" />
  </svg>
);

const IconClose = ({ size = 14 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke}>
    <path d="M6 6l12 12M18 6L6 18" />
  </svg>
);

const IconCorner = ({ size = 18 }) => (
  <svg width={size} height={size} viewBox="0 0 24 24" {...stroke}>
    <path d="M7 7h10v10" />
    <path d="M7 17L17 7" />
  </svg>
);

// Abstract hero mesh — inspired by Z mark but abstract composition
const HeroMesh = () => (
  <svg viewBox="0 0 600 700" className="w-full h-full" aria-hidden="true">
    <defs>
      <linearGradient id="gNavy" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0" stopColor="#1E3A8A" />
        <stop offset="1" stopColor="#152C6A" />
      </linearGradient>
      <linearGradient id="gRed" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0" stopColor="#E8472C" />
        <stop offset="1" stopColor="#C8351C" />
      </linearGradient>
      <linearGradient id="gOrange" x1="0" y1="0" x2="0" y2="1">
        <stop offset="0" stopColor="#F57C1F" />
        <stop offset="1" stopColor="#E8472C" />
      </linearGradient>
      <filter id="soft" x="-20%" y="-20%" width="140%" height="140%">
        <feGaussianBlur stdDeviation="0.4" />
      </filter>
    </defs>

    {/* Background wash */}
    <rect width="600" height="700" fill="#FAFAF7" />

    {/* Faint grid */}
    <g stroke="#1E3A8A" strokeOpacity=".06" strokeWidth="1">
      {Array.from({length: 10}).map((_, i) => <line key={`v${i}`} x1={i * 60} y1="0" x2={i * 60} y2="700" />)}
      {Array.from({length: 12}).map((_, i) => <line key={`h${i}`} x1="0" y1={i * 60} x2="600" y2={i * 60} />)}
    </g>

    {/* Geometric Z composition — oversized */}
    <g data-p="slow">
      <rect x="60" y="80" width="220" height="220" fill="url(#gNavy)" />
      <rect x="320" y="80" width="220" height="220" fill="url(#gRed)" />
      <rect x="60" y="340" width="220" height="220" fill="#1E3A8A" opacity=".14" />
      <rect x="320" y="340" width="220" height="220" fill="url(#gOrange)" />
    </g>

    {/* Big Z stroke */}
    <g data-p="med">
      <path d="M90 110 L510 110 L90 530 L510 530"
        fill="none" stroke="#3B9EDB" strokeWidth="18" strokeLinecap="square" />
    </g>

    {/* Small markers */}
    <g data-p="fast" fill="#FAFAF7">
      <circle cx="170" cy="190" r="4" />
      <circle cx="430" cy="190" r="4" />
      <circle cx="170" cy="450" r="4" />
      <circle cx="430" cy="450" r="4" />
    </g>

    {/* Coordinate label */}
    <g fill="#1E3A8A" fillOpacity=".55" fontFamily="JetBrains Mono, monospace" fontSize="10" letterSpacing="0.08em">
      <text x="60" y="604">Z / 01</text>
      <text x="480" y="604">51°30′N</text>
      <text x="60" y="624">PARTNERS IN GROWTH</text>
      <text x="460" y="624">00°07′W</text>
    </g>
  </svg>
);

Object.assign(window, { ZMark, LogoFull, Wordmark, IconArrow, IconFinance, IconHCM, IconAnalytics, IconManaged, IconQuote, IconWhatsApp, IconArrowLong, IconPlus, IconClose, IconCorner, HeroMesh });
