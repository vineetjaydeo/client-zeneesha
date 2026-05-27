// ── Zeneesha V4 CTA Band + Footer ────────────────────

const CTABandV4 = () => (
  <section id="talk" className="relative overflow-hidden bg-navy text-white">
    <div className="grain" />
    <svg aria-hidden="true" viewBox="0 0 600 400" className="absolute inset-0 w-full h-full opacity-[0.04]" preserveAspectRatio="xMidYMid slice">
      <path d="M60 80 L540 80 L60 320 L540 320" fill="none" stroke="#E8472C" strokeWidth="3" />
    </svg>
    <div className="absolute -right-20 -top-20 w-[520px] h-[520px] rounded-full bg-redorange/18 blur-3xl" />
    <div className="absolute -left-40 bottom-0 w-[420px] h-[420px] rounded-full bg-sky2/8 blur-3xl" />

    <div className="relative max-w-[1440px] mx-auto px-8 py-32 grid lg:grid-cols-12 gap-16 items-start">

      {/* Left copy */}
      <div className="lg:col-span-6">
        <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-6">
          <span className="w-6 h-px bg-redorange" />
          Complimentary Health Check
        </div>

        <h2 className="reveal delay-1 font-sans text-white text-[clamp(32px,4.8vw,64px)] leading-[1.06]" style={{ fontWeight: 300 }}>
          Your Complimentary Workday Health Check.{' '}
          <span style={{ color: 'rgba(255,255,255,0.55)' }}>No Obligation.</span>
        </h2>

        <p className="reveal delay-2 mt-6 text-[20px] leading-[1.6] text-white/65 max-w-[480px]" style={{ fontWeight: 300 }}>
          In 60 minutes, we'll review your Workday setup and give you a clear picture of where value is being lost — and how to recover it.
        </p>

        <div className="reveal delay-3 mt-10 flex flex-wrap items-center gap-4">
          <a
            href="mailto:hello@zeneesha.co.uk"
            className="inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[18px] font-medium hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,0.65)]"
          >
            Book Your Complimentary Health Check
            <IconArrow size={14} />
          </a>
        </div>

        <div className="reveal delay-4 mt-4 flex items-center gap-2 text-[13px] font-mono tracking-[0.08em] text-white/40">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
            <path d="M20 6L9 17l-5-5" />
          </svg>
          No cost · No obligation · Typical reply within one working day
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
              Book My Complimentary Health Check
              <IconArrow size={14} />
            </button>
          </form>
        </div>
      </div>

    </div>
  </section>
);

const FooterV4 = () => {
  const cols = [
    { title: 'Company',  links: ['About', 'Our Team', 'Careers', 'Press'] },
    { title: 'Services', links: ['Implementation', 'AMS & Support', 'Optimise', 'Health Check'] },
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
            An independent Workday practice focused entirely on post-go-live value. Built in the UK. Delivered across EMEA.
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
            Join Us for a Coffee Chat <IconArrow size={12} />
          </a>
          <div className="mt-5 text-[14px] text-white/55 leading-[1.65]" style={{ fontWeight: 300 }}>
            Office hours.<br />Mon–Fri, 09:00–17:00 GMT.
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

Object.assign(window, { CTABandV4, FooterV4 });
