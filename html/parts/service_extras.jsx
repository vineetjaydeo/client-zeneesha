// =========================================================
// Service page extras (v1): Case studies, Related services, Lead form
// These replace the outcomes / process / proof sections that belong
// on the home page, keeping this service page specific and sales-ready.
// =========================================================

// ---------------------------------------------------------
// Case studies — three focused, service-specific mini cases
// Large numbers, editorial, each with a quote + context row
// ---------------------------------------------------------
const ServiceCaseStudies = () => {
  const cases = [
    {
      kicker: 'Case · 01',
      sector: 'Wholesale distribution · £210m revenue · 340 staff',
      headline: 'Close in four days, without a second controller.',
      body: 'Eight entities across UK and Ireland on a ledger built for a single UK shop. We rebuilt the chart, moved AP and AR into Workday, rewired intercompany and sat with the team for the first two closes.',
      before: { k: 'Close', v: 'Eleven working days' },
      after:  { k: 'Close', v: 'Four working days' },
      metrics: [
        { k: '64%', v: 'Shorter close' },
        { k: '3→1', v: 'Systems of record' },
        { k: 'Day 1', v: 'Clean trial balance' },
      ],
      quote: 'The first clean month end, no one spoke for an hour. Everyone was waiting for the usual fire. It never came.',
      author: 'Group Financial Controller',
    },
    {
      kicker: 'Case · 02',
      sector: 'SaaS · Series C · 620 staff · 14 countries',
      headline: 'One tenant. Eleven currencies. No spreadsheets in the loop.',
      body: 'Revenue recognition across three product lines. We stood up Accounting Center beside Workday Financials, pulled events directly from the billing system and retired a long chain of reconciliation files.',
      before: { k: 'Recon files', v: '38 spreadsheets' },
      after:  { k: 'Recon files', v: 'Zero' },
      metrics: [
        { k: '11', v: 'Currencies live' },
        { k: '0', v: 'Post-close adjustments' },
        { k: '2×', v: 'Faster reporting cycle' },
      ],
      quote: 'We stopped rebuilding the same numbers in Excel. That was the whole point. We got our analyst team back.',
      author: 'VP Finance',
    },
    {
      kicker: 'Case · 03',
      sector: 'Manufacturing · £90m revenue · UK and DE',
      headline: 'A planning cycle that finishes before the quarter starts.',
      body: 'Adaptive Planning tied into the same ledger. Sales, supply and finance on one model. The budget stopped being a PDF that everyone argued about, became a live plan people actually used.',
      before: { k: 'Plan cycle', v: 'Seven weeks' },
      after:  { k: 'Plan cycle', v: 'Nine working days' },
      metrics: [
        { k: '74%', v: 'Shorter plan' },
        { k: '1', v: 'Source of truth' },
        { k: 'Weekly', v: 'Re-forecast cadence' },
      ],
      quote: 'I used to dread Q4. Now planning is the easy part. The hard part is deciding what we actually want to do.',
      author: 'CFO',
    },
  ];

  return (
    <section id="cases" className="relative py-32 bg-cream">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              <span>04 · Case studies</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.8vw,68px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Three closes. <br/>
              <em className="italic text-navy/70">Three very different companies.</em>
            </h2>
          </div>
          <div className="lg:col-span-5 lg:col-start-8 reveal delay-2 flex items-end">
            <p className="text-[15.5px] leading-[1.7] text-slate2">
              Short reads from the Financials engagements we run most often. Names withheld on request. Numbers are real and come from customer accounts, not marketing decks.
            </p>
          </div>
        </div>

        <div className="space-y-px bg-navy/10 border border-navy/10 rounded-[4px] overflow-hidden">
          {cases.map((c, i) => (
            <article key={c.kicker} className={`reveal delay-${Math.min(i + 1, 4)} grid lg:grid-cols-12 bg-white hover:bg-[#FBF5ED] transition-colors duration-500`}>
              {/* Left rail */}
              <div className="lg:col-span-4 p-10 border-b lg:border-b-0 lg:border-r border-navy/10 flex flex-col justify-between gap-8">
                <div>
                  <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange mb-3">{c.kicker}</div>
                  <div className="text-[12px] font-mono tracking-[0.08em] uppercase text-navy/55 leading-[1.55]">{c.sector}</div>
                </div>

                <div className="grid grid-cols-2 gap-4 text-[12px] font-mono">
                  <div className="pb-3 border-b border-navy/15">
                    <div className="text-navy/45 tracking-[0.1em] uppercase text-[10px] mb-1">Before</div>
                    <div className="text-navy/80">{c.before.v}</div>
                  </div>
                  <div className="pb-3 border-b-2 border-redorange">
                    <div className="text-redorange tracking-[0.1em] uppercase text-[10px] mb-1">After</div>
                    <div className="text-navy font-medium">{c.after.v}</div>
                  </div>
                </div>
              </div>

              {/* Body */}
              <div className="lg:col-span-8 p-10 flex flex-col gap-8">
                <h3 className="font-display text-navy text-[clamp(24px,2.3vw,34px)] leading-[1.15]" style={{ fontWeight: 400 }}>
                  {c.headline}
                </h3>
                <p className="text-[15px] leading-[1.7] text-slate2 max-w-[680px]">{c.body}</p>

                <div className="grid grid-cols-3 gap-4 pt-6 border-t border-navy/10">
                  {c.metrics.map((m) => (
                    <div key={m.k}>
                      <div className="font-display text-navy text-[clamp(28px,2.8vw,40px)] leading-none mb-1.5" style={{ fontWeight: 400 }}>{m.k}</div>
                      <div className="text-[12px] text-navy/60 leading-[1.5]">{m.v}</div>
                    </div>
                  ))}
                </div>

                <blockquote className="pl-5 border-l-2 border-redorange">
                  <p className="font-display italic text-navy text-[18px] leading-[1.55] mb-3" style={{ fontWeight: 300 }}>
                    &ldquo;{c.quote}&rdquo;
                  </p>
                  <footer className="text-[11.5px] font-mono tracking-[0.12em] uppercase text-navy/55">
                    {c.author}
                  </footer>
                </blockquote>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
};

// ---------------------------------------------------------
// Related services — small 3-card nav to adjacent offerings
// ---------------------------------------------------------
const ServiceRelated = () => {
  const items = [
    {
      tag: 'Workday HCM',
      title: 'Core HR that finance recognises.',
      body: 'Headcount and cost centre in the same place as the ledger. The org changes, the plan follows.',
      href: '#',
    },
    {
      tag: 'Adaptive Planning',
      title: 'Planning tied to the same numbers.',
      body: 'Rolling re-forecasts, driver based scenarios, no more spreadsheet version control.',
      href: '#',
    },
    {
      tag: 'Post-go-live support',
      title: 'The team that built it still runs it.',
      body: 'Named consultants, monthly release reviews, clear escalation path. No ticket farm.',
      href: '#',
    },
  ];
  return (
    <section className="relative py-24 bg-white border-t border-navy/10">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="flex items-end justify-between mb-12 flex-wrap gap-6">
          <div>
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-4">
              <span className="w-6 h-px bg-redorange" />
              <span>Also from Zeneesha</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(28px,3.2vw,44px)] leading-[1.1]" style={{ fontWeight: 300 }}>
              What we pair this with.
            </h2>
          </div>
          <a href="Zeneesha.html#services" className="u-link text-[13px] font-medium text-navy/80">See all services</a>
        </div>

        <div className="grid md:grid-cols-3 gap-px bg-navy/10 border border-navy/10">
          {items.map((it, i) => (
            <a key={it.tag} href={it.href} className={`reveal delay-${i + 1} group bg-white p-8 flex flex-col gap-5 hover:bg-cream transition-colors duration-500`}>
              <div className="flex items-center justify-between">
                <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange">{it.tag}</div>
                <IconArrow size={14} className="text-navy/40 group-hover:text-redorange group-hover:translate-x-1 transition-all duration-300" />
              </div>
              <h3 className="font-display text-navy text-[22px] leading-[1.2]" style={{ fontWeight: 400 }}>{it.title}</h3>
              <p className="text-[14px] text-slate2 leading-[1.65]">{it.body}</p>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
};

// ---------------------------------------------------------
// Lead form — proper two-column editorial intake
// Left: copy + direct contacts. Right: multi-field form.
// ---------------------------------------------------------
const ServiceLeadForm = () => {
  const [form, setForm] = React.useState({
    name: '', company: '', email: '', people: '150-500', timeline: 'This quarter', modules: [], notes: '',
  });
  const [sent, setSent] = React.useState(false);

  const modules = ['Core Financials', 'Accounting Center', 'Adaptive Planning', 'Prism Analytics', 'Projects', 'Procurement'];

  const toggleModule = (m) => {
    setForm((f) => ({
      ...f,
      modules: f.modules.includes(m) ? f.modules.filter((x) => x !== m) : [...f.modules, m],
    }));
  };

  const submit = (e) => {
    e.preventDefault();
    setSent(true);
  };

  return (
    <section id="talk" className="relative bg-navy-ink text-white overflow-hidden">
      <div className="absolute inset-0 pointer-events-none">
        <div className="absolute -top-32 -right-32 w-[520px] h-[520px] rounded-full" style={{ background: 'radial-gradient(closest-side, rgba(232,71,44,.35), transparent 70%)' }} />
        <div className="absolute -bottom-40 -left-20 w-[560px] h-[560px] rounded-full" style={{ background: 'radial-gradient(closest-side, rgba(59,158,219,.22), transparent 70%)' }} />
      </div>
      <div className="grain" />

      <div className="relative max-w-[1400px] mx-auto px-8 py-28 grid lg:grid-cols-12 gap-16">
        {/* Left column */}
        <div className="lg:col-span-5">
          <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-6">
            <span className="w-6 h-px bg-redorange" />
            <span>06 · Talk to us</span>
          </div>
          <h2 className="reveal delay-1 font-display text-white text-[clamp(36px,4.8vw,64px)] leading-[1.02] mb-8" style={{ fontWeight: 300 }}>
            Tell us where <br />
            <em className="italic text-white/70">the close actually hurts.</em>
          </h2>
          <p className="reveal delay-2 text-[16px] leading-[1.75] text-white/75 max-w-[440px] mb-12">
            A partner reads every message. You will hear back inside one working day with a short view on whether we are a fit, not a sales pitch and a calendar invite.
          </p>

          <div className="space-y-5">
            {[
              { k: 'Email', v: 'hello@zeneesha.co.uk', href: 'mailto:hello@zeneesha.co.uk' },
              { k: 'Phone', v: '+44 20 3996 4120', href: 'tel:+442039964120' },
              { k: 'Office', v: '8 Devonshire Square, London EC2M 4PL', href: null },
            ].map((row) => (
              <div key={row.k} className="flex items-start justify-between gap-6 pb-4 border-b border-white/15">
                <span className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-white/55 w-[70px] shrink-0 pt-1">{row.k}</span>
                {row.href ? (
                  <a href={row.href} className="text-[15px] text-white hover:text-redorange transition-colors flex-1 text-right">{row.v}</a>
                ) : (
                  <span className="text-[15px] text-white/85 flex-1 text-right">{row.v}</span>
                )}
              </div>
            ))}
          </div>

          <div className="mt-10 pt-6 border-t border-white/15 flex items-center gap-3 text-[12px] font-mono text-white/55">
            <span className="w-1.5 h-1.5 rounded-full bg-emerald-400 pulse" />
            <span>Booking Q3. Three slots left.</span>
          </div>
        </div>

        {/* Right column: form */}
        <div className="lg:col-span-7">
          {sent ? (
            <div className="reveal border border-white/15 rounded-2xl p-12 bg-white/[0.04] backdrop-blur-md min-h-[520px] flex flex-col justify-center">
              <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange mb-5">Received</div>
              <h3 className="font-display text-white text-[40px] leading-[1.1] mb-5" style={{ fontWeight: 300 }}>
                Thanks, {form.name.split(' ')[0] || 'there'}.
              </h3>
              <p className="text-[16px] leading-[1.7] text-white/75 max-w-[460px]">
                A partner will read this today and reply inside one working day. If it is urgent, call the number on the left and ask for Aisha or Marcus.
              </p>
            </div>
          ) : (
            <form onSubmit={submit} className="reveal border border-white/15 rounded-2xl p-8 md:p-10 bg-white/[0.04] backdrop-blur-md space-y-7">
              <div className="grid md:grid-cols-2 gap-6">
                <LeadField label="Your name" value={form.name} onChange={(v) => setForm({ ...form, name: v })} placeholder="Jane Okafor" required />
                <LeadField label="Company" value={form.company} onChange={(v) => setForm({ ...form, company: v })} placeholder="Acme Ltd" required />
              </div>

              <LeadField label="Work email" type="email" value={form.email} onChange={(v) => setForm({ ...form, email: v })} placeholder="jane@acme.co.uk" required />

              <div className="grid md:grid-cols-2 gap-6">
                <LeadSelect label="Company size" value={form.people} onChange={(v) => setForm({ ...form, people: v })} options={['Under 150', '150-500', '500-1,500', '1,500-2,500', 'Over 2,500']} />
                <LeadSelect label="Timeline" value={form.timeline} onChange={(v) => setForm({ ...form, timeline: v })} options={['This quarter', 'Next quarter', 'Within 12 months', 'Exploring']} />
              </div>

              <div>
                <label className="block font-mono text-[10.5px] tracking-[0.22em] uppercase text-white/55 mb-3">Modules of interest</label>
                <div className="flex flex-wrap gap-2">
                  {modules.map((m) => {
                    const on = form.modules.includes(m);
                    return (
                      <button
                        type="button"
                        key={m}
                        onClick={() => toggleModule(m)}
                        className={`text-[12px] font-mono tracking-[0.06em] px-3.5 py-2 rounded-full border transition-all duration-200 ${on ? 'bg-redorange border-redorange text-white' : 'bg-transparent border-white/25 text-white/75 hover:border-white/60 hover:text-white'}`}
                      >
                        {m}
                      </button>
                    );
                  })}
                </div>
              </div>

              <div>
                <label className="block font-mono text-[10.5px] tracking-[0.22em] uppercase text-white/55 mb-3">What hurts today</label>
                <textarea
                  value={form.notes}
                  onChange={(e) => setForm({ ...form, notes: e.target.value })}
                  rows={5}
                  placeholder="Month end stretches to eleven days. Three entities, three spreadsheets, one very tired controller."
                  className="w-full bg-transparent border border-white/20 rounded-xl px-4 py-3.5 text-[14px] text-white placeholder-white/35 focus:border-redorange focus:outline-none transition-colors resize-none"
                />
              </div>

              <div className="flex flex-col sm:flex-row sm:items-center justify-between gap-5 pt-4 border-t border-white/15">
                <p className="text-[11.5px] font-mono text-white/50 leading-[1.6] max-w-[320px]">
                  Your details stay with the partner team. We do not pass them to SDRs or marketing automation.
                </p>
                <button type="submit" className="group inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-all self-start sm:self-auto">
                  Send to a partner
                  <IconArrow size={13} className="caret" />
                </button>
              </div>
            </form>
          )}
        </div>
      </div>
    </section>
  );
};

const LeadField = ({ label, value, onChange, placeholder, type = 'text', required }) => (
  <label className="block">
    <span className="block font-mono text-[10.5px] tracking-[0.22em] uppercase text-white/55 mb-2">{label}{required && <span className="text-redorange ml-1">*</span>}</span>
    <input
      type={type}
      value={value}
      onChange={(e) => onChange(e.target.value)}
      placeholder={placeholder}
      required={required}
      className="w-full bg-transparent border-b border-white/20 py-2.5 text-[15px] text-white placeholder-white/35 focus:border-redorange focus:outline-none transition-colors"
    />
  </label>
);

const LeadSelect = ({ label, value, onChange, options }) => (
  <label className="block">
    <span className="block font-mono text-[10.5px] tracking-[0.22em] uppercase text-white/55 mb-2">{label}</span>
    <div className="relative">
      <select
        value={value}
        onChange={(e) => onChange(e.target.value)}
        className="w-full appearance-none bg-transparent border-b border-white/20 py-2.5 pr-8 text-[15px] text-white focus:border-redorange focus:outline-none transition-colors cursor-pointer"
      >
        {options.map((o) => <option key={o} value={o} className="bg-navy-ink text-white">{o}</option>)}
      </select>
      <svg className="absolute right-0 top-1/2 -translate-y-1/2 text-white/50 pointer-events-none" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M6 9l6 6 6-6"/></svg>
    </div>
  </label>
);
