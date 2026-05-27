// ── Zeneesha V3 Video Section ────────────────────────
const VideoV3 = () => {
  const [playing, setPlaying] = React.useState(false);

  const handlePlay = () => setPlaying(true);

  return (
    <section className="relative py-28 bg-cream2 overflow-hidden">
      {/* Subtle bg texture */}
      <div className="grain" />

      <div className="relative max-w-[1440px] mx-auto px-8 grid lg:grid-cols-12 gap-16 items-center">

        {/* ── Thumbnail / Player ── */}
        <div className="lg:col-span-6 reveal">
          <div className="relative aspect-video bg-navy-ink rounded-[3px] overflow-hidden shadow-[0_40px_100px_-24px_rgba(14,30,74,0.4)] cursor-pointer group" onClick={handlePlay}>
            {!playing ? (
              <>
                {/* Poster , SVG placeholder */}
                <div className="absolute inset-0 flex items-end justify-between p-5"
                  style={{ background: 'linear-gradient(160deg, #152C6A 0%, #0E1E4A 100%)' }}>
                  {/* abstract chart lines */}
                  <svg className="absolute inset-0 w-full h-full opacity-20" viewBox="0 0 800 450" preserveAspectRatio="xMidYMid slice">
                    <path d="M0 300 L150 240 L300 260 L450 160 L600 120 L800 60" fill="none" stroke="#3B9EDB" strokeWidth="2.5" />
                    <path d="M0 360 L150 350 L300 340 L450 300 L600 280 L800 230" fill="none" stroke="#E8472C" strokeWidth="2" />
                    <g stroke="#fff" strokeOpacity=".08" strokeWidth="1">
                      {Array.from({ length: 6 }).map((_, i) => (
                        <line key={i} x1="0" y1={i * 75} x2="800" y2={i * 75} />
                      ))}
                    </g>
                  </svg>

                  {/* Label */}
                  <div className="font-mono text-[11px] tracking-[0.2em] uppercase text-white/60 bg-white/10 px-2.5 py-1 rounded-sm">
                    Workday Value Briefing
                  </div>

                  {/* Duration */}
                  <div className="font-mono text-[11px] tracking-[0.12em] text-white/50">
                    12:34
                  </div>
                </div>

                {/* Play button */}
                <div className="absolute inset-0 flex items-center justify-center">
                  <div className="w-20 h-20 rounded-full bg-white/95 flex items-center justify-center shadow-[0_12px_40px_rgba(0,0,0,0.3)] group-hover:scale-110 transition-transform duration-300">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="#E8472C">
                      <polygon points="5,3 19,12 5,21" />
                    </svg>
                  </div>
                </div>
              </>
            ) : (
              <iframe
                className="absolute inset-0 w-full h-full"
                src="https://www.youtube.com/embed/?autoplay=1"
                title="Workday Value Briefing"
                frameBorder="0"
                allow="autoplay; encrypted-media"
                allowFullScreen
              />
            )}
          </div>
        </div>

        {/* ── Copy ── */}
        <div className="lg:col-span-5 lg:col-start-8 reveal delay-2">
          <div className="flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
            <span className="w-6 h-px bg-redorange" />
            Watch &amp; Learn
          </div>

          <h2 className="font-sans text-navy text-[clamp(28px,3.2vw,44px)] leading-[1.18]" style={{ fontWeight: 300 }}>
            Lorem ipsum dolor sit amet consectetur adipiscing elit
          </h2>

          <p className="mt-6 text-[20px] leading-[1.68] text-slate2 max-w-[440px]" style={{ fontWeight: 300 }}>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
          </p>

          <div className="mt-8 flex flex-wrap items-center gap-4">
            <a
              href="#talk"
              className="inline-flex items-center gap-3 bg-redorange text-white px-6 py-3.5 rounded-full text-[16px] font-medium hover:bg-[#D63C23] transition-all duration-300 shadow-[0_12px_30px_-10px_rgba(232,71,44,0.55)]"
            >
              Talk to a Specialist
              <IconArrow size={13} />
            </a>
            <a href="#services" className="u-link text-[16px] font-medium text-navy">
              Explore our services
              <IconArrow size={12} />
            </a>
          </div>
        </div>

      </div>
    </section>
  );
};

Object.assign(window, { VideoV3 });
