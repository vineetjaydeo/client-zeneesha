// ── Zeneesha V3 Client Logos Marquee ─────────────────

// Mix of real image files (where available) and clean SVG wordmarks
const LOGOS = [
  {
    name: 'LEGO',
    img: 'assets/logos/lego.svg',
    imgH: 50,
  },
  {
    name: 'Booking.com',
    img: 'assets/logos/booking.svg',
    imgH: 24,
  },
  {
    name: 'KION Group',
    img: 'assets/logos/kion.png',
    imgH: 30,
  },
  {
    name: 'Warner Music Group',
    wordmark: () => (
      <svg height="36" viewBox="0 0 180 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <text x="0" y="14" fontFamily="Jost, sans-serif" fontSize="11" fontWeight="600" letterSpacing="2" fill="currentColor">WARNER</text>
        <text x="0" y="26" fontFamily="Jost, sans-serif" fontSize="11" fontWeight="400" letterSpacing="2" fill="currentColor">MUSIC GROUP</text>
      </svg>
    ),
  },
  {
    name: 'HelloFresh',
    wordmark: () => (
      <svg height="28" viewBox="0 0 130 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <text x="0" y="22" fontFamily="Jost, sans-serif" fontSize="22" fontWeight="500" fill="currentColor">HelloFresh</text>
      </svg>
    ),
  },
  {
    name: 'Slaughter and May',
    wordmark: () => (
      <svg height="36" viewBox="0 0 160 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <text x="0" y="14" fontFamily="Jost, sans-serif" fontSize="12" fontWeight="600" letterSpacing="1.5" fill="currentColor">SLAUGHTER</text>
        <text x="0" y="30" fontFamily="Jost, sans-serif" fontSize="12" fontWeight="300" letterSpacing="1.5" fill="currentColor">AND MAY</text>
      </svg>
    ),
  },
  {
    name: 'UKRI',
    wordmark: () => (
      <svg height="36" viewBox="0 0 130 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="0" y="2" width="30" height="30" rx="2" fill="currentColor"/>
        <text x="3" y="14" fontFamily="Jost, sans-serif" fontSize="9" fontWeight="700" fill="white">UK</text>
        <text x="3" y="28" fontFamily="Jost, sans-serif" fontSize="7" fontWeight="400" fill="white">RI</text>
        <text x="36" y="14" fontFamily="Jost, sans-serif" fontSize="10" fontWeight="500" fill="currentColor">UK Research</text>
        <text x="36" y="28" fontFamily="Jost, sans-serif" fontSize="10" fontWeight="300" fill="currentColor">and Innovation</text>
      </svg>
    ),
  },
  {
    name: 'Howdens',
    wordmark: () => (
      <svg height="28" viewBox="0 0 130 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <text x="0" y="22" fontFamily="Jost, sans-serif" fontSize="22" fontWeight="600" letterSpacing="1" fill="currentColor">HOWDENS</text>
      </svg>
    ),
  },
  {
    name: 'AQA',
    wordmark: () => (
      <svg height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg">
        <text x="0" y="28" fontFamily="Jost, sans-serif" fontSize="30" fontWeight="700" fill="currentColor">AQA</text>
      </svg>
    ),
  },
  {
    name: 'Quadient',
    wordmark: () => (
      <svg height="28" viewBox="0 0 130 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <text x="0" y="22" fontFamily="Jost, sans-serif" fontSize="22" fontWeight="300" fill="currentColor">quadient</text>
      </svg>
    ),
  },
];

const LogoItem = ({ logo }) => {
  const [failed, setFailed] = React.useState(false);
  const [hovered, setHovered] = React.useState(false);

  const imgStyle = {
    height: logo.imgH || 28,
    width: 'auto',
    maxWidth: 140,
    objectFit: 'contain',
    display: 'block',
    filter: hovered ? 'grayscale(0) opacity(1)' : 'grayscale(1) opacity(0.45)',
    transition: 'filter 0.35s ease',
  };

  const inner = logo.img && !failed ? (
    <img src={logo.img} alt={logo.name} onError={() => setFailed(true)} style={imgStyle} />
  ) : logo.wordmark ? (
    <logo.wordmark />
  ) : (
    <span style={{ fontFamily: 'Jost, sans-serif', fontSize: 15, fontWeight: 500, letterSpacing: '0.04em', whiteSpace: 'nowrap' }}>
      {logo.name}
    </span>
  );

  return (
    <div
      onMouseEnter={() => setHovered(true)}
      onMouseLeave={() => setHovered(false)}
      style={{
        display: 'inline-flex',
        alignItems: 'center',
        justifyContent: 'center',
        height: 56,
        width: 200,
        flexShrink: 0,
        color: hovered ? '#1E3A8A' : '#94a3b8',
        transition: 'color 0.35s ease',
        cursor: 'default',
      }}
    >
      {inner}
    </div>
  );
};

const LogosV3 = () => {
  const trackRef = React.useRef(null);
  const xRef     = React.useRef(0);
  const rafRef   = React.useRef(null);
  const pausedRef = React.useRef(false);
  const SPEED = 0.6; // px per frame — tweak for faster/slower

  React.useEffect(() => {
    const track = trackRef.current;
    if (!track) return;

    const tick = () => {
      if (!pausedRef.current) {
        xRef.current += SPEED;
        // Half-width reset for seamless loop (two copies of logo set)
        const half = track.scrollWidth / 2;
        if (xRef.current >= half) xRef.current -= half;
        track.style.transform = `translateX(-${xRef.current}px)`;
      }
      rafRef.current = requestAnimationFrame(tick);
    };

    rafRef.current = requestAnimationFrame(tick);
    return () => cancelAnimationFrame(rafRef.current);
  }, []);

  return (
    <section className="relative py-12 bg-white overflow-hidden border-t border-b border-navy/[0.06]">

      <div className="max-w-[1440px] mx-auto px-8 mb-8 flex items-center gap-4">
        <span className="w-6 h-px bg-navy/20 flex-shrink-0" />
        <span className="font-mono text-[11px] tracking-[0.22em] uppercase text-slate2/55">
          Trusted by leading organisations
        </span>
      </div>

      <div
        style={{ position: 'relative' }}
        onMouseEnter={() => { pausedRef.current = true; }}
        onMouseLeave={() => { pausedRef.current = false; }}
      >
        {/* Edge fades */}
        <div style={{
          position: 'absolute', inset: 0, zIndex: 2, pointerEvents: 'none',
          background: 'linear-gradient(to right, white 0%, transparent 10%, transparent 90%, white 100%)',
        }} />

        <div style={{ overflow: 'hidden' }}>
          <div
            ref={trackRef}
            style={{ display: 'flex', alignItems: 'center', width: 'max-content', willChange: 'transform' }}
          >
            {[...LOGOS, ...LOGOS].map((logo, i) => (
              <LogoItem key={i} logo={logo} />
            ))}
          </div>
        </div>
      </div>

    </section>
  );
};

Object.assign(window, { LogosV3 });
