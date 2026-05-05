/* ===== HOMEPAGE — Parallax ===== */
(function() {
  var heroBg = document.getElementById('heroBg');
  if (!heroBg) return;

  window.addEventListener('scroll', function() {
    if (window.scrollY < window.innerHeight) {
      heroBg.style.transform = 'translateY(' + (window.scrollY * 0.3) + 'px)';
    }
  }, { passive: true });
})();
