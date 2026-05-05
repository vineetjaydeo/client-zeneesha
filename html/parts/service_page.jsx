// =========================================================
// Service landing page (v1 editorial) — flagship: Workday Financials
// Sections: Hero, Scope, Outcomes, Process, Engagements, Proof, FAQ
// No dashes in content. Middot (·) used as a separator where useful.
// =========================================================

const ServiceHeroV1 = () => {
  return (
    <section id="top" className="relative pt-[136px] pb-28 overflow-hidden bg-cream">
      <div className="absolute inset-0 pointer-events-none">
        <div className="blob" style={{ width: 620, height: 620, left: '-10%', top: '-18%', background: 'radial-gradient(closest-side, #F57C1F55, transparent 70%)' }} />
        <div className="blob" style={{ width: 520, height: 520, right: '-8%', top: '10%', background: 'radial-gradient(closest-side, #3B9EDB44, transparent 70%)' }} />
        <div className="blob" style={{ width: 480, height: 480, left: '30%', bottom: '-22%', background: 'radial-gradient(closest-side, #1E3A8A33, transparent 70%)' }} />
      </div>
      <div className="grain" />

      <div className="relative max-w-[1400px] mx-auto px-8 grid lg:grid-cols-12 gap-10">
        <div className="lg:col-span-8">
          <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-7">
            <a href="Zeneesha.html" className="hover:text-navy">Services</a>
            <span className="text-navy/30">/</span>
            <span className="text-navy/60">Workday Financials</span>
          </div>

          <h1 className="font-display text-navy text-[clamp(48px,7vw,104px)] leading-[1.02]" style={{ fontWeight: 300 }}>
            <span className="kinetic-line"><span>Financials,</span></span>{' '}
            <span className="kinetic-line" style={{ transitionDelay: '80ms' }}><span>the way finance</span></span>{' '}
            <span className="kinetic-line" style={{ transitionDelay: '160ms' }}><span><em className="italic text-navy/70">actually runs it.</em></span></span>
          </h1>

          <p className="reveal delay-2 mt-10 text-[18px] leading-[1.7] text-slate2 max-w-[640px]">
            We implement Workday Financials for UK and EMEA SMBs that want a close cycle, a chart of accounts, and a planning rhythm built around how their business works. Not how a generic deployment says it should. One small team. Named on the statement of work. In the room for month one.
          </p>

          <div className="reveal delay-3 mt-10 flex flex-wrap items-center gap-4">
            <a href="#talk" className="cta-primary group inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-colors">
              Book a consultation
              <IconArrow size={13} className="caret" />
            </a>
            <a href="#scope" className="u-link text-navy/80 font-medium text-[14px]">See what is included</a>
            <span className="hidden md:inline-flex items-center gap-2 pl-4 border-l border-navy/15 text-[12px] font-mono text-navy/55">
              <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 pulse" />
              Booking Q3 engagements
            </span>
          </div>
        </div>

        <aside className="lg:col-span-4 reveal delay-4 flex flex-col gap-5 lg:pl-6 lg:border-l lg:border-navy/10">
          <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-navy/45">Typical shape</div>
          {[
            { k: 'Duration', v: 'Ten to fourteen weeks, end to end' },
            { k: 'Team', v: 'One partner, two consultants, one architect' },
            { k: 'Go live window', v: 'Quarter start. Never on a Friday.' },
            { k: 'After launch', v: 'Ninety days of hypercare. Options to continue.' },
          ].map((r) => (
            <div key={r.k} className="flex items-start justify-between gap-6 pb-4 border-b border-navy/10 last:border-none">
              <div className="text-[12px] font-mono tracking-[0.08em] uppercase text-navy/55 w-[110px] shrink-0">{r.k}</div>
              <div className="text-[14px] text-navy leading-[1.55] flex-1">{r.v}</div>
            </div>
          ))}
          <div className="mt-2 text-[12px] font-mono tracking-[0.08em] text-navy/50">
            Written for SMBs between 150 and 2,500 people.
          </div>
        </aside>
      </div>
    </section>
  );
};

// ---------------------------------------------------------
// Scope: four modules, inline dash-free grid
// ---------------------------------------------------------
const ServiceScope = () => {
  const blocks = [
    {
      title: 'Core Financials',
      Icon: IconFinance,
      line: 'General ledger, AP, AR, cash and banking. Set up so the month end is the least interesting part of the month.',
      items: ['Ledger design workshop', 'Supplier and customer data load', 'Bank feeds and reconciliations', 'Period close calendar'],
    },
    {
      title: 'Accounting Center',
      Icon: IconManaged,
      line: 'Your operational data, translated into accounting the way your finance team reads it, not the way a template forces it.',
      items: ['Source system mapping', 'Accounting rules workshop', 'Reporting reconciliation', 'Posting rules governance'],
    },
    {
      title: 'Adaptive Planning',
      Icon: IconAnalytics,
      line: 'Budgets, forecasts and board packs that move as fast as the business. Built for the questions your finance partners actually get asked.',
      items: ['Driver based model', 'Rolling forecast cadence', 'Board pack template', 'Scenario library'],
    },
    {
      title: 'Reporting and Prism',
      Icon: IconHCM,
      line: 'One version of the number. Signed off by finance, trusted by operations, used by the leadership team on Monday mornings.',
      items: ['Management report suite', 'Prism datasets', 'Discovery boards', 'Self service governance'],
    },
  ];

  return (
    <section id="scope" className="relative py-28 bg-white">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-5">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              <span>01 · Scope</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.6vw,64px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              What we actually <br/>
              <em className="italic text-navy/70">build and hand over.</em>
            </h2>
          </div>
          <div className="lg:col-span-6 lg:col-start-7 reveal delay-2 flex items-end">
            <p className="text-[16px] leading-[1.7] text-slate2 max-w-[560px]">
              A real implementation, not a feature tour. You finish with a live tenant, documented configuration, a finance team that has used the system in anger, and a plan for the first six releases after ours.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-px bg-navy/10 border border-navy/10">
          {blocks.map((b, i) => (
            <article key={b.title} className={`service-card card-lift group relative bg-white p-10 flex flex-col reveal delay-${i + 1} hover:bg-cream`}>
              <div className="flex items-start justify-between mb-10">
                <div className="text-navy group-hover:text-redorange transition-colors duration-500">
                  <b.Icon size={32} />
                </div>
                <span className="font-mono text-[10px] tracking-[0.18em] text-navy/40">0{i + 1} / 04</span>
              </div>
              <h3 className="font-display text-navy text-[clamp(28px,2.6vw,40px)] leading-none mb-5" style={{ fontWeight: 400 }}>{b.title}</h3>
              <p className="text-[15px] leading-[1.65] text-slate2 mb-8 max-w-[520px]">{b.line}</p>
              <ul className="mt-auto grid grid-cols-2 gap-x-6 gap-y-3 pt-6 border-t border-navy/10">
                {b.items.map((it) => (
                  <li key={it} className="text-[13.5px] text-navy/85 flex items-start gap-2.5">
                    <span className="mt-[7px] w-1.5 h-1.5 rounded-full bg-redorange/80 shrink-0" />
                    <span>{it}</span>
                  </li>
                ))}
              </ul>
              <div className="absolute top-0 right-0 w-0 h-0.5 bg-redorange transition-all duration-500 group-hover:w-full" />
            </article>
          ))}
        </div>
      </div>
    </section>
  );
};

// ---------------------------------------------------------
// Outcomes: 4 animated stat tiles
// ---------------------------------------------------------
const useCount = (to, run, duration = 1600) => {
  const [n, setN] = React.useState(0);
  React.useEffect(() => {
    if (!run) return;
    const start = performance.now();
    let raf;
    const tick = (t) => {
      const p = Math.min(1, (t - start) / duration);
      const ease = 1 - Math.pow(1 - p, 3);
      setN(to * ease);
      if (p < 1) raf = requestAnimationFrame(tick);
    };
    raf = requestAnimationFrame(tick);
    return () => cancelAnimationFrame(raf);
  }, [to, run, duration]);
  return n;
};

const Stat = ({ target, suffix = '', prefix = '', label, sub, run, delay = 0 }) => {
  const [gate, setGate] = React.useState(false);
  React.useEffect(() => {
    if (run) { const t = setTimeout(() => setGate(true), delay); return () => clearTimeout(t); }
  }, [run, delay]);
  const n = useCount(target, gate);
  const display = target % 1 === 0 ? Math.round(n) : n.toFixed(1);
  return (
    <div className="p-10 flex flex-col gap-3">
      <div className="font-display text-navy text-[clamp(56px,7vw,104px)] leading-[0.95] num-oldstyle" style={{ fontWeight: 300, letterSpacing: '-0.03em' }}>
        {prefix}<span className="tnum">{display}</span>{suffix}
      </div>
      <div className="font-display text-navy/85 text-[22px] leading-tight" style={{ fontWeight: 400 }}>{label}</div>
      <div className="text-[13.5px] leading-[1.6] text-slate2 max-w-[340px]">{sub}</div>
    </div>
  );
};

const ServiceOutcomes = () => {
  const ref = React.useRef(null);
  const [run, setRun] = React.useState(false);
  React.useEffect(() => {
    const io = new IntersectionObserver((e) => { if (e[0].isIntersecting) { setRun(true); io.disconnect(); } }, { threshold: 0.3 });
    if (ref.current) io.observe(ref.current);
    return () => io.disconnect();
  }, []);

  const stats = [
    { target: 42, suffix: '%', label: 'Faster close by month three', sub: 'Average across our last nine Financials clients. Measured against their baseline close.', delay: 0 },
    { target: 6, suffix: ' wk', label: 'Shortest time to go live', sub: 'Our fastest Financials engagement to date. Mid market retail. Single entity.', delay: 120 },
    { target: 180, prefix: '£', suffix: 'K', label: 'Licence saving, year one', sub: 'From rightsizing SKUs and removing redundant add ons during the first renewal.', delay: 240 },
    { target: 94, suffix: '%', label: 'Adoption at month three', sub: 'Logged active use inside finance and operations teams, measured by tenant analytics.', delay: 360 },
  ];

  return (
    <section id="outcomes" ref={ref} className="relative py-28 bg-cream">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-14">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              <span>02 · Outcomes</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.6vw,64px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              We get hired for outcomes. <br/>
              <em className="italic text-navy/70">So we keep score.</em>
            </h2>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 reveal delay-2 flex items-end">
            <p className="text-[15.5px] leading-[1.7] text-slate2">
              Every number below is the median from our last nine Financials engagements. We publish the range on request. Ask us. We will tell you what did not work too.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-px bg-navy/10 border border-navy/10">
          {stats.map((s, i) => (
            <div key={s.label} className="bg-cream">
              <Stat {...s} run={run} />
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

// ---------------------------------------------------------
// Process: five stations, horizontal timeline
// ---------------------------------------------------------
const ServiceProcessV1 = () => {
  const steps = [
    { n: '01', w: 'Week 0', title: 'Discovery, with numbers', body: 'Two days on site. We walk the close, read the journals, sit with controllers. You leave with a scope, a price, and a plan you believe.' },
    { n: '02', w: 'Week 1 to 4', title: 'Design, together', body: 'We run the design workshops. You make the calls. We write them up the same day so nothing drifts between the room and the tenant.' },
    { n: '03', w: 'Week 4 to 10', title: 'Build, with your team in it', body: 'Your finance team configures alongside us. By go live, they know why every rule is the way it is. The transfer is finished by then, not after.' },
    { n: '04', w: 'Week 10', title: 'Go live, on a Tuesday', body: 'Never a Friday. A full dress rehearsal weekend. A printed runbook. A partner on the floor from seven to seven.' },
    { n: '05', w: 'Week 11 to 22', title: 'Hypercare, then a handover', body: 'Ninety days of hypercare. Weekly reviews. At day ninety, you choose: bring it in house, move to our managed service, or carry on under release support.' },
  ];
  return (
    <section id="process" className="relative py-28 bg-white">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              <span>03 · How we work</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.6vw,60px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Five stations. <br/>
              <em className="italic text-navy/70">No surprises.</em>
            </h2>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 reveal delay-2 flex items-end">
            <p className="text-[15.5px] leading-[1.7] text-slate2">
              The same rhythm we ran on Harlow, Northwind and Meridian. Small teams, weekly demos, honest paper. If we are falling behind, you hear it on Thursday, not at go live.
            </p>
          </div>
        </div>

        <ol className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-px bg-navy/10 border border-navy/10">
          {steps.map((s, i) => (
            <li key={s.n} className={`step reveal delay-${i + 1} bg-white p-7 min-h-[320px] flex flex-col gap-5`}>
              <div className="flex items-center justify-between">
                <span className="step-num flex items-center justify-center w-10 h-10 rounded-full border border-navy/20 font-mono text-[12px] text-navy/70 tracking-[0.1em]">{s.n}</span>
                <span className="font-mono text-[10.5px] tracking-[0.18em] text-navy/40 uppercase">{s.w}</span>
              </div>
              <h3 className="font-display text-navy text-[22px] leading-[1.1]" style={{ fontWeight: 400 }}>{s.title}</h3>
              <p className="text-[13.5px] leading-[1.65] text-slate2">{s.body}</p>
            </li>
          ))}
        </ol>
      </div>
    </section>
  );
};

// ---------------------------------------------------------
// Engagement tiers — three options with pricing shape
// ---------------------------------------------------------
const ServiceEngagements = () => {
  const tiers = [
    {
      name: 'Assessment',
      price: 'From £18,000',
      duration: 'Two weeks',
      line: 'For leadership teams that are deciding whether Workday is the right move at all.',
      items: [
        'Current state walkthrough, finance and systems',
        'Fit and gap against Workday Financials',
        'Business case, with honest trade offs',
        'Implementation sizing, in hours and pounds',
      ],
      cta: 'Start with an assessment',
      accent: false,
    },
    {
      name: 'Implementation',
      price: 'From £180,000',
      duration: 'Ten to fourteen weeks',
      line: 'Our flagship engagement. A complete Workday Financials deployment, with planning and reporting alongside.',
      items: [
        'Core Financials, Accounting Center, Adaptive Planning',
        'Data migration from your current systems',
        'Finance team enablement woven into delivery',
        'Ninety days of hypercare after go live',
      ],
      cta: 'Book an implementation',
      accent: true,
    },
    {
      name: 'Managed Services',
      price: 'From £8,500 / month',
      duration: 'Rolling, twelve month minimum',
      line: 'For teams already live. We run the tenant with you, release to release, ticket to ticket.',
      items: [
        'Release readiness and regression testing',
        'Tier one and tier two tenant support',
        'Quarterly optimisation sprints',
        'Named partner on every renewal',
      ],
      cta: 'Move to managed services',
      accent: false,
    },
  ];

  return (
    <section id="engagements" className="relative py-28 bg-cream">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-14">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              <span>04 · Engagements</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.6vw,60px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Three ways to <em className="italic text-navy/70">begin.</em>
            </h2>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 reveal delay-2 flex items-end">
            <p className="text-[15.5px] leading-[1.7] text-slate2">
              We publish starting prices because it is the only honest way to start. Every number below is a floor, sized against a typical SMB. Your mileage will vary. Our scoping does not.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-px bg-navy/10 border border-navy/10">
          {tiers.map((t, i) => (
            <article key={t.name} className={`reveal delay-${i + 1} card-lift relative p-10 flex flex-col min-h-[520px] ${t.accent ? 'bg-navy text-white' : 'bg-white text-slate2'}`}>
              <div className="flex items-start justify-between mb-8">
                <span className={`font-mono text-[10.5px] tracking-[0.22em] uppercase ${t.accent ? 'text-white/60' : 'text-navy/45'}`}>0{i + 1} / Engagement</span>
                {t.accent && <span className="font-mono text-[10px] tracking-[0.22em] uppercase text-redorange">Most chosen</span>}
              </div>
              <h3 className={`font-display text-[38px] leading-none mb-3 ${t.accent ? 'text-white' : 'text-navy'}`} style={{ fontWeight: 400 }}>{t.name}</h3>
              <div className={`font-display text-[26px] leading-none mb-1 ${t.accent ? 'text-white' : 'text-navy'}`} style={{ fontWeight: 300 }}>{t.price}</div>
              <div className={`font-mono text-[11px] tracking-[0.16em] uppercase mb-6 ${t.accent ? 'text-white/60' : 'text-navy/50'}`}>{t.duration}</div>
              <p className={`text-[14.5px] leading-[1.65] mb-7 ${t.accent ? 'text-white/75' : 'text-slate2'}`}>{t.line}</p>
              <ul className="space-y-3 mb-10">
                {t.items.map((it) => (
                  <li key={it} className={`flex items-start gap-3 text-[13.5px] leading-[1.55] ${t.accent ? 'text-white/85' : 'text-navy/85'}`}>
                    <span className={`mt-[7px] w-1.5 h-1.5 rounded-full shrink-0 ${t.accent ? 'bg-redorange' : 'bg-redorange/80'}`} />
                    <span>{it}</span>
                  </li>
                ))}
              </ul>
              <a href="#talk" className={`mt-auto inline-flex items-center justify-between gap-3 text-[14px] font-medium py-4 px-5 rounded-full border transition-colors ${t.accent ? 'bg-redorange border-redorange text-white hover:bg-[#D63C23]' : 'border-navy/25 text-navy hover:border-redorange hover:text-redorange'}`}>
                {t.cta}
                <IconArrow size={13} className="caret" />
              </a>
            </article>
          ))}
        </div>

        <p className="reveal mt-10 text-[12.5px] font-mono tracking-[0.08em] text-navy/50 text-center">
          All prices exclude Workday subscription. We resell nothing. You own every relationship.
        </p>
      </div>
    </section>
  );
};

// ---------------------------------------------------------
// Proof strip — one featured quote + supporting metric tiles
// ---------------------------------------------------------
const ServiceProof = () => (
  <section className="relative py-28 bg-white">
    <div className="max-w-[1400px] mx-auto px-8 grid lg:grid-cols-12 gap-12 items-start">
      <div className="lg:col-span-7 reveal">
        <div className="flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-8">
          <span className="w-6 h-px bg-redorange" />
          <span>05 · Proof</span>
        </div>
        <blockquote className="font-display text-navy text-[clamp(28px,3.4vw,46px)] leading-[1.15]" style={{ fontWeight: 300 }}>
          &ldquo;They arrived without a deck. By month three our finance team was writing the roadmap, not reading it. The close is a Tuesday now. A quiet one.&rdquo;
        </blockquote>
        <div className="mt-8 flex items-center gap-5">
          <div className="w-14 h-14 rounded-full" style={{ background: 'linear-gradient(140deg,#E8472C,#F57C1F)' }} />
          <div>
            <div className="font-display text-navy text-[20px]" style={{ fontWeight: 400 }}>Aisha Mensah</div>
            <div className="font-mono text-[11px] tracking-[0.12em] uppercase text-navy/55">VP Operations · Harlow Biosciences</div>
          </div>
        </div>
      </div>

      <div className="lg:col-span-5 reveal delay-2 grid grid-cols-2 gap-px bg-navy/10 border border-navy/10">
        {[
          { k: 'Close cycle', v: 'Nine days to three' },
          { k: 'Time to go live', v: 'Twelve weeks' },
          { k: 'Adoption at quarter end', v: 'Ninety four percent' },
          { k: 'Partnership status', v: 'Renewed into year two' },
        ].map((r) => (
          <div key={r.k} className="bg-white p-7">
            <div className="font-mono text-[10.5px] tracking-[0.18em] uppercase text-navy/45 mb-3">{r.k}</div>
            <div className="font-display text-navy text-[22px] leading-[1.2]" style={{ fontWeight: 400 }}>{r.v}</div>
          </div>
        ))}
      </div>
    </div>
  </section>
);

// ---------------------------------------------------------
// FAQ — five common sales questions
// ---------------------------------------------------------
const ServiceFAQ = () => {
  const faqs = [
    { q: 'Is Workday right for an SMB our size?', a: 'Usually, between 150 and 2,500 people. Below that, the licence cost tends to outrun the benefit. Above, the mid market accelerator stops fitting. We will tell you honestly if your shape sits outside that range.' },
    { q: 'Can you work alongside our existing partner?', a: 'Yes. We have shipped projects as a second pair on cutover weekends and as the primary team on rescue engagements. We will co sign the statement of work if that is the cleanest arrangement for everyone.' },
    { q: 'How much of the work do we need to do?', a: 'More than you expect. Your finance team will be configuring alongside us by week three. That is the price of ownership after we leave. If that is not on the table, we will say so in the first call.' },
    { q: 'What happens after go live?', a: 'Ninety days of hypercare with the same team. At day ninety you choose: bring it in house, move to our managed service, or run on release support only. No retainer pressure. No auto renewal traps.' },
    { q: 'What is not included?', a: 'Workday subscription fees. Integrations with systems we have not scoped. Anything we think you should not pay us for. We will flag those before you sign, not after.' },
  ];
  const [open, setOpen] = React.useState(0);
  return (
    <section id="faq" className="relative py-28 bg-cream">
      <div className="max-w-[1400px] mx-auto px-8 grid lg:grid-cols-12 gap-12">
        <div className="lg:col-span-4">
          <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
            <span className="w-6 h-px bg-redorange" />
            <span>06 · Questions</span>
          </div>
          <h2 className="reveal delay-1 font-display text-navy text-[clamp(32px,3.8vw,52px)] leading-[1.02]" style={{ fontWeight: 300 }}>
            The ones <em className="italic text-navy/70">we hear first.</em>
          </h2>
          <p className="reveal delay-2 mt-6 text-[14.5px] leading-[1.7] text-slate2 max-w-[320px]">
            Missing yours? Ask it on the call. We will answer it in writing afterwards either way.
          </p>
        </div>

        <div className="lg:col-span-8 reveal delay-2 divide-y divide-navy/10 border-t border-b border-navy/10">
          {faqs.map((f, i) => {
            const isOpen = open === i;
            return (
              <button
                key={f.q}
                onClick={() => setOpen(isOpen ? -1 : i)}
                className="w-full text-left py-7 flex items-start gap-8 group"
                aria-expanded={isOpen}
              >
                <span className="font-mono text-[11px] tracking-[0.18em] text-navy/40 shrink-0 pt-1">0{i + 1}</span>
                <div className="flex-1">
                  <div className="font-display text-navy text-[clamp(19px,1.8vw,26px)] leading-[1.3] pr-8" style={{ fontWeight: 400 }}>{f.q}</div>
                  <div
                    className="overflow-hidden transition-all duration-500"
                    style={{ maxHeight: isOpen ? 220 : 0, opacity: isOpen ? 1 : 0 }}
                  >
                    <p className="pt-5 text-[15px] leading-[1.7] text-slate2 max-w-[640px]">{f.a}</p>
                  </div>
                </div>
                <span className={`shrink-0 mt-1 w-9 h-9 rounded-full border border-navy/20 flex items-center justify-center text-navy group-hover:border-redorange group-hover:text-redorange transition-all ${isOpen ? 'rotate-45' : ''}`}>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round"><path d="M12 5v14M5 12h14"/></svg>
                </span>
              </button>
            );
          })}
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { ServiceHeroV1, ServiceScope, ServiceOutcomes, ServiceProcessV1, ServiceEngagements, ServiceProof, ServiceFAQ });
