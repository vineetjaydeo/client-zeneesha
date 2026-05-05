const Trust = () => {
  const clients = [
    { name: 'Brightwell', kind: 'wordmark' },
    { name: 'Lantern & Co.', kind: 'serif' },
    { name: 'Harlow Biosciences', kind: 'sans' },
    { name: 'Northwind Credit', kind: 'wordmark' },
    { name: 'Meridian Retail', kind: 'serif' },
    { name: 'Ashcombe Group', kind: 'sans' },
    { name: 'Veridia Health', kind: 'wordmark' },
    { name: 'Kestrel Logistics', kind: 'sans' },
  ];
  const row = [...clients, ...clients];

  return (
    <section className="relative py-20 border-y border-line bg-white overflow-hidden">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10 reveal">
          <h2 className="font-display text-navy text-[clamp(22px,2.4vw,32px)] leading-tight max-w-[540px]" style={{ fontWeight: 400 }}>
            Trusted by teams who don&rsquo;t <em className="italic text-navy/70">outsource their thinking.</em>
          </h2>
          <p className="text-[13px] text-slate2 max-w-[320px] font-mono tracking-[0.04em]">
            A selection of SMBs currently running Workday with us, across the UK and EMEA.
          </p>
        </div>
      </div>

      <div className="pause-on-hover relative">
        <div className="pointer-events-none absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-white to-transparent z-10" />
        <div className="pointer-events-none absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-white to-transparent z-10" />
        <div className="flex marquee-track gap-16 whitespace-nowrap">
          {row.map((c, i) => (
            <div key={i} className="flex items-center gap-3 opacity-55 hover:opacity-100 transition-opacity duration-300">
              <div className="w-7 h-7 border border-navy/40 flex items-center justify-center">
                <div className="w-2 h-2 bg-navy/40" />
              </div>
              <span
                className={`text-navy/80 ${c.kind === 'serif' ? 'font-display italic text-[26px]' : c.kind === 'sans' ? 'font-sans text-[22px] font-medium tracking-tight' : 'font-mono text-[15px] tracking-[0.22em] uppercase'}`}
                style={{ fontWeight: c.kind === 'serif' ? 300 : undefined }}
              >
                {c.name}
              </span>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { Trust });
