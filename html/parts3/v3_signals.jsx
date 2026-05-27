// ── Zeneesha V3 Signals / Pain Points ────────────────
const SignalsV3 = () => {
  const signals = [
    {
      num: '01',
      title: 'Recurring Tickets',
      desc: 'Problems persist when only symptoms are addressed, not the source.',
    },
    {
      num: '02',
      title: 'Manual Workarounds',
      desc: 'When workflows feel restrictive, teams create shortcuts that reduce visibility and consistency.',
    },
    {
      num: '03',
      title: 'Reporting Delays',
      desc: 'Even with complete data, leaders still cannot access timely answers.',
    },
    {
      num: '04',
      title: 'Uneven Adoption',
      desc: 'Employees can access Workday, but they are not always equipped to use it confidently.',
    },
    {
      num: '05',
      title: 'Release Fatigue',
      desc: 'New features are constantly released, but teams are unsure what to prioritise.',
    },
    {
      num: '06',
      title: 'Underused Capability',
      desc: 'Workday provides more features than what is currently being utilised.',
    },
  ];

  return (
    <section id="signals" className="relative py-28 bg-white overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8">

        {/* Header */}
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-5">
            <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              Recognise These?
            </div>
            <h2 className="reveal delay-1 font-sans text-navy text-[clamp(36px,4.6vw,60px)] leading-[1.06]" style={{ fontWeight: 300 }}>
              Does Your Workday Signal Business Friction?
            </h2>
          </div>
          <div className="lg:col-span-6 lg:col-start-7 reveal delay-2 flex flex-col justify-end gap-5">
            <p className="text-[24px] leading-[1.55] text-slate2 max-w-[520px]" style={{ fontWeight: 300 }}>
              Recurring issues. Manual workarounds. Unreliable reporting.<br />These aren't isolated problems — they're signals your Workday ecosystem needs attention.
            </p>
            <p className="text-[20px] leading-[1.65] text-slate2 max-w-[520px]" style={{ fontWeight: 300 }}>
              Zeneesha helps organisations reduce operational friction and turn Workday challenges into smarter, data-driven decisions.
            </p>
            {/* Stat callout */}
            <div className="mt-2 inline-flex items-start gap-3 border-l-2 border-redorange pl-4">
              <div>
                <p className="text-[18px] leading-[1.6] text-navy" style={{ fontWeight: 400 }}>
                  Over 70% of assessed Workday environments show opportunities for further optimisation.
                </p>
                <span
                  title="Workday Internal Benchmark Report, 2024"
                  className="text-[12px] font-mono text-slate2/50 tracking-[0.06em] mt-1 inline-block cursor-default border-b border-dashed border-slate2/30"
                >
                  Source
                </span>
              </div>
            </div>
          </div>
        </div>

        {/* 3-col grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-px bg-navy/10 border border-navy/10">
          {signals.map((s, i) => (
            <div
              key={s.num}
              className={`card-lift bg-white p-8 min-h-[200px] flex flex-col reveal delay-${Math.min(i + 1, 6)} hover:bg-cream`}
            >
              <div className="font-mono text-[11px] tracking-[0.2em] text-redorange mb-4">{s.num}</div>
              <h3 className="font-sans text-navy text-[22px] leading-tight mb-3" style={{ fontWeight: 500 }}>
                {s.title}
              </h3>
              <p className="text-[18px] leading-[1.65] text-slate2 flex-1" style={{ fontWeight: 300 }}>
                {s.desc}
              </p>
            </div>
          ))}
        </div>

        {/* CTA */}
        <div className="reveal delay-3 mt-14 flex items-center gap-6">
          <a
            href="#talk"
            className="inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[18px] font-medium hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,0.55)]"
          >
            Request a Workday Health Check
            <IconArrow size={14} />
          </a>
        </div>

      </div>
    </section>
  );
};

Object.assign(window, { SignalsV3 });
