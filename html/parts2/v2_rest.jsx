// =========================================================
// People + Clients + Insights + CTA + Footer + WA
// =========================================================

const People = () => {
  const team = [
    { name: 'Priya Raman', role: 'Partner · Financials lead', bio: 'Thirteen years in Workday close cycles. Reads balance sheets the way most people read poetry. Currently in London, three weeks of the month.', klass: 'portrait' },
    { name: 'Marcus Brook', role: 'Partner · HCM &amp; Payroll', bio: 'Former Head of HR Systems at a 2,400-person group. Believes every payroll glitch is a management problem first and a technical one second.', klass: 'portrait-2' },
    { name: 'Naledi Okafor', role: 'Principal · Analytics', bio: 'Prism and adaptive planning specialist. Runs our internal reading group on executive decision quality. Based in Manchester, flies to clients.', klass: 'portrait-3' },
  ];

  return (
    <section id="people" className="relative py-32 bg-white overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16 items-end">
          <div className="lg:col-span-7">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>03 · People</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.8vw,68px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              The team that sold it <br/>
              is the team that <em className="italic text-navy/70">builds it.</em>
            </h2>
          </div>
          <div className="lg:col-span-4 lg:col-start-9 reveal delay-2">
            <p className="text-[15.5px] leading-[1.7] text-slate2">
              No bait and switch. The partners on your first call are named on the statement of work, and in the room for the first close.
            </p>
          </div>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-3 gap-px bg-navy/10 border border-navy/10">
          {team.map((p, i) => (
            <article key={p.name} className={`reveal delay-${i+1} bg-white group overflow-hidden`}>
              <div className={`aspect-[4/5] ${p.klass} relative overflow-hidden`}>
                <div className="grain" />
                {/* Abstract silhouette — head/shoulders placeholder */}
                <svg viewBox="0 0 400 500" className="absolute inset-0 w-full h-full transition-transform duration-[1200ms] group-hover:scale-[1.04]">
                  <defs>
                    <radialGradient id={`hl${i}`} cx="50%" cy="38%" r="36%">
                      <stop offset="0" stopColor="rgba(255,255,255,.28)"/>
                      <stop offset="1" stopColor="rgba(255,255,255,0)"/>
                    </radialGradient>
                  </defs>
                  <ellipse cx="200" cy="180" rx="92" ry="108" fill="rgba(255,255,255,.12)"/>
                  <path d="M70 500 C 70 370 130 310 200 310 C 270 310 330 370 330 500 Z" fill="rgba(255,255,255,.14)"/>
                  <rect width="400" height="500" fill={`url(#hl${i})`}/>
                </svg>
                <div className="absolute bottom-5 left-5 right-5 text-white">
                  <div className="font-mono text-[10px] tracking-[0.22em] uppercase opacity-80">0{i+1} / {team.length}</div>
                </div>
              </div>
              <div className="p-8">
                <h3 className="font-display text-navy text-[26px] leading-none mb-2" style={{ fontWeight: 400 }}>{p.name}</h3>
                <div className="font-mono text-[11px] tracking-[0.12em] text-redorange uppercase mb-5" dangerouslySetInnerHTML={{ __html: p.role }} />
                <p className="text-[14px] leading-[1.65] text-slate2">{p.bio}</p>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
};

// Clients — case chips with featured metric callouts
const Clients = () => {
  const cases = [
    { co: 'Harlow Biosciences', sector: 'Life Sciences · Oxford', headline: 'From nine-day close to three, without adding headcount.', metric: '42% shorter close', quote: 'They arrived without a deck. By month three our finance team was writing the roadmap, not reading it.' , who: 'Aisha Mensah, VP Ops' },
    { co: 'Northwind Credit', sector: 'Financial Services · London', headline: 'Adaptive Planning in six weeks. Board pack in the seventh.', metric: '£180K saved / year one', quote: 'The difference between a consultancy and a partner is who is in the room on the Sunday before quarter-end.', who: 'Tomas Reeve, CFO' },
    { co: 'Meridian Retail', sector: 'Retail · Birmingham', headline: 'Store-level reporting, rolled out across 54 sites in 90 days.', metric: '92% adoption at month three', quote: 'Our area managers stopped exporting to Excel. That tells you everything.', who: 'Sophia Lyle, Finance Director' },
  ];
  return (
    <section id="clients" className="relative py-32 bg-cream">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
          <div>
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>04 · Clients</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.8vw,64px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Three recent <em className="italic text-navy/70">partnerships.</em>
            </h2>
          </div>
          <a href="#" className="reveal delay-2 u-link text-[14px] font-medium text-navy">All case studies
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </a>
        </div>

        <div className="space-y-6">
          {cases.map((c, i) => (
            <article key={c.co} className={`reveal delay-${i+1} card-lift bg-white border border-navy/10 hover:border-redorange/50 grid md:grid-cols-12 gap-0 overflow-hidden`}>
              <div className="md:col-span-3 p-8 border-b md:border-b-0 md:border-r border-navy/10 flex flex-col justify-between">
                <div>
                  <div className="font-mono text-[10px] tracking-[0.22em] text-navy/40 uppercase mb-2">0{i+1} / Case</div>
                  <div className="font-display text-navy text-[26px] leading-none mb-2" style={{ fontWeight: 400 }}>{c.co}</div>
                  <div className="font-mono text-[11px] text-slate2 tracking-[0.08em]">{c.sector}</div>
                </div>
                <div className="mt-8">
                  <div className="inline-block font-mono text-[10.5px] tracking-[0.16em] uppercase text-redorange bg-redorange/10 px-3 py-1.5">{c.metric}</div>
                </div>
              </div>
              <div className="md:col-span-6 p-8 md:p-10 border-b md:border-b-0 md:border-r border-navy/10 flex flex-col justify-center">
                <h3 className="font-display text-navy text-[clamp(22px,2vw,30px)] leading-[1.2] mb-6" style={{ fontWeight: 400 }}>
                  {c.headline}
                </h3>
                <blockquote className="text-[15px] leading-[1.7] text-slate2 italic font-display" style={{ fontWeight: 300 }}>
                  &ldquo;{c.quote}&rdquo;
                </blockquote>
                <div className="mt-4 text-[12px] font-mono tracking-[0.08em] text-navy/55">{c.who}</div>
              </div>
              <div className="md:col-span-3 p-8 flex items-center justify-between md:flex-col md:items-start gap-4">
                <div>
                  <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-navy/40 mb-2">Services</div>
                  <div className="text-[13.5px] text-navy">Financials · Adaptive Planning · Analytics</div>
                </div>
                <a href="#" className="u-link text-redorange text-[13px] font-medium">Read full case
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
};

// Simple insights
const InsightsV2 = () => {
  const items = [
    { tag: 'Financials', title: 'The five working-day close is a behaviour, not a feature.' },
    { tag: 'HCM', title: 'Three mistakes we see in every HCM migration. Every year.' },
    { tag: 'Analytics', title: 'Prism, honestly. When it earns its keep, and when it does not.' },
    { tag: 'Leadership', title: 'What an SMB finance leader should ask before signing a Workday SOW.' },
  ];
  return (
    <section id="insights" className="relative py-32 bg-white">
      <div className="max-w-[1440px] mx-auto px-8">
        <div className="grid lg:grid-cols-12 gap-10 mb-16">
          <div className="lg:col-span-6">
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="dash" /><span>05 · Field notes</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.6vw,60px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Written after the <em className="italic text-navy/70">cutover,</em> <br/>
              not before the pitch.
            </h2>
          </div>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 gap-px bg-navy/10 border border-navy/10">
          {items.map((it, i) => (
            <a key={it.title} href="#" className={`reveal delay-${i+1} bg-white p-10 min-h-[220px] flex flex-col justify-between card-lift hover:bg-cream group`}>
              <div className="font-mono text-[10.5px] tracking-[0.22em] uppercase text-redorange mb-6">{it.tag}</div>
              <h3 className="font-display text-navy text-[clamp(22px,2.1vw,32px)] leading-[1.18]" style={{ fontWeight: 400 }}>{it.title}</h3>
              <div className="mt-6 text-[12px] font-mono tracking-[0.14em] text-navy/50 uppercase flex items-center justify-between">
                <span>6 min read</span>
                <span className="text-redorange group-hover:translate-x-1 transition-transform">Read →</span>
              </div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
};

// CTA band + footer
const CTAv2 = () => (
  <section id="talk" className="relative overflow-hidden bg-navy-ink text-white">
    <div className="grain" />
    <svg aria-hidden="true" viewBox="0 0 600 400" className="absolute inset-0 w-full h-full opacity-[0.05]" preserveAspectRatio="xMidYMid slice">
      <path d="M60 80 L540 80 L60 320 L540 320" fill="none" stroke="#E8472C" strokeWidth="3"/>
    </svg>
    <div className="absolute -right-20 -top-20 w-[520px] h-[520px] rounded-full bg-redorange/25 blur-3xl"/>
    <div className="absolute -left-40 bottom-0 w-[420px] h-[420px] rounded-full bg-sky2/15 blur-3xl"/>
    <div className="relative max-w-[1440px] mx-auto px-8 py-32 grid lg:grid-cols-12 gap-10 items-end">
      <div className="lg:col-span-8 reveal">
        <div className="flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-6">
          <span className="dash" /><span>06 · Start the conversation</span>
        </div>
        <h2 className="font-display text-[clamp(40px,5.6vw,84px)] leading-[1.02]" style={{ fontWeight: 300 }}>
          Tell us the outcome <br/>you want. We&rsquo;ll tell you <br/><em className="italic text-white/80">if we&rsquo;re the team.</em>
        </h2>
      </div>
      <div className="lg:col-span-4 reveal delay-2 flex flex-col gap-5 lg:pl-8 lg:border-l lg:border-white/15">
        <p className="text-[15px] leading-[1.7] text-white/70 max-w-[360px]">
          Thirty minutes. One of the partners, not a sales desk. No deck. You describe the outcome. We tell you honestly whether we can ship it, and for what.
        </p>
        <a href="#" className="group inline-flex items-center gap-3 bg-redorange text-white px-7 py-5 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-all duration-300 self-start shadow-[0_20px_50px_-14px_rgba(232,71,44,.8)]">
          Book a consultation
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
        <div className="text-[12px] font-mono tracking-[0.08em] text-white/50 mt-2">
          Typical reply within one working day.
        </div>
      </div>
    </div>
  </section>
);

const FooterV2 = () => (
  <footer className="relative bg-navy-ink text-white/70 border-t border-white/10">
    <div className="max-w-[1440px] mx-auto px-8 pt-20 pb-12 grid lg:grid-cols-12 gap-12">
      <div className="lg:col-span-5">
        <LogoFullLight height={62} />
        <p className="mt-8 text-[13.5px] leading-[1.7] text-white/55 max-w-[340px]">
          An independent Workday practice for the SMBs that are the backbone of the economy. UK-built. EMEA-delivered.
        </p>
        <div className="mt-8 flex flex-col gap-1 text-[13px] text-white/65">
          <div>Zeneesha Ltd.</div>
          <div>14 Finsbury Circus, London EC2M 7EB</div>
          <div className="mt-3 flex items-center gap-2"><span className="text-white/40">T</span> +44 (0) 20 8090 4040</div>
          <div className="flex items-center gap-2"><span className="text-white/40">E</span> hello@zeneesha.co.uk</div>
        </div>
      </div>
      {[
        { title: 'Practice', links: ['Financials', 'HCM', 'Analytics', 'Managed Services'] },
        { title: 'Company', links: ['About', 'People', 'Careers', 'Press'] },
        { title: 'Resources', links: ['Field notes', 'Case studies', 'Events', 'Newsletter'] },
      ].map((c) => (
        <div key={c.title} className="lg:col-span-2">
          <div className="font-mono text-[10.5px] tracking-[0.22em] text-white/40 uppercase mb-5">{c.title}</div>
          <ul className="space-y-3">
            {c.links.map((l) => <li key={l}><a href="#" className="text-[14px] text-white/80 hover:text-redorange">{l}</a></li>)}
          </ul>
        </div>
      ))}
      <div className="lg:col-span-1 flex lg:flex-col gap-2">
        {['in','X','Ig'].map((s) => (
          <a key={s} href="#" className="w-9 h-9 border border-white/20 rounded-full flex items-center justify-center text-[11px] hover:border-redorange hover:text-redorange transition-colors">{s}</a>
        ))}
      </div>
    </div>
    <div className="relative max-w-[1440px] mx-auto px-8 pb-6 overflow-hidden">
      <div className="font-display text-white/[0.05] text-[clamp(80px,16vw,240px)] leading-[0.8] select-none" style={{ fontWeight: 300, letterSpacing: '-0.04em' }}>
        Outcomes.
      </div>
    </div>
    <div className="border-t border-white/10">
      <div className="max-w-[1440px] mx-auto px-8 py-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-3 text-[11.5px] font-mono tracking-[0.08em] text-white/40">
        <div>© 2026 Zeneesha Ltd. Registered in England &amp; Wales, No. 14872091. VAT GB 412 8837 54.</div>
        <div className="flex items-center gap-5">
          <a href="/" className="text-white/60 hover:text-redorange">View homepage v1</a>
          <a href="#" className="hover:text-redorange">Privacy</a>
          <a href="#" className="hover:text-redorange">Terms</a>
        </div>
      </div>
    </div>
  </footer>
);

const WA = () => {
  const [hover, setHover] = React.useState(false);
  return (
    <a href="https://wa.me/442080904040" target="_blank" rel="noreferrer"
      onMouseEnter={() => setHover(true)} onMouseLeave={() => setHover(false)}
      className="floaty fixed right-6 bottom-6 z-[80] flex items-center gap-3 bg-[#25D366] text-white rounded-full shadow-[0_18px_40px_-12px_rgba(37,211,102,.55)] transition-all duration-500"
      style={{ padding: hover ? '10px 18px 10px 10px' : '10px' }}
      aria-label="Chat on WhatsApp">
      <svg width="26" height="26" viewBox="0 0 32 32" aria-hidden="true">
        <path fill="#fff" d="M16 3C8.8 3 3 8.8 3 16c0 2.3.6 4.5 1.7 6.4L3 29l6.8-1.8c1.9 1 4 1.6 6.2 1.6 7.2 0 13-5.8 13-13S23.2 3 16 3z"/>
        <path fill="#25D366" d="M16 4.8c-6.2 0-11.2 5-11.2 11.2 0 2.1.6 4.1 1.6 5.8l-1.1 4 4.1-1.1c1.6 1 3.5 1.5 5.6 1.5 6.2 0 11.2-5 11.2-11.2S22.2 4.8 16 4.8zm6.6 15.9c-.3.8-1.7 1.5-2.3 1.6-.6.1-1.4.1-2.2-.1-.5-.2-1.2-.4-2.1-.8-3.7-1.6-6.1-5.4-6.3-5.6-.2-.3-1.5-2-1.5-3.8s.9-2.7 1.3-3.1c.3-.4.7-.4 1-.4h.7c.2 0 .5-.1.8.6.3.7 1 2.5 1.1 2.7.1.2.1.4 0 .6-.1.2-.2.4-.4.6l-.5.6c-.2.2-.4.4-.2.7.2.3.9 1.5 2 2.5 1.4 1.3 2.6 1.7 2.9 1.8.3.1.5.1.7-.1.2-.2.8-.9 1-1.2.2-.3.4-.3.7-.2.3.1 1.9.9 2.2 1 .3.2.5.2.6.4.1.2.1.9-.2 1.7z"/>
      </svg>
      <span className={`overflow-hidden transition-all duration-500 text-[13px] font-medium whitespace-nowrap ${hover ? 'max-w-[160px] opacity-100' : 'max-w-0 opacity-0'}`}>
        Chat on WhatsApp
      </span>
    </a>
  );
};

Object.assign(window, { People, Clients, InsightsV2, CTAv2, FooterV2, WA });
