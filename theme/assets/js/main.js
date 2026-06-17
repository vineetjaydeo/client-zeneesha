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

  /* ── Nav: scroll hide / show + scrolled state ──────────────── */
  var nav = document.getElementById('site-nav');
  if (nav) {
    var lastY = 0;
    var updateNav = function () {
      var y = window.scrollY;
      nav.classList.toggle('scrolled', y > 40);
      if (y > lastY + 5) nav.classList.add('hidden-nav');
      else if (y < lastY - 5) nav.classList.remove('hidden-nav');
      lastY = y;
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

  /* ── Workday Inefficiency Calculator ─────────────────────── */
  var workdayCalc = document.querySelector('[data-workday-calculator]');
  if (workdayCalc) {
    var employeeValues = [
      500, 750, 1000, 1250, 1500, 1750, 2000, 2250, 2500, 2750, 3000,
      3500, 4000, 4500, 5000, 5500, 6000, 6500, 7000, 7500, 8000, 8500,
      9000, 9500, 10000
    ];
    var slider = workdayCalc.querySelector('[data-calc-slider]');
    var employeeCount = workdayCalc.querySelector('[data-calc-employee-count]');
    var totalCost = workdayCalc.querySelector('[data-calc-total-cost]');
    var lowAdoption = workdayCalc.querySelector('[data-calc-low-adoption]');
    var hrInefficiency = workdayCalc.querySelector('[data-calc-hr-inefficiency]');
    var reportingDelays = workdayCalc.querySelector('[data-calc-reporting-delays]');
    var governanceFailures = workdayCalc.querySelector('[data-calc-governance-failures]');
    var ticketBacklog = workdayCalc.querySelector('[data-calc-ticket-backlog]');
    var managerSelfService = workdayCalc.querySelector('[data-calc-manager-self-service]');
    var calcFocus = workdayCalc.querySelector('[data-calc-focus]');

    var currencyFormatter = new Intl.NumberFormat('en-GB', {
      style: 'currency',
      currency: 'GBP',
      maximumFractionDigits: 0
    });
    var numberFormatter = new Intl.NumberFormat('en-GB');

    function formatCurrency(value) {
      return currencyFormatter.format(Math.round(value));
    }

    function calculateWorkdayCosts(employees) {
      var managers = employees / 6;
      var hrStaff = employees / 60;
      var hrisStaff = employees / 600;
      var lowAdoptionCost = employees * 5 * 52 / 60 * 30;
      var hrInefficiencyCost = hrStaff * 60000 * 0.10;
      var reportingDelayCost = hrisStaff * 10 * 52 * 40;
      var governanceFailureCost = 200000 * Math.pow(employees / 3000, 0.85);
      var ticketBacklogCost = hrisStaff * 70000 * 0.30;
      var managerSelfServiceCost = managers * 15 * 12 / 60 * 50;
      return {
        lowAdoptionCost: lowAdoptionCost,
        hrInefficiencyCost: hrInefficiencyCost,
        reportingDelayCost: reportingDelayCost,
        governanceFailureCost: governanceFailureCost,
        ticketBacklogCost: ticketBacklogCost,
        managerSelfServiceCost: managerSelfServiceCost,
        total: lowAdoptionCost + hrInefficiencyCost + reportingDelayCost + governanceFailureCost + ticketBacklogCost + managerSelfServiceCost
      };
    }

    function updateWorkdayCalculator() {
      var idx = Number(slider.value);
      var employees = employeeValues[idx] || employeeValues[0];
      var costs = calculateWorkdayCosts(employees);
      var progress = idx / (employeeValues.length - 1) * 100;

      workdayCalc.style.setProperty('--calc-progress', progress + '%');
      employeeCount.textContent = numberFormatter.format(employees);
      totalCost.textContent = formatCurrency(costs.total);
      lowAdoption.textContent = formatCurrency(costs.lowAdoptionCost);
      hrInefficiency.textContent = formatCurrency(costs.hrInefficiencyCost);
      reportingDelays.textContent = formatCurrency(costs.reportingDelayCost);
      governanceFailures.textContent = formatCurrency(costs.governanceFailureCost);
      ticketBacklog.textContent = formatCurrency(costs.ticketBacklogCost);
      managerSelfService.textContent = formatCurrency(costs.managerSelfServiceCost);
    }

    if (slider) {
      slider.max = String(employeeValues.length - 1);
      slider.addEventListener('input', updateWorkdayCalculator);
      if (calcFocus) {
        calcFocus.addEventListener('click', function () {
          slider.focus();
        });
      }
      updateWorkdayCalculator();
    }
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

  var faqAccordion = document.querySelector('.faq-accordion');
  if (faqAccordion) {
    var lazyFaqItems = Array.prototype.slice.call(faqAccordion.querySelectorAll('.faq-item--lazy'));
    if (lazyFaqItems.length) {
      faqAccordion.classList.add('faq-lazy-ready');
      var showLazyFaqs = function () {
        lazyFaqItems.forEach(function (item) { item.classList.add('in'); });
      };

      if ('IntersectionObserver' in window) {
        var faqLazyObs = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              showLazyFaqs();
              faqLazyObs.unobserve(entry.target);
            }
          });
        }, { threshold: 0.2, rootMargin: '0px 0px -80px 0px' });
        faqLazyObs.observe(faqAccordion);
      } else {
        showLazyFaqs();
      }
    }
  }

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
            msgEl.textContent = 'Thank you. We\'ll be in touch within one working day.';
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

})();
