// ── Zeneesha V3 Certifications Strip ─────────────────
const CertificationsV3 = () => {
  const certs = [
    {
      name: 'Workday Sales Partner',
      img: 'https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-sales-partner@4x.png',
      imgH: 64,
    },
    {
      name: 'Workday Services Partner',
      img: 'https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-services-partner@4x.png',
      imgH: 64,
    },
    {
      name: 'IAF Member',
      img: 'https://www.zeneesha.com/wp-content/uploads/2021/12/IAF-Logo.png',
      imgH: 60,
    },
    {
      name: 'MSDUK',
      img: 'https://www.zeneesha.com/wp-content/uploads/2024/01/MSDNUK.png',
      imgH: 41,
    },
    {
      name: 'Cyber Essentials Certified',
      img: 'https://www.zeneesha.com/wp-content/uploads/2021/12/Cyber-Essentials-Logo_1.png',
      imgH: 64,
    },
  ];

  return (
    <section className="relative py-12 bg-cream2 border-t border-navy/10 overflow-hidden">
      <div className="max-w-[1440px] mx-auto px-8">

        {/* Heading */}
        <div className="text-center mb-10">
          <p className="font-sans text-navy text-[15px] tracking-[0.12em] uppercase" style={{ fontWeight: 500, letterSpacing: '0.14em' }}>
            Accredited <span className="text-redorange mx-1">·</span> Certified <span className="text-redorange mx-1">·</span> Trusted
          </p>
        </div>

        <div className="flex flex-wrap items-center justify-center gap-10 md:gap-16">
          {certs.map((cert) => (
            <div
              key={cert.name}
              title={cert.name}
              style={{ display: 'flex', alignItems: 'center', justifyContent: 'center', opacity: 0.8, transition: 'opacity 0.3s ease', cursor: 'default' }}
              onMouseEnter={e => e.currentTarget.style.opacity = '1'}
              onMouseLeave={e => e.currentTarget.style.opacity = '0.8'}
            >
              <img
                src={cert.img}
                alt={cert.name}
                style={{ height: cert.imgH, width: 'auto', maxWidth: 200, objectFit: 'contain', display: 'block' }}
              />
            </div>
          ))}
        </div>

      </div>
    </section>
  );
};

Object.assign(window, { CertificationsV3 });
