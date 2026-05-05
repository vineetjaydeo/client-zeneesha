// App root for v2
const TWEAK_DEFAULTS = /*EDITMODE-BEGIN*/{
  "accent": "#E8472C",
  "displaySerif": "Fraunces"
}/*EDITMODE-END*/;

const AppV2 = () => {
  // Scroll progress
  React.useEffect(() => {
    const onScroll = () => {
      const h = document.documentElement;
      const pct = h.scrollTop / (h.scrollHeight - h.clientHeight) * 100;
      const bar = document.getElementById('progress');
      if (bar) bar.style.width = pct + '%';
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  // Reveal observer
  React.useEffect(() => {
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal:not(.in), .kinetic-line:not(.in)').forEach((el) => io.observe(el));
    return () => io.disconnect();
  });

  // Kick kinetic hero on mount
  React.useEffect(() => {
    const t = setTimeout(() => {
      document.querySelectorAll('.kinetic-line').forEach((el) => el.classList.add('in'));
    }, 200);
    return () => clearTimeout(t);
  }, []);

  // Tweaks
  const [tweakOpen, setTweakOpen] = React.useState(false);
  const [tweaks, setTweaks] = React.useState(TWEAK_DEFAULTS);
  React.useEffect(() => {
    const onMsg = (e) => {
      if (!e.data) return;
      if (e.data.type === '__activate_edit_mode') setTweakOpen(true);
      if (e.data.type === '__deactivate_edit_mode') setTweakOpen(false);
    };
    window.addEventListener('message', onMsg);
    window.parent.postMessage({ type: '__edit_mode_available' }, '*');
    return () => window.removeEventListener('message', onMsg);
  }, []);
  const setTweak = (k, v) => {
    const next = { ...tweaks, [k]: v };
    setTweaks(next);
    window.parent.postMessage({ type: '__edit_mode_set_keys', edits: { [k]: v } }, '*');
  };
  React.useEffect(() => {
    let style = document.getElementById('tweak-style');
    if (!style) { style = document.createElement('style'); style.id = 'tweak-style'; document.head.appendChild(style); }
    style.textContent = `
      .text-redorange{color:${tweaks.accent}!important}
      .bg-redorange{background-color:${tweaks.accent}!important}
      .border-redorange{border-color:${tweaks.accent}!important}
      .font-display{font-family:'${tweaks.displaySerif}',serif!important}
    `;
  }, [tweaks]);
  const accents = ['#E8472C', '#F57C1F', '#3B9EDB', '#1E3A8A'];

  return (
    <div>
      <NavV2 />
      <main>
        <HeroVideo />
        <ProblemSection />
        <OutcomeValue />
        <People />
        <Clients />
        <InsightsV2 />
        <CTAv2 />
      </main>
      <FooterV2 />
      <WA />

      <div className={`tweaks ${tweakOpen ? 'open' : ''}`}>
        <div className="flex items-center justify-between mb-3">
          <span className="font-display text-navy text-[16px]" style={{ fontWeight: 500 }}>Tweaks</span>
          <button onClick={() => setTweakOpen(false)} className="text-navy/50">✕</button>
        </div>
        <div className="tweak-row">
          <span>Accent</span>
          <div className="flex gap-1.5">
            {accents.map((c) => <span key={c} className="swatch" style={{ background: c, outline: tweaks.accent === c ? '2px solid #1E3A8A' : 'none' }} onClick={() => setTweak('accent', c)} />)}
          </div>
        </div>
        <div className="tweak-row">
          <span>Serif</span>
          <select value={tweaks.displaySerif} onChange={(e) => setTweak('displaySerif', e.target.value)} className="text-[12px] border border-navy/20 rounded px-2 py-1 bg-white">
            {['Fraunces', 'Instrument Serif', 'Playfair Display'].map((s) => <option key={s}>{s}</option>)}
          </select>
        </div>
      </div>
    </div>
  );
};

const extraFonts = document.createElement('link');
extraFonts.rel = 'stylesheet';
extraFonts.href = 'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap';
document.head.appendChild(extraFonts);

ReactDOM.createRoot(document.getElementById('root')).render(<AppV2 />);
