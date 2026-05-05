// =========================================================
// V2 service page extras: Case studies, Related services, Lead form
// Cinematic / dark-forward treatment to match v2 hero.
// =========================================================

// ---------------------------------------------------------
// V2 Case studies — large editorial rows on cream with
// dark numbered callouts. Different rhythm from v1.
// ---------------------------------------------------------
const V2CaseStudies = () => {
  const cases = [
    {
      n: '01',
      sector: 'Wholesale distribution · £210m · 340 staff',
      headline: 'Eight entities. Four day close. No second controller.',
      body: 'Eight entities across UK and Ireland were running on a ledger designed for a single shop. We rebuilt the chart, moved AP and AR into Workday, rewired intercompany, and sat in the room for the first two closes.',
      metrics: [
        { k: '11 → 4', v: 'Working days to close' },
        { k: '3 → 1', v: 'Systems of record' },
        { k: 'Day 1', v: 'Clean trial balance' },
      ],
      quote: 'The first clean month end, no one spoke for an hour. Everyone was waiting for the usual fire.',
      author: 'Group Financial Controller',
    },
    {
      n: '02',
      sector: 'SaaS · Series C · 620 staff · 14 countries',
      headline: 'One tenant. Eleven currencies. Zero spreadsheets in the loop.',
      body: 'Revenue recognition across three product lines. Accounting Center standing beside Workday Financials, events pulled directly from billing, and a long chain of reconciliation files finally retired.',
      metrics: [
        { k: '38 → 0', v: 'Recon spreadsheets' },
        { k: '11', v: 'Currencies live' },
        { k: '2×', v: 'Faster reporting' },
      ],
      quote: 'We stopped rebuilding the same numbers in Excel. That was the whole point.',
      author: 'VP Finance',
    },
    {
      n: '03',
      sector: 'Manufacturing · £90m · UK and DE',
      headline: 'A planning cycle that finishes before the quarter starts.',
      body: 'Adaptive Planning tied into the same ledger. Sales, supply and finance on one model. The budget stopped being a PDF everyone argued about, started being a live plan people actually used.',
      metrics: [
        { k: '7 wk → 9d', v: 'Plan cycle time' },
        { k: 'Weekly', v: 'Re-forecast cadence' },
        { k: '1', v: 'Source of truth' },
      ],
      quote: 'I used to dread Q4. Now planning is the easy part. The hard part is deciding what to do.',
      author: 'CFO',
    },
  ];

  return (
    <section id="cases" className="relative py-32 bg-cream">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-20">
          <div className="lg:col-span-7">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-6">
              <span className="dash" /><span>04 · Evidence</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(40px,5.4vw,80px)] leading-[0.98]" style={{ fontWeight: 300 }}>
              Three closes. <br />
              <em className="italic text-navy/70">Three very different companies.</em>
            </h2>
          </div>
          <div className="lg:col-span-4 lg:col-start-9 reveal delay-2 flex items-end">
            <p className="text-[15.5px] leading-[1.7] text-slate2">
              Short reads from the Financials engagements we run most often. Names withheld on request. Numbers come from customer accounts, not marketing decks.
            </p>
          </div>
        </div>

        <div className="space-y-8">
          {cases.map((c, i) => (
            <article
              key={c.n}
              className={`reveal delay-${Math.min(i + 1, 4)} group relative overflow-hidden rounded-2xl border border-navy/10 bg-white hover:border-navy/25 transition-all duration-500`}
            >
              <div className="grid lg:grid-cols-12 gap-0">
                {/* Dark number rail */}
                <div className="lg:col-span-3 bg-navy-ink text-white p-10 flex flex-col justify-between min-h-[320px]">
                  <div>
                    <div className="font-display text-white/90 text-[clamp(80px,8vw,120px)] leading-[0.9]" style={{ fontWeight: 300 }}>{c.n}</div>
                    <div className="mt-4 text-[12px] font-mono tracking-[0.1em] text-white/60 leading-[1.6]">
                      {c.sector}
                    </div>
                  </div>
                  <div className="pt-8 border-t border-white/15">
                    <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange mb-3">Highlights</div>
                    <ul className="space-y-2">
                      {c.metrics.map((m) => (
                        <li key={m.k} className="flex items-start gap-3 text-[12.5px] text-white/80">
                          <span className="font-display text-white text-[14px] w-[70px] shrink-0" style={{ fontWeight: 500 }}>{m.k}</span>
                          <span className="text-white/60 leading-[1.5]">{m.v}</span>
                        </li>
                      ))}
                    </ul>
                  </div>
                </div>

                {/* Body */}
                <div className="lg:col-span-9 p-10 lg:p-14 flex flex-col gap-8">
                  <h3 className="font-display text-navy text-[clamp(28px,3.2vw,46px)] leading-[1.08] max-w-[760px]" style={{ fontWeight: 400 }}>
                    {c.headline}
                  </h3>
                  <p className="text-[16px] leading-[1.75] text-slate2 max-w-[680px]">
                    {c.body}
                  </p>

                  <blockquote className="mt-auto pl-6 border-l-2 border-redorange max-w-[640px]">
                    <p className="font-display italic text-navy text-[20px] leading-[1.5] mb-3" style={{ fontWeight: 300 }}>
                      &ldquo;{c.quote}&rdquo;
                    </p>
                    <footer className="text-[11.5px] font-mono tracking-[0.12em] uppercase text-navy/55">{c.author}</footer>
                  </blockquote>
                </div>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
};

// ---------------------------------------------------------
// Related services — three cards below the form
// ---------------------------------------------------------
const V2Related = () => {
  const items = [
    {
      tag: 'Workday HCM',
      title: 'Core HR that finance actually recognises.',
      body: 'Headcount and cost centre in the same place as the ledger. The org changes, the plan follows.',
    },
    {
      tag: 'Adaptive Planning',
      title: 'Planning tied to the same numbers.',
      body: 'Rolling re-forecasts, driver based scenarios, no more spreadsheet version control.',
    },
    {
      tag: 'Managed support',
      title: 'The team that built it still runs it.',
      body: 'Named consultants, monthly release reviews, clear escalation path. No ticket farm.',
    },
  ];

  return (
    <section className="relative py-24 bg-white border-t border-navy/10">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="flex items-end justify-between mb-14 flex-wrap gap-6">
          <div>
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-4">
              <span className="dash" /><span>Also from Zeneesha</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(32px,3.6vw,52px)] leading-[1.08]" style={{ fontWeight: 300 }}>
              What we pair this with.
            </h2>
          </div>
          <a href="outcomes.html#services" className="u-link text-[13px] font-medium text-navy/80">See all services</a>
        </div>

        <div className="grid md:grid-cols-3 gap-6">
          {items.map((it, i) => (
            <a
              key={it.tag}
              href="#"
              className={`reveal delay-${i + 1} group relative p-8 border border-navy/12 rounded-xl bg-cream/50 hover:bg-cream hover:border-navy/30 transition-all duration-400 flex flex-col gap-5`}
            >
              <div className="flex items-center justify-between">
                <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange">{it.tag}</div>
                <svg className="text-navy/40 group-hover:text-redorange group-hover:translate-x-1 transition-all duration-300" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
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
// V2 Lead form — dark, cinematic two-column intake
// ---------------------------------------------------------
const V2LeadForm = () => {
  const [form, setForm] = React.useState({
    name: '', company: '', email: '', people: '150-500', timeline: 'This quarter', modules: [], notes: '',
  });
  const [sent, setSent] = React.useState(false);

  const modules = ['Core Financials', 'Accounting Center', 'Adaptive Planning', 'Prism Analytics', 'Projects', 'Procurement'];

  const toggleModule = (m) => {
    setForm((f) => ({ ...f, modules: f.modules.includes(m) ? f.modules.filter((x) => x !== m) : [...f.modules, m] }));
  };

  const submit = (e) => {
    e.preventDefault();
    setSent(true);
  };

  return (
    <section id="talk" className="relative bg-navy-ink text-white overflow-hidden">
      <div className="absolute inset-0 pointer-events-none">
        <div className="absolute -top-40 -right-40 w-[620px] h-[620px] rounded-full" style={{ background: 'radial-gradient(closest-side, rgba(232,71,44,.35), transparent 70%)' }} />
        <div className="absolute -bottom-48 -left-32 w-[640px] h-[640px] rounded-full" style={{ background: 'radial-gradient(closest-side, rgba(59,158,219,.22), transparent 70%)' }} />
      </div>
      <div className="grain" />

      <div className="relative max-w-[1440px] mx-auto px-8 py-32 grid lg:grid-cols-12 gap-16">
        <div className="lg:col-span-5">
          <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-6">
            <span className="dash" /><span>06 · Talk to us</span>
          </div>
          <h2 className="reveal delay-1 font-display text-white text-[clamp(40px,5.2vw,72px)] leading-[0.98] mb-9" style={{ fontWeight: 300 }}>
            Tell us where <br />
            <em className="italic text-white/70">the close actually hurts.</em>
          </h2>
          <p className="reveal delay-2 text-[17px] leading-[1.75] text-white/75 max-w-[440px] mb-14">
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

        <div className="lg:col-span-7">
          {sent ? (
            <div className="reveal border border-white/15 rounded-2xl p-12 bg-white/[0.04] backdrop-blur-md min-h-[560px] flex flex-col justify-center">
              <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange mb-5">Received</div>
              <h3 className="font-display text-white text-[44px] leading-[1.08] mb-5" style={{ fontWeight: 300 }}>
                Thanks, {form.name.split(' ')[0] || 'there'}.
              </h3>
              <p className="text-[16px] leading-[1.7] text-white/75 max-w-[460px]">
                A partner will read this today and reply inside one working day. If it is urgent, call the number on the left and ask for Aisha or Marcus.
              </p>
            </div>
          ) : (
            <form onSubmit={submit} className="reveal border border-white/15 rounded-2xl p-8 md:p-12 bg-white/[0.04] backdrop-blur-md space-y-8">
              <div className="grid md:grid-cols-2 gap-7">
                <V2Field label="Your name" value={form.name} onChange={(v) => setForm({ ...form, name: v })} placeholder="Jane Okafor" required />
                <V2Field label="Company" value={form.company} onChange={(v) => setForm({ ...form, company: v })} placeholder="Acme Ltd" required />
              </div>

              <V2Field label="Work email" type="email" value={form.email} onChange={(v) => setForm({ ...form, email: v })} placeholder="jane@acme.co.uk" required />

              <div className="grid md:grid-cols-2 gap-7">
                <V2Select label="Company size" value={form.people} onChange={(v) => setForm({ ...form, people: v })} options={['Under 150', '150-500', '500-1,500', '1,500-2,500', 'Over 2,500']} />
                <V2Select label="Timeline" value={form.timeline} onChange={(v) => setForm({ ...form, timeline: v })} options={['This quarter', 'Next quarter', 'Within 12 months', 'Exploring']} />
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

              <div className="flex flex-col sm:flex-row sm:items-center justify-between gap-5 pt-5 border-t border-white/15">
                <p className="text-[11.5px] font-mono text-white/50 leading-[1.6] max-w-[340px]">
                  Your details stay with the partner team. We do not pass them to SDRs or marketing automation.
                </p>
                <button type="submit" className="group inline-flex items-center gap-3 bg-redorange text-white px-8 py-4 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-all self-start sm:self-auto">
                  Send to a partner
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </button>
              </div>
            </form>
          )}
        </div>
      </div>
    </section>
  );
};

const V2Field = ({ label, value, onChange, placeholder, type = 'text', required }) => (
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

const V2Select = ({ label, value, onChange, options }) => (
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
