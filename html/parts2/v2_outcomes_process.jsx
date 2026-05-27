// =========================================================
// Outcomes section — tangible results, counters, case chips
// =========================================================

const useInView = (ref, threshold = 0.2) => {
  const [inView, setInView] = React.useState(false);
  React.useEffect(() => {
    if (!ref.current) return;
    const io = new IntersectionObserver(([e]) => { if (e.isIntersecting) { setInView(true); io.disconnect(); } }, { threshold });
    io.observe(ref.current);
    return () => io.disconnect();
  }, []);
  return inView;
};

const Counter = ({ to, prefix = '', suffix = '', duration = 1800 }) => {
  const ref = React.useRef(null);
  const inView = useInView(ref, 0.3);
  const [val, setVal] = React.useState(0);
  React.useEffect(() => {
    if (!inView) return;
    const start = performance.now();
    let raf;
    const tick = (now) => {
      const t = Math.min(1, (now - start) / duration);
      const eased = 1 - Math.pow(1 - t, 3);
      setVal(to * eased);
      if (t < 1) raf = requestAnimationFrame(tick);
    };
    raf = requestAnimationFrame(tick);
    return () => cancelAnimationFrame(raf);
  }, [inView, to, duration]);
  const display = Number.isInteger(to) ? Math.floor(val) : val.toFixed(1);
  return <span ref={ref}>{prefix}{display}{suffix}</span>;
};

const OutcomesSection = () => {
  const outcomes = [
    { k: 'Close faster', n: 42, suffix: '%', label: 'shorter close cycles, median across 14 SMBs.', side: 'From 9 working days to 5.' },
    { k: 'Reclaim hours', n: 2.1, prefix: '£', suffix: 'm', label: 'in planning-cycle labour, returned to operators.', side: 'Across a typical three-year window.' },
    { k: 'Retain knowledge', n: 94, suffix: '%', label: 'of clients still running with us after year one.', side: 'Industry average is closer to 62%.' },
    { k: 'Adopt, don\'t endure', n: 92, suffix: '%', label: 'platform adoption by month three.', side: 'Measured at the login, not the survey.' },
  ];
  return (
    <section id="outcomes" className="relative py-28 bg-white">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-5">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>01 · Outcomes</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.8vw,68px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              We&rsquo;re hired <br/>
              <em className="italic text-navy/70">for what happens</em> <br/>
              after go-live.
            </h2>
          </div>
          <div className="lg:col-span-6 lg:col-start-7 reveal delay-2 flex items-end">
            <p className="text-[16.5px] leading-[1.7] text-slate2 max-w-[520px]">
              Workday is the platform. The outcome is measured in finance close cycles, planning hours, and the quiet confidence a leadership team feels at the month-end review. Here is what ours tends to look like.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-px bg-navy/10 border border-navy/10">
          {outcomes.map((o, i) => (
            <div key={o.k} className={`reveal delay-${i + 1} bg-white p-8 min-h-[280px] flex flex-col justify-between card-lift hover:bg-cream relative`}>
              <div>
                <div className="font-mono text-[10.5px] tracking-[0.2em] uppercase text-navy/50 mb-6">{o.k}</div>
                <div className="font-display text-navy text-[clamp(56px,5.6vw,84px)] leading-none counter" style={{ fontWeight: 300 }}>
                  <Counter to={o.n} prefix={o.prefix || ''} suffix={o.suffix || ''} />
                </div>
                <div className="bar-track mt-6"><div className="bar-fill" /></div>
              </div>
              <div className="mt-6">
                <p className="text-[14.5px] leading-[1.55] text-slate2">{o.label}</p>
                <p className="mt-3 text-[12px] font-mono text-navy/45 tracking-[0.04em]">{o.side}</p>
              </div>
              <span className="absolute top-6 right-6 font-mono text-[10px] tracking-[0.18em] text-navy/30">0{i+1}</span>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

// =========================================================
// Process — the five moves with sticky scroll story
// =========================================================
const Process = () => {
  const steps = [
    { n: '01', t: 'Listen', line: 'A week of quiet conversations. The CFO, the controller, two accountants, one analyst. We write it down. You approve before anything moves.' , detail: 'Five working days · no deck · a two-page written POV at the end.' },
    { n: '02', t: 'Architect', line: 'The tenant is designed around your operating model, not Workday\'s sample templates. Every decision is traceable to a business reason.', detail: 'Ten working days · a signed design document · priced at fixed fee.' },
    { n: '03', t: 'Build', line: 'Small paired team. Your people sit in the room. Weekly demos. Nothing enters production without someone on your side pressing the button.', detail: 'Six to sixteen weeks · bi-weekly demos · zero surprise cutovers.' },
    { n: '04', t: 'Transition', line: 'We work a shift behind your team for the first two close cycles. Present in the room when it matters. Quiet when it doesn\'t.', detail: 'First 60 days post go-live · named point of contact · hands on keys.' },
    { n: '05', t: 'Stay', line: 'A small retained team for releases, tickets, and the improvements you didn\'t know to ask for yet. You can end it any month.', detail: 'Month to month · roadmap reviewed quarterly · measured on adoption.' },
  ];

  const [active, setActive] = React.useState(0);
  const refs = React.useRef([]);

  React.useEffect(() => {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          const idx = parseInt(e.target.getAttribute('data-idx'));
          setActive(idx);
        }
      });
    }, { threshold: 0.55 });
    refs.current.forEach((r) => r && io.observe(r));
    return () => io.disconnect();
  }, []);

  return (
    <section id="process" className="relative py-32 bg-cream overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-20">
          <div className="lg:col-span-5">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>02 · Process</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.8vw,68px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Five moves. <br/>
              <em className="italic text-navy/70">Each one named,</em> <br/>
              scoped, and signed off.
            </h2>
          </div>
          <div className="lg:col-span-6 lg:col-start-7 reveal delay-2 flex items-end">
            <p className="text-[16.5px] leading-[1.7] text-slate2 max-w-[520px]">
              A Workday engagement is a sequence of commitments, not a Gantt chart. We make each commitment explicit, priced, and refusable, so your team can push back on the thing they disagree with instead of sitting with it for nine months.
            </p>
          </div>
        </div>

        <div className="grid lg:grid-cols-12 gap-12">
          {/* Left sticky index */}
          <aside className="lg:col-span-4 lg:sticky lg:top-28 self-start">
            <div className="border-t border-navy/15">
              {steps.map((s, i) => (
                <button key={s.n} onClick={() => refs.current[i]?.scrollIntoView({ behavior: 'smooth', block: 'center' })}
                  className={`w-full text-left flex items-start gap-4 py-5 border-b border-navy/10 text-slate2 transition-colors ${active === i ? 'step-on' : ''}`}>
                  <span className="dotnum w-9 h-9 rounded-full border border-navy/25 flex items-center justify-center font-mono text-[11px] tracking-wider text-navy/55 transition-all">
                    {s.n}
                  </span>
                  <span>
                    <div className="font-display text-[22px] leading-none text-navy" style={{ fontWeight: 400 }}>{s.t}</div>
                    <div className="mt-2 font-mono text-[10.5px] tracking-[0.12em] text-navy/45 uppercase">{s.detail.split(' · ')[0]}</div>
                  </span>
                </button>
              ))}
            </div>
            <div className="mt-8 font-mono text-[11px] tracking-[0.18em] text-navy/50 uppercase flex items-center gap-2">
              <span>Step</span>
              <span className="text-redorange">{String(active + 1).padStart(2, '0')}</span>
              <span>/</span>
              <span>{steps.length}</span>
            </div>
          </aside>

          {/* Right scrollable steps */}
          <div className="lg:col-span-8 space-y-12">
            {steps.map((s, i) => (
              <article key={s.n} ref={(el) => (refs.current[i] = el)} data-idx={i} className="reveal delay-1 min-h-[440px] bg-white border border-navy/10 card-lift overflow-hidden relative">
                <div className="grid md:grid-cols-5">
                  <div className="md:col-span-2 aspect-[4/5] md:aspect-auto portrait relative">
                    <div className="absolute inset-0 bg-gradient-to-br from-transparent via-transparent to-navy/60" />
                    <div className="absolute inset-0 grain" />
                    {/* Stage badge */}
                    <div className="absolute top-5 left-5 bg-white/90 backdrop-blur px-3 py-1.5 font-mono text-[10px] tracking-[0.22em] uppercase text-navy">Stage {s.n}</div>
                    <div className="absolute bottom-5 left-5 right-5 text-white font-mono text-[10.5px] tracking-[0.14em] uppercase opacity-85">
                      {s.detail}
                    </div>
                  </div>
                  <div className="md:col-span-3 p-10 flex flex-col justify-center">
                    <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange mb-4">Move {s.n}</div>
                    <h3 className="font-display text-navy text-[clamp(32px,3.4vw,52px)] leading-none mb-6" style={{ fontWeight: 300 }}>
                      {s.t}<span className="text-redorange">.</span>
                    </h3>
                    <p className="text-[16px] leading-[1.7] text-slate2 max-w-[460px]">{s.line}</p>
                    <div className="mt-8 flex items-center gap-6 pt-6 border-t border-navy/10 text-[12px] font-mono tracking-[0.1em] text-navy/60">
                      {s.detail.split(' · ').map((d, j) => <span key={j}>{d}</span>)}
                    </div>
                  </div>
                </div>
              </article>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { OutcomesSection, Process });
