const Partner = () => {
  const steps = [
    { n: '01', title: 'Listen', line: 'A few quiet conversations with the people who will live with the system. No discovery theatre.' },
    { n: '02', title: 'Advise', line: 'A written point of view on what to do, what to defer, and what to not do at all. You keep it either way.' },
    { n: '03', title: 'Implement', line: 'Small team. Paired with yours. Weekly demos. No surprises on the Friday before go-live.' },
    { n: '04', title: 'Stay', line: 'A named team for releases, tickets, and the improvements you didn\'t know to ask for yet.' },
  ];

  return (
    <section id="partner" className="relative py-32 bg-cream overflow-hidden">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-20">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              <span>03 · How we partner</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.6vw,64px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Four moves. <em className="italic text-navy/70">In order.</em>
            </h2>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 reveal delay-2 flex items-end">
            <p className="text-[16px] leading-[1.7] text-slate2">
              Every engagement begins the same way, and ends later than you&rsquo;d expect. We don&rsquo;t leave on handover day. We leave when your team has stopped needing us for the everyday things.
            </p>
          </div>
        </div>

        {/* Connected steps */}
        <div className="relative">
          {/* Line */}
          <div className="hidden md:block absolute top-[46px] left-0 right-0 h-px bg-navy/15" />
          <div className="hidden md:block absolute top-[46px] left-0 h-px bg-redorange reveal" style={{ width: '80%' }} />

          <div className="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-2">
            {steps.map((s, i) => (
              <div key={s.n} className={`step relative reveal delay-${i + 1} group`}>
                <div className="flex items-center gap-4 mb-6 relative">
                  <div className="step-num relative z-10 w-[90px] h-[90px] rounded-full border border-navy/20 bg-cream flex flex-col items-center justify-center font-mono text-[11px] tracking-[0.18em] text-navy/60">
                    <span>STEP</span>
                    <span className="font-display text-navy text-[24px] mt-0.5" style={{ fontWeight: 400 }}>{s.n}</span>
                  </div>
                </div>
                <h3 className="font-display text-navy text-[30px] leading-none mb-3" style={{ fontWeight: 400 }}>
                  {s.title}
                  <span className="text-redorange">.</span>
                </h3>
                <p className="text-[14px] leading-[1.65] text-slate2 max-w-[260px] pr-6">
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
      </div>
    </section>
  );
};

Object.assign(window, { Partner });
