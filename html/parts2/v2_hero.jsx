// =========================================================
// Zeneesha — Outcomes page. Single JSX bundle.
// =========================================================

const LogoFullDark = ({ height = 38 }) => (
  <img src="assets/zeneesha-logo.png" alt="Zeneesha — Partners in Growth" style={{ height, width: 'auto', display: 'block' }} />
);
const LogoFullLight = ({ height = 56 }) => (
  <img src="assets/zeneesha-logo-light.png" alt="Zeneesha — Partners in Growth" style={{ height, width: 'auto', display: 'block' }} />
);

// ---------- Nav ----------
const NavV2 = () => {
  const [scrolled, setScrolled] = React.useState(false);
  React.useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 40);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    return () => window.removeEventListener('scroll', onScroll);
  }, []);
  const links = ['Outcomes', 'Process', 'People', 'Clients', 'Insights'];
  return (
    <header className={`fixed top-0 inset-x-0 z-50 transition-all duration-500 ${scrolled ? 'nav-scrolled' : ''}`}>
      <div className="max-w-[1440px] mx-auto px-8 h-[78px] flex items-center justify-between">
        <a href="#top" className="flex items-center gap-4">
          {scrolled
            ? <LogoFullDark height={38} />
            : <img src="assets/zeneesha-logo-light.png" alt="Zeneesha" style={{ height: 38 }} />
          }
        </a>
        <nav className="hidden lg:flex items-center gap-9 text-[13.5px]">
          {links.map((l) => (
            <a key={l} href={`#${l.toLowerCase()}`} className={`u-link font-medium transition-colors ${scrolled ? 'text-navy/80 hover:text-navy' : 'text-white/85 hover:text-white'}`}>
              {l}
            </a>
          ))}
        </nav>
        <div className="flex items-center gap-3">
          <a href="/" className={`hidden md:inline text-[12px] font-mono tracking-[0.1em] uppercase ${scrolled ? 'text-navy/60 hover:text-navy' : 'text-white/60 hover:text-white'}`}>Home v1</a>
          <a
            href="#talk"
            className={`inline-flex items-center gap-2 text-[13px] font-medium px-4 py-2.5 rounded-full transition-all duration-300 ${
              scrolled
                ? 'text-redorange border border-redorange/70 hover:bg-redorange hover:text-white'
                : 'text-white bg-redorange hover:bg-[#D63C23]'
            }`}
          >
            Book a consultation
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>
      </div>
    </header>
  );
};

// ---------- Hero with video background ----------
const HeroVideo = () => {
  const videoRef = React.useRef(null);
  const [loaded, setLoaded] = React.useState(false);
  const [mouse, setMouse] = React.useState({ x: 0, y: 0 });
  const [scrollY, setScrollY] = React.useState(0);

  // Deferred video load — only after page is interactive and on fast connection
  React.useEffect(() => {
    const canAutoplay = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const slow = navigator.connection && /2g|slow-2g/.test(navigator.connection.effectiveType || '');
    if (!canAutoplay || slow) return;
    const t = setTimeout(() => {
      if (!videoRef.current) return;
      // Multiple sources for reliability
      const v = videoRef.current;
      v.src = 'https://cdn.coverr.co/videos/coverr-a-business-meeting-in-a-modern-office-6314/1080p.mp4';
      v.load();
      v.addEventListener('loadeddata', () => setLoaded(true), { once: true });
      // Fallback — if the remote video can't load, keep skeleton, looks intentional
      v.addEventListener('error', () => setLoaded(false));
    }, 400);
    return () => clearTimeout(t);
  }, []);

  React.useEffect(() => {
    const onScroll = () => setScrollY(window.scrollY);
    const onMove = (e) => setMouse({ x: (e.clientX / window.innerWidth - 0.5), y: (e.clientY / window.innerHeight - 0.5) });
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('mousemove', onMove);
    return () => { window.removeEventListener('scroll', onScroll); window.removeEventListener('mousemove', onMove); };
  }, []);

  return (
    <section id="top" className="relative w-full text-white overflow-hidden" style={{ minHeight: '100vh' }}>
      {/* Video backdrop */}
      <div className="hero-video">
        <div className="absolute inset-0 skel" />
        <video
          ref={videoRef}
          className={loaded ? 'on' : ''}
          autoPlay muted loop playsInline
          poster=""
          style={{ transform: `translate3d(0, ${scrollY * 0.22}px, 0) scale(1.05)` }}
        />
      </div>
      <div className="grain" />

      {/* Subtle parallax overlay — brand blocks with depth blur */}
      <div aria-hidden="true" className="pointer-events-none absolute inset-0">
        {/* Far layer — largest, most blurred, faintest */}
        <div className="absolute" style={{ left: '-4%', top: '38%', width: 280, height: 280, background: '#3B9EDB', opacity: 0.22, filter: 'blur(48px)', transform: `translate3d(${mouse.x * -14}px, ${mouse.y * -14 + scrollY * 0.06}px, 0) rotate(${mouse.x * 2}deg)`, mixBlendMode: 'screen' }} />
        <div className="absolute" style={{ right: '-2%', top: '8%', width: 320, height: 320, background: '#E8472C', opacity: 0.28, filter: 'blur(56px)', transform: `translate3d(${mouse.x * 18}px, ${mouse.y * 18 + scrollY * 0.05}px, 0)`, mixBlendMode: 'screen' }} />

        {/* Mid layer */}
        <div className="absolute" style={{ left: '12%', top: '26%', width: 160, height: 160, background: '#E8472C', opacity: 0.38, filter: 'blur(22px)', borderRadius: 4, transform: `translate3d(${mouse.x * -24}px, ${mouse.y * -24 + scrollY * 0.14}px, 0) rotate(${mouse.x * 4 - 6}deg)`, mixBlendMode: 'screen' }} />
        <div className="absolute" style={{ right: '14%', top: '22%', width: 120, height: 120, background: '#3B9EDB', opacity: 0.34, filter: 'blur(18px)', borderRadius: 4, transform: `translate3d(${mouse.x * 28}px, ${mouse.y * 28 + scrollY * 0.1}px, 0) rotate(${mouse.x * -5}deg)`, mixBlendMode: 'screen' }} />

        {/* Near layer — smaller, sharper (light blur), brightest */}
        <div className="absolute" style={{ right: '22%', bottom: '26%', width: 84, height: 84, background: '#F57C1F', opacity: 0.5, filter: 'blur(8px)', borderRadius: 4, transform: `translate3d(${mouse.x * 44}px, ${mouse.y * 44}px, 0) rotate(${mouse.x * 8}deg)`, mixBlendMode: 'screen' }} />
        <div className="absolute" style={{ left: '28%', bottom: '18%', width: 56, height: 56, background: '#E8472C', opacity: 0.55, filter: 'blur(5px)', borderRadius: 3, transform: `translate3d(${mouse.x * 60}px, ${mouse.y * 60 - scrollY * 0.04}px, 0) rotate(${mouse.x * 12 + 8}deg)`, mixBlendMode: 'screen' }} />
        <div className="absolute" style={{ left: '46%', top: '14%', width: 40, height: 40, background: '#3B9EDB', opacity: 0.5, filter: 'blur(4px)', borderRadius: 2, transform: `translate3d(${mouse.x * 72}px, ${mouse.y * 72 + scrollY * 0.18}px, 0) rotate(${mouse.x * -14}deg)`, mixBlendMode: 'screen' }} />
      </div>

      <div className="relative max-w-[1440px] mx-auto px-8 pt-[168px] pb-32 grid lg:grid-cols-12 gap-10 min-h-screen items-end">
        <div className="lg:col-span-8">
          <div className="flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-white/70 mb-8">
            <span className="w-1.5 h-1.5 rounded-full bg-redorange pulse" />
            <span>Workday &middot; Delivered by the same team that designed it</span>
          </div>

          <h1 className="font-display text-white text-[clamp(48px,7.4vw,112px)] leading-[0.96]" style={{ fontWeight: 300 }}>
            <span className="kinetic-line"><span>Close the books in</span></span>
            <span className="kinetic-line" style={{ transitionDelay: '120ms' }}><span><em className="italic text-redorange not-italic" style={{ fontStyle: 'italic', color: '#E8472C' }}>three days.</em></span></span>
            <span className="kinetic-line" style={{ transitionDelay: '240ms' }}><span>Keep the people who</span></span>
            <span className="kinetic-line" style={{ transitionDelay: '360ms' }}><span>know <em className="italic text-white/75">why.</em></span></span>
          </h1>

          <p className="mt-10 max-w-[580px] text-[18px] leading-[1.65] text-white/80 reveal delay-5 in">
            Workday, delivered as an outcome. Not a licence. We shorten close cycles, retire spreadsheets, and leave your people measurably more senior than we found them.
          </p>

          <div className="mt-10 flex flex-wrap items-center gap-4 reveal delay-6 in">
            <a href="#talk" className="group inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,.7)]">
              Book a consultation
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
            <a href="#process" className="inline-flex items-center gap-3 text-white px-6 py-4 rounded-full text-[14px] font-medium border border-white/30 hover:bg-white hover:text-navy transition-all duration-300">
              Watch our process
              <svg width="10" height="10" viewBox="0 0 16 16" fill="currentColor"><path d="M5 3l8 5-8 5V3z"/></svg>
            </a>
          </div>
        </div>

        <div className="lg:col-span-4 flex flex-col gap-5 reveal delay-4 in">
          <div className="flex items-center justify-between mb-1">
            <div className="font-mono text-[10.5px] tracking-[0.2em] uppercase text-white/55 flex items-center gap-2">
              <span className="w-1.5 h-1.5 rounded-full bg-redorange toast-live" />
              Outcomes. Live feed.
            </div>
            <span className="font-mono text-[10px] text-white/40 tracking-[0.1em]">auto &middot; updating</span>
          </div>

          <LiveFeed />

          <div className="pt-3 flex items-center justify-between text-[11px] font-mono tracking-[0.12em] uppercase text-white/50">
            <span>Currently delivering &middot; 17 SMBs</span>
            <a href="#clients" className="hover:text-white">View all →</a>
          </div>
        </div>
      </div>

      {/* Bottom bar */}
      <div className="relative border-t border-white/10 bg-navy-ink/40 backdrop-blur-sm">
        <div className="max-w-[1440px] mx-auto px-8 h-14 flex items-center justify-between text-[11px] font-mono tracking-[0.22em] uppercase text-white/60">
          <span>Partners in Growth</span>
          <span className="hidden md:inline">Scroll for outcomes <span className="text-redorange">↓</span></span>
          <span className="hidden md:inline">Est. 2014 · UK &amp; EMEA</span>
        </div>
      </div>
    </section>
  );
};

// Animated live feed — 3 visible, new cards pop in at top, looping
const FEED_ITEMS = [
  { tag: '42%', initials: 'HB', grad: 'linear-gradient(140deg,#E8472C,#F57C1F)', title: 'Close cycle shortened', desc: 'Harlow Biosciences ran their first three-day close. Finance team signed off on Thursday afternoon.', ago: '2h ago' },
  { tag: '£2.1m', initials: 'NC', grad: 'linear-gradient(140deg,#3B9EDB,#1E3A8A)', title: 'Planning hours reclaimed', desc: 'Northwind Credit retired four recurring spreadsheets. Adaptive Planning live for year-two budget.', ago: 'Yesterday' },
  { tag: '94%', initials: 'MR', grad: 'linear-gradient(140deg,#1E3A8A,#0A1638)', title: 'Partnered, post year-one', desc: 'Meridian Retail renewed Managed Services for a second year. Ninety-eight percent adoption at review.', ago: '3d ago' },
  { tag: '6 wk', initials: 'KL', grad: 'linear-gradient(140deg,#F57C1F,#E8472C)', title: 'Go-live, six weeks after SOW', desc: 'Kestrel Logistics went live on Workday Financials. Zero surprise escalations on cutover weekend.', ago: '5d ago' },
  { tag: '3x', initials: 'AG', grad: 'linear-gradient(140deg,#3B9EDB,#0A1638)', title: 'Reporting velocity', desc: 'Ashcombe Group tripled board-pack turnaround. Two analysts freed from Monday morning exports.', ago: '1w ago' },
  { tag: '£180k', initials: 'BW', grad: 'linear-gradient(140deg,#1E3A8A,#E8472C)', title: 'First-year saving, verified', desc: 'Brightwell closed year one ahead of plan. Licence optimisation paid the programme back twice over.', ago: '2w ago' },
];

const CARD_H = 112; // px, fixed height per card
const CARD_GAP = 14;

const LiveFeed = () => {
  const [cursor, setCursor] = React.useState(2); // index of currently newest
  const [paused, setPaused] = React.useState(false);

  React.useEffect(() => {
    if (paused) return;
    const t = setInterval(() => setCursor((c) => c + 1), 3400);
    return () => clearInterval(t);
  }, [paused]);

  // Build the 5 visible slots: -1 = incoming, 0..2 visible, 3 = leaving
  const slots = [];
  for (let rank = -1; rank <= 3; rank++) {
    const idx = cursor - rank;
    if (idx < 0) continue;
    const data = FEED_ITEMS[idx % FEED_ITEMS.length];
    slots.push({ key: idx, rank, data });
  }

  const height = CARD_H * 3 + CARD_GAP * 2;

  return (
    <div
      className="relative"
      style={{ height }}
      onMouseEnter={() => setPaused(true)}
      onMouseLeave={() => setPaused(false)}
    >
      {slots.map(({ key, rank, data }) => {
        const targetY = rank === -1 ? -18 : rank * (CARD_H + CARD_GAP);
        const opacity = rank === -1 ? 0 : rank === 3 ? 0 : rank === 2 ? 0.55 : rank === 1 ? 0.82 : 1;
        const scale = rank === -1 ? 0.96 : rank === 3 ? 0.94 : 1 - rank * 0.015;
        const blur = rank >= 2 ? (rank - 1) * 1.2 : 0;
        return (
          <div
            key={key}
            className="toast absolute left-0 right-0"
            style={{
              height: CARD_H,
              transform: `translateY(${targetY}px) scale(${scale})`,
              opacity,
              filter: blur ? `blur(${blur}px)` : 'none',
              transition: 'transform .8s cubic-bezier(.2,.7,.2,1), opacity .8s cubic-bezier(.2,.7,.2,1), filter .8s',
              pointerEvents: rank >= 0 && rank <= 2 ? 'auto' : 'none',
              animation: 'none',
            }}
          >
            <div className="toast-dot" />
            <button className="toast-close" aria-label="Dismiss">
              <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.8" strokeLinecap="round"><path d="M6 6l12 12M18 6L6 18"/></svg>
            </button>
            <div className="flex items-start gap-3 h-full">
              <div className="toast-avatar relative" style={{ background: data.grad }}>
                {data.initials}
                <span className="toast-ping" />
              </div>
              <div className="flex-1 min-w-0 pr-1">
                <div className="flex items-baseline gap-2 mb-1">
                  <span className="font-display text-white text-[20px] leading-none" style={{ fontWeight: 400 }}>{data.tag}</span>
                  <span className="text-white/90 text-[12.5px] font-medium truncate">{data.title}</span>
                </div>
                <p className="text-[12px] leading-[1.5] text-white/65 line-clamp-2">{data.desc}</p>
                <div className="mt-2 flex items-center gap-2 text-[10px] font-mono tracking-[0.12em] text-white/45 uppercase">
                  <span>{data.ago}</span>
                  <span className="w-1 h-1 rounded-full bg-white/25" />
                  <span>Zeneesha &middot; Live</span>
                </div>
              </div>
            </div>
          </div>
        );
      })}
    </div>
  );
};

Object.assign(window, { NavV2, HeroVideo, LogoFullDark, LogoFullLight, LiveFeed });
