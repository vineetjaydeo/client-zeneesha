const Insights = () => {
  const articles = [
    {
      tag: 'Financials',
      title: 'What Workday Financials actually costs an SMB.',
      time: '7 min read',
      blurb: 'The sticker price is the easy part. Here is the total, over three years, with the line items most decks quietly omit.',
      art: ({}) => (
        <svg viewBox="0 0 300 200" className="w-full h-full">
          <rect width="300" height="200" fill="#FAFAF7" />
          <g stroke="#1E3A8A" strokeOpacity=".15" strokeWidth="1">
            {Array.from({length: 8}).map((_,i)=>(<line key={i} x1="0" y1={i*25} x2="300" y2={i*25} />))}
          </g>
          <path d="M20 150 L70 120 L120 135 L170 90 L220 70 L280 40" fill="none" stroke="#1E3A8A" strokeWidth="2" />
          <path d="M20 170 L70 160 L120 158 L170 140 L220 130 L280 110" fill="none" stroke="#E8472C" strokeWidth="2" />
          <circle cx="280" cy="40" r="4" fill="#1E3A8A" />
          <circle cx="280" cy="110" r="4" fill="#E8472C" />
        </svg>
      ),
    },
    {
      tag: 'HCM',
      title: 'HCM migration. The three mistakes we see every year.',
      time: '9 min read',
      blurb: 'Written after sitting inside fourteen cutover weekends. We have opinions, and most of them are about people, not the platform.',
      art: () => (
        <svg viewBox="0 0 300 200" className="w-full h-full">
          <rect width="300" height="200" fill="#FAFAF7" />
          <g>
            {Array.from({length: 3}).map((_, row)=> Array.from({length: 6}).map((_, col)=> (
              <circle key={`${row}-${col}`} cx={40+col*45} cy={60+row*45} r={row===1&&col===2?14:10} fill={row===1&&col===2?'#E8472C':'#1E3A8A'} fillOpacity={row===1&&col===2?1:0.18}/>
            )))}
            <line x1="40" y1="150" x2="260" y2="150" stroke="#1E3A8A" strokeOpacity=".3" />
          </g>
        </svg>
      ),
    },
    {
      tag: 'Analytics',
      title: 'Prism, honestly. When it earns its keep, and when it does not.',
      time: '6 min read',
      blurb: 'A practitioner\'s guide, not a sales sheet. Three SMB scenarios where Prism paid for itself, and two where a spreadsheet would have done fine.',
      art: () => (
        <svg viewBox="0 0 300 200" className="w-full h-full">
          <rect width="300" height="200" fill="#FAFAF7" />
          {Array.from({length: 10}).map((_,i)=>(
            <rect key={i} x={20+i*26} y={180-(30+Math.abs(Math.sin(i)*80))} width="18" height={30+Math.abs(Math.sin(i)*80)} fill={i===5?'#E8472C':'#1E3A8A'} fillOpacity={i===5?1:0.2} />
          ))}
          <line x1="14" y1="180" x2="280" y2="180" stroke="#1E3A8A" strokeOpacity=".3" />
        </svg>
      ),
    },
  ];

  return (
    <section id="insights" className="relative py-32 bg-cream">
      <div className="max-w-[1400px] mx-auto px-8">
        <div className="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
          <div>
            <div className="reveal flex items-center gap-3 text-[11px] font-mono tracking-[0.22em] uppercase text-redorange mb-5">
              <span className="w-6 h-px bg-redorange" />
              <span>05 · Field notes</span>
            </div>
            <h2 className="reveal delay-1 font-display text-navy text-[clamp(36px,4.6vw,64px)] leading-[1.02]" style={{ fontWeight: 300 }}>
              Things we&rsquo;ve learned, <br/>
              <em className="italic text-navy/70">written down.</em>
            </h2>
          </div>
          <a href="#" className="reveal delay-2 u-link text-[14px] font-medium text-navy self-start md:self-end">
            All field notes
            <IconArrow size={13} />
          </a>
        </div>

        <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
          {articles.map((a, i) => (
            <a href="#" key={a.title} className={`ins-card group block bg-white border border-navy/10 reveal delay-${i + 1} card-lift hover:border-redorange/40`}>
              <div className="relative aspect-[3/2] overflow-hidden bg-cream border-b border-navy/10">
                <div className="ins-art absolute inset-0">
                  <a.art />
                </div>
                <div className="absolute left-4 top-4 text-[10px] font-mono tracking-[0.22em] uppercase text-redorange bg-white/85 backdrop-blur px-2 py-1">{a.tag}</div>
                <div className="absolute right-4 top-4 text-navy/40 group-hover:text-redorange transition-colors">
                  <IconCorner size={16} />
                </div>
              </div>
              <div className="p-7">
                <h3 className="font-display text-navy text-[24px] leading-[1.15] mb-4" style={{ fontWeight: 400 }}>
                  {a.title}
                </h3>
                <p className="text-[14px] leading-[1.65] text-slate2 mb-6">{a.blurb}</p>
                <div className="flex items-center justify-between text-[12px] font-mono tracking-[0.12em] text-navy/55 uppercase">
                  <span>{a.time}</span>
                  <span className="flex items-center gap-1.5 text-redorange">Read <IconArrow size={10} /></span>
                </div>
              </div>
            </a>
          ))}
        </div>
      </div>
    </section>
  );
};

Object.assign(window, { Insights });
