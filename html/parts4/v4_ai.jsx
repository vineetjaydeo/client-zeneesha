// ── Zeneesha V4 AI & The Future ───────────────────────
// Content: V5 doc — HCM / Finance / Adaptive modules + 3 use cases

const AI_MODULES = [
  {
    module: 'HCM',
    color: '#3B9EDB',
    desc: 'Bring AI intelligence to every stage of the talent lifecycle. We identify where AI can reduce manual effort across hiring, onboarding, workforce planning and manager workflows — then configure Workday to make it happen.',
  },
  {
    module: 'Finance',
    color: '#F57C1F',
    desc: 'Unlock AI within your financial core. We surface where Workday\'s AI can improve close cycles, flag anomalies and sharpen spend visibility — so your Finance team acts on insight, not instinct.',
  },
  {
    module: 'Adaptive Planning',
    color: '#E8472C',
    desc: 'Plan smarter with AI-driven forecasting. We help you unlock Workday Adaptive Planning\'s AI-driven scenario modeling — so leadership has a single, trusted view that holds up in the boardroom, not three spreadsheets and a conversation.',
  },
];

const USE_CASES = [
  'Automate headcount planning approvals',
  'Surface financial close anomalies',
  'Enable manager self-service at scale',
];

const AIModulePanels = () => (
  <div style={{ display: 'flex', flexDirection: 'column', gap: 16 }}>
    {AI_MODULES.map((m) => (
      <div
        key={m.module}
        style={{
          background: 'rgba(255,255,255,0.04)',
          border: '1px solid rgba(255,255,255,0.08)',
          borderLeft: `3px solid ${m.color}`,
          borderRadius: 10,
          padding: '20px 24px',
        }}
      >
        <div style={{
          fontFamily: 'Jost, sans-serif',
          fontSize: 10,
          fontWeight: 600,
          letterSpacing: '0.22em',
          textTransform: 'uppercase',
          color: m.color,
          marginBottom: 8,
        }}>
          {m.module}
        </div>
        <p style={{
          fontFamily: 'Jost, sans-serif',
          fontSize: 15,
          fontWeight: 300,
          color: 'rgba(255,255,255,0.60)',
          lineHeight: 1.65,
          margin: 0,
        }}>
          {m.desc}
        </p>
      </div>
    ))}

    {/* Use case pills */}
    <div style={{ marginTop: 8, display: 'flex', flexWrap: 'wrap', gap: 8 }}>
      <span style={{
        fontFamily: 'Jost, sans-serif',
        fontSize: 10,
        fontWeight: 500,
        letterSpacing: '0.18em',
        textTransform: 'uppercase',
        color: 'rgba(255,255,255,0.25)',
        alignSelf: 'center',
        marginRight: 4,
      }}>
        Use cases
      </span>
      {USE_CASES.map((uc) => (
        <span key={uc} style={{
          fontFamily: 'Jost, sans-serif',
          fontSize: 12,
          fontWeight: 400,
          color: 'rgba(255,255,255,0.55)',
          background: 'rgba(255,255,255,0.06)',
          border: '1px solid rgba(255,255,255,0.10)',
          padding: '5px 14px',
          borderRadius: 20,
        }}>
          {uc}
        </span>
      ))}
    </div>
  </div>
);

const AIFutureV4 = () => (
  <section id="ai" className="relative py-28 overflow-hidden" style={{ background: '#0E1E4A' }}>
    <div className="grain" />

    {/* Subtle background */}
    <div className="absolute inset-0 pointer-events-none" aria-hidden="true">
      <div className="absolute" style={{ right: '-5%', top: '-10%', width: 480, height: 480, background: 'rgba(232,71,44,0.12)', filter: 'blur(100px)', borderRadius: '50%' }} />
      <div className="absolute" style={{ left: '-8%', bottom: '-5%', width: 400, height: 400, background: 'rgba(59,158,219,0.08)', filter: 'blur(90px)', borderRadius: '50%' }} />
    </div>

    <div className="relative max-w-[1440px] mx-auto px-8 grid lg:grid-cols-12 gap-16 items-center">

      {/* ── Left: copy ── */}
      <div className="lg:col-span-5">
        <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-sky2 mb-5">
          <span className="w-6 h-px bg-sky2" />
          AI & Automation
        </div>

        <h2 className="reveal delay-1 font-sans text-white text-[clamp(32px,4vw,52px)] leading-[1.1] mb-6" style={{ fontWeight: 300 }}>
          Still Talking About AI—{' '}
          <span style={{ color: '#F57C1F' }}>or Using It?</span>
        </h2>

        <p className="reveal delay-2 text-[18px] leading-[1.7] text-white/65 mb-4 max-w-[460px]" style={{ fontWeight: 300 }}>
          Workday's AI roadmap is accelerating. Natural language queries, intelligent automation, and predictive analytics are live in select modules today — and expanding fast.
        </p>

        <p className="reveal delay-3 text-[18px] leading-[1.7] text-white/55 max-w-[460px]" style={{ fontWeight: 300 }}>
          Organisations with clean data, optimised configuration, and adopted processes will benefit immediately. Those without will spend their AI budget fixing the foundations first.
        </p>

        <div className="reveal delay-4 mt-10 flex flex-wrap items-center gap-4">
          <a
            href="#talk"
            className="inline-flex items-center gap-3 bg-redorange text-white px-7 py-4 rounded-full text-[17px] font-medium hover:bg-[#D63C23] transition-all duration-300 shadow-[0_16px_40px_-14px_rgba(232,71,44,0.6)]"
          >
            Explore Workday AI Use Cases
            <IconArrow size={14} />
          </a>
        </div>
      </div>

      {/* ── Right: HCM / Finance / Adaptive module panels — V5 doc ── */}
      <div className="lg:col-span-6 lg:col-start-7 reveal delay-2">
        <AIModulePanels />
      </div>

    </div>
  </section>
);

Object.assign(window, { AIFutureV4 });
