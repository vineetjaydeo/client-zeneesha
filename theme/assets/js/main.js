/* ─── Zeneesha V5 — main.js ─── */
'use strict';

(function () {

  /* ── IntersectionObserver: Reveal ─────────────────────────── */
  var revealObs = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        revealObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.reveal').forEach(function (el) {
    revealObs.observe(el);
  });

  /* ── Hero kinetic headline ─────────────────────────────────── */
  document.querySelectorAll('.kline-inner').forEach(function (el, i) {
    setTimeout(function () { el.classList.add('in'); }, 80 + i * 100);
  });

  /* ── Nav: scroll hide / show + scrolled state + hero-aware ─── */
  var nav = document.getElementById('site-nav');
  if (nav) {
    var lastY = 0;
    var heroSection = document.querySelector('.page-hero-fullbg');
    var updateNav = function () {
      var y = window.scrollY;
      nav.classList.toggle('scrolled', y > 40);
      if (y > lastY + 5) nav.classList.add('hidden-nav');
      else if (y < lastY - 5) nav.classList.remove('hidden-nav');
      lastY = y;
      // Hero-aware: white links while overlaying a dark hero
      if (heroSection && !nav.classList.contains('nav--solid')) {
        var heroBottom = heroSection.offsetTop + heroSection.offsetHeight - 72;
        nav.classList.toggle('nav--on-dark', y < heroBottom);
      }
    };
    window.addEventListener('scroll', updateNav, { passive: true });
    updateNav();
  }

  /* ── Mobile hamburger ──────────────────────────────────────── */
  var burger = document.getElementById('nav-hamburger');
  var mobileMenu = document.getElementById('mobile-menu');
  var mobileBottomCta = document.querySelector('.mobile-bottom-cta');
  if (burger && mobileMenu) {
    burger.addEventListener('click', function () {
      var open = mobileMenu.classList.toggle('open');
      burger.classList.toggle('open', open);
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    mobileMenu.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        mobileMenu.classList.remove('open');
        burger.classList.remove('open');
      });
    });
  }

  /* ── Hero Ticker ───────────────────────────────────────────── */
  var tickerContainer = document.querySelector('.hero-ticker-container');
  if (tickerContainer) {
    var ITEMS = [
      { tag: 'Post Go-Live',  title: 'Workday doing more than it should?',    desc: 'Recurring workarounds, manual steps, and config debt accumulate fast after go-live.',                      color: 'linear-gradient(140deg,#E8472C,#F57C1F)' },
      { tag: 'Adoption',      title: 'Your team not actually using it?',       desc: "Low adoption means the ROI you planned for isn't landing where it should.",                              color: 'linear-gradient(140deg,#3B9EDB,#1E3A8A)' },
      { tag: 'Reporting',     title: 'Leaders still waiting on answers?',      desc: 'If reports take days to build, the decisions they drive are already delayed.',                           color: 'linear-gradient(140deg,#F57C1F,#E8472C)' },
      { tag: 'AI Readiness',  title: "Can't unlock Workday's AI yet?",         desc: "Workday's AI roadmap is live. Without clean data and optimised config, you won't see the benefit.",     color: 'linear-gradient(140deg,#1E3A8A,#3B9EDB)' },
      { tag: 'AMS',           title: 'Change requests piling up?',             desc: 'Every release adds complexity. Without dedicated support, your backlog only grows.',                    color: 'linear-gradient(140deg,#E8472C,#1E3A8A)' }
    ];

    var CARD_H = 116, CARD_GAP = 10, VISIBLE = 3;
    var UNIT = CARD_H + CARD_GAP;

    tickerContainer.style.height = (VISIBLE * CARD_H + (VISIBLE - 1) * CARD_GAP) + 'px';

    var wrap = document.createElement('div');
    wrap.className = 'ticker-wrap';
    tickerContainer.appendChild(wrap);

    var deck = ITEMS.slice(0, VISIBLE);
    var nextIdx = VISIBLE % ITEMS.length;

    function makeCard(item, hasMargin) {
      var outer = document.createElement('div');
      outer.style.height = CARD_H + 'px';
      if (hasMargin) outer.style.marginBottom = CARD_GAP + 'px';
      outer.innerHTML =
        '<div class="ticker-card">' +
          '<div class="ticker-tag">' +
            '<span class="ticker-dot" style="background:' + item.color + '"></span>' +
            '<span class="ticker-tag-text">' + item.tag + '</span>' +
          '</div>' +
          '<div class="ticker-title">' + item.title + '</div>' +
          '<div class="ticker-desc">' + item.desc + '</div>' +
        '</div>';
      return outer;
    }

    function renderDeck() {
      wrap.innerHTML = '';
      deck.forEach(function (item, i) {
        wrap.appendChild(makeCard(item, i < deck.length - 1));
      });
    }

    renderDeck();

    setInterval(function () {
      var newItem = ITEMS[nextIdx];
      nextIdx = (nextIdx + 1) % ITEMS.length;

      var newCard = makeCard(newItem, true);
      wrap.insertBefore(newCard, wrap.firstChild);

      wrap.style.transition = 'none';
      wrap.style.transform = 'translateY(-' + UNIT + 'px)';

      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          wrap.style.transition = 'transform .52s cubic-bezier(.16,1,.3,1)';
          wrap.style.transform = 'translateY(0)';
        });
      });

      setTimeout(function () {
        while (wrap.children.length > VISIBLE) wrap.removeChild(wrap.lastChild);
        if (wrap.lastElementChild) wrap.lastElementChild.style.marginBottom = '0';
        wrap.style.transition = 'none';
        wrap.style.transform = 'translateY(0)';
      }, 650);

    }, 3200);
  }

  /* ── Solutions Tabs ────────────────────────────────────────── */
  var solTabs   = document.querySelectorAll('[data-sol-tab]');
  var solPanels = document.querySelectorAll('[data-sol-panel]');
  var svgNodes  = document.querySelectorAll('.lc-node');

  if (solTabs.length) {
    function activateSol(idx) {
      solTabs.forEach(function (t, i) {
        t.classList.toggle('active', i === idx);
        var svcColor = t.getAttribute('data-color');
        if (i === idx && svcColor) {
          t.style.background = svcColor;
          t.style.borderColor = svcColor;
        } else {
          t.style.background = '';
          t.style.borderColor = '';
        }
      });
      solPanels.forEach(function (p, i) { p.classList.toggle('active', i === idx); });
      svgNodes.forEach(function (n, i) { n.classList.toggle('active', i === idx); });
    }

    solTabs.forEach(function (t, i) { t.addEventListener('click', function () { activateSol(i); }); });
    svgNodes.forEach(function (n, i) { n.addEventListener('click', function () { activateSol(i); }); });
    activateSol(0);
  }

  /* ── FAQ Accordion ─────────────────────────────────────────── */
  document.querySelectorAll('.faq-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item').forEach(function (el) { el.classList.remove('open'); });
      if (!isOpen) item.classList.add('open');
    });
  });

  /* ── Contact form AJAX ─────────────────────────────────────── */
  var contactForm = document.getElementById('cta-contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var btn = contactForm.querySelector('.form-submit');
      var msgEl = document.getElementById('form-message');
      btn.disabled = true;
      btn.textContent = 'Sending…';

      var data = new FormData(contactForm);
      data.append('action', 'zeneesha_contact');
      data.append('nonce', zeneesha_ajax.nonce);

      fetch(zeneesha_ajax.url, { method: 'POST', body: data })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (res.success) {
            contactForm.reset();
            msgEl.className = 'form-msg success';
            msgEl.textContent = 'Thank you — we\'ll be in touch within one working day.';
          } else {
            msgEl.className = 'form-msg error';
            msgEl.textContent = 'Something went wrong. Please email us directly at hello@zeneesha.co.uk';
          }
        })
        .catch(function () {
          msgEl.className = 'form-msg error';
          msgEl.textContent = 'Network error. Please try again or email hello@zeneesha.co.uk';
        })
        .finally(function () {
          btn.disabled = false;
          btn.textContent = 'Book My Complimentary Health Check';
        });
    });
  }

  /* ── Progress bar (service pages) ─────────────────────────── */
  var progressBar = document.getElementById('reading-progress');
  if (progressBar) {
    window.addEventListener('scroll', function () {
      var h = document.documentElement;
      var pct = (h.scrollTop / (h.scrollHeight - h.clientHeight)) * 100;
      progressBar.style.width = Math.min(100, pct) + '%';
    }, { passive: true });
  }

  /* ── Number counter animation ──────────────────────────────── */
  var countEls = document.querySelectorAll('[data-count]');
  if (countEls.length) {
    var countObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el = entry.target;
        var target = parseInt(el.getAttribute('data-count'), 10);
        var duration = target > 200 ? 1800 : 1200;
        var startTime = null;
        function animate(ts) {
          if (!startTime) startTime = ts;
          var progress = Math.min((ts - startTime) / duration, 1);
          var eased = 1 - Math.pow(1 - progress, 3);
          el.textContent = Math.round(eased * target);
          if (progress < 1) requestAnimationFrame(animate);
        }
        requestAnimationFrame(animate);
        countObs.unobserve(el);
      });
    }, { threshold: 0.6 });
    countEls.forEach(function (el) { countObs.observe(el); });
  }

  /* ── Parallax blobs ────────────────────────────────────────── */
  var parallaxEls = document.querySelectorAll('[data-parallax]');
  if (parallaxEls.length && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    var ticking = false;
    window.addEventListener('scroll', function () {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(function () {
        var y = window.scrollY;
        parallaxEls.forEach(function (el) {
          var speed = parseFloat(el.getAttribute('data-parallax')) || 0.1;
          el.style.transform = 'translateY(' + (y * speed) + 'px)';
        });
        ticking = false;
      });
    }, { passive: true });
  }

  /* ── Rhythm wrap stagger trigger ───────────────────────────── */
  var rhythmWrap = document.querySelector('.svc-rhythm-wrap');
  if (rhythmWrap) {
    revealObs.observe(rhythmWrap);
  }

  /* ── Careers: role JD expand/collapse ───────────────────────── */
  document.querySelectorAll('.careers-jd-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var expanded = btn.getAttribute('aria-expanded') === 'true';
      var targetId = btn.getAttribute('aria-controls');
      var panel = document.getElementById(targetId);
      if (!panel) return;
      if (expanded) {
        btn.setAttribute('aria-expanded', 'false');
        btn.querySelector('.careers-jd-btn-label').textContent = 'View full role details';
        panel.hidden = true;
      } else {
        btn.setAttribute('aria-expanded', 'true');
        btn.querySelector('.careers-jd-btn-label').textContent = 'Hide role details';
        panel.hidden = false;
      }
    });
  });

  /* ── Careers: Apply now — pre-fill role interest field ──────── */
  document.querySelectorAll('.careers-apply-btn').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      var roleTitle = btn.getAttribute('data-role');
      var roleInput = document.getElementById('careers_role_interest');
      if (roleTitle && roleInput) {
        roleInput.value = roleTitle;
      }
    });
  });

  /* ── Careers: file input display filename ───────────────────── */
  var cvInput = document.getElementById('careers_cv');
  var cvFileName = document.getElementById('careers-file-name');
  var cvFileLabel = document.querySelector('.careers-file-label');
  if (cvInput) {
    cvInput.addEventListener('change', function () {
      if (cvInput.files && cvInput.files[0]) {
        var name = cvInput.files[0].name;
        if (cvFileName) cvFileName.textContent = name;
        if (cvFileLabel) cvFileLabel.textContent = 'File selected';
      } else {
        if (cvFileName) cvFileName.textContent = '';
        if (cvFileLabel) cvFileLabel.textContent = 'Choose file';
      }
    });
  }

  /* ── Careers form AJAX (multipart — supports file upload) ────── */
  var careersForm = document.getElementById('careers-contact-form');
  if (careersForm) {
    careersForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var btn    = document.getElementById('careers-submit-btn');
      var msgEl  = document.getElementById('careers-form-message');
      var name   = careersForm.querySelector('[name="careers_name"]').value.trim();
      var email  = careersForm.querySelector('[name="careers_email"]').value.trim();

      // Client-side validation
      if (!name || !email) {
        msgEl.className = 'form-msg error';
        msgEl.textContent = 'Please fill in your name and email address.';
        return;
      }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        msgEl.className = 'form-msg error';
        msgEl.textContent = 'Please enter a valid email address.';
        return;
      }

      btn.disabled = true;
      btn.textContent = 'Sending…';
      msgEl.className = 'form-msg';
      msgEl.textContent = '';

      var data = new FormData(careersForm);
      // Nonce is already in the form via wp_nonce_field — action field too
      // zeneesha_ajax is localised from functions.php
      if (typeof zeneesha_ajax !== 'undefined') {
        data.set('action', 'zeneesha_careers');
      }

      fetch(
        typeof zeneesha_ajax !== 'undefined' ? zeneesha_ajax.url : '/wp-admin/admin-ajax.php',
        { method: 'POST', body: data }
      )
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (res.success) {
            careersForm.reset();
            if (cvFileName) cvFileName.textContent = '';
            if (cvFileLabel) cvFileLabel.textContent = 'Choose file';
            msgEl.className = 'form-msg success';
            msgEl.textContent = 'Thank you — we\'ll be in touch within 5 working days.';
          } else {
            msgEl.className = 'form-msg error';
            msgEl.textContent = (res.data && res.data.message)
              ? res.data.message
              : 'Something went wrong. Please email us at hello@zeneesha.co.uk';
          }
        })
        .catch(function () {
          msgEl.className = 'form-msg error';
          msgEl.textContent = 'Network error. Please try again or email hello@zeneesha.co.uk';
        })
        .finally(function () {
          btn.disabled = false;
          btn.textContent = 'Send Application →';
        });
    });
  }

})();
