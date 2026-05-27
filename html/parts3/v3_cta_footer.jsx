// ── Zeneesha V3 CTA, Contact & Footer ────────────────

const CTABandV3 = () => (
  <section id="talk" className="relative overflow-hidden bg-navy text-white">
    <div className="grain" />
    <svg aria-hidden="true" viewBox="0 0 600 400" className="absolute inset-0 w-full h-full opacity-[0.05]" preserveAspectRatio="xMidYMid slice">
      <path d="M60 80 L540 80 L60 320 L540 320" fill="none" stroke="#E8472C" strokeWidth="3" />
    </svg>
    <div className="absolute -right-20 -top-20 w-[520px] h-[520px] rounded-full bg-redorange/20 blur-3xl" />
    <div className="absolute -left-40 bottom-0 w-[420px] h-[420px] rounded-full bg-sky2/10 blur-3xl" />

    <div className="relative max-w-[1440px] mx-auto px-8 py-32 grid lg:grid-cols-12 gap-16 items-start">

      {/* Left copy */}
      <div className="lg:col-span-6">
        <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-6">
          <span className="w-6 h-px bg-redorange" />
          Get in Touch
        </div>
        <h2 className="reveal delay-1 font-sans text-white text-[clamp(36px,5vw,72px)] leading-[1.06]" style={{ fontWeight: 300 }}>
          How optimised is your Workday performance?
        </h2>
        <p className="reveal delay-2 mt-6 text-[24px] leading-[1.55] text-white/65 max-w-[460px]" style={{ fontWeight: 300 }}>
          Zeneesha helps uncover operational gaps, reduce friction, and shape a clear roadmap for continuous improvement.
        </p>
        <div className="reveal delay-3 mt-10 flex flex-wrap items-center gap-4">
          <a
            href="mailto:hello@zeneesha.co.uk"
            className="inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[18px] font-medium hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,0.65)]"
          >
            Request a Workday Health Checkup
            <IconArrow size={14} />
          </a>
        </div>
        <div className="reveal delay-4 mt-6 text-[13px] font-mono tracking-[0.08em] text-white/45">
          Typical reply within one working day.
        </div>
      </div>

      {/* Right contact form */}
      <div className="lg:col-span-5 lg:col-start-8 reveal delay-3">
        <div className="bg-white/[0.06] border border-white/10 rounded-[4px] p-8">
          <div className="font-mono text-[11px] tracking-[0.2em] uppercase text-white/50 mb-6">Send a message</div>

          <form onSubmit={(e) => e.preventDefault()} className="space-y-5">
            <div className="grid grid-cols-2 gap-4">
              <div>
                <label className="block font-mono text-[11px] tracking-[0.12em] uppercase text-white/50 mb-2">
                  Name <span className="text-redorange">*</span>
                </label>
                <input
                  type="text" required placeholder="Your full name"
                  className="w-full bg-white/7 border border-white/12 rounded-sm px-4 py-3 text-[18px] text-white placeholder-white/25 outline-none focus:border-redorange/60 transition-colors duration-200"
                  style={{ fontFamily: 'inherit', fontStyle: 'normal' }}
                />
              </div>
              <div>
                <label className="block font-mono text-[11px] tracking-[0.12em] uppercase text-white/50 mb-2">Phone</label>
                <input
                  type="tel" placeholder="+44 ..."
                  className="w-full bg-white/7 border border-white/12 rounded-sm px-4 py-3 text-[18px] text-white placeholder-white/25 outline-none focus:border-redorange/60 transition-colors duration-200"
                  style={{ fontFamily: 'inherit', fontStyle: 'normal' }}
                />
              </div>
            </div>

            <div>
              <label className="block font-mono text-[11px] tracking-[0.12em] uppercase text-white/50 mb-2">
                Email <span className="text-redorange">*</span>
              </label>
              <input
                type="email" required placeholder="you@company.com"
                className="w-full bg-white/7 border border-white/12 rounded-sm px-4 py-3 text-[18px] text-white placeholder-white/25 outline-none focus:border-redorange/60 transition-colors duration-200"
                style={{ fontFamily: 'inherit', fontStyle: 'normal' }}
              />
            </div>

            <div>
              <label className="block font-mono text-[11px] tracking-[0.12em] uppercase text-white/50 mb-2">Message</label>
              <textarea
                rows={4} placeholder="Tell us about your Workday environment..."
                className="w-full bg-white/7 border border-white/12 rounded-sm px-4 py-3 text-[18px] text-white placeholder-white/25 outline-none focus:border-redorange/60 transition-colors duration-200 resize-none"
                style={{ fontFamily: 'inherit', fontStyle: 'normal' }}
              />
            </div>

            <button
              type="submit"
              className="w-full inline-flex items-center justify-center gap-3 bg-redorange text-white px-6 py-4 rounded-full text-[18px] font-medium hover:bg-[#D63C23] transition-all duration-300 shadow-[0_12px_30px_-10px_rgba(232,71,44,0.5)]"
            >
              Send Message
              <IconArrow size={14} />
            </button>
          </form>
        </div>
      </div>

    </div>
  </section>
);

const FooterV3 = () => {
  const cols = [
    { title: 'Company', links: ['About', 'Our Team', 'Careers', 'Press'] },
    { title: 'Services', links: ['Implementation', 'AMS & Support', 'Maximise', 'Health Check'] },
    { title: 'Insights', links: ['Field Notes', 'Case Studies', 'Newsletter', 'Events'] },
  ];

  return (
    <footer className="relative bg-navy-ink text-white/70">
      <div className="max-w-[1440px] mx-auto px-8 pt-24 pb-12 grid lg:grid-cols-12 gap-12">

        <div className="lg:col-span-4">
          <div className="mb-5">
            <LogoFullLight height={44} />
          </div>
          <p className="mt-8 text-[16px] leading-[1.7] text-white/55 max-w-[320px]" style={{ fontWeight: 300 }}>
            An independent Workday practice focused entirely on post-go-live value. UK-built. EMEA-delivered.
          </p>

          <div className="mt-8 flex flex-col gap-1.5 text-[16px] text-white/65" style={{ fontWeight: 300 }}>
            <div>Zeneesha Ltd.</div>
            <div>14 Finsbury Circus, London EC2M 7EB</div>
            <div className="mt-3 flex items-center gap-2"><span className="text-white/40">T</span> +44 (0) 20 8090 4040</div>
            <div className="flex items-center gap-2"><span className="text-white/40">E</span> hello@zeneesha.co.uk</div>
          </div>
        </div>

        {cols.map((c) => (
          <div key={c.title} className="lg:col-span-2">
            <div className="font-mono text-[11px] tracking-[0.22em] text-white/40 uppercase mb-5">{c.title}</div>
            <ul className="space-y-3">
              {c.links.map((l) => (
                <li key={l}>
                  <a href="#" className="text-[18px] text-white/75 hover:text-redorange transition-colors duration-300" style={{ fontWeight: 300 }}>{l}</a>
                </li>
              ))}
            </ul>
          </div>
        ))}

        <div className="lg:col-span-2">
          <div className="font-mono text-[11px] tracking-[0.22em] text-white/40 uppercase mb-5">Contact</div>
          <a href="#talk" className="u-link text-[18px] text-white mb-3">
            Book a consultation <IconArrow size={12} />
          </a>
          <div className="mt-5 text-[14px] text-white/55 leading-[1.65]" style={{ fontWeight: 300 }}>
            Office hours.<br />Mon to Fri, 09:00 , 18:00 GMT.
          </div>
          <div className="mt-6 flex gap-2">
            {['in', 'X', 'Ig'].map((s) => (
              <a key={s} href="#" className="w-9 h-9 border border-white/20 rounded-full flex items-center justify-center text-[12px] hover:border-redorange hover:text-redorange transition-colors">{s}</a>
            ))}
          </div>
        </div>
      </div>

      <div className="border-t border-white/10">
        <div className="max-w-[1440px] mx-auto px-8 py-5 flex flex-col md:flex-row items-start md:items-center justify-between gap-3 text-[13px] font-mono tracking-[0.08em] text-white/40">
          <div>&copy; 2026 Zeneesha Ltd. Registered in England &amp; Wales, No. 14872091. VAT GB 412 8837 54.</div>
          <div className="flex items-center gap-5">
            <a href="#" className="hover:text-redorange">Privacy</a>
            <a href="#" className="hover:text-redorange">Terms</a>
          </div>
        </div>
      </div>
    </footer>
  );
};

const WhatsAppButtonV3 = () => {
  const [hover, setHover] = React.useState(false);
  return (
    <a
      href="https://wa.me/442080904040"
      target="_blank"
      rel="noreferrer"
      onMouseEnter={() => setHover(true)}
      onMouseLeave={() => setHover(false)}
      className="floaty fixed right-5 z-[80] bg-[#25D366] text-white rounded-full shadow-[0_18px_40px_-12px_rgba(37,211,102,.55)] hover:shadow-[0_22px_50px_-10px_rgba(37,211,102,.7)] transition-all duration-500"
      style={{
        bottom: 'var(--wa-bottom, 24px)',
        display: 'inline-flex', alignItems: 'center', justifyContent: 'center',
        width: hover ? 'auto' : '66px', height: '66px',
        padding: hover ? '0 22px 0 14px' : '0',
        gap: hover ? '10px' : '0',
      }}
      aria-label="Chat on WhatsApp"
    >
      <IconWhatsApp size={38} />
      <span className={`overflow-hidden transition-all duration-500 text-[17px] font-medium whitespace-nowrap ${hover ? 'max-w-[180px] opacity-100' : 'max-w-0 opacity-0'}`}>
        Chat on WhatsApp
      </span>
    </a>
  );
};

Object.assign(window, { CTABandV3, FooterV3, WhatsAppButtonV3 });
