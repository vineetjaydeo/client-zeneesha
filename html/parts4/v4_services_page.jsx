// ── Zeneesha V4 Services Page ────────────────────────

const SERVICES_DETAIL = [
  {
    num: '01',
    id: 'implementation',
    title: 'Implementation',
    color: '#1E3A8A',
    eyebrow: 'Start right',
    tagline: 'Build the right foundation from day one.',
    description: 'A Workday implementation is not just a technology project — it\'s a decision that shapes how your organisation works for years. Zeneesha ensures every configuration choice is intentional, every data migration is clean, and every team member arrives at go-live genuinely ready to use the system.',
    deliverables: [
      'Requirements discovery and process mapping',
      'Workday HCM, Finance, or Adaptive Planning configuration',
      'Data migration planning, cleansing, and validation',
      'Integration design and build (Workday Studio / EIB)',
      'Testing strategy — unit, parallel, UAT',
      'Change management and end-user training',
      'Go-live support and hypercare',
    ],
    outcomes: [
      'Go live on schedule — with zero surprises in month one',
      'Configuration that reflects your actual processes, not the defaults',
      'A team that\'s confident from day one — not learning on the job',
    ],
    caseStudy: {
      client: 'Professional Services Firm',
      result: '3-week go-live acceleration with zero post-launch defects. Full automation of month-end close from day one.',
      metric: '3 weeks early',
    },
  },
  {
    num: '02',
    id: 'ams',
    title: 'AMS & Support',
    color: '#3B9EDB',
    eyebrow: 'Stay stable',
    tagline: 'Your Workday, always working. We keep it that way.',
    description: 'After go-live, the velocity of change doesn\'t slow down — it accelerates. Business needs evolve, Workday releases introduce new complexity, and your internal team can\'t be Workday specialists on top of everything else. Zeneesha absorbs that pressure, resolving issues fast and managing change systematically.',
    deliverables: [
      'Dedicated Workday AMS retainer (flexible capacity)',
      'Incident management and break-fix resolution',
      'Change request pipeline management',
      'Bi-annual Workday release management',
      'Integration monitoring and incident response',
      'Reporting enhancement and maintenance',
      'Monthly service review and roadmap sessions',
    ],
    outcomes: [
      'Issues resolved in hours, not weeks — your SLA, guaranteed',
      'Workday releases managed end-to-end with no disruption to your team',
      'A specialist team in your corner every time something breaks',
    ],
    caseStudy: {
      client: 'AQA Education',
      result: 'Sprint velocity increased from 2 to 16 tickets per sprint. Backlog cleared within 90 days. 95% platform adoption achieved.',
      metric: '700% faster',
    },
  },
  {
    num: '03',
    id: 'optimise',
    title: 'Optimise',
    color: '#F57C1F',
    eyebrow: 'Grow value',
    tagline: 'Turn your Workday from operational to exceptional.',
    description: 'Most organisations are using 60–70% of what Workday can do. The remaining 30–40% is where the real ROI lives — automated workflows, accurate real-time reporting, and configuration that actually mirrors how the business works today. Zeneesha systematically closes that gap.',
    deliverables: [
      'Workday health assessment and optimisation roadmap',
      'Business process and workflow redesign',
      'Reporting and analytics build-out (Workday Prism, BIRT, Composite)',
      'Automation of manual processes (calculated fields, business rules)',
      'Configuration review and rationalisation',
      'Adoption analysis and re-engagement programme',
      'Security role review and access remediation',
    ],
    outcomes: [
      'Manual processes automated — your team focuses on decisions, not data entry',
      'Reports leadership can trust, available in seconds not days',
      'Workday configuration that reflects how your business actually runs today',
    ],
    caseStudy: {
      client: 'Global Manufacturing Group',
      result: '40% reduction in HR admin overhead. Integrations rationalised from 12 to 4. Unified HCM across 5 countries.',
      metric: '40% less admin',
    },
  },
  {
    num: '04',
    id: 'ai',
    title: 'AI & Automation',
    color: '#E8472C',
    eyebrow: 'Lead change',
    tagline: 'Prepare your Workday for what comes next.',
    description: 'Workday is embedding AI across every module — natural language queries, intelligent automation, and predictive analytics. Organisations that arrive at AI with clean data, optimised processes, and strong adoption will benefit immediately. Those that don\'t will spend their AI budget on fixing the foundations instead. Zeneesha maps your readiness and builds the path.',
    deliverables: [
      'AI readiness assessment (data quality, process maturity, adoption baseline)',
      'Workday Extend and AI configuration',
      'Natural language query enablement (Workday Illuminate)',
      'Intelligent automation design and build',
      'Predictive analytics implementation',
      'AI governance framework and change management',
      'Ongoing AI optimisation retainer',
    ],
    outcomes: [
      'Ask Workday questions in plain English — get answers instantly',
      'Automated decisions eliminate human error at source',
      'Predictive signals surface before problems become incidents',
    ],
    caseStudy: {
      client: 'Enterprise Client',
      result: 'Full AI readiness assessment delivered in 4 weeks. Natural language reporting enabled across HCM and Finance within 90 days.',
      metric: '90-day AI enablement',
    },
  },
];

const ServiceSection = ({ svc, idx }) => {
  const isEven = idx % 2 === 0;
  return (
    <section
      id={svc.id}
      className="py-28"
      style={{ background: isEven ? '#fff' : '#FAFAF7' }}
    >
      <div className="max-w-[1440px] mx-auto px-8">
        <div className={`grid lg:grid-cols-12 gap-16 items-start ${isEven ? '' : ''}`}>

          {/* Copy side */}
          <div className={`lg:col-span-6 ${isEven ? '' : 'lg:col-start-7'}`} style={{ order: isEven ? 1 : 2 }}>
            <div className="reveal flex items-center gap-3 mb-5">
              <span className="font-mono text-[11px] tracking-[0.22em] uppercase" style={{ color: svc.color }}>
                {svc.num} — {svc.eyebrow}
              </span>
            </div>

            <h2 className="reveal delay-1 font-sans text-navy text-[clamp(32px,4vw,54px)] leading-[1.1] mb-4" style={{ fontWeight: 300 }}>
              {svc.title}
            </h2>

            <p className="reveal delay-2 text-[20px] leading-[1.5] mb-6" style={{ fontWeight: 400, color: svc.color }}>
              {svc.tagline}
            </p>

            <p className="reveal delay-3 text-[18px] leading-[1.7] text-slate2 mb-10" style={{ fontWeight: 300 }}>
              {svc.description}
            </p>

            {/* Outcomes */}
            <div className="reveal delay-3 mb-10">
              <div className="font-mono text-[11px] tracking-[0.2em] uppercase text-slate2/55 mb-5">What this means for you</div>
              <ul style={{ listStyle: 'none', padding: 0, margin: 0, display: 'flex', flexDirection: 'column', gap: 14 }}>
                {svc.outcomes.map((o, i) => (
                  <li key={i} style={{ display: 'flex', alignItems: 'flex-start', gap: 12 }}>
                    <span style={{
                      flexShrink: 0,
                      marginTop: 4,
                      width: 20,
                      height: 20,
                      borderRadius: '50%',
                      background: svc.color,
                      display: 'flex',
                      alignItems: 'center',
                      justifyContent: 'center',
                    }}>
                      <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#fff" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>
                    <span style={{ fontFamily: 'Jost, sans-serif', fontSize: 17, fontWeight: 300, color: '#1E3A8A', lineHeight: 1.6 }}>
                      {o}
                    </span>
                  </li>
                ))}
              </ul>
            </div>

            <div className="reveal delay-4">
              <a
                href="#talk"
                className="inline-flex items-center gap-3 text-white px-7 py-4 rounded-full text-[17px] font-medium transition-all duration-300"
                style={{ background: svc.color }}
              >
                Discuss {svc.title}
                <IconArrow size={14} />
              </a>
            </div>
          </div>

          {/* Visual side */}
          <div
            className={`lg:col-span-5 ${isEven ? 'lg:col-start-8' : 'lg:col-start-1 lg:row-start-1'}`}
            style={{ order: isEven ? 2 : 1 }}
          >
            {/* Deliverables card */}
            <div className="reveal delay-2 mb-6" style={{
              background: '#fff',
              border: '1px solid rgba(30,58,138,0.09)',
              borderTop: `4px solid ${svc.color}`,
              borderRadius: 10,
              padding: '32px 36px',
              boxShadow: '0 4px 30px rgba(30,58,138,0.06)',
            }}>
              <div className="font-mono text-[11px] tracking-[0.2em] uppercase text-slate2/55 mb-6">Deliverables</div>
              <ul style={{ listStyle: 'none', padding: 0, margin: 0, display: 'flex', flexDirection: 'column', gap: 12 }}>
                {svc.deliverables.map((d, i) => (
                  <li key={i} style={{ display: 'flex', alignItems: 'flex-start', gap: 10 }}>
                    <span style={{
                      flexShrink: 0,
                      marginTop: 8,
                      width: 6,
                      height: 6,
                      borderRadius: '50%',
                      background: svc.color,
                      opacity: 0.7,
                    }} />
                    <span style={{ fontFamily: 'Jost, sans-serif', fontSize: 15, fontWeight: 300, color: '#475569', lineHeight: 1.6 }}>
                      {d}
                    </span>
                  </li>
                ))}
              </ul>
            </div>

            {/* Mini case study pull-out */}
            <div className="reveal delay-3" style={{
              background: `${svc.color}08`,
              border: `1px solid ${svc.color}20`,
              borderLeft: `4px solid ${svc.color}`,
              borderRadius: 8,
              padding: '20px 24px',
            }}>
              <div className="font-mono text-[10px] tracking-[0.22em] uppercase mb-3" style={{ color: svc.color }}>
                Client outcome
              </div>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 28, fontWeight: 600, color: svc.color, lineHeight: 1, marginBottom: 8 }}>
                {svc.caseStudy.metric}
              </div>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 13, fontWeight: 500, color: '#1E3A8A', marginBottom: 6 }}>
                {svc.caseStudy.client}
              </div>
              <p style={{ fontFamily: 'Jost, sans-serif', fontSize: 14, fontWeight: 300, color: '#475569', lineHeight: 1.6, margin: 0 }}>
                {svc.caseStudy.result}
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>
  );
};

// ── Services Hero ─────────────────────────────────────
const ServicesHero = () => {
  const linesInited = React.useRef(false);

  React.useEffect(() => {
    if (linesInited.current) return;
    linesInited.current = true;
    document.querySelectorAll('.kline-sv4').forEach((el, i) => {
      setTimeout(() => el.classList.add('in'), 80 + i * 100);
    });
  }, []);

  return (
    <section id="top" className="relative bg-cream overflow-hidden pt-[120px] pb-20">
      {/* Ambient */}
      <div aria-hidden="true" className="pointer-events-none absolute inset-0">
        <div className="absolute" style={{ right: '-4%', top: '-8%', width: 500, height: 500, background: 'rgba(232,71,44,0.06)', filter: 'blur(100px)', borderRadius: '50%' }} />
        <div className="absolute" style={{ left: '-4%', bottom: '5%', width: 420, height: 420, background: 'rgba(59,158,219,0.08)', filter: 'blur(80px)', borderRadius: '50%' }} />
      </div>

      <div className="relative max-w-[1440px] mx-auto px-8">
        {/* Eyebrow */}
        <div className="flex items-center gap-3 mb-8 text-[12px] font-mono tracking-[0.22em] uppercase text-slate2">
          <span className="w-1.5 h-1.5 rounded-full bg-redorange pulse" />
          Workday Services
        </div>

        {/* Headline */}
        <h1 className="font-sans text-navy leading-[1.1] max-w-[820px]" style={{ fontWeight: 400 }}>
          <span className="kline-sv4 block overflow-hidden">
            <span className="block text-navy/45" style={{ fontSize: 'clamp(22px,2.8vw,40px)', fontWeight: 300 }}>Four ways Zeneesha transforms</span>
          </span>
          <span className="kline-sv4 block overflow-hidden">
            <span className="block" style={{ fontSize: 'clamp(38px,5.5vw,78px)', fontWeight: 500, letterSpacing: '-0.02em' }}>your Workday.</span>
          </span>
        </h1>

        <div className="mt-8 grid lg:grid-cols-12 gap-8">
          <p className="lg:col-span-6 text-[20px] leading-[1.65] text-slate2 reveal in delay-4" style={{ fontWeight: 300 }}>
            From first configuration to AI-enabled operations — Zeneesha holds every part of the Workday lifecycle, with specialist expertise at every stage.
          </p>
        </div>

        {/* Service jump links */}
        <div className="mt-12 flex flex-wrap gap-3 reveal in delay-5">
          {SERVICES_DETAIL.map((s) => (
            <a
              key={s.id}
              href={`#${s.id}`}
              className="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-[15px] font-medium border transition-all duration-300 hover:text-white"
              style={{
                borderColor: s.color,
                color: s.color,
              }}
              onMouseEnter={e => { e.currentTarget.style.background = s.color; e.currentTarget.style.color = '#fff'; }}
              onMouseLeave={e => { e.currentTarget.style.background = 'transparent'; e.currentTarget.style.color = s.color; }}
            >
              <span style={{ fontFamily: 'Jost, monospace', fontSize: 11, opacity: 0.7 }}>{s.num}</span>
              {s.title}
            </a>
          ))}
        </div>
      </div>
    </section>
  );
};

// ── How They Connect (lifecycle diagram) ──────────────
const HowTheyConnect = () => {
  const stages = [
    { num: '01', title: 'Implementation', color: '#1E3A8A', desc: 'Build right' },
    { num: '02', title: 'AMS & Support',  color: '#3B9EDB', desc: 'Stay stable' },
    { num: '03', title: 'Optimise',       color: '#F57C1F', desc: 'Grow value' },
    { num: '04', title: 'AI & Automation',color: '#E8472C', desc: 'Lead change' },
  ];

  return (
    <section className="py-20 bg-cream2">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="reveal text-center mb-12">
          <div className="inline-flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-4">
            <span className="w-6 h-px bg-redorange" />
            The Bigger Picture
            <span className="w-6 h-px bg-redorange" />
          </div>
          <h2 className="font-sans text-navy text-[clamp(28px,3.5vw,46px)] leading-[1.1]" style={{ fontWeight: 300 }}>
            How the four services connect
          </h2>
          <p className="mt-4 text-[18px] text-slate2 max-w-[560px] mx-auto" style={{ fontWeight: 300 }}>
            Each service builds on the last. Clients who work with Zeneesha across the lifecycle see compounding returns on their Workday investment.
          </p>
        </div>

        {/* Lifecycle path */}
        <div className="reveal delay-1 grid grid-cols-1 md:grid-cols-4 gap-4 max-w-[960px] mx-auto relative">

          {/* Connector line — desktop only */}
          <div className="hidden md:block absolute top-[44px] left-[12.5%] right-[12.5%] h-0.5" style={{ background: 'linear-gradient(to right, #1E3A8A, #3B9EDB, #F57C1F, #E8472C)', zIndex: 0 }} />

          {stages.map((stage, i) => (
            <div key={i} className="relative" style={{ zIndex: 1 }}>
              <a href={`#${['implementation','ams','optimise','ai'][i]}`} style={{ textDecoration: 'none', display: 'block' }}>
                <div style={{
                  background: '#fff',
                  border: '1px solid rgba(30,58,138,0.1)',
                  borderTop: `3px solid ${stage.color}`,
                  borderRadius: 8,
                  padding: '20px 16px 16px',
                  textAlign: 'center',
                  transition: 'transform 0.3s, box-shadow 0.3s',
                  cursor: 'pointer',
                }}
                onMouseEnter={e => { e.currentTarget.style.transform = 'translateY(-4px)'; e.currentTarget.style.boxShadow = '0 12px 32px rgba(30,58,138,0.1)'; }}
                onMouseLeave={e => { e.currentTarget.style.transform = 'none'; e.currentTarget.style.boxShadow = 'none'; }}
                >
                  {/* Node circle */}
                  <div style={{
                    width: 48,
                    height: 48,
                    borderRadius: '50%',
                    background: stage.color,
                    display: 'flex',
                    alignItems: 'center',
                    justifyContent: 'center',
                    margin: '0 auto 12px',
                    fontFamily: 'Jost, sans-serif',
                    fontSize: 13,
                    fontWeight: 600,
                    color: '#fff',
                  }}>
                    {stage.num}
                  </div>
                  <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 15, fontWeight: 500, color: '#1E3A8A', lineHeight: 1.3, marginBottom: 4 }}>
                    {stage.title}
                  </div>
                  <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 12, fontWeight: 300, color: '#475569' }}>
                    {stage.desc}
                  </div>
                </div>
              </a>
            </div>
          ))}
        </div>

        {/* Compounding value note */}
        <div className="reveal delay-2 mt-10 text-center">
          <p className="text-[15px] text-slate2 font-mono tracking-[0.06em]">
            <span className="text-redorange">→</span> Implementation feeds clean data into AMS.
            AMS stabilises for Optimise. Optimise unlocks AI.
          </p>
        </div>
      </div>
    </section>
  );
};

// ── Services Page App ─────────────────────────────────
const ServicesPageV4 = () => {
  React.useEffect(() => {
    const observe = () => {
      const els = document.querySelectorAll('.reveal:not(.in)');
      const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
        });
      }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
      els.forEach((el) => io.observe(el));
      return () => io.disconnect();
    };
    const cleanup = observe();
    const t = setTimeout(observe, 400);
    return () => { cleanup && cleanup(); clearTimeout(t); };
  });

  React.useEffect(() => {
    const onScroll = () => {
      const h = document.documentElement;
      const pct = h.scrollTop / (h.scrollHeight - h.clientHeight) * 100;
      const bar = document.getElementById('progress');
      if (bar) bar.style.width = pct + '%';
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  return (
    <div>
      <NavV4 />
      <main>
        <ServicesHero />
        {SERVICES_DETAIL.map((svc, i) => (
          <ServiceSection key={svc.id} svc={svc} idx={i} />
        ))}
        <HowTheyConnect />
        <CTABandV4 />
        <CertificationsV4 />
      </main>
      <FooterV4 />
    </div>
  );
};

Object.assign(window, { ServicesPageV4 });
