// ── Zeneesha V3 Approach ─────────────────────────────
const ApproachV3 = () => {
  const steps = [
    {
      n: '01',
      title: 'Review',
      line: 'Assess your setup, workflows, reporting, integrations, and adoption.',
    },
    {
      n: '02',
      title: 'Reveal',
      line: 'Find the patterns, gaps, and risks behind everyday friction.',
    },
    {
      n: '03',
      title: 'Roadmap',
      line: 'Prioritise the improvements that will create the greatest business value.',
    },
    {
      n: '04',
      title: 'Refine',
      line: 'Keep Workday aligned as your organisation evolves.',
    },
  ];

  return (
    <section id="approach" className="relative py-32 bg-cream overflow-hidden">
      {/* Decorative bg letter */}
      <div aria-hidden="true" className="absolute -left-10 top-20 font-sans text-navy/[0.025] leading-none pointer-events-none select-none" style={{ fontWeight: 700, fontSize: 'clamp(280px, 42vw, 640px)' }}>
        Z
      </div>

      <div className="relative max-w-[1440px] mx-auto px-8">

        {/* Header row */}
        <div className="grid lg:grid-cols-12 gap-10 mb-20 items-center">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              How We Work
            </div>
            <h2 className="reveal delay-1 font-sans text-navy text-[clamp(38px,5vw,68px)] leading-[1.04]" style={{ fontWeight: 300 }}>
              The best Workday environments are built proactively.
            </h2>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 reveal delay-2 flex items-center">
            <p className="text-[24px] leading-[1.55] text-slate2" style={{ fontWeight: 300 }}>
              Zeneesha takes a proactive approach to your Workday environment, identifying risks, strengthening processes, and driving improvements before issues become recurring challenges.
            </p>
          </div>
        </div>

        {/* Connected steps */}
        <div className="relative">
          {/* Connecting line — desktop only */}
          <div className="hidden md:block absolute top-[46px] left-0 right-0 h-px bg-navy/15" />
          <div className="hidden md:block absolute top-[46px] left-0 h-px bg-redorange reveal" style={{ width: '80%' }} />

          <div className="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-2">
            {steps.map((s, i) => (
              <div key={s.n} className={`relative reveal delay-${i + 1} group`}>
                <div className="flex items-center gap-4 mb-4 md:mb-6 relative">
                  <div className="step-num relative z-10 w-[70px] h-[70px] md:w-[90px] md:h-[90px] rounded-full border border-navy/20 bg-cream flex flex-col items-center justify-center flex-shrink-0 group-hover:border-redorange group-hover:bg-redorange transition-all duration-350">
                    <span className="font-mono text-[9px] tracking-[0.18em] uppercase text-navy/50 group-hover:text-white/70 transition-colors">Step</span>
                    <span className="font-sans text-navy text-[24px] mt-0.5 group-hover:text-white transition-colors" style={{ fontWeight: 400 }}>{s.n}</span>
                  </div>
                </div>
                <h3 className="font-sans text-navy text-[22px] md:text-[30px] leading-none mb-3" style={{ fontWeight: 400 }}>
                  {s.title}<span className="text-redorange">.</span>
                </h3>
                <p className="text-[15px] md:text-[18px] leading-[1.65] text-slate2 max-w-[260px] pr-4 md:pr-6" style={{ fontWeight: 300 }}>
                  {s.line}
                </p>
                {i < 3 && (
                  <div className="hidden md:block absolute top-[46px] right-0 text-navy/20 group-hover:text-redorange transition-colors">
                    <IconArrow size={14} />
                  </div>
                )}
              </div>
            ))}
          </div>
        </div>

        {/* Bottom CTA */}
        <div className="reveal mt-16 pt-10 border-t border-navy/10 flex items-center justify-end gap-8">
          <a
            href="#talk"
            className="flex-shrink-0 inline-flex items-center gap-3 text-redorange text-[18px] font-medium u-link"
          >
            Start with a Health Check
            <IconArrow size={12} />
          </a>
        </div>

      </div>
    </section>
  );
};

Object.assign(window, { ApproachV3 });
