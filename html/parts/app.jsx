// TWEAKS default config (editable via toolbar)
const TWEAK_DEFAULTS = /*EDITMODE-BEGIN*/{
  "accent": "#E8472C",
  "displaySerif": "Fraunces",
  "navyTone": "#1E3A8A"
}/*EDITMODE-END*/;

const App = () => {
  // Scroll progress bar
  React.useEffect(() => {
    const onScroll = () => {
      const h = document.documentElement;
      const pct = (h.scrollTop) / (h.scrollHeight - h.clientHeight) * 100;
      const bar = document.getElementById('progress');
      if (bar) bar.style.width = pct + '%';
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  // Intersection observer fade-up reveals
  React.useEffect(() => {
    const els = document.querySelectorAll('.reveal:not(.in)');
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
    els.forEach((el) => io.observe(el));
    return () => io.disconnect();
  });

  // Edit mode (Tweaks)
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

  const setTweak = (key, value) => {
    const next = { ...tweaks, [key]: value };
    setTweaks(next);
    window.parent.postMessage({ type: '__edit_mode_set_keys', edits: { [key]: value } }, '*');
  };

  // Apply tweaks via CSS vars overrides
  React.useEffect(() => {
    const root = document.documentElement;
    root.style.setProperty('--accent', tweaks.accent);
    root.style.setProperty('--navy', tweaks.navyTone);

    // Override tailwind-used colors dynamically
    const style = document.getElementById('tweak-style') || (() => {
      const s = document.createElement('style'); s.id = 'tweak-style'; document.head.appendChild(s); return s;
    })();
    style.textContent = `
      .text-redorange{color:${tweaks.accent}!important}
      .bg-redorange{background-color:${tweaks.accent}!important}
      .border-redorange{border-color:${tweaks.accent}!important}
      .text-navy{color:${tweaks.navyTone}!important}
      .bg-navy{background-color:${tweaks.navyTone}!important}
      .border-navy\\/10,.border-navy\\/12,.border-navy\\/15,.border-navy\\/20,.border-navy\\/25{border-color:${tweaks.navyTone}22!important}
      .font-display{font-family:'${tweaks.displaySerif}',serif!important}
    `;
  }, [tweaks]);

  const accents = ['#E8472C', '#F57C1F', '#3B9EDB', '#1E3A8A'];
  const serifs = ['Fraunces', 'Instrument Serif', 'Playfair Display'];

  return (
    <div>
      <Nav />
      <main>
        <Hero />
        <Trust />
        <Services />
        <Around />
        <Partner />
        <Proof />
        <Insights />
        <CTABand />
      </main>
      <Footer />
      <WhatsAppButton />

      {/* Tweaks panel */}
      <div className={`tweaks ${tweakOpen ? 'open' : ''}`}>
        <div className="flex items-center justify-between mb-3">
          <span className="font-display text-navy text-[16px]" style={{ fontWeight: 500 }}>Tweaks</span>
          <button onClick={() => setTweakOpen(false)} className="text-navy/50 hover:text-navy"><IconClose size={14}/></button>
        </div>
        <div className="tweak-row">
          <span className="text-navy/70">Accent</span>
          <div className="flex gap-1.5">
            {accents.map((c) => (
              <span key={c} className="swatch" style={{ background: c, outline: tweaks.accent === c ? '2px solid #1E3A8A' : 'none' }} onClick={() => setTweak('accent', c)} />
            ))}
          </div>
        </div>
        <div className="tweak-row">
          <span className="text-navy/70">Serif</span>
          <select value={tweaks.displaySerif} onChange={(e) => setTweak('displaySerif', e.target.value)} className="text-[12px] border border-navy/20 rounded px-2 py-1 bg-white">
            {serifs.map((s) => <option key={s}>{s}</option>)}
          </select>
        </div>
        <div className="tweak-row">
          <span className="text-navy/70">Navy</span>
          <input type="color" value={tweaks.navyTone} onChange={(e) => setTweak('navyTone', e.target.value)} />
        </div>
      </div>
    </div>
  );
};

// Load extra Google fonts on demand
const extraFonts = document.createElement('link');
extraFonts.rel = 'stylesheet';
extraFonts.href = 'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap';
document.head.appendChild(extraFonts);

ReactDOM.createRoot(document.getElementById('root')).render(<App />);
