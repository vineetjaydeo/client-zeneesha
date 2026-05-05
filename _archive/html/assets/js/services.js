/* ===== SERVICES PAGE — FAQ + Form ===== */

// FAQ Accordion
(function() {
  document.querySelectorAll('.faq-question').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var item = this.parentElement;
      var isOpen = item.classList.contains('open');

      // Close all
      document.querySelectorAll('.faq-item').forEach(function(fi) {
        fi.classList.remove('open');
        fi.querySelector('.faq-question').setAttribute('aria-expanded', 'false');
      });

      // Open clicked (if was closed)
      if (!isOpen) {
        item.classList.add('open');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
})();

// Form submission
(function() {
  var form = document.getElementById('contactForm');
  if (!form) return;

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    var submitBtn = form.querySelector('.form-submit');
    var firstName = document.getElementById('firstName').value;
    var email = document.getElementById('email').value;

    submitBtn.innerHTML = '<span style="display:inline-block;width:18px;height:18px;border:2px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:spin 0.6s linear infinite;"></span> Submitting...';
    submitBtn.disabled = true;

    // Add spinner keyframe
    if (!document.getElementById('spinStyle')) {
      var style = document.createElement('style');
      style.id = 'spinStyle';
      style.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
      document.head.appendChild(style);
    }

    setTimeout(function() {
      form.style.display = 'none';
      var success = document.getElementById('formSuccess');
      success.classList.add('show');
      document.getElementById('successMessage').innerHTML = '<strong>' + firstName + '</strong>, we have received your enquiry at <strong>' + email + '</strong>.';
      // Re-initialise icons for success state
      if (typeof lucide !== 'undefined') {
        lucide.createIcons();
      }
    }, 1200);
  });
})();
