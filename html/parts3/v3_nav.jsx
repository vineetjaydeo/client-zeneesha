// ── Zeneesha V3 Nav ──────────────────────────────────
const NavV3 = () => {
  const [scrolled, setScrolled]     = React.useState(false);
  const [scrollDir, setScrollDir]   = React.useState('up');
  const [mobileOpen, setMobileOpen] = React.useState(false);
  const lastYRef = React.useRef(0);

  React.useEffect(() => {
    const onScroll = () => {
      const y = window.scrollY;
      if (y > lastYRef.current + 4)      setScrollDir('down');
      else if (y < lastYRef.current - 4) setScrollDir('up');
      setScrolled(y > 40);
      lastYRef.current = y;
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  // Hide when past threshold AND moving down
  const uiHidden = scrolled && scrollDir === 'down';

  const links = [
    { label: 'Services',     id: 'services'  },
    { label: 'How We Work',  id: 'approach'  },
    { label: 'Case Studies', id: 'proof'     },
    { label: 'FAQ',          id: 'faq'       },
  ];

  const slideTransition = 'transform 0.42s cubic-bezier(0.16,1,0.3,1)';

  return (
    <>
      {/* ── Header ─────────────────────────────────────── */}
      <header
        className={`fixed top-0 inset-x-0 z-50 ${scrolled ? 'nav-scrolled' : ''}`}
        style={{
          transform: uiHidden ? 'translateY(-100%)' : 'translateY(0)',
          transition: `${slideTransition}, background-color 0.5s, border-color 0.5s, box-shadow 0.5s`,
        }}
      >
        <div className="max-w-[1440px] mx-auto px-6 md:px-8 h-[68px] md:h-[76px] flex items-center justify-between">

          {/* Logo */}
          <a href="#top" className="flex items-center gap-4 group">
            <LogoFull height={34} />
            <span className="hidden md:inline-block pl-3 border-l border-navy/20 text-[12px] tracking-[0.18em] uppercase text-navy/55 font-mono">
              UK · EMEA
            </span>
          </a>

          {/* Desktop nav links */}
          <nav className="hidden lg:flex items-center gap-9 text-[16px]">
            {links.map((l) => (
              <a
                key={l.id}
                href={`#${l.id}`}
                className="font-medium text-navy/70 hover:text-navy transition-colors duration-200"
              >
                {l.label}
              </a>
            ))}
          </nav>

          {/* Right cluster */}
          <div className="flex items-center gap-3">
            {/* Booking status — desktop only */}
            <span className="hidden md:flex items-center gap-2 mr-2 text-[13px] text-navy/55 font-mono tracking-[0.04em]">
              <span className="status-dot w-2 h-2 rounded-full bg-emerald-500 flex-shrink-0" />
              Booking Q3 engagements
            </span>

            {/* CTA — desktop only */}
            <a
              href="#talk"
              className="hidden lg:inline-flex items-center gap-2 text-[16px] font-medium px-5 py-2.5 rounded-full bg-redorange text-white hover:bg-[#D63C23] transition-all duration-300 shadow-[0_8px_24px_-8px_rgba(232,71,44,0.5)]"
            >
              Book a Consultation
              <IconArrow size={13} />
            </a>

            {/* Mobile burger */}
            <button
              className="lg:hidden flex flex-col gap-1.5 p-1"
              onClick={() => setMobileOpen(!mobileOpen)}
              aria-label="Menu"
            >
              <span className={`block w-6 h-0.5 bg-navy transition-all duration-300 ${mobileOpen ? 'rotate-45 translate-y-2' : ''}`} />
              <span className={`block w-6 h-0.5 bg-navy transition-all duration-300 ${mobileOpen ? 'opacity-0' : ''}`} />
              <span className={`block w-6 h-0.5 bg-navy transition-all duration-300 ${mobileOpen ? '-rotate-45 -translate-y-2' : ''}`} />
            </button>
          </div>
        </div>

        {/* Mobile menu drawer */}
        <div
          className="lg:hidden overflow-hidden"
          style={{
            maxHeight: mobileOpen ? '420px' : '0',
            transition: 'max-height 0.4s cubic-bezier(0.16,1,0.3,1)',
            background: 'rgba(250,250,247,0.97)',
            backdropFilter: 'blur(14px)',
            WebkitBackdropFilter: 'blur(14px)',
          }}
        >
          <nav className="max-w-[1440px] mx-auto px-6 py-6 flex flex-col gap-1">
            {links.map((l) => (
              <a
                key={l.id}
                href={`#${l.id}`}
                onClick={() => setMobileOpen(false)}
                className="font-medium text-navy/80 text-[18px] py-3 border-b border-navy/8 hover:text-redorange transition-colors"
              >
                {l.label}
              </a>
            ))}
            <a
              href="#talk"
              onClick={() => setMobileOpen(false)}
              className="mt-4 inline-flex items-center justify-center gap-2 text-[18px] font-medium px-6 py-3.5 rounded-full bg-redorange text-white"
            >
              Book a Consultation
              <IconArrow size={14} />
            </a>
            {/* Booking status — centered */}
            <div className="mt-4 flex items-center justify-center gap-2 text-[13px] text-navy/45 font-mono tracking-[0.08em]">
              <span className="status-dot w-1.5 h-1.5 rounded-full bg-emerald-500 flex-shrink-0" />
              Booking Q3 engagements
            </div>
          </nav>
        </div>
      </header>

      {/* ── Mobile sticky bottom CTA ────────────────────── */}
      <a
        href="#talk"
        className="lg:hidden fixed inset-x-0 bottom-0 z-50 flex items-center justify-center gap-2 bg-redorange text-white text-[17px] font-medium shadow-[0_-4px_24px_-4px_rgba(232,71,44,0.35)]"
        style={{
          height: 52,
          transform: uiHidden ? 'translateY(100%)' : 'translateY(0)',
          transition: slideTransition,
        }}
      >
        Book a Consultation
        <IconArrow size={13} />
      </a>
    </>
  );
};

Object.assign(window, { NavV3 });
