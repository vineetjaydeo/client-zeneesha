// ── Zeneesha V4 Solutions ────────────────────────────

const SERVICES = [
  {
    id: 'implementation',
    num: '01',
    title: 'Implementation',
    color: '#1E3A8A',
    tagline: 'Build the right foundation from day one.',
    description: 'A Workday implementation sets the rules your organisation will live by for years. Zeneesha ensures those rules are right — configured for how your business actually works, not how the default template assumes it does.',
    tags: ['Workday HCM', 'Finance', 'Adaptive Planning', 'Data Migration'],
    outcomes: [
      'Configured for your processes, not just the defaults.',
      'Data migrated cleanly — no surprises in month one.',
      'Team trained and genuinely confident at go-live.',
    ],
  },
  {
    id: 'ams',
    num: '02',
    title: 'AMS & Support',
    color: '#3B9EDB',
    tagline: 'Your Workday, always working. We keep it that way.',
    description: 'After go-live, the real work starts. Change requests accumulate, releases introduce complexity, and your team can\'t be Workday experts on top of everything else. Zeneesha absorbs that pressure — fast, reliably, every time.',
    tags: ['Incident Resolution', 'Release Management', 'Change Requests', 'Integrations'],
    outcomes: [
      'Fast resolution for incidents and change requests.',
      'Workday release management handled end-to-end.',
      'A specialist team available when your team isn\'t.',
    ],
  },
  {
    id: 'maximise',
    num: '03',
    title: 'Maximise',
    color: '#F57C1F',
    tagline: 'Turn your Workday from operational to exceptional.',
    description: 'There\'s a version of Workday that your organisation hasn\'t reached yet — one that answers leadership\'s questions instantly, eliminates manual work, and reflects how your business operates today. Zeneesha helps you get there.',
    tags: ['Automation', 'Reporting', 'Configuration Review', 'Adoption'],
    outcomes: [
      'Automation that eliminates manual intervention.',
      'Reporting that answers the questions leadership actually asks.',
      'Configuration that reflects how your business works today.',
    ],
  },
];

const LifecyclePathSVG = ({ activeIndex, onSelect }) => {
  const nodes = [
    { label: 'Implementation', color: '#1E3A8A', x: 80  },
    { label: 'AMS & Support',  color: '#3B9EDB', x: 280 },
    { label: 'Maximise',       color: '#F57C1F', x: 480 },
  ];

  return (
    <svg viewBox="0 0 560 80" fill="none" xmlns="http://www.w3.org/2000/svg" style={{ width: '100%', height: 'auto', cursor: 'pointer' }}>
      {/* Connector lines */}
      {nodes.slice(0, -1).map((node, i) => (
        <line
          key={i}
          x1={node.x + 28} y1={40}
          x2={nodes[i + 1].x - 28} y2={40}
          stroke="url(#connGrad)" strokeWidth="2" strokeDasharray="4 3"
        />
      ))}

      {/* Gradient definition */}
      <defs>
        <linearGradient id="connGrad" x1="0" y1="0" x2="1" y2="0">
          <stop offset="0%" stopColor="#1E3A8A" stopOpacity="0.4" />
          <stop offset="100%" stopColor="#E8472C" stopOpacity="0.4" />
        </linearGradient>
      </defs>

      {/* Arrow heads */}
      {nodes.slice(0, -1).map((node, i) => {
        const midX = (node.x + 28 + nodes[i+1].x - 28) / 2;
        return (
          <polygon
            key={i}
            points={`${midX},36 ${midX+7},40 ${midX},44`}
            fill={nodes[i+1].color}
            opacity="0.5"
          />
        );
      })}

      {/* Nodes */}
      {nodes.map((node, i) => (
        <g key={i} onClick={() => onSelect(i)} style={{ cursor: 'pointer' }}>
          {/* Outer ring when active */}
          {activeIndex === i && (
            <circle cx={node.x} cy={40} r={30} fill={node.color} opacity="0.12" />
          )}
          {/* Main circle */}
          <circle
            cx={node.x} cy={40} r={22}
            fill={activeIndex === i ? node.color : '#fff'}
            stroke={node.color}
            strokeWidth={activeIndex === i ? 0 : 2}
          />
          {/* Number */}
          <text
            x={node.x} y={45}
            textAnchor="middle"
            fontFamily="Jost, sans-serif"
            fontSize="13"
            fontWeight="600"
            fill={activeIndex === i ? '#fff' : node.color}
          >
            {String(i + 1).padStart(2, '0')}
          </text>
          {/* Label below */}
          <text
            x={node.x} y={70}
            textAnchor="middle"
            fontFamily="Jost, sans-serif"
            fontSize="10"
            fontWeight={activeIndex === i ? '600' : '400'}
            fill={activeIndex === i ? node.color : '#475569'}
            letterSpacing="0.04em"
          >
            {node.label.length > 14 ? node.label.replace(' & ', '/') : node.label}
          </text>
        </g>
      ))}
    </svg>
  );
};

const SolutionsV4 = () => {
  const [active, setActive] = React.useState(0);
  const svc = SERVICES[active];

  return (
    <section id="solutions" className="relative py-28 bg-white overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8">

        {/* Section header */}
        <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
          <span className="w-6 h-px bg-redorange" />
          How Zeneesha Helps
        </div>
        <div className="reveal delay-1 grid lg:grid-cols-12 gap-6 mb-16">
          <h2 className="lg:col-span-5 font-sans text-navy text-[clamp(32px,4vw,52px)] leading-[1.1]" style={{ fontWeight: 300 }}>
            One Workday journey. Three ways to move it forward.
          </h2>
          <p className="lg:col-span-5 lg:col-start-7 text-[18px] leading-[1.7] text-slate2 self-end" style={{ fontWeight: 300 }}>
            From first configuration to ongoing optimisation — Zeneesha covers the full lifecycle, with specialist expertise at every stage.
          </p>
        </div>

        {/* Lifecycle path diagram */}
        <div className="reveal delay-2 mb-12 px-4">
          <LifecyclePathSVG activeIndex={active} onSelect={setActive} />
        </div>

        {/* Tab bar */}
        <div className="reveal delay-2 flex flex-wrap gap-3 mb-10 border-b border-navy/10 pb-6">
          {SERVICES.map((s, i) => (
            <button
              key={s.id}
              onClick={() => setActive(i)}
              className="flex items-center gap-2 px-5 py-2.5 rounded-full text-[15px] font-medium transition-all duration-300"
              style={{
                background: active === i ? s.color : 'transparent',
                color: active === i ? '#fff' : '#475569',
                border: `1.5px solid ${active === i ? s.color : 'rgba(30,58,138,0.15)'}`,
              }}
            >
              <span style={{
                fontFamily: 'Jost, monospace',
                fontSize: 11,
                fontWeight: 500,
                opacity: active === i ? 0.8 : 0.5,
              }}>
                {s.num}
              </span>
              {s.title}
            </button>
          ))}
        </div>

        {/* Detail panel — no key= so IntersectionObserver reveal classes survive tab switches */}
        <div className="grid lg:grid-cols-12 gap-10 items-start" style={{ transition: 'opacity 0.25s ease', opacity: 1 }}>

          {/* Left */}
          <div className="lg:col-span-6">
            <div className="mb-2 font-mono text-[11px] tracking-[0.2em] uppercase" style={{ color: svc.color }}>
              Service {svc.num}
            </div>
            <h3 className="font-sans text-navy text-[clamp(28px,3.2vw,44px)] leading-[1.1] mb-4" style={{ fontWeight: 400 }}>
              {svc.title}
            </h3>
            <p className="text-[20px] leading-[1.5] mb-5" style={{ fontWeight: 400, color: svc.color }}>
              {svc.tagline}
            </p>
            <p className="text-[18px] leading-[1.7] text-slate2 mb-8" style={{ fontWeight: 300 }}>
              {svc.description}
            </p>
            <div className="flex flex-wrap gap-2">
              {svc.tags.map((t) => (
                <span key={t} style={{
                  display: 'inline-block',
                  fontFamily: 'Jost, sans-serif',
                  fontSize: 12,
                  fontWeight: 500,
                  letterSpacing: '0.12em',
                  textTransform: 'uppercase',
                  color: svc.color,
                  background: `${svc.color}10`,
                  padding: '5px 12px',
                  borderRadius: 20,
                  border: `1px solid ${svc.color}25`,
                }}>
                  {t}
                </span>
              ))}
            </div>
          </div>

          {/* Right */}
          <div className="lg:col-span-5 lg:col-start-8">
            <div
              style={{
                background: '#FAFAF7',
                border: '1px solid rgba(30,58,138,0.09)',
                borderTop: `4px solid ${svc.color}`,
                borderRadius: 10,
                padding: '32px 36px',
              }}
            >
              <div className="font-mono text-[11px] tracking-[0.2em] uppercase text-slate2/60 mb-6">
                What this means for you
              </div>
              <ul style={{ listStyle: 'none', padding: 0, margin: 0, display: 'flex', flexDirection: 'column', gap: 18 }}>
                {svc.outcomes.map((o, i) => (
                  <li key={i} style={{ display: 'flex', alignItems: 'flex-start', gap: 14 }}>
                    <span style={{
                      flexShrink: 0,
                      marginTop: 4,
                      width: 20,
                      height: 20,
                      borderRadius: '50%',
                      background: svc.color,
                      display: 'flex',
                      alignItems: 'center',
                      justifyContent: 'center',
                    }}>
                      <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#fff" strokeWidth="3" strokeLinecap="round" strokeLinejoin="round">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </span>
                    <span style={{
                      fontFamily: 'Jost, sans-serif',
                      fontSize: 17,
                      fontWeight: 300,
                      color: '#1E3A8A',
                      lineHeight: 1.6,
                    }}>
                      {o}
                    </span>
                  </li>
                ))}
              </ul>

              <div style={{ marginTop: 28, paddingTop: 20, borderTop: '1px solid rgba(30,58,138,0.08)' }}>
                <a
                  href="#talk"
                  style={{
                    display: 'inline-flex',
                    alignItems: 'center',
                    gap: 8,
                    fontFamily: 'Jost, sans-serif',
                    fontSize: 15,
                    fontWeight: 500,
                    color: svc.color,
                    textDecoration: 'none',
                  }}
                >
                  Discuss this with us
                  <IconArrow size={13} />
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  );
};

Object.assign(window, { SolutionsV4 });
