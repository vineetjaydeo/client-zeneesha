// ── Zeneesha V3 App ──────────────────────────────────
const AppV3 = () => {

  // Scroll progress bar
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

  // Intersection observer reveal
  React.useEffect(() => {
    const els = document.querySelectorAll('.reveal:not(.in)');
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    els.forEach((el) => io.observe(el));
    return () => io.disconnect();
  });

  return (
    <div>
      <NavV3 />
      <main>
        <HeroV3 />
        <LogosV3 />
        <StatsV3 />
        <VideoV3 />
        <SignalsV3 />
        <ApproachV3 />
        <ServicesV3 />
        <ProofV3 />
        <FaqV3 />
        <CTABandV3 />
        <CertificationsV3 />
      </main>
      <FooterV3 />
      <WhatsAppButtonV3 />
    </div>
  );
};

ReactDOM.createRoot(document.getElementById('root')).render(<AppV3 />);
