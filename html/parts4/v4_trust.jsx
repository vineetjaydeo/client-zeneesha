// ── Zeneesha V4 Trust Bar ────────────────────────────

const STATS = [
  { value: '15+',    label: 'Years Workday\nexperience' },
  { value: '100%',   label: 'Certified\nconsultants' },
  { value: '50K+',   label: 'Employees\nsupported' },
  { value: '95%',    label: 'Client\nretention rate' },
  { value: '200K+',  label: 'AMS hours\ndelivered' },
];

const TrustV4 = () => (
  <section id="trust" className="relative bg-white border-y border-navy/[0.07] overflow-hidden">

    {/* Workday Service Partner badge — hero placement */}
    <div className="max-w-[1440px] mx-auto px-8 pt-16 pb-8 flex flex-col items-center text-center">
      <div className="mb-2 font-mono text-[11px] tracking-[0.22em] uppercase text-slate2/55">
        Verified Partner Status
      </div>
      <img
        src="https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-services-partner@4x.png"
        alt="Workday Services Partner"
        style={{ height: 80, width: 'auto', display: 'block', objectFit: 'contain' }}
      />

      {/* Section heading — V5 doc */}
      <h2 className="reveal mt-10 font-sans text-navy text-[clamp(26px,3.2vw,42px)] leading-[1.1]" style={{ fontWeight: 300 }}>
        Designed for Businesses That Run on Workday.
      </h2>
      <p className="reveal delay-1 mt-3 text-[18px] text-slate2 max-w-[500px]" style={{ fontWeight: 300 }}>
        We help you bring clarity to your most critical business decisions.
      </p>
    </div>

    {/* Logo carousel — uses LogosV3 from parts3 */}
    <div className="mt-2">
      <LogosV3 />
    </div>

    {/* Stats row */}
    <div className="max-w-[1440px] mx-auto px-8 py-12">
      <div className="grid grid-cols-2 md:grid-cols-5 gap-6 md:gap-8">
        {STATS.map((s, i) => (
          <div key={i} className="reveal text-center" style={{ transitionDelay: `${i * 60}ms` }}>
            <div
              className="metric-u font-sans text-navy num-oldstyle"
              style={{ fontSize: 'clamp(32px,3.5vw,48px)', fontWeight: 600, lineHeight: 1 }}
            >
              {s.value}
            </div>
            <div className="mt-2 font-mono text-[12px] tracking-[0.1em] uppercase text-slate2/70 whitespace-pre-line">
              {s.label}
            </div>
          </div>
        ))}
      </div>
    </div>

  </section>
);

Object.assign(window, { TrustV4 });
