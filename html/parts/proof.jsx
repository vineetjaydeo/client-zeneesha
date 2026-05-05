const Proof = () => {
  const metrics = [
    { value: '6 wk', label: 'go-live from signed SOW' },
    { value: '£180K', label: 'saved in year one' },
    { value: '92%', label: 'user adoption at month three' },
  ];

  return (
    <section id="proof" className="relative py-32 bg-white overflow-hidden">
      <div className="max-w-[1400px] mx-auto px-8 grid lg:grid-cols-12 gap-12">
        {/* Left card — client */}
        <div className="lg:col-span-5 reveal">
          <div className="flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
            <span className="w-6 h-px bg-redorange" />
            <span>04 · A recent partnership</span>
          </div>
          <div className="relative border border-navy/12 bg-cream p-8 min-h-[440px] flex flex-col justify-between">
            {/* Abstract client visual */}
            <div className="relative w-full aspect-[5/4] border border-navy/10 bg-white overflow-hidden">
              <div className="absolute inset-0">
                <div className="absolute left-0 top-0 w-1/2 h-1/2 bg-navy/[0.06]" />
                <div className="absolute right-0 top-0 w-1/2 h-1/2 bg-redorange/10" />
                <div className="absolute left-0 bottom-0 w-1/2 h-1/2 bg-orange2/10" />
                <div className="absolute right-0 bottom-0 w-1/2 h-1/2 bg-sky2/10" />
                <svg className="absolute inset-0 w-full h-full" viewBox="0 0 200 160" preserveAspectRatio="none">
                  <path d="M20 30 L180 30 L20 130 L180 130" fill="none" stroke="#1E3A8A" strokeOpacity=".35" strokeWidth="2" />
                </svg>
              </div>
              <div className="absolute left-3 top-3 font-mono text-[9px] tracking-[0.18em] text-navy/60 uppercase bg-white/80 px-2 py-0.5">Harlow Biosciences</div>
              <div className="absolute right-3 bottom-3 font-mono text-[9px] tracking-[0.18em] text-navy/60 uppercase bg-white/80 px-2 py-0.5">Oxford · 214 people</div>
            </div>
            <div className="mt-8 pt-6 border-t border-navy/10 flex items-start justify-between gap-4">
              <div>
                <div className="font-display text-navy text-[20px]" style={{ fontWeight: 400 }}>Harlow Biosciences</div>
                <div className="text-[12px] text-slate2 mt-1 font-mono tracking-[0.06em]">Workday Financials &middot; Adaptive Planning</div>
              </div>
              <a href="#" className="u-link text-[13px] font-medium text-redorange whitespace-nowrap">
                Read case
                <IconArrow size={12} />
              </a>
            </div>
          </div>
        </div>

        {/* Right — pull quote */}
        <div className="lg:col-span-7 lg:pl-8 flex flex-col justify-between">
          <div className="reveal delay-2">
            <div className="text-redorange mb-8">
              <IconQuote size={48} />
            </div>
            <blockquote className="font-display text-navy text-[clamp(26px,3vw,42px)] leading-[1.22]" style={{ fontWeight: 300 }}>
              <em className="italic text-navy/75">&ldquo;They arrived without a deck,&rdquo;</em> our CFO said afterwards, and that was the moment I knew we&rsquo;d chosen well. Zeneesha spent a week inside the close before recommending anything. By go-live we weren&rsquo;t a client, we were a team that had borrowed four excellent colleagues for six months.
            </blockquote>
            <div className="mt-10 flex items-center gap-4">
              <div className="w-12 h-12 rounded-full bg-navy/10 border border-navy/20 flex items-center justify-center font-display text-navy text-[18px]" style={{ fontWeight: 400 }}>AM</div>
              <div>
                <div className="text-navy text-[14px] font-medium">Aisha Mensah</div>
                <div className="text-[12px] text-slate2">VP People &amp; Operations &middot; Harlow Biosciences</div>
              </div>
            </div>
          </div>

          {/* Metrics */}
          <div className="reveal delay-3 mt-16 grid grid-cols-1 sm:grid-cols-3 gap-8 border-t border-navy/10 pt-10">
            {metrics.map((m) => (
              <div key={m.label}>
                <div className="font-display text-navy text-[clamp(42px,4.5vw,60px)] leading-none num-oldstyle" style={{ fontWeight: 300 }}>
                  <span className="metric-u">{m.value}</span>
                </div>
                <div className="mt-5 text-[13px] text-slate2 leading-snug max-w-[180px]">{m.label}.</div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { Proof });
