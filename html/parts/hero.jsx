const Hero = () => {
  const ref = React.useRef(null);
  const meshRef = React.useRef(null);
  const [y, setY] = React.useState(0);
  const [mouse, setMouse] = React.useState({ x: 0, y: 0 });

  React.useEffect(() => {
    const onScroll = () => setY(window.scrollY);
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  React.useEffect(() => {
    const onMove = (e) => {
      if (!ref.current) return;
      const r = ref.current.getBoundingClientRect();
      const x = (e.clientX - r.left) / r.width - 0.5;
      const yy = (e.clientY - r.top) / r.height - 0.5;
      setMouse({ x, y: yy });
    };
    window.addEventListener('mousemove', onMove);
    return () => window.removeEventListener('mousemove', onMove);
  }, []);

  // Parallax transforms for mesh layers
  React.useEffect(() => {
    if (!meshRef.current) return;
    const root = meshRef.current;
    const slow = root.querySelector('[data-p="slow"]');
    const med = root.querySelector('[data-p="med"]');
    const fast = root.querySelector('[data-p="fast"]');
    if (slow) slow.setAttribute('transform', `translate(${mouse.x * 10} ${mouse.y * 10 + y * 0.08})`);
    if (med) med.setAttribute('transform', `translate(${mouse.x * -22} ${mouse.y * -22 + y * 0.18})`);
    if (fast) fast.setAttribute('transform', `translate(${mouse.x * 36} ${mouse.y * 36 + y * 0.28})`);
  }, [mouse, y]);

  return (
    <section id="top" ref={ref} className="relative min-h-screen w-full overflow-hidden pt-[76px]">
      {/* Background ambient blobs */}
      <div className="pointer-events-none absolute inset-0">
        <div className="blob" style={{ width: 520, height: 520, left: '-8%', top: '20%', background: '#1E3A8A', opacity: .08, transform: `translate(${mouse.x * 30}px, ${mouse.y * 30 + y * 0.1}px)` }} />
        <div className="blob" style={{ width: 420, height: 420, right: '-6%', top: '-5%', background: '#E8472C', opacity: .09, transform: `translate(${mouse.x * -40}px, ${mouse.y * -40 + y * 0.06}px)` }} />
        <div className="blob" style={{ width: 380, height: 380, right: '20%', bottom: '-10%', background: '#F57C1F', opacity: .06, transform: `translate(${mouse.x * 20}px, ${mouse.y * 20}px)` }} />
      </div>

      <div className="relative max-w-[1400px] mx-auto px-8 pt-20 lg:pt-28 pb-20 grid lg:grid-cols-12 gap-10 lg:gap-16 items-center">
        {/* Left */}
        <div className="lg:col-span-7 relative z-10">
          <div className="reveal in flex items-center gap-3 mb-8 text-[12px] font-mono tracking-[0.18em] uppercase text-navy/60">
            <span className="inline-flex items-center gap-2">
              <span className="w-6 h-px bg-redorange" />
              Workday consulting · London
            </span>
          </div>

          <h1 className="reveal in delay-1 font-display text-navy text-[clamp(44px,6.4vw,92px)] leading-[0.98]" style={{ fontWeight: 300 }}>
            Partners in your <br className="hidden sm:block" />
            growth. <em className="italic font-light text-navy/70">Not bystanders</em> <br className="hidden sm:block" />
            <span className="relative inline-block">
              to it.
              <svg className="absolute left-0 -bottom-2 w-full" height="10" viewBox="0 0 220 10" preserveAspectRatio="none" aria-hidden="true">
                <path d="M2 6 C 60 1, 160 11, 218 4" fill="none" stroke="#E8472C" strokeWidth="2.5" strokeLinecap="round" />
              </svg>
            </span>
          </h1>

          <p className="reveal in delay-2 mt-10 max-w-[560px] text-[18px] leading-[1.65] text-slate2">
            We tailor, install, and optimise Workday for ambitious SMBs. Finance, HCM, and Analytics, delivered by consultants who actually stay with you.
          </p>

          <div className="reveal in delay-3 mt-10 flex flex-wrap items-center gap-4">
            <a href="#talk" className="cta-primary group inline-flex items-center gap-3 bg-redorange text-white px-6 py-4 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-all duration-300 shadow-[0_10px_30px_-10px_rgba(232,71,44,.55)] hover:shadow-[0_18px_40px_-12px_rgba(232,71,44,.65)]">
              Book a consultation
              <IconArrow size={14} className="caret" />
            </a>
            <a href="#approach" className="cta-ghost inline-flex items-center gap-3 text-navy px-6 py-4 rounded-full text-[14px] font-medium border border-navy/25 hover:border-navy hover:bg-navy hover:text-white transition-all duration-300">
              See our approach
              <IconArrow size={14} className="caret" />
            </a>
          </div>

          {/* Facts strip */}
          <div className="reveal in delay-4 mt-16 grid grid-cols-3 gap-6 max-w-[540px] border-t border-navy/10 pt-8">
            <div>
              <div className="font-display text-navy text-[34px] num-oldstyle" style={{ fontWeight: 400 }}>11<span className="text-redorange">+</span></div>
              <div className="text-[12px] text-slate2 mt-1 leading-snug">years deploying Workday.</div>
            </div>
            <div>
              <div className="font-display text-navy text-[34px] num-oldstyle" style={{ fontWeight: 400 }}>94%</div>
              <div className="text-[12px] text-slate2 mt-1 leading-snug">of clients stay past go-live.</div>
            </div>
            <div>
              <div className="font-display text-navy text-[34px] num-oldstyle" style={{ fontWeight: 400 }}>SMB</div>
              <div className="text-[12px] text-slate2 mt-1 leading-snug">is the whole practice. Not a side desk.</div>
            </div>
          </div>
        </div>

        {/* Right — mesh composition */}
        <div className="lg:col-span-5 relative">
          <div className="relative aspect-[6/7] max-w-[560px] mx-auto">
            {/* Frame */}
            <div className="absolute inset-0 border border-navy/10 rounded-[2px]" />
            <div ref={meshRef} className="absolute inset-0 parallax">
              <HeroMesh />
            </div>
            {/* Floating caption */}
            <div className="absolute left-4 top-4 font-mono text-[10px] tracking-[0.18em] text-navy/60 uppercase bg-cream/80 backdrop-blur px-2 py-1">
              Fig. 01 — The Z, unpacked.
            </div>
            <div className="absolute right-4 bottom-4 font-mono text-[10px] tracking-[0.18em] text-navy/60 uppercase bg-cream/80 backdrop-blur px-2 py-1">
              One mark. Four disciplines.
            </div>
            {/* Corner ticks */}
            {[['top-[-6px] left-[-6px]', '0 0'], ['top-[-6px] right-[-6px]', '1 0'], ['bottom-[-6px] left-[-6px]', '0 1'], ['bottom-[-6px] right-[-6px]', '1 1']].map(([pos], i) => (
              <div key={i} className={`absolute ${pos} w-3 h-3 border-redorange`} style={{ borderTopWidth: i < 2 ? 1.5 : 0, borderBottomWidth: i >= 2 ? 1.5 : 0, borderLeftWidth: i % 2 === 0 ? 1.5 : 0, borderRightWidth: i % 2 === 1 ? 1.5 : 0 }} />
            ))}
          </div>
        </div>
      </div>

      {/* Bottom ticker / scroll cue */}
      <div className="absolute bottom-0 inset-x-0 border-t border-navy/10 bg-cream/60 backdrop-blur-sm">
        <div className="max-w-[1400px] mx-auto px-8 h-12 flex items-center justify-between text-[11px] font-mono tracking-[0.2em] uppercase text-navy/60">
          <span className="flex items-center gap-2"><span className="w-1.5 h-1.5 rounded-full bg-redorange pulse" /> Live · Zeneesha Ltd · London</span>
          <span className="hidden md:inline">Scroll <span className="text-redorange">↓</span></span>
          <span className="hidden md:inline">Workday Services Partner</span>
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { Hero });
