const Nav = () => {
  const [scrolled, setScrolled] = React.useState(false);
  React.useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 40);
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  const links = ['Services', 'Approach', 'Insights', 'About', 'Careers'];

  return (
    <header className={`fixed top-0 inset-x-0 z-50 transition-all duration-500 ${scrolled ? 'nav-scrolled' : ''}`}>
      <div className="max-w-[1400px] mx-auto px-8 h-[76px] flex items-center justify-between">
        <a href="#top" className="flex items-center gap-4 group">
          <LogoFull height={38} className="transition-transform duration-500 group-hover:scale-[1.02]" />
          <span className="hidden md:inline-block pl-3 border-l border-navy/20 text-[11px] tracking-[0.18em] uppercase text-navy/60 font-mono">UK · EMEA</span>
        </a>

        <nav className="hidden lg:flex items-center gap-9 text-[14px]">
          {links.map((l) => (
            <a key={l} href={`#${l.toLowerCase()}`} className="u-link text-navy/80 hover:text-navy font-medium">
              {l}
            </a>
          ))}
        </nav>

        <div className="flex items-center gap-2">
          <span className="hidden md:flex items-center gap-2 mr-3 text-[12px] text-navy/60 font-mono">
            <span className="w-1.5 h-1.5 rounded-full bg-emerald-500 pulse" />
            Booking Q3 engagements
          </span>
          <a
            href="#talk"
            className="cta-ghost inline-flex items-center gap-2 text-[13px] font-medium text-redorange border border-redorange/70 px-4 py-2.5 rounded-full hover:bg-redorange hover:text-white transition-colors duration-300"
          >
            Talk to us
            <IconArrow size={13} className="caret" />
          </a>
        </div>
      </div>
      {scrolled && <div className="hairline" />}
    </header>
  );
};

Object.assign(window, { Nav });
