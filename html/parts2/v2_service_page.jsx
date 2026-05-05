// =========================================================
// V2 service landing page (cinematic / outcomes style)
// Flagship service: Workday Financials + Planning
// No dashes in content.
// =========================================================

// Dedicated service hero — dark navy, kinetic headline, scope chips + CTA + metric strip
const V2ServiceHero = () => {
  const [videoOn, setVideoOn] = React.useState(false);
  React.useEffect(() => {
    // Defer background reveal until after first paint
    const t = setTimeout(() => setVideoOn(true), 600);
    return () => clearTimeout(t);
  }, []);

  return (
    <section id="top" className="relative min-h-[96vh] text-white bg-navy-ink overflow-hidden">
      {/* Atmospheric background */}
      <div className={`absolute inset-0 transition-opacity duration-[1400ms] ${videoOn ? 'opacity-100' : 'opacity-0'}`}
        style={{
          background:
            'radial-gradient(1200px 700px at 75% 10%, rgba(59,158,219,.22), transparent 60%),' +
            'radial-gradient(900px 800px at 15% 90%, rgba(232,71,44,.28), transparent 60%),' +
            'linear-gradient(180deg, #0A1638 0%, #152C6A 48%, #0A1638 100%)',
        }}
      />
      <div className={`absolute inset-0 skel ${videoOn ? 'opacity-0' : 'opacity-100'} transition-opacity duration-700`} />
      <div className="grain" />

      <div className="relative max-w-[1440px] mx-auto px-8 pt-[150px] pb-24 grid lg:grid-cols-12 gap-12 items-start">
        <div className="lg:col-span-8">
          <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-8">
            <a href="outcomes.html" className="hover:text-white">Outcomes</a>
            <span className="text-white/30">/</span>
            <span className="text-white/70">Financials &amp; Planning</span>
          </div>

          <h1 className="font-display text-white text-[clamp(52px,8vw,128px)] leading-[0.98]" style={{ fontWeight: 300 }}>
            <span className="kinetic-line"><span>A Workday</span></span>{' '}
            <span className="kinetic-line" style={{ transitionDelay: '70ms' }}><span>tenant that closes</span></span>{' '}
            <span className="kinetic-line" style={{ transitionDelay: '140ms' }}><span><em className="italic text-white/70">on a Tuesday.</em></span></span>
          </h1>

          <p className="reveal delay-3 mt-10 text-[18px] leading-[1.7] text-white/75 max-w-[640px]">
            Financials, Accounting Center, Adaptive Planning and Prism. Delivered by one small team, named on the statement of work, measured on the outcome. For UK and EMEA SMBs that want their month end to be the least interesting part of the month.
          </p>

          <div className="reveal delay-4 mt-10 flex flex-wrap items-center gap-4">
            <a href="#talk" className="group inline-flex items-center gap-3 bg-redorange text-white px-7 py-5 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-all duration-300 shadow-[0_20px_50px_-14px_rgba(232,71,44,.8)]">
              Book a consultation
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
            <a href="#scope" className="u-link text-white/80 font-medium text-[14px]">See what is included</a>
          </div>
        </div>

        {/* Right column: at a glance card */}
        <aside className="lg:col-span-4 reveal delay-4">
          <div className="border border-white/15 rounded-2xl p-7 bg-white/[0.04] backdrop-blur-md">
            <div className="flex items-center justify-between mb-5">
              <span className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-white/60">At a glance</span>
              <span className="flex items-center gap-2 font-mono text-[10px] text-white/55">
                <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 pulse" />
                Booking Q3
              </span>
            </div>

            {[
              { k: 'Shape', v: 'Ten to fourteen weeks, end to end' },
              { k: 'Team', v: 'Partner, two consultants, architect' },
              { k: 'Go live', v: 'Quarter start. Never a Friday.' },
              { k: 'After launch', v: 'Ninety days of hypercare, on site' },
            ].map((r) => (
              <div key={r.k} className="flex items-start justify-between gap-5 py-4 border-b border-white/10 last:border-none">
                <div className="text-[11px] font-mono tracking-[0.12em] uppercase text-white/50 w-[72px] shrink-0">{r.k}</div>
                <div className="text-[13.5px] text-white/90 leading-[1.55] flex-1">{r.v}</div>
              </div>
            ))}

            <div className="mt-4 pt-4 border-t border-white/10 text-[11.5px] font-mono tracking-[0.08em] text-white/55">
              Written for SMBs between 150 and 2,500 people.
            </div>
          </div>

          <div className="mt-6 flex flex-wrap gap-2">
            {['Financials', 'Accounting Center', 'Adaptive Planning', 'Prism', 'Reporting'].map((t) => (
              <span key={t} className="text-[11.5px] font-mono tracking-[0.08em] uppercase text-white/80 px-3 py-1.5 border border-white/20 rounded-full">
                {t}
              </span>
            ))}
          </div>
        </aside>
      </div>

      {/* Bottom metric strip */}
      <div className="relative border-t border-white/10 bg-navy-ink/40 backdrop-blur-sm">
        <div className="max-w-[1440px] mx-auto px-8 grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
          {[
            { k: '42%', v: 'Shorter close by month three' },
            { k: '6 wk', v: 'Fastest Financials go live' },
            { k: '£180K', v: 'Saving in year one, median' },
            { k: '94%', v: 'Adoption at the quarter end' },
          ].map((m) => (
            <div key={m.k} className="px-6 py-6">
              <div className="font-display text-white text-[28px] leading-none mb-1" style={{ fontWeight: 400 }}>{m.k}</div>
              <div className="text-[12px] text-white/60 leading-[1.5] max-w-[180px]">{m.v}</div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

// Scope strip: two column editorial breakdown
const V2ServiceScope = () => {
  const blocks = [
    {
      tag: 'Module 01',
      title: 'Core Financials',
      body: 'General ledger, AP, AR, cash and banking, tax. Designed around the close you already run, improved week by week until the close runs you.',
      items: ['Ledger design workshop', 'Supplier and customer data load', 'Period close calendar', 'Bank feeds and reconciliations'],
    },
    {
      tag: 'Module 02',
      title: 'Accounting Center',
      body: 'Operational data translated into accounting the way your finance team reads it. No more reconciling the reconciliation.',
      items: ['Source system mapping', 'Accounting rules workshop', 'Posting rules governance', 'Reporting reconciliation'],
    },
    {
      tag: 'Module 03',
      title: 'Adaptive Planning',
      body: 'Rolling forecasts, driver based budgets and a board pack that writes itself. We leave behind a planning rhythm, not a file.',
      items: ['Driver based model', 'Rolling forecast cadence', 'Scenario library', 'Board pack template'],
    },
    {
      tag: 'Module 04',
      title: 'Reporting &amp; Prism',
      body: 'One version of the number. Signed off by finance, trusted by operations, used by the leadership team on Monday mornings.',
      items: ['Management report suite', 'Prism datasets', 'Discovery boards', 'Self service governance'],
    },
  ];
  return (
    <section id="scope" className="relative py-32 bg-white">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-20">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>01 · Scope</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.8vw,68px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Four modules. <br/>
              <em className="italic text-navy/70">One conversation.</em>
            </h2>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 reveal delay-2 flex items-end">
            <p className="text-[15.5px] leading-[1.7] text-slate2">
              We do not sell by licence SKU. We scope by outcome. The four modules below sit under one delivery plan, priced together, shipped together, supported by the same team after go live.
            </p>
          </div>
        </div>

        <div className="space-y-px bg-navy/10 border border-navy/10">
          {blocks.map((b, i) => (
            <article key={b.title} className={`reveal delay-${Math.min(i + 1, 4)} grid md:grid-cols-12 bg-white hover:bg-cream transition-colors duration-500`}>
              <div className="md:col-span-2 p-8 border-b md:border-b-0 md:border-r border-navy/10 flex flex-col justify-between">
                <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange">{b.tag}</div>
                <div className="font-display text-navy text-[64px] leading-none mt-auto" style={{ fontWeight: 300, letterSpacing: '-0.04em' }}>
                  0{i + 1}
                </div>
              </div>
              <div className="md:col-span-5 p-10 border-b md:border-b-0 md:border-r border-navy/10">
                <h3 className="font-display text-navy text-[clamp(28px,2.6vw,40px)] leading-[1.05] mb-6" style={{ fontWeight: 400 }} dangerouslySetInnerHTML={{ __html: b.title }} />
                <p className="text-[15px] leading-[1.7] text-slate2 max-w-[520px]">{b.body}</p>
              </div>
              <div className="md:col-span-5 p-10 flex flex-col justify-center">
                <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-navy/45 mb-5">Delivered in scope</div>
                <ul className="grid grid-cols-1 gap-3">
                  {b.items.map((it) => (
                    <li key={it} className="text-[14px] text-navy/90 flex items-start gap-3">
                      <span className="mt-[8px] w-1.5 h-1.5 rounded-full bg-redorange shrink-0" />
                      <span>{it}</span>
                    </li>
                  ))}
                </ul>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
};

// Engagements — 3 tiered offers, editorial cards
const V2Engagements = () => {
  const tiers = [
    {
      n: '01',
      name: 'Assessment',
      price: 'From £18,000',
      duration: 'Two weeks',
      line: 'For leadership teams deciding whether Workday is the right move at all.',
      items: ['Current state walkthrough', 'Fit and gap against Workday', 'Business case with honest trade offs', 'Implementation sizing in hours and pounds'],
      cta: 'Start with an assessment',
      featured: false,
    },
    {
      n: '02',
      name: 'Implementation',
      price: 'From £180,000',
      duration: 'Ten to fourteen weeks',
      line: 'Our flagship engagement. Financials with Planning and Reporting alongside.',
      items: ['Core Financials, Accounting Center, Adaptive Planning', 'Data migration from your current systems', 'Finance team enablement woven into delivery', 'Ninety days of hypercare after go live'],
      cta: 'Book an implementation',
      featured: true,
    },
    {
      n: '03',
      name: 'Managed Services',
      price: 'From £8,500 / month',
      duration: 'Twelve month minimum',
      line: 'For teams already live. We run the tenant with you, release to release.',
      items: ['Release readiness and regression', 'Tier one and tier two support', 'Quarterly optimisation sprints', 'Named partner on every renewal'],
      cta: 'Move to managed services',
      featured: false,
    },
  ];

  return (
    <section id="engagements" className="relative py-32 bg-navy-ink text-white overflow-hidden">
      <div className="absolute -right-40 top-10 w-[520px] h-[520px] rounded-full bg-redorange/15 blur-3xl" />
      <div className="absolute -left-40 bottom-10 w-[420px] h-[420px] rounded-full bg-sky2/10 blur-3xl" />
      <div className="grain" />

      <div className="relative max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>02 · Engagements</span>
            </div>
            <h2 className="reveal delay-1 font-display text-white text-[clamp(36px,4.8vw,68px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Three ways to <em className="italic text-white/70">begin.</em>
            </h2>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 reveal delay-2 flex items-end">
            <p className="text-[15.5px] leading-[1.7] text-white/70">
              Published starting prices because it is the only honest way to start. Every number below is a floor, sized against a typical SMB. Your mileage will vary. Our scoping will not.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
          {tiers.map((t, i) => (
            <article key={t.name}
              className={`reveal delay-${i + 1} card-lift relative p-10 rounded-2xl border flex flex-col min-h-[560px] transition-all duration-500 ${
                t.featured
                  ? 'bg-white text-slate2 border-white shadow-[0_30px_80px_-30px_rgba(0,0,0,0.8)]'
                  : 'bg-white/[0.04] text-white border-white/15 hover:border-redorange/50 backdrop-blur-md'
              }`}
            >
              <div className="flex items-start justify-between mb-7">
                <span className={`font-mono text-[10.5px] tracking-[0.22em] uppercase ${t.featured ? 'text-navy/50' : 'text-white/55'}`}>
                  {t.n} / Engagement
                </span>
                {t.featured && (
                  <span className="text-[10px] font-mono tracking-[0.22em] uppercase text-white bg-redorange px-2.5 py-1 rounded-full">
                    Most chosen
                  </span>
                )}
              </div>

              <h3 className={`font-display text-[40px] leading-none mb-2 ${t.featured ? 'text-navy' : 'text-white'}`} style={{ fontWeight: 400 }}>
                {t.name}
              </h3>
              <div className={`font-display text-[26px] leading-none mb-1 ${t.featured ? 'text-navy' : 'text-white'}`} style={{ fontWeight: 300 }}>
                {t.price}
              </div>
              <div className={`font-mono text-[11px] tracking-[0.16em] uppercase mb-7 ${t.featured ? 'text-navy/55' : 'text-white/55'}`}>
                {t.duration}
              </div>

              <p className={`text-[14.5px] leading-[1.65] mb-8 ${t.featured ? 'text-slate2' : 'text-white/75'}`}>{t.line}</p>

              <ul className="space-y-3 mb-10">
                {t.items.map((it) => (
                  <li key={it} className={`flex items-start gap-3 text-[13.5px] leading-[1.55] ${t.featured ? 'text-navy/85' : 'text-white/85'}`}>
                    <span className="mt-[7px] w-1.5 h-1.5 rounded-full bg-redorange shrink-0" />
                    <span>{it}</span>
                  </li>
                ))}
              </ul>

              <a href="#talk" className={`mt-auto inline-flex items-center justify-between gap-3 text-[14px] font-medium py-4 px-5 rounded-full transition-colors ${
                t.featured
                  ? 'bg-redorange text-white hover:bg-[#D63C23]'
                  : 'border border-white/25 text-white hover:border-redorange hover:text-redorange'
              }`}>
                {t.cta}
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </a>
            </article>
          ))}
        </div>

        <p className="reveal mt-10 text-[12.5px] font-mono tracking-[0.08em] text-white/50 text-center">
          All prices exclude Workday subscription. We resell nothing. You own every relationship.
        </p>
      </div>
    </section>
  );
};

// FAQ — same questions, restyled for v2 cream background
const V2FAQ = () => {
  const faqs = [
    { q: 'Is Workday right for an SMB our size?', a: 'Usually, between 150 and 2,500 people. Below that, the licence cost tends to outrun the benefit. Above, the mid market accelerator stops fitting. We will tell you honestly if your shape sits outside that range.' },
    { q: 'Can you work alongside our existing partner?', a: 'Yes. We have shipped projects as a second pair on cutover weekends and as the primary team on rescue engagements. We will co sign the statement of work if that is the cleanest arrangement for everyone.' },
    { q: 'How much of the work do we need to do?', a: 'More than you expect. Your finance team will be configuring alongside us by week three. That is the price of ownership after we leave. If that is not on the table, we will say so in the first call.' },
    { q: 'What happens after go live?', a: 'Ninety days of hypercare with the same team. At day ninety you choose: bring it in house, move to our managed service, or run on release support only. No retainer pressure. No auto renewal traps.' },
    { q: 'What is not included?', a: 'Workday subscription fees. Integrations with systems we have not scoped. Anything we think you should not pay us for. We will flag those before you sign, not after.' },
  ];
  const [open, setOpen] = React.useState(0);
  return (
    <section id="faq" className="relative py-32 bg-cream">
      <div className="max-w-[1440px] mx-auto px-8 grid lg:grid-cols-12 gap-12">
        <div className="lg:col-span-4">
          <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
            <span className="dash" /><span>06 · Questions</span>
          </div>
          <h2 className="reveal delay-1 font-display text-navy text-[clamp(32px,3.8vw,52px)] leading-[1.02]" style={{ fontWeight: 300 }}>
            The ones <em className="italic text-navy/70">we hear first.</em>
          </h2>
          <p className="reveal delay-2 mt-6 text-[14.5px] leading-[1.7] text-slate2 max-w-[320px]">
            Missing yours? Ask on the call. We will answer it in writing afterwards either way.
          </p>
        </div>
        <div className="lg:col-span-8 reveal delay-2 divide-y divide-navy/10 border-t border-b border-navy/10">
          {faqs.map((f, i) => {
            const isOpen = open === i;
            return (
              <button key={f.q} onClick={() => setOpen(isOpen ? -1 : i)} className="w-full text-left py-7 flex items-start gap-8 group" aria-expanded={isOpen}>
                <span className="font-mono text-[11px] tracking-[0.18em] text-navy/40 shrink-0 pt-1">0{i + 1}</span>
                <div className="flex-1">
                  <div className="font-display text-navy text-[clamp(19px,1.8vw,26px)] leading-[1.3] pr-8" style={{ fontWeight: 400 }}>{f.q}</div>
                  <div className="overflow-hidden transition-all duration-500" style={{ maxHeight: isOpen ? 240 : 0, opacity: isOpen ? 1 : 0 }}>
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

Object.assign(window, { V2ServiceHero, V2ServiceScope, V2Engagements, V2FAQ });
