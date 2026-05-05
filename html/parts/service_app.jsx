// App root for the v1 service landing page
const SERVICE_TWEAKS_V1 = /*EDITMODE-BEGIN*/{
  "accent": "#E8472C",
  "displaySerif": "Fraunces"
}/*EDITMODE-END*/;

const ServiceApp = () => {
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
    document.querySelectorAll('.reveal:not(.in)').forEach((el) => io.observe(el));
    return () => io.disconnect();
  });

  // Kinetic hero — add .in after mount so CSS transition runs from the initial paint
  React.useEffect(() => {
    const t = setTimeout(() => {
      document.querySelectorAll('.kinetic-line').forEach((el) => el.classList.add('in'));
    }, 200);
    return () => clearTimeout(t);
  }, []);

  // Tweaks
  const [open, setOpen] = React.useState(false);
  const [tweaks, setTweaks] = React.useState(SERVICE_TWEAKS_V1);
  React.useEffect(() => {
    const onMsg = (e) => {
      if (!e.data) return;
      if (e.data.type === '__activate_edit_mode') setOpen(true);
      if (e.data.type === '__deactivate_edit_mode') setOpen(false);
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
      <Nav />
      <main>
        <ServiceHeroV1 />
        <ServiceScope />
        <ServiceEngagements />
        <ServiceCaseStudies />
        <ServiceFAQ />
        <ServiceRelated />
        <ServiceLeadForm />
      </main>
      <Footer />
      <WhatsAppButton />

      <div className={`tweaks ${open ? 'open' : ''}`}>
        <div className="flex items-center justify-between mb-3">
          <span className="font-display text-navy text-[16px]" style={{ fontWeight: 500 }}>Tweaks</span>
          <button onClick={() => setOpen(false)} className="text-navy/50">✕</button>
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

const serviceV1Fonts = document.createElement('link');
serviceV1Fonts.rel = 'stylesheet';
serviceV1Fonts.href = 'https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap';
document.head.appendChild(serviceV1Fonts);

ReactDOM.createRoot(document.getElementById('root')).render(<ServiceApp />);
