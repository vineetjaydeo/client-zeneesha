// ── Zeneesha V3 Proof , Testimonial + Case Study ─────
const ProofV3 = () => {
  const metrics = [
    { value: '700%', label: 'Faster sprint turnaround after optimisation' },
    { value: '2→16', label: 'Tickets per sprint, post-restructure' },
    { value: '95%',  label: 'User adoption at month three' },
  ];

  return (
    <section id="proof" className="relative py-28 bg-cream overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8">

        {/* Section eyebrow */}
        <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
          <span className="w-6 h-px bg-redorange" />
          Case Study
        </div>

        {/* Case study headline */}
        <h2 className="reveal delay-1 font-sans text-navy text-[clamp(32px,4vw,56px)] leading-[1.06] mb-16 max-w-[800px]" style={{ fontWeight: 300 }}>
          From Workday backlog to 700% faster sprint turnaround.
        </h2>

        <div className="grid lg:grid-cols-12 gap-16">

          {/* ── Left: client card ── */}
          <div className="lg:col-span-5 reveal">
            <div className="relative border border-navy/12 bg-white p-8 flex flex-col justify-between">
              {/* Abstract client visual */}
              <div className="relative w-full aspect-[5/4] border border-navy/10 bg-cream overflow-hidden">
                <div className="absolute inset-0">
                  <div className="absolute left-0 top-0 w-1/2 h-1/2 bg-navy/[0.05]" />
                  <div className="absolute right-0 top-0 w-1/2 h-1/2 bg-redorange/8" />
                  <div className="absolute left-0 bottom-0 w-1/2 h-1/2 bg-orange2/8" />
                  <div className="absolute right-0 bottom-0 w-1/2 h-1/2 bg-sky2/8" />
                  <svg className="absolute inset-0 w-full h-full" viewBox="0 0 200 160" preserveAspectRatio="none">
                    <path d="M20 30 L180 30 L20 130 L180 130" fill="none" stroke="#1E3A8A" strokeOpacity=".3" strokeWidth="2" />
                  </svg>
                </div>
                <div className="absolute left-3 top-3 font-mono text-[9px] tracking-[0.18em] text-navy/60 uppercase bg-white/80 px-2 py-0.5">AQA Education</div>
                <div className="absolute right-3 bottom-3 font-mono text-[9px] tracking-[0.18em] text-navy/60 uppercase bg-white/80 px-2 py-0.5">Manchester · 1,400 people</div>
              </div>

              {/* Case study body */}
              <div className="mt-8">
                <p className="text-[18px] leading-[1.7] text-slate2" style={{ fontWeight: 300 }}>
                  Zeneesha helped AQA improve its Workday HCM support model by introducing a clearer intake and prioritisation process for recruitment, absence, and change requests.
                </p>
                <p className="mt-4 text-[18px] leading-[1.7] text-navy" style={{ fontWeight: 400 }}>
                  Sprint capacity increased from 2 to 16 tickets per sprint, helping the team reduce backlog and respond more effectively to the business.
                </p>
              </div>

              <div className="mt-8 pt-6 border-t border-navy/10 flex items-center justify-between gap-4">
                <div className="text-[13px] text-slate2 font-mono tracking-[0.06em]">Workday HCM &middot; AMS</div>
                <a href="#talk" className="u-link text-[16px] font-medium text-redorange whitespace-nowrap">
                  Read the case study
                  <IconArrow size={12} />
                </a>
              </div>
            </div>
          </div>

          {/* ── Right: testimonial + metrics ── */}
          <div className="lg:col-span-7 lg:pl-8 flex flex-col">

            {/* Testimonial */}
            <div className="reveal delay-2">
              <div className="flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-8">
                <span className="w-6 h-px bg-redorange" />
                Client Testimonial
              </div>
              {/* Quote mark */}
              <div className="text-redorange mb-6 font-sans leading-none select-none" style={{ fontSize: 72, fontWeight: 700, lineHeight: 1 }}>
                &ldquo;
              </div>

              <blockquote
                className="font-sans text-navy leading-[1.25]"
                style={{ fontWeight: 300, fontSize: 'clamp(22px, 2.6vw, 36px)' }}
              >
                Zeneesha provided expert, flexible support throughout our phased Workday rollout, helping us successfully manage both live operations and ongoing project delivery. Their team was professional, efficient, and instrumental in making our Workday adoption a success.
              </blockquote>

              <div className="mt-10 flex items-center gap-4">
                <div className="w-12 h-12 rounded-full bg-navy/10 border border-navy/20 flex items-center justify-center font-sans text-navy text-[20px]" style={{ fontWeight: 500 }}>GT</div>
                <div>
                  <div className="text-navy text-[18px]" style={{ fontWeight: 500 }}>Georgina Tatitt</div>
                  <div className="text-[13px] text-slate2" style={{ fontWeight: 300 }}>VP Operations &middot; AQA Education</div>
                </div>
              </div>
            </div>

            {/* Metrics */}
            <div className="reveal delay-3 mt-14 grid grid-cols-1 sm:grid-cols-3 gap-8 border-t border-navy/10 pt-10">
              {metrics.map((m) => (
                <div key={m.label}>
                  <div
                    className="font-sans text-navy leading-none num-oldstyle"
                    style={{ fontWeight: 300, fontSize: 'clamp(40px, 4.2vw, 56px)' }}
                  >
                    <span className="metric-u">{m.value}</span>
                  </div>
                  <div className="mt-4 text-[16px] text-slate2 leading-snug max-w-[160px]" style={{ fontWeight: 300 }}>
                    {m.label}.
                  </div>
                </div>
              ))}
            </div>
          </div>

        </div>
      </div>
    </section>
  );
};

Object.assign(window, { ProofV3 });
