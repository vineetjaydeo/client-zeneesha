// ── Zeneesha V3 Hero ─────────────────────────────────
// Outcomes layout (8-col left, 4-col right) on light cream background

const FEED_ITEMS = [
  {
    tag: 'Lorem Ipsum',
    title: 'Lorem ipsum dolor sit?',
    desc: 'Consectetur adipiscing elit sed do eiusmod.',
    grad: 'linear-gradient(140deg, #E8472C, #F57C1F)',
  },
  {
    tag: 'Dolor Sit',
    title: 'Amet consectetur adipiscing?',
    desc: 'Ut labore et dolore magna aliqua veniam.',
    grad: 'linear-gradient(140deg, #3B9EDB, #1E3A8A)',
  },
  {
    tag: 'Adipiscing',
    title: 'Sed do eiusmod tempor?',
    desc: 'Incididunt ut labore et dolore magna.',
    grad: 'linear-gradient(140deg, #F57C1F, #E8472C)',
  },
  {
    tag: 'Eiusmod',
    title: 'Quis nostrud exercitation?',
    desc: 'Ullamco laboris nisi ut aliquip commodo.',
    grad: 'linear-gradient(140deg, #1E3A8A, #3B9EDB)',
  },
  {
    tag: 'Tempor',
    title: 'Duis aute irure dolor?',
    desc: 'Reprehenderit in voluptate velit esse cillum.',
    grad: 'linear-gradient(140deg, #E8472C, #1E3A8A)',
  },
];

// ── Card height constants (must match rendered card) ─
const CARD_H  = 116;  // px , fixed card height
const CARD_GAP = 10;  // px , gap between cards
const UNIT = CARD_H + CARD_GAP;
const VISIBLE = 3;
const CONTAINER_H = VISIBLE * CARD_H + (VISIBLE - 1) * CARD_GAP; // 368px

// ── Feed ticker component ─────────────────────────────
const HeroFeedTicker = () => {
  const [deck, setDeck] = React.useState(() =>
    FEED_ITEMS.slice(0, VISIBLE).map((item, i) => ({ ...item, uid: i }))
  );
  const [containerOffset, setContainerOffset] = React.useState(0);
  const [isTransitioning, setIsTransitioning] = React.useState(false);

  const nextIdxRef = React.useRef(VISIBLE % FEED_ITEMS.length);
  const uidRef     = React.useRef(VISIBLE);
  const timerRef   = React.useRef(null);

  React.useEffect(() => {
    const tick = () => {
      const newItem = { ...FEED_ITEMS[nextIdxRef.current], uid: uidRef.current };
      nextIdxRef.current = (nextIdxRef.current + 1) % FEED_ITEMS.length;
      uidRef.current++;

      setIsTransitioning(false);
      setDeck(prev => [newItem, ...prev]);
      setContainerOffset(-UNIT);

      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          setIsTransitioning(true);
          setContainerOffset(0);
        });
      });

      const cleanup = setTimeout(() => {
        setDeck(prev => prev.slice(0, VISIBLE));
        setIsTransitioning(false);
      }, 650);

      return cleanup;
    };

    let cleanupId;
    timerRef.current = setInterval(() => {
      if (cleanupId) clearTimeout(cleanupId);
      cleanupId = tick();
    }, 3200);

    return () => {
      clearInterval(timerRef.current);
      if (cleanupId) clearTimeout(cleanupId);
    };
  }, []);

  return (
    <div style={{ height: CONTAINER_H, overflow: 'hidden', position: 'relative' }}>
      <div
        style={{
          transform: `translateY(${containerOffset}px)`,
          transition: isTransitioning ? 'transform 0.52s cubic-bezier(0.16,1,0.3,1)' : 'none',
          willChange: 'transform',
        }}
      >
        {deck.map((item, i) => (
          <div
            key={item.uid}
            style={{ height: CARD_H, marginBottom: i < deck.length - 1 ? CARD_GAP : 0 }}
          >
            <div
              style={{
                height: '100%',
                background: 'rgba(255,255,255,0.55)',
                backdropFilter: 'blur(14px)',
                WebkitBackdropFilter: 'blur(14px)',
                border: '1px solid rgba(255,255,255,0.7)',
                borderRadius: 14,
                padding: '14px 18px',
                display: 'flex', flexDirection: 'column', justifyContent: 'center', gap: 6,
                boxShadow: '0 4px 20px rgba(30,58,138,0.07)',
              }}
            >
              <div style={{ display: 'flex', alignItems: 'center', gap: 7 }}>
                <span style={{ display: 'inline-block', width: 7, height: 7, borderRadius: '50%', flexShrink: 0, background: item.grad }} />
                <span style={{ fontFamily: 'Jost, sans-serif', fontSize: 10, letterSpacing: '0.22em', textTransform: 'uppercase', color: '#475569' }}>
                  {item.tag}
                </span>
              </div>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 20, lineHeight: 1.2, fontWeight: 400, color: '#1E3A8A' }}>
                {item.title}
              </div>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 15, lineHeight: 1.5, fontWeight: 300, color: '#475569' }}>
                {item.desc}
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

// ── Hero ──────────────────────────────────────────────
const HeroV3 = () => {
  const [scrollY, setScrollY] = React.useState(0);
  const [mouse, setMouse] = React.useState({ x: 0, y: 0 });
  const linesInited = React.useRef(false);

  React.useEffect(() => {
    const onScroll = () => setScrollY(window.scrollY);
    const onMove = (e) => setMouse({
      x: e.clientX / window.innerWidth - 0.5,
      y: e.clientY / window.innerHeight - 0.5,
    });
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('mousemove', onMove);
    return () => {
      window.removeEventListener('scroll', onScroll);
      window.removeEventListener('mousemove', onMove);
    };
  }, []);

  // Kinetic headline
  React.useEffect(() => {
    if (linesInited.current) return;
    linesInited.current = true;
    document.querySelectorAll('.kline-v3').forEach((el, i) => {
      setTimeout(() => el.classList.add('in'), 60 + i * 90);
    });
  }, []);

  return (
    <section id="top" className="relative w-full overflow-hidden bg-cream flex flex-col" style={{ minHeight: '80vh' }}>

      {/* Parallax ambient blobs — strong enough to read on cream */}
      <div aria-hidden="true" className="pointer-events-none absolute inset-0">
        {/* Redorange — top right, slow layer */}
        <div className="absolute" style={{ right: '-8%', top: '-12%', width: 600, height: 600, background: 'rgba(232,71,44,0.08)', filter: 'blur(100px)', borderRadius: '50%', transform: `translate3d(${mouse.x * -18}px, ${mouse.y * -18 + scrollY * 0.05}px, 0)` }} />
        {/* Sky blue — left mid, medium layer */}
        <div className="absolute" style={{ left: '-8%', bottom: '5%', width: 500, height: 500, background: 'rgba(59,158,219,0.12)', filter: 'blur(80px)', borderRadius: '50%', transform: `translate3d(${mouse.x * 26}px, ${mouse.y * 26}px, 0)` }} />
        {/* Amber — centre, fast layer */}
        <div className="absolute" style={{ left: '32%', top: '18%', width: 380, height: 380, background: 'rgba(245,124,31,0.06)', filter: 'blur(80px)', borderRadius: '50%', transform: `translate3d(${mouse.x * -34}px, ${mouse.y * -34}px, 0)` }} />
        {/* Navy — bottom right, slowest */}
        <div className="absolute" style={{ right: '10%', bottom: '-5%', width: 340, height: 340, background: 'rgba(30,58,138,0.09)', filter: 'blur(70px)', borderRadius: '50%', transform: `translate3d(${mouse.x * 12}px, ${mouse.y * 12 + scrollY * 0.03}px, 0)` }} />
      </div>

      {/* Main grid */}
      <div className="relative flex-1 max-w-[1440px] w-full mx-auto px-8 pt-[120px] pb-14 grid lg:grid-cols-12 gap-10 items-center">

        {/* ── Left: headline + CTAs ── */}
        <div className="lg:col-span-8">

          {/* Eyebrow */}
          <div className="flex items-center gap-3 mb-8 text-[12px] font-mono tracking-[0.22em] uppercase text-slate2">
            <span className="w-1.5 h-1.5 rounded-full bg-redorange pulse" />
            Your All-in-One Workday Partner
          </div>

          {/* Kinetic headline */}
          <h1 className="font-sans text-navy leading-[1.18]">
            <span className="kline-v3 block overflow-hidden">
              <span className="block text-navy/50" style={{ fontSize: 'clamp(36px,4.8vw,72px)', fontWeight: 300 }}>Smarter Workday.</span>
            </span>
            <span className="kline-v3 block overflow-hidden">
              <span className="block" style={{ fontSize: 'clamp(48px,7vw,104px)', fontWeight: 500, whiteSpace: 'nowrap' }}>Stronger <span className="text-redorange" style={{ display: 'inline' }}>ROI.</span></span>
            </span>
          </h1>

          <p className="mt-10 max-w-[600px] text-[18px] leading-[1.65] text-navy reveal in delay-5" style={{ fontWeight: 600 }}>
            Eliminate Workday Friction with Expert Guidance, Streamlined Processes, and Ongoing Performance Optimisation.
          </p>

          <p className="mt-4 max-w-[580px] text-[18px] leading-[1.6] text-navy/80 reveal in delay-5" style={{ fontWeight: 400 }}>
            Seamlessly connect Implementation, AMS, and AI-led innovation across Workday HCM, Finance, and Adaptive Planning with a single trusted partner.
          </p>

          <div className="mt-10 flex flex-wrap items-center gap-4 reveal in delay-6">
            <a
              href="#talk"
              className="inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[18px] font-medium tracking-wide hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,0.65)]"
            >
              Request a Workday Health Checkup
              <IconArrow size={14} />
            </a>
            <a
              href="#services"
              className="inline-flex items-center gap-3 text-navy px-6 py-4 rounded-full text-[18px] font-medium border border-navy/25 hover:bg-navy hover:text-white transition-all duration-300"
            >
              See Our Services
              <IconArrow size={13} />
            </a>
          </div>
        </div>

        {/* ── Right: stacking feed ── */}
        <div className="lg:col-span-4 flex flex-col gap-4 reveal in delay-4">
          {/* Header row */}
          <div className="flex items-center justify-between mb-1">
            <div className="flex items-center gap-2 font-mono text-[11px] tracking-[0.2em] uppercase text-slate2">
              <span className="pulse w-1.5 h-1.5 rounded-full bg-redorange" style={{ display: 'inline-block', width: 6, height: 6, borderRadius: '50%', background: '#E8472C', flexShrink: 0 }} />
              Where Zeneesha Helps
            </div>
            <span className="font-mono text-[11px] text-navy/40 tracking-[0.1em]">Common gaps</span>
          </div>

          {/* Stacking ticker */}
          <HeroFeedTicker />

          <div className="font-mono text-[11px] tracking-[0.14em] uppercase text-slate2/50">
            HCM &middot; Finance &middot; Planning &middot; Reporting &middot; Integrations
          </div>
        </div>

      </div>

      {/* Bottom bar */}
      <div className="relative border-t border-navy/10 bg-cream/70 backdrop-blur-sm">
        <div className="max-w-[1440px] mx-auto px-8 h-[52px] flex items-center justify-between text-[12px] font-mono tracking-[0.22em] uppercase text-slate2">
          <span>Partners in Growth</span>
          <span className="hidden md:inline">Scroll to see how we help <span className="text-redorange">↓</span></span>
          <span className="hidden md:inline">Workday AMS &middot; UK &amp; EMEA</span>
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { HeroV3 });
