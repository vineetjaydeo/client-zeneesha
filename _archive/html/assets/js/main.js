/* ===== ZENEESHA — Shared JS ===== */

// Navigation scroll
(function() {
  var nav = document.getElementById('nav');
  if (!nav) return;

  window.addEventListener('scroll', function() {
    if (window.scrollY > 40) {
      nav.classList.add('scrolled');
    } else {
      nav.classList.remove('scrolled');
    }
  }, { passive: true });

  // Mobile menu toggle
  var toggle = document.getElementById('mobileToggle');
  var links = document.getElementById('navLinks');
  if (toggle && links) {
    toggle.addEventListener('click', function() {
      links.classList.toggle('mobile-open');
    });
  }
})();

// Intersection Observer for scroll animations
(function() {
  var observer = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .stagger, .numbers').forEach(function(el) {
    observer.observe(el);
  });
})();

// Lucide icons
if (typeof lucide !== 'undefined') {
  lucide.createIcons();
}
