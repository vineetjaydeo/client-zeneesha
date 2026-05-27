// ── Zeneesha V3 FAQ ──────────────────────────────────
const FAQS = [
  {
    q: 'How do I know if our Workday system needs a health check?',
    a: 'If you are seeing recurring issues, manual workarounds, reporting delays, or low adoption, it may be time to review the causes of friction.',
  },
  {
    q: 'Can Zeneesha help if Workday is already implemented?',
    a: 'Yes. Zeneesha supports post-go-live Workday environments through AMS, optimisation, reporting, releases, integrations, automation, and adoption support.',
  },
  {
    q: 'We already have an internal Workday team. Can you still help?',
    a: 'Yes. Zeneesha works alongside internal teams to add specialist expertise, extra capacity, and a clearer improvement roadmap.',
  },
  {
    q: 'Which Workday modules does Zeneesha support?',
    a: 'Zeneesha supports key Workday modules, including HCM, Finance, Adaptive Planning, and Analytics, with expertise across reporting and integrations.',
  },
  {
    q: 'What happens during a Workday Health Checkup?',
    a: 'Zeneesha reviews your Workday setup, processes, data, reporting, integrations, and adoption to identify gaps, risks, and opportunities. We also provide a roadmap for Workday optimisation.',
  },
];

const FaqV3 = () => {
  const [open, setOpen] = React.useState(null);

  const toggle = (i) => setOpen(open === i ? null : i);

  return (
    <section id="faq" className="relative py-28 bg-white overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8 grid lg:grid-cols-12 gap-16">

        {/* Left heading */}
        <div className="lg:col-span-4 lg:sticky lg:top-28 self-start">
          <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
            <span className="w-6 h-px bg-redorange" />
            Common Questions
          </div>
          <h2 className="reveal delay-1 font-sans text-navy text-[clamp(36px,4.4vw,58px)] leading-[1.06]" style={{ fontWeight: 300 }}>
            FAQ
          </h2>
          <p className="reveal delay-2 mt-6 text-[24px] leading-[1.55] text-slate2 max-w-[340px]" style={{ fontWeight: 300 }}>
            Answers to the questions we hear most from organisations evaluating Workday AMS and optimisation support.
          </p>
          <div className="reveal delay-3 mt-10">
            <a href="#talk" className="inline-flex items-center gap-3 bg-redorange text-white px-6 py-3.5 rounded-full text-[16px] font-medium hover:bg-[#D63C23] transition-all duration-300 shadow-[0_12px_30px_-10px_rgba(232,71,44,0.5)]">
              Ask us directly
              <IconArrow size={13} />
            </a>
          </div>
        </div>

        {/* Right accordion */}
        <div className="lg:col-span-7 lg:col-start-6 reveal delay-2">
          <div className="border-t border-navy/10">
            {FAQS.map((item, i) => (
              <div key={i} className="border-b border-navy/10">
                <button
                  onClick={() => toggle(i)}
                  className="w-full flex items-start justify-between gap-6 py-7 text-left"
                >
                  <span className="font-sans text-navy text-[20px] leading-snug" style={{ fontWeight: 400 }}>
                    {item.q}
                  </span>
                  <svg
                    width="20" height="20" viewBox="0 0 24 24"
                    fill="none" stroke="#E8472C" strokeWidth="1.8"
                    strokeLinecap="round" strokeLinejoin="round"
                    className="flex-shrink-0 mt-0.5 transition-transform duration-300"
                    style={{ transform: open === i ? 'rotate(180deg)' : 'none' }}
                  >
                    <path d="M6 9l6 6 6-6" />
                  </svg>
                </button>
                <div
                  className="overflow-hidden transition-all duration-400"
                  style={{ maxHeight: open === i ? '300px' : '0' }}
                >
                  <p className="pb-7 text-[18px] leading-[1.7] text-slate2" style={{ fontWeight: 300 }}>
                    {item.a}
                  </p>
                </div>
              </div>
            ))}
          </div>
        </div>

      </div>
    </section>
  );
};

Object.assign(window, { FaqV3 });
