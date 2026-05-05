const Services = () => {
  const items = [
    { title: 'Finance', Icon: IconFinance, line: 'Workday Financials, tailored to how your finance team actually closes the month.', sub: 'Financials · Accounting Center · Adaptive Planning' },
    { title: 'HCM', Icon: IconHCM, line: 'People systems that respect the people. Recruit, pay, develop. Without the thrash.', sub: 'HCM · Payroll · Talent · Learning' },
    { title: 'Analytics', Icon: IconAnalytics, line: 'Prism and Reporting built for the questions your board keeps asking twice.', sub: 'Prism · Reporting · Discovery Boards' },
    { title: 'Managed Services', Icon: IconManaged, line: 'We stay past go-live. Twice-yearly releases, tickets, and quiet improvements.', sub: 'AMS · Release support · Optimisation' },
  ];

  return (
    <section id="services" className="relative py-28 bg-cream">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-5">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              <span>01 · Practice</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.6vw,64px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Four disciplines. <br />
              <em className="italic text-navy/70">One conversation.</em>
            </h2>
          </div>
          <div className="lg:col-span-6 lg:col-start-7 reveal delay-2 flex items-end">
            <p className="text-[16px] leading-[1.7] text-slate2 max-w-[520px]">
              We don&rsquo;t lead with software. We lead with a small team that listens, asks better questions, and leaves you with a Workday tenant you understand. Everything below is practice, not pitch.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-px bg-navy/10 border border-navy/10">
          {items.map((s, i) => (
            <article
              key={s.title}
              className={`service-card card-lift group relative bg-cream p-8 pb-10 flex flex-col min-h-[340px] reveal delay-${i + 1} hover:bg-white`}
            >
              <div className="flex items-start justify-between mb-10">
                <div className="text-navy group-hover:text-redorange transition-colors duration-500">
                  <s.Icon size={30} />
                </div>
                <span className="font-mono text-[10px] tracking-[0.18em] text-navy/40">0{i + 1}</span>
              </div>
              <h3 className="font-display text-navy text-[34px] leading-none mb-4" style={{ fontWeight: 400 }}>{s.title}</h3>
              <p className="text-[14.5px] leading-[1.6] text-slate2 flex-1">{s.line}</p>
              <div className="mt-6 pt-5 border-t border-navy/10">
                <p className="font-mono text-[10.5px] tracking-[0.14em] text-navy/50 uppercase mb-4">{s.sub}</p>
                <a href="#" className="u-link text-[13px] font-medium text-redorange">
                  Explore
                  <IconArrow size={12} />
                </a>
              </div>
              {/* Corner accent on hover */}
              <div className="absolute top-0 right-0 w-0 h-0.5 bg-redorange transition-all duration-500 group-hover:w-full" />
            </article>
          ))}
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { Services });
