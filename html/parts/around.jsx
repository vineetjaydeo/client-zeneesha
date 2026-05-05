const Around = () => {
  const values = [
    { L: 'A', word: 'Accountable', line: 'We own the decisions we make with you, including the ones that don\'t land the first time.' },
    { L: 'R', word: 'Respectful', line: 'Your team knows things we don\'t. We listen before we recommend, then recommend anyway.' },
    { L: 'O', word: 'Others before self', line: 'The project isn\'t ours. Credit goes to the people who will live with the system after we leave.' },
    { L: 'U', word: 'Understanding', line: 'Context first. We read the culture of your finance floor before we touch a workflow.' },
    { L: 'N', word: 'Neo', line: 'Curious about what\'s next in Workday, without dragging you into every shiny release.' },
    { L: 'D', word: 'Determined', line: 'Quiet persistence. We stay with the hard parts instead of routing around them.' },
  ];

  return (
    <section id="approach" className="relative py-32 bg-white overflow-hidden">
      {/* Decorative giant A in background */}
      <div aria-hidden="true" className="absolute -left-10 top-20 font-display text-navy/[0.03] text-[640px] leading-none pointer-events-none select-none" style={{ fontWeight: 300 }}>
        A
      </div>

      <div className="relative max-w-[1400px] mx-auto px-8 grid lg:grid-cols-12 gap-16">
        <div className="lg:col-span-5 lg:sticky lg:top-28 self-start">
          <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
            <span className="w-6 h-px bg-redorange" />
            <span>02 · The AROUND framework</span>
          </div>
          <h2 className="reveal delay-1 font-display text-navy text-[clamp(40px,5.4vw,76px)] leading-[0.98]" style={{ fontWeight: 300 }}>
            Always Around.
          </h2>
          <p className="reveal delay-2 mt-6 font-display italic text-navy/70 text-[22px] leading-[1.35]" style={{ fontWeight: 300 }}>
            It&rsquo;s not a slogan. It&rsquo;s how we show up.
          </p>
          <div className="reveal delay-3 mt-10 max-w-[420px] text-[15.5px] leading-[1.7] text-slate2">
            Six words, chosen carefully, rehearsed quietly, and held each other to over the last decade. They&rsquo;re the reason teams invite us back for the next release, and the release after that.
          </div>
          <div className="reveal delay-4 mt-10 flex items-center gap-4">
            <span className="font-mono text-[10px] tracking-[0.2em] text-navy/50 uppercase">Value system</span>
            <span className="w-10 h-px bg-navy/20" />
            <span className="font-mono text-[10px] tracking-[0.2em] text-navy/50 uppercase">Est. 2014</span>
          </div>
        </div>

        <div className="lg:col-span-7 grid grid-cols-1 md:grid-cols-2 gap-px bg-navy/10 border border-navy/10">
          {values.map((v, i) => (
            <div key={v.L} className={`card-lift relative bg-white p-8 min-h-[220px] reveal delay-${Math.min(i + 1, 6)} hover:bg-cream group`}>
              <div className="flex items-baseline gap-4 mb-4">
                <span className="around-letter text-navy text-[110px] relative">
                  {v.L}
                  <span className="absolute -bottom-1 left-0 w-full h-1.5 bg-redorange origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-700" />
                </span>
                <span className="font-display text-navy text-[22px] leading-none pb-3" style={{ fontWeight: 400 }}>
                  {v.word}
                </span>
              </div>
              <p className="text-[14px] leading-[1.65] text-slate2 max-w-[340px]">
                {v.line}
              </p>
              <span className="absolute top-6 right-6 font-mono text-[10px] text-navy/30 tracking-[0.18em]">0{i + 1}</span>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { Around });
