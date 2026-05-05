// =========================================================
// Section 2 — The problem after go-live
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

const ProblemSection = () => {
  const bullets = [
    'Support backlogs are slowing down day-to-day operations',
    'Workflows feel outdated, inconsistent or difficult to use',
    'Workday data is not fully trusted as the single source of truth',
    'Reporting and visibility are not strong enough for leadership decisions',
    'Users need better guidance, training and adoption support',
    'Internal teams lack the time or module expertise to handle every request',
    'The organisation is not yet seeing the full ROI from Workday',
  ];

  return (
    <section id="challenges" className="relative py-28 bg-white">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-14">
          <div className="lg:col-span-5">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>After go-live</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(34px,4.4vw,62px)] leading-[1.05]" style={{ fontWeight: 300 }}>
              Workday is live.<br/>
              <em className="italic text-navy/70">But is it delivering</em><br/>
              the value your business expected?
            </h2>
          </div>

          <div className="lg:col-span-6 lg:col-start-7 reveal delay-2">
            <p className="text-[17.5px] leading-[1.6] text-navy/85 max-w-[560px]">
              For many organisations, the real challenges begin after implementation - when users need support, workflows need refining, reports need trust, and the business starts asking for more.
            </p>

            <div className="mt-7 space-y-4 text-[15.5px] leading-[1.7] text-slate2 max-w-[560px]">
              <p>Workday may already be running in your organisation. But over time, the gaps begin to show.</p>
              <p>Support tickets remain unresolved. Workflows become outdated. Reports do not give leaders the confidence they need. Users struggle with the application. HR, Finance and IT teams continue to depend on manual workarounds.</p>
              <p>In most cases, the issue is not Workday itself.</p>
              <p className="text-navy font-medium">The issue is that the system needs the right support, the right improvements and the right partner to help it evolve with the business.</p>
              <p>That is where Zeneesha comes in.</p>
            </div>
          </div>
        </div>

        <div className="reveal delay-3 mb-10">
          <div className="font-mono text-[11px] tracking-[0.22em] uppercase text-navy/50 mb-5 flex items-center gap-3">
            <span className="dash" />
            <span>Common signals we hear</span>
          </div>
        </div>

        <div className="grid md:grid-cols-2 gap-px bg-navy/10 border border-navy/10">
          {bullets.map((b, i) => (
            <div
              key={i}
              className={`reveal delay-${(i % 6) + 1} bg-white p-7 flex items-start gap-5 card-lift hover:bg-cream relative ${i === bullets.length - 1 ? 'md:col-span-2' : ''}`}
            >
              <span className="font-mono text-[11px] tracking-[0.18em] text-redorange/70 mt-[3px] shrink-0">0{i + 1}</span>
              <p className="text-[15.5px] leading-[1.55] text-navy/85">{b}</p>
            </div>
          ))}
        </div>

        <div className="reveal mt-14 flex flex-wrap items-center gap-6">
          <a
            href="#talk"
            className="group inline-flex items-center gap-3 bg-navy text-white px-7 py-4 rounded-full text-[14px] font-medium hover:bg-navy-deep transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(30,58,138,.4)]"
          >
            Tell Us What You Need to Improve
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
          <span className="text-[12.5px] font-mono tracking-[0.12em] uppercase text-navy/50">No-pressure conversation. 30 minutes.</span>
        </div>
      </div>
    </section>
  );
};

// =========================================================
// Section 3 — What Zeneesha helps you achieve
// =========================================================
const OutcomeValue = () => {
  const outcomes = [
    {
      title: 'Faster, more reliable AMS support',
      body: 'Bring structure to support with clearer ticket prioritisation, stronger turnaround, SLA-led responses and better handling of production issues.',
    },
    {
      title: 'Workday aligned to your business',
      body: 'Optimise workflows, configurations and enhancements so Workday reflects how your HR, Finance and operations teams actually work.',
    },
    {
      title: 'Data and reporting people can trust',
      body: 'Improve reporting, visibility and data quality so Workday becomes a stronger source of truth for leadership and business teams.',
    },
    {
      title: 'Flexible expertise without the heavy model',
      body: 'Access experienced Workday consultants and advisory support without being locked into a large, rigid AMS structure.',
    },
  ];

  return (
    <section id="outcomes" className="relative py-32 bg-cream overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-7">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>What Zeneesha helps you achieve</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(34px,4.2vw,58px)] leading-[1.05]" style={{ fontWeight: 300 }}>
              A smoother Workday environment.<br/>
              <em className="italic text-redorange not-italic" style={{ fontStyle: 'italic', color: '#E8472C' }}>Faster support.</em>{' '}
              <em className="italic text-navy/70">Cleaner data.</em><br/>
              More confidence.
            </h2>
          </div>
          <div className="lg:col-span-5 reveal delay-2 flex items-end">
            <p className="text-[16.5px] leading-[1.7] text-slate2 max-w-[480px]">
              Zeneesha is not here to simply close tickets. We help clients improve the way Workday supports their people, processes and decisions.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-px bg-navy/10 border border-navy/10">
          {outcomes.map((o, i) => (
            <div
              key={i}
              className={`reveal delay-${i + 1} bg-white p-10 min-h-[260px] flex flex-col card-lift relative`}
            >
              <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange mb-6">0{i + 1}</div>
              <h3 className="font-display text-navy text-[clamp(22px,2.4vw,30px)] leading-[1.18] mb-5" style={{ fontWeight: 400 }}>
                {o.title}<span className="text-redorange">.</span>
              </h3>
              <p className="text-[15px] leading-[1.65] text-slate2">{o.body}</p>
              <span className="absolute top-7 right-7 font-mono text-[10px] tracking-[0.18em] text-navy/25">0{i + 1}/04</span>
            </div>
          ))}
        </div>

        <div className="reveal mt-16 grid lg:grid-cols-12 gap-10 items-center">
          <div className="lg:col-span-7">
            <p className="text-[16.5px] leading-[1.65] text-navy/80 max-w-[640px]">
              Whether you need ongoing AMS, a tenant health check, optimisation support, integrations, reporting improvements or specialist consultants, Zeneesha helps you start with the area that matters most - and expand when the value is clear.
            </p>
          </div>
          <div className="lg:col-span-5 flex lg:justify-end">
            <a
              href="service.html"
              className="group inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[14px] font-medium hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,.6)]"
            >
              Explore Zeneesha&rsquo;s Workday Services
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
          </div>
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { ProblemSection, OutcomeValue });
