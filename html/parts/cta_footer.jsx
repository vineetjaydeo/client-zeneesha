const CTABand = () => {
  return (
    <section id="talk" className="relative overflow-hidden bg-navy text-white">
      <div className="grain" />
      {/* Decorative giant Z */}
      <svg aria-hidden="true" viewBox="0 0 600 400" className="absolute inset-0 w-full h-full opacity-[0.05]" preserveAspectRatio="xMidYMid slice">
        <path d="M60 80 L540 80 L60 320 L540 320" fill="none" stroke="#E8472C" strokeWidth="3" />
      </svg>
      <div className="absolute -right-20 -top-20 w-[520px] h-[520px] rounded-full bg-redorange/25 blur-3xl" />
      <div className="absolute -left-40 bottom-0 w-[420px] h-[420px] rounded-full bg-sky2/15 blur-3xl" />

      <div className="relative max-w-[1400px] mx-auto px-8 py-32 grid lg:grid-cols-12 gap-10 items-end">
        <div className="lg:col-span-8">
          <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-6">
            <span className="w-6 h-px bg-redorange" />
            <span>06 · Start the conversation</span>
          </div>
          <h2 className="reveal delay-1 font-display text-white text-[clamp(40px,5.6vw,84px)] leading-[1.02]" style={{ fontWeight: 300 }}>
            Let&rsquo;s talk about what <br/>
            Workday could <em className="italic text-white/80">really</em> do <br/>
            for your business.
          </h2>
        </div>
        <div className="lg:col-span-4 reveal delay-2 flex flex-col gap-5 lg:pl-8 lg:border-l lg:border-white/15">
          <p className="text-[15px] leading-[1.7] text-white/70 max-w-[360px]">
            A thirty-minute call with a partner, not a sales desk. No deck. You tell us what hurts, we tell you what we&rsquo;d do.
          </p>
          <a href="#" className="cta-primary group inline-flex items-center gap-3 bg-redorange text-white px-7 py-5 rounded-full text-[14px] font-medium tracking-wide hover:bg-[#D63C23] transition-all duration-300 self-start">
            Start the conversation
            <IconArrow size={14} className="caret" />
          </a>
          <div className="text-[12px] font-mono tracking-[0.08em] text-white/50 mt-2">
            Typical reply within one working day.
          </div>
        </div>
      </div>
    </section>
  );
};

const Footer = () => {
  const cols = [
    { title: 'Company', links: ['About', 'Our team', 'Careers', 'Press'] },
    { title: 'Services', links: ['Financials', 'HCM', 'Analytics', 'Managed Services'] },
    { title: 'Insights', links: ['Field notes', 'Case studies', 'Newsletter', 'Events'] },
  ];

  return (
    <footer className="relative bg-navy-ink text-white/70">
      <div className="max-w-[1400px] mx-auto px-8 pt-24 pb-12 grid lg:grid-cols-12 gap-12">
        <div className="lg:col-span-4">
          <div className="mb-5">
            <img src="assets/zeneesha-logo-light.png" alt="Zeneesha — Partners in Growth" style={{ height: 56, width: 'auto', display: 'block' }} />
          </div>
          <p className="mt-8 text-[13.5px] leading-[1.7] text-white/55 max-w-[320px]">
            An independent Workday practice for the SMBs that are the backbone of the economy. UK-built. EMEA-delivered.
          </p>

          <div className="mt-8 flex flex-col gap-1 text-[13px] text-white/65">
            <div>Zeneesha Ltd.</div>
            <div>14 Finsbury Circus, London EC2M 7EB</div>
            <div className="mt-3 flex items-center gap-2"><span className="text-white/40">T</span> +44 (0) 20 8090 4040</div>
            <div className="flex items-center gap-2"><span className="text-white/40">E</span> hello@zeneesha.co.uk</div>
          </div>
        </div>

        {cols.map((c) => (
          <div key={c.title} className="lg:col-span-2">
            <div className="font-mono text-[10.5px] tracking-[0.22em] text-white/40 uppercase mb-5">{c.title}</div>
            <ul className="space-y-3">
              {c.links.map((l) => (
                <li key={l}>
                  <a href="#" className="text-[14px] text-white/80 hover:text-redorange transition-colors duration-300">{l}</a>
                </li>
              ))}
            </ul>
          </div>
        ))}

        <div className="lg:col-span-2">
          <div className="font-mono text-[10.5px] tracking-[0.22em] text-white/40 uppercase mb-5">Contact</div>
          <a href="#" className="u-link text-[14px] text-white mb-3">Book a consultation <IconArrow size={12}/></a>
          <div className="mt-5 text-[12.5px] text-white/60 leading-[1.65]">
            Office hours.<br/>Mon — Fri, 09:00 — 18:00 GMT.
          </div>
          <div className="mt-6 flex gap-2">
            <a href="#" className="w-9 h-9 border border-white/20 rounded-full flex items-center justify-center text-[11px] hover:border-redorange hover:text-redorange transition-colors">in</a>
            <a href="#" className="w-9 h-9 border border-white/20 rounded-full flex items-center justify-center text-[11px] hover:border-redorange hover:text-redorange transition-colors">X</a>
            <a href="#" className="w-9 h-9 border border-white/20 rounded-full flex items-center justify-center text-[11px] hover:border-redorange hover:text-redorange transition-colors">Ig</a>
          </div>
        </div>
      </div>

      {/* Giant wordmark */}
      <div className="relative max-w-[1400px] mx-auto px-8 pb-6 overflow-hidden">
        <div className="font-display text-white/[0.05] text-[clamp(80px,16vw,240px)] leading-[0.8] select-none" style={{ fontWeight: 300, letterSpacing: '-0.04em' }}>
          Zeneesha.
        </div>
      </div>

      <div className="border-t border-white/10">
        <div className="max-w-[1400px] mx-auto px-8 py-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-3 text-[11.5px] font-mono tracking-[0.08em] text-white/40">
          <div>© 2026 Zeneesha Ltd. Registered in England &amp; Wales, No. 14872091. VAT GB 412 8837 54.</div>
          <div className="flex items-center gap-5">
            <a href="#" className="hover:text-redorange">Privacy</a>
            <a href="#" className="hover:text-redorange">Terms</a>
            <a href="#" className="hover:text-redorange">Modern slavery</a>
          </div>
        </div>
      </div>
    </footer>
  );
};

const WhatsAppButton = () => {
  const [hover, setHover] = React.useState(false);
  return (
    <a
      href="https://wa.me/442080904040"
      target="_blank"
      rel="noreferrer"
      onMouseEnter={() => setHover(true)}
      onMouseLeave={() => setHover(false)}
      className="floaty fixed right-6 bottom-6 z-[80] flex items-center gap-3 bg-[#25D366] text-white rounded-full shadow-[0_18px_40px_-12px_rgba(37,211,102,.55)] hover:shadow-[0_22px_50px_-10px_rgba(37,211,102,.7)] transition-all duration-500"
      style={{ padding: hover ? '10px 18px 10px 10px' : '10px' }}
      aria-label="Chat on WhatsApp"
    >
      <IconWhatsApp size={32} />
      <span className={`overflow-hidden transition-all duration-500 text-[13px] font-medium whitespace-nowrap ${hover ? 'max-w-[160px] opacity-100' : 'max-w-0 opacity-0'}`}>
        Chat on WhatsApp
      </span>
    </a>
  );
};

Object.assign(window, { CTABand, Footer, WhatsAppButton });
