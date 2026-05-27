// ── Zeneesha V3 Services ─────────────────────────────
const ServicesV3 = () => {
  const services = [
    {
      num: '01',
      title: 'Implementation',
      desc: 'Implementation, planning, migration, testing, go-live support, and change management.',
      tags: ['HCM', 'Finance', 'Adaptive Planning', 'Integrations'],
      featured: false,
    },
    {
      num: '02',
      title: 'AMS & Support',
      desc: 'AMS, health checks, enhancements, releases, reporting, and insights.',
      tags: ['Incident Management', 'Release Support', 'Configuration', 'Reporting'],
      featured: true,
    },
    {
      num: '03',
      title: 'Maximise',
      desc: 'Automation, adoption, analytics, integrations, extensions, and rollouts.',
      tags: ['Optimisation', 'Automation', 'Analytics', 'AI Innovation'],
      featured: false,
    },
  ];

  return (
    <section id="services" className="relative py-28 bg-white overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8">

        {/* Header */}
        <div className="grid lg:grid-cols-12 gap-10 mb-16 items-center">
          <div className="lg:col-span-5">
            <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              What We Do
            </div>
            <h2 className="reveal delay-1 font-sans text-navy text-[clamp(36px,4.6vw,60px)] leading-[1.06]" style={{ fontWeight: 300 }}>
              Your Trusted Partner Across the Entire Workday Lifecycle
            </h2>
          </div>
          <div className="lg:col-span-6 lg:col-start-7 reveal delay-2 flex items-center">
            <p className="text-[24px] leading-[1.55] text-slate2 max-w-[520px]" style={{ fontWeight: 300 }}>
              From implementation and optimisation to automation, Zeneesha helps teams shape, support, and maximise Workday.
            </p>
          </div>
        </div>

        {/* Service cards */}
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-px bg-navy/10 border border-navy/10">
          {services.map((s, i) => (
            <article
              key={s.title}
              className={`card-lift group relative flex flex-col min-h-[420px] p-10 reveal delay-${i + 1} ${
                s.featured
                  ? 'bg-navy'
                  : 'bg-cream hover:bg-white'
              }`}
            >
              {/* Top accent bar */}
              {!s.featured && (
                <div className="absolute top-0 left-0 right-0 h-0.5 bg-redorange origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500" />
              )}
              {s.featured && (
                <div className="absolute top-0 left-0 right-0 h-0.5 bg-redorange" />
              )}

              {/* Num */}
              <div className={`font-mono text-[11px] tracking-[0.2em] mb-6 ${s.featured ? 'text-white/40' : 'text-navy/40'}`}>
                {s.num}
              </div>

              {/* Title */}
              <h3
                className={`font-sans text-[34px] leading-none mb-5 ${s.featured ? 'text-white' : 'text-navy'}`}
                style={{ fontWeight: 400 }}
              >
                {s.title}
              </h3>

              {/* Desc */}
              <p
                className={`text-[18px] leading-[1.65] flex-1 ${s.featured ? 'text-white' : 'text-slate2'}`}
                style={{ fontWeight: 300, opacity: s.featured ? 0.88 : 1 }}
              >
                {s.desc}
              </p>

              {/* Tags */}
              <div className="mt-8 pt-6 border-t flex flex-wrap gap-2" style={{ borderColor: s.featured ? 'rgba(255,255,255,0.2)' : 'rgba(30,58,138,0.1)' }}>
                {s.tags.map((tag) => (
                  <span
                    key={tag}
                    className={`font-mono text-[11px] tracking-[0.1em] px-3 py-1 rounded-full ${
                      s.featured
                        ? 'border text-white'
                        : 'bg-white text-slate2 border border-navy/10'
                    }`}
                    style={s.featured ? { background: 'rgba(255,255,255,0.15)', borderColor: 'rgba(255,255,255,0.25)' } : {}}
                  >
                    {tag}
                  </span>
                ))}
              </div>

              {/* Link */}
              <div className="mt-6">
                <a
                  href="#talk"
                  className="u-link text-[16px] font-medium text-redorange"
                >
                  Learn more
                  <IconArrow size={12} />
                </a>
              </div>
            </article>
          ))}
        </div>


      </div>
    </section>
  );
};

Object.assign(window, { ServicesV3 });
