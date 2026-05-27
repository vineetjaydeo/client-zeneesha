// ── Zeneesha V3 Stats ────────────────────────────────
const StatsV3 = () => {
  const stats = [
    { val: '15+',    label: 'Years Average Senior Consultant Experience' },
    { val: '100%',   label: 'Workday Certified Team' },
    { val: '50K+',   label: 'Employees Powered Worldwide' },
    { val: '95%',    label: 'Post-Go-Live Client Retention' },
    { val: '200K+',  label: 'Workday AMS Hours Delivered' },
  ];

  return (
    <section className="relative bg-white border-y border-navy/10 overflow-hidden">

      {/* Headline row */}
      <div className="max-w-[1440px] mx-auto px-8 pt-16 pb-10 text-center">
        <h2 className="reveal font-sans text-navy text-[clamp(28px,3.4vw,46px)] leading-[1.1]" style={{ fontWeight: 300 }}>
          Designed for Businesses That Run on Workday.
        </h2>
        <p className="reveal delay-1 mt-4 text-[20px] leading-[1.65] text-slate2 whitespace-nowrap mx-auto" style={{ fontWeight: 300 }}>
          We help you bring clarity to your most critical business decisions.
        </p>
      </div>

      <div className="max-w-[1440px] mx-auto border-t border-navy/10">
        <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
          {stats.map((s, i) => (
            <div
              key={s.label}
              className={`reveal delay-${i + 1} px-10 py-12 border-r border-navy/10 last:border-r-0 text-center`}
            >
              <div
                className="font-sans text-navy num-oldstyle leading-none"
                style={{ fontWeight: 300, fontSize: 'clamp(42px,4.2vw,60px)' }}
              >
                <span className="metric-u">{s.val}</span>
              </div>
              <div className="mt-4 text-[14px] leading-snug text-slate2 font-mono tracking-[0.05em] max-w-[140px] mx-auto">
                {s.label}
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { StatsV3 });
