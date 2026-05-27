// ── Zeneesha V4 App Entry ────────────────────────────

const AppV4 = () => {
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

  React.useEffect(() => {
    const observe = () => {
      const els = document.querySelectorAll('.reveal:not(.in)');
      const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) {
            e.target.classList.add('in');
            io.unobserve(e.target);
          }
        });
      }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
      els.forEach((el) => io.observe(el));
      return () => io.disconnect();
    };
    // Observe immediately and again after short delay for tab-rendered content
    const cleanup = observe();
    const t = setTimeout(observe, 600);
    return () => { cleanup && cleanup(); clearTimeout(t); };
  });

  return (
    <div>
      <NavV4 />
      <main>
        <HeroV4 />
        <TrustV4 />
        <ChallengesV4 />
        <SolutionsV4 />
        <AIFutureV4 />
        <ResultsV4 />
        <FaqV4 />
        <CTABandV4 />
        <CertificationsV4 />
      </main>
      <FooterV4 />
    </div>
  );
};

ReactDOM.createRoot(document.getElementById('root')).render(<AppV4 />);
