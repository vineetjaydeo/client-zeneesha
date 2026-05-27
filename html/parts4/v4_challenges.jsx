// ── Zeneesha V4 Challenges ────────────────────────────
// Content: V5 content doc (latest)

const SIGNAL_CARDS = [
  {
    tag: 'Recurring Tickets',
    headline: 'Fix the cause, not just the ticket.',
    desc: 'Zeneesha gets to the root of why issues keep coming back.',
    color: '#E8472C',
  },
  {
    tag: 'Manual Workarounds',
    headline: 'Bring the process back into Workday.',
    desc: 'We help align workflows with how your teams actually work.',
    color: '#1E3A8A',
  },
  {
    tag: 'Reporting Delays',
    headline: 'Decisions get made on gut feel because the data isn\'t ready in time.',
    desc: null, // no separate desc in doc — headline is the full card message
    color: '#F57C1F',
  },
  {
    tag: 'Low Adoption',
    headline: 'Turn access into confident usage.',
    desc: 'You\'re paying for a platform your people have learned to work around.',
    color: '#1E3A8A',
  },
  {
    tag: 'Release Fatigue',
    headline: 'Know what to adopt next.',
    desc: 'We help prioritise updates that matter to the business.',
    color: '#E8472C',
  },
  {
    tag: 'Underutilised Capability',
    headline: 'Features you already own are sitting dormant while you consider buying point solutions.',
    desc: null,
    color: '#3B9EDB',
  },
];

const ChallengesV4 = () => (
  <section id="challenges" className="relative py-28 bg-cream2 overflow-hidden">
    <div className="max-w-[1440px] mx-auto px-8">

      {/* Section label */}
      <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
        <span className="w-6 h-px bg-redorange" />
        After Go-Live Reality
      </div>

      {/* Heading */}
      <div className="reveal delay-1 grid lg:grid-cols-12 gap-6 mb-6">
        <h2 className="lg:col-span-6 font-sans text-navy text-[clamp(32px,4vw,52px)] leading-[1.1]" style={{ fontWeight: 300 }}>
          When Workday starts creating more work.
        </h2>
        <div className="lg:col-span-5 lg:col-start-8 self-end">
          <p className="text-[18px] leading-[1.7] text-slate2" style={{ fontWeight: 300 }}>
            Choose what your team is facing. See how Zeneesha turns Workday friction into a clearer way forward.
          </p>
        </div>
      </div>

      {/* Stat bar */}
      <div className="reveal delay-2 mb-12 flex items-start gap-4 py-5 px-6 rounded-xl" style={{ background: 'rgba(30,58,138,0.04)', borderLeft: '3px solid #1E3A8A' }}>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1E3A8A" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" style={{ flexShrink: 0, marginTop: 2 }}>
          <circle cx="12" cy="12" r="10" /><path d="M12 8v4M12 16h.01" />
        </svg>
        <p className="text-[15px] leading-[1.6] text-navy" style={{ fontWeight: 300, margin: 0 }}>
          By 2027, more than 70% of recently implemented ERP initiatives are expected to fall short of their original business case goals.{' '}
          <a href="https://www.gartner.com/" target="_blank" rel="noopener noreferrer" style={{ color: '#3B9EDB', fontStyle: 'italic', fontSize: 13 }}>source: Gartner</a>
        </p>
      </div>

      {/* Signal cards grid */}
      <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
        {SIGNAL_CARDS.map((card, i) => (
          <div
            key={i}
            className="reveal card-lift"
            style={{ transitionDelay: `${i * 60}ms` }}
          >
            <div style={{
              background: '#fff',
              borderRadius: 10,
              borderTop: `3px solid ${card.color}`,
              padding: '24px 26px 22px',
              boxShadow: '0 2px 16px rgba(30,58,138,0.05)',
              height: '100%',
              display: 'flex',
              flexDirection: 'column',
              gap: 10,
            }}>
              <span style={{
                display: 'inline-block',
                fontFamily: 'Jost, sans-serif',
                fontSize: 10,
                fontWeight: 500,
                letterSpacing: '0.18em',
                textTransform: 'uppercase',
                color: card.color,
                background: `${card.color}10`,
                padding: '3px 10px',
                borderRadius: 20,
                alignSelf: 'flex-start',
              }}>
                {card.tag}
              </span>
              <p style={{
                fontFamily: 'Jost, sans-serif',
                fontSize: 17,
                fontWeight: 500,
                color: '#1E3A8A',
                lineHeight: 1.4,
                margin: 0,
              }}>
                {card.headline}
              </p>
              {card.desc && (
                <p style={{
                  fontFamily: 'Jost, sans-serif',
                  fontSize: 15,
                  fontWeight: 300,
                  color: '#475569',
                  lineHeight: 1.65,
                  margin: 0,
                }}>
                  {card.desc}
                </p>
              )}
            </div>
          </div>
        ))}
      </div>

      {/* Supporting line */}
      <p className="reveal delay-3 mt-10 text-[16px] leading-[1.7] text-slate2/70 text-center max-w-[620px] mx-auto" style={{ fontWeight: 300 }}>
        Small signs often reveal bigger opportunities. Zeneesha uncover gaps, reduce friction and shape a practical roadmap for improvement.
      </p>

    </div>
  </section>
);

Object.assign(window, { ChallengesV4 });
