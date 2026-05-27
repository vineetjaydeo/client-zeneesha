// ── Zeneesha V4 Hero ──────────────────────────────────

const FEED_ITEMS = [
  {
    tag: 'Post Go-Live',
    title: 'Workday doing more than it should?',
    desc: 'Recurring workarounds, manual steps, and config debt accumulate fast after go-live.',
    grad: 'linear-gradient(140deg, #E8472C, #F57C1F)',
  },
  {
    tag: 'Adoption',
    title: 'Your team not actually using it?',
    desc: 'Low adoption means the ROI you planned for isn\'t landing where it should.',
    grad: 'linear-gradient(140deg, #3B9EDB, #1E3A8A)',
  },
  {
    tag: 'Reporting',
    title: 'Leaders still waiting on answers?',
    desc: 'If reports take days to build, the decisions they drive are already delayed.',
    grad: 'linear-gradient(140deg, #F57C1F, #E8472C)',
  },
  {
    tag: 'AI Readiness',
    title: 'Can\'t unlock Workday\'s AI yet?',
    desc: 'Workday\'s AI roadmap is live. Without clean data and optimised config, you won\'t see the benefit.',
    grad: 'linear-gradient(140deg, #1E3A8A, #3B9EDB)',
  },
  {
    tag: 'AMS',
    title: 'Change requests piling up?',
    desc: 'Every release adds complexity. Without dedicated support, your backlog only grows.',
    grad: 'linear-gradient(140deg, #E8472C, #1E3A8A)',
  },
];

const CARD_H  = 116;
const CARD_GAP = 10;
const UNIT = CARD_H + CARD_GAP;
const VISIBLE = 3;
const CONTAINER_H = VISIBLE * CARD_H + (VISIBLE - 1) * CARD_GAP;

const HeroFeedTickerV4 = () => {
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
                background: 'rgba(255,255,255,0.60)',
                backdropFilter: 'blur(14px)',
                WebkitBackdropFilter: 'blur(14px)',
                border: '1px solid rgba(255,255,255,0.75)',
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
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 18, lineHeight: 1.25, fontWeight: 400, color: '#1E3A8A' }}>
                {item.title}
              </div>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 14, lineHeight: 1.5, fontWeight: 300, color: '#475569' }}>
                {item.desc}
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

const HeroV4 = () => {
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

  React.useEffect(() => {
    if (linesInited.current) return;
    linesInited.current = true;
    document.querySelectorAll('.kline-v4').forEach((el, i) => {
      setTimeout(() => el.classList.add('in'), 60 + i * 90);
    });
  }, []);

  return (
    <section id="top" className="relative w-full overflow-hidden bg-cream">

      {/* Ambient blobs */}
      <div aria-hidden="true" className="pointer-events-none absolute inset-0">
        <div className="absolute" style={{ right: '-6%', top: '-10%', width: 560, height: 560, background: 'rgba(232,71,44,0.07)', filter: 'blur(110px)', borderRadius: '50%', transform: `translate3d(${mouse.x * -16}px, ${mouse.y * -16 + scrollY * 0.04}px, 0)` }} />
        <div className="absolute" style={{ left: '-6%', bottom: '10%', width: 480, height: 480, background: 'rgba(59,158,219,0.10)', filter: 'blur(90px)', borderRadius: '50%', transform: `translate3d(${mouse.x * 24}px, ${mouse.y * 24}px, 0)` }} />
        <div className="absolute" style={{ left: '35%', top: '20%', width: 360, height: 360, background: 'rgba(245,124,31,0.05)', filter: 'blur(80px)', borderRadius: '50%', transform: `translate3d(${mouse.x * -30}px, ${mouse.y * -30}px, 0)` }} />
      </div>

      {/* Main grid */}
      <div className="relative max-w-[1440px] w-full mx-auto px-8 pt-[120px] pb-20 grid lg:grid-cols-12 gap-12 items-start">

        {/* ── Left: headline + CTAs ── */}
        <div className="lg:col-span-7">

          {/* Eyebrow */}
          <div className="flex items-center gap-3 mb-8 text-[12px] font-mono tracking-[0.22em] uppercase text-slate2">
            <span className="w-1.5 h-1.5 rounded-full bg-redorange pulse" />
            Workday Post Go-Live Specialists
          </div>

          {/* Kinetic headline — V5 */}
          <h1 className="font-sans text-navy leading-[1.12]" style={{ fontWeight: 500 }}>
            <span className="kline-v4 block overflow-hidden">
              <span className="block text-navy/45" style={{ fontSize: 'clamp(28px,3.6vw,52px)', fontWeight: 300 }}>Transforming Workday</span>
            </span>
            <span className="kline-v4 block overflow-hidden">
              <span className="block" style={{ fontSize: 'clamp(42px,6vw,88px)', fontWeight: 600, letterSpacing: '-0.02em' }}>Into Business Value.</span>
            </span>
          </h1>

          <p className="mt-8 max-w-[540px] text-[18px] leading-[1.65] text-slate2 reveal in delay-4" style={{ fontWeight: 300 }}>
            Post go-live is where most organisations lose their Workday ROI. Zeneesha ensures that doesn't happen — from implementation to AI-led optimisation.
          </p>

          <div className="mt-10 flex flex-wrap items-center gap-4 reveal in delay-5">
            <a
              href="#talk"
              className="inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[17px] font-medium tracking-wide hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,0.65)]"
            >
              Book Your Complimentary Health Check
              <IconArrow size={14} />
            </a>
            <a
              href="#solutions"
              className="inline-flex items-center gap-3 text-navy px-6 py-4 rounded-full text-[17px] font-medium border border-navy/25 hover:bg-navy hover:text-white transition-all duration-300"
            >
              See How We Help
              <IconArrow size={13} />
            </a>
          </div>

          {/* Free callout */}
          <div className="mt-5 flex items-center gap-2 text-[13px] font-mono tracking-[0.06em] text-slate2/70 reveal in delay-6">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
              <path d="M20 6L9 17l-5-5" />
            </svg>
            No cost. No obligation. 60-minute session.
          </div>
        </div>

        {/* ── Right: animated ticker ── */}
        <div className="lg:col-span-5 flex flex-col gap-4 reveal in delay-4">
          {/* Header row */}
          <div className="flex items-center justify-between mb-1">
            <div className="flex items-center gap-2 font-mono text-[11px] tracking-[0.2em] uppercase text-slate2">
              <span style={{ display: 'inline-block', width: 6, height: 6, borderRadius: '50%', background: '#E8472C', flexShrink: 0 }} className="pulse" />
              Where Zeneesha Helps
            </div>
            <span className="font-mono text-[11px] text-navy/40 tracking-[0.1em]">Common gaps</span>
          </div>

          <HeroFeedTickerV4 />

          <div className="font-mono text-[11px] tracking-[0.14em] uppercase text-slate2/50">
            HCM &middot; Finance &middot; Planning &middot; Reporting &middot; Integrations
          </div>
        </div>

      </div>

      {/* Bottom bar — 3 equal columns so centre item is truly centred */}
      <div className="relative border-t border-navy/10 bg-cream/70 backdrop-blur-sm">
        <div className="max-w-[1440px] mx-auto px-8 h-[52px] flex items-center text-[12px] font-mono tracking-[0.22em] uppercase text-slate2">
          <div className="flex-1 flex items-center">
            <span>Implementation · AMS &amp; Support · Maximise · AI</span>
          </div>
          <div className="flex-1 flex items-center justify-center">
            <span className="hidden md:inline">Scroll to explore <span className="text-redorange">↓</span></span>
          </div>
          <div className="flex-1 flex items-center justify-end">
            <span className="hidden md:inline">Workday Specialists</span>
          </div>
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { HeroV4 });
