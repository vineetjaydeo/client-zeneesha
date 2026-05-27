// ── Zeneesha V4 Results / Case Study ─────────────────
// Content: V4 content doc (case study section) — FINAL per doc
// NOTE: Doc says "Final case study metrics and client approval to be added"
//       AQA metrics (700%, 2→16) are from V4 doc — use pending client sign-off
// LOREM IPSUM marks content gaps

const ResultsV4 = () => (
  <section id="results" className="relative py-28 bg-cream2 overflow-hidden">
    <div className="max-w-[1440px] mx-auto px-8">

      {/* Header */}
      <div className="reveal flex items-center gap-3 text-[12px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
        <span className="w-6 h-px bg-redorange" />
        Client Outcomes
      </div>

      {/* Section heading — from V4 doc */}
      <div className="reveal delay-1 grid lg:grid-cols-12 gap-6 mb-14">
        <h2 className="lg:col-span-6 font-sans text-navy text-[clamp(32px,4vw,52px)] leading-[1.1]" style={{ fontWeight: 300 }}>
          From Workday backlog to 700% faster sprint turnaround.
        </h2>
        <p className="lg:col-span-5 lg:col-start-8 text-[18px] leading-[1.7] text-slate2 self-end" style={{ fontWeight: 300 }}>
          Zeneesha helped AQA improve its Workday HCM support model by introducing a clearer intake and prioritisation process for recruitment, absence and change requests.
        </p>
      </div>

      {/* Case study panel — AQA only */}
      <div className="reveal delay-2 bg-white rounded-2xl overflow-hidden" style={{ border: '1px solid rgba(30,58,138,0.08)', boxShadow: '0 4px 40px rgba(30,58,138,0.07)' }}>

        <div style={{ height: 4, background: '#1E3A8A' }} />

        <div className="grid lg:grid-cols-12 gap-0">

          {/* Metrics */}
          <div className="lg:col-span-4 p-10" style={{ background: 'rgba(30,58,138,0.03)', borderRight: '1px solid rgba(30,58,138,0.07)' }}>
            <div className="font-mono text-[11px] tracking-[0.2em] uppercase mb-2" style={{ color: '#1E3A8A' }}>
              AQA Education
            </div>
            <div className="text-[13px] text-slate2 mb-10" style={{ fontWeight: 300, letterSpacing: '0.04em' }}>
              Education · Non-profit
            </div>

            <div className="flex flex-col gap-8">
              <div>
                <div className="font-sans num-oldstyle" style={{ fontSize: 'clamp(28px,3.5vw,40px)', fontWeight: 600, color: '#1E3A8A', lineHeight: 1 }}>700%</div>
                <div className="mt-1 text-[14px] text-slate2" style={{ fontWeight: 300 }}>Faster sprint turnaround</div>
              </div>
              <div>
                <div className="font-sans num-oldstyle" style={{ fontSize: 'clamp(28px,3.5vw,40px)', fontWeight: 600, color: '#1E3A8A', lineHeight: 1 }}>2→16</div>
                <div className="mt-1 text-[14px] text-slate2" style={{ fontWeight: 300 }}>Tickets resolved per sprint</div>
              </div>
              {/* LOREM IPSUM — third metric pending client approval */}
              <div style={{ opacity: 0.4 }}>
                <div className="font-sans num-oldstyle" style={{ fontSize: 'clamp(28px,3.5vw,40px)', fontWeight: 600, color: '#1E3A8A', lineHeight: 1 }}>—</div>
                <div className="mt-1 text-[13px] text-slate2 italic" style={{ fontWeight: 300 }}>Lorem ipsum metric pending</div>
              </div>
            </div>
          </div>

          {/* Summary */}
          <div className="lg:col-span-8 p-10">
            <p className="text-[19px] leading-[1.7] text-slate2 mb-8" style={{ fontWeight: 300 }}>
              Sprint capacity increased from <strong style={{ color: '#1E3A8A', fontWeight: 500 }}>2 to 16 tickets per sprint</strong>, helping the team reduce backlog and respond more effectively to the business.
            </p>

            {/* LOREM IPSUM — "The Signal / Diagnosis / Decision / Outcome" structure from V3 doc
                Doc says: use exact content from case study — metrics and client approval to be added */}
            <div style={{ background: 'rgba(30,58,138,0.03)', borderRadius: 8, padding: '20px 24px', marginBottom: 24 }}>
              <div className="font-mono text-[10px] tracking-[0.18em] uppercase text-slate2/50 mb-3">Lorem ipsum — case study detail pending client approval</div>
              <p className="text-[15px] leading-[1.65] text-slate2/60 italic" style={{ fontWeight: 300, margin: 0 }}>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
              </p>
            </div>

            <div style={{ borderTop: '1px solid rgba(30,58,138,0.08)', paddingTop: 24, display: 'flex', alignItems: 'center', justifyContent: 'space-between', gap: 16, flexWrap: 'wrap' }}>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 14, color: '#475569', fontWeight: 300 }}>
                — Georgina Taitt, Head of Enterprise Apps | AQA
              </div>
              <a
                href="#talk"
                style={{
                  display: 'inline-flex',
                  alignItems: 'center',
                  gap: 8,
                  fontFamily: 'Jost, sans-serif',
                  fontSize: 15,
                  fontWeight: 500,
                  color: '#1E3A8A',
                  textDecoration: 'none',
                }}
              >
                Read the case study
                <IconArrow size={13} />
              </a>
            </div>
          </div>

        </div>
      </div>

      {/* Testimonials — 1 real (V4 doc), 1 placeholder (V3 doc) */}
      <div className="mt-16 grid md:grid-cols-2 gap-6">

        {/* Testimonial 1 — from V4 content doc */}
        <div className="reveal card-lift">
          <div style={{
            background: '#fff',
            border: '1px solid rgba(30,58,138,0.08)',
            borderTop: '3px solid #1E3A8A',
            borderRadius: 10,
            padding: '28px 28px 24px',
            height: '100%',
          }}>
            <div style={{ fontSize: 40, lineHeight: 1, color: '#1E3A8A', opacity: 0.2, fontFamily: 'Georgia, serif', marginBottom: 12 }}>"</div>
            <p style={{ fontFamily: 'Jost, sans-serif', fontSize: 16, fontWeight: 300, color: '#1E3A8A', lineHeight: 1.7, marginBottom: 20 }}>
              Zeneesha helped us navigate a complex Workday rollout with the right expertise, flexibility, and support. Their team was invaluable in helping make our Workday adoption a success.
            </p>
            <div style={{ borderTop: '1px solid rgba(30,58,138,0.07)', paddingTop: 16 }}>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 14, fontWeight: 500, color: '#1E3A8A' }}>Georgina Taitt</div>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 13, fontWeight: 300, color: '#475569', marginTop: 2 }}>Head of Enterprise Apps | AQA</div>
            </div>
          </div>
        </div>

        {/* Testimonial 2 — placeholder per V3 doc ("Testimonial 2 - Georgina Tatitt") */}
        <div className="reveal delay-1 card-lift">
          <div style={{
            background: '#fff',
            border: '1px solid rgba(30,58,138,0.08)',
            borderTop: '3px solid rgba(30,58,138,0.3)',
            borderRadius: 10,
            padding: '28px 28px 24px',
            height: '100%',
            opacity: 0.5,
          }}>
            <div style={{ fontSize: 40, lineHeight: 1, color: '#1E3A8A', opacity: 0.2, fontFamily: 'Georgia, serif', marginBottom: 12 }}>"</div>
            <p style={{ fontFamily: 'Jost, sans-serif', fontSize: 16, fontWeight: 300, color: '#1E3A8A', lineHeight: 1.7, marginBottom: 20, fontStyle: 'italic' }}>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis nostrud exercitation.
            </p>
            <div style={{ borderTop: '1px solid rgba(30,58,138,0.07)', paddingTop: 16 }}>
              <div style={{ fontFamily: 'Jost, sans-serif', fontSize: 13, fontWeight: 300, color: '#475569', fontStyle: 'italic' }}>[Client name] · [Role, Organisation] — Lorem ipsum pending</div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
);

Object.assign(window, { ResultsV4 });
