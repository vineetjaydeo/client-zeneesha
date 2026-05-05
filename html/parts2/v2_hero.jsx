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
  const links = [
    { label: 'Challenges', id: 'challenges' },
    { label: 'Outcomes', id: 'outcomes' },
    { label: 'People', id: 'people' },
    { label: 'Clients', id: 'clients' },
    { label: 'Insights', id: 'insights' },
  ];
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
            <a key={l.id} href={`#${l.id}`} className={`u-link font-medium transition-colors ${scrolled ? 'text-navy/80 hover:text-navy' : 'text-white/85 hover:text-white'}`}>
              {l.label}
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
            <span>Workday AMS, Support &amp; Optimisation Partner</span>
          </div>

          <h1 className="font-display text-white text-[clamp(44px,6.6vw,98px)] leading-[1.12]" style={{ fontWeight: 300 }}>
            <span className="kinetic-line"><span>The real Workday</span></span>
            <span className="kinetic-line" style={{ transitionDelay: '120ms' }}><span>journey begins</span></span>
            <span className="kinetic-line" style={{ transitionDelay: '240ms' }}><span><em className="italic text-redorange not-italic" style={{ fontStyle: 'italic', color: '#E8472C' }}>after go-live.</em></span></span>
          </h1>

          <p className="mt-10 max-w-[640px] text-[18px] leading-[1.65] text-white/80 reveal delay-5 in">
            Zeneesha helps organisations support, optimise and improve Workday after implementation - so HR, Finance and IT teams can move faster, trust the data and unlock more value.
          </p>

          <div className="mt-10 flex flex-wrap items-center gap-4 reveal delay-6 in">
            <a href="#talk" className="group inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,.7)]">
              Discuss Your Workday Priorities
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
            <a href="#talk" className="inline-flex items-center gap-3 text-white px-6 py-4 rounded-full text-[14px] font-medium border border-white/30 hover:bg-white hover:text-navy transition-all duration-300">
              Request a Workday Health Check
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </div>

          <p className="mt-7 max-w-[640px] text-[13.5px] leading-[1.55] text-white/55 reveal delay-6 in">
            Flexible, cost-effective Workday expertise across HCM, Finance, Planning, Reporting and Integrations.
          </p>
        </div>

        <div className="lg:col-span-4 flex flex-col gap-5 reveal delay-4 in">
          <div className="flex items-center justify-between mb-1">
            <div className="font-mono text-[10.5px] tracking-[0.2em] uppercase text-white/55 flex items-center gap-2">
              <span className="w-1.5 h-1.5 rounded-full bg-redorange toast-live" />
              Where Zeneesha helps
            </div>
            <span className="font-mono text-[10px] text-white/40 tracking-[0.1em]">Common gaps</span>
          </div>

          <LiveFeed />

          <div className="pt-3 flex items-center justify-between text-[11px] font-mono tracking-[0.12em] uppercase text-white/50">
            <span>HCM &middot; Finance &middot; Planning &middot; Reporting &middot; Integrations</span>
          </div>
        </div>
      </div>

      {/* Bottom bar */}
      <div className="relative border-t border-white/10 bg-navy-ink/40 backdrop-blur-sm">
        <div className="max-w-[1440px] mx-auto px-8 h-14 flex items-center justify-between text-[11px] font-mono tracking-[0.22em] uppercase text-white/60">
          <span>Partners in Growth</span>
          <span className="hidden md:inline">Scroll to see how we help <span className="text-redorange">↓</span></span>
          <span className="hidden md:inline">Workday AMS · UK &amp; EMEA</span>
        </div>
      </div>
    </section>
  );
};

// Floating value-prop cards — 3 static items, one per AMS challenge area
const FEED_ITEMS = [
  { tag: 'AMS Support', title: 'Tickets piling up?', desc: 'Bring structure to AMS support.', grad: 'linear-gradient(140deg,#E8472C,#F57C1F)' },
  { tag: 'Reporting',   title: 'Reports questioned?', desc: 'Build confidence in Workday data.', grad: 'linear-gradient(140deg,#3B9EDB,#1E3A8A)' },
  { tag: 'Workflows',   title: 'Workflows ageing?',   desc: 'Optimise Workday around the business.', grad: 'linear-gradient(140deg,#F57C1F,#E8472C)' },
];

const LiveFeed = () => {
  return (
    <div className="space-y-3">
      {FEED_ITEMS.map((data, i) => (
        <div key={i} className="toast" style={{ animation: 'none' }}>
          <div className="flex items-center gap-2 mb-2.5">
            <span className="inline-block w-2 h-2 rounded-full" style={{ background: data.grad }} />
            <span className="font-mono text-[10px] tracking-[0.22em] uppercase text-white/55">{data.tag}</span>
          </div>
          <div className="font-display text-white text-[20px] leading-[1.2]" style={{ fontWeight: 400 }}>{data.title}</div>
          <p className="mt-2 text-[13.5px] leading-[1.55] text-white/72">{data.desc}</p>
        </div>
      ))}
    </div>
  );
};

Object.assign(window, { NavV2, HeroVideo, LogoFullDark, LogoFullLight, LiveFeed });
