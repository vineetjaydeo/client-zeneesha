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
    var mobileServiceToggle = mobileMenu.querySelector('.mobile-nav-toggle');
    var mobileServiceGroup = mobileMenu.querySelector('.mobile-nav-group');

    function closeMobileMenu() {
      mobileMenu.classList.remove('open');
      burger.classList.remove('open');
      burger.setAttribute('aria-expanded', 'false');
      if (mobileServiceToggle && mobileServiceGroup) {
        mobileServiceGroup.classList.remove('open');
        mobileServiceToggle.setAttribute('aria-expanded', 'false');
      }
    }

    burger.addEventListener('click', function () {
      var open = mobileMenu.classList.toggle('open');
      burger.classList.toggle('open', open);
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    if (mobileServiceToggle && mobileServiceGroup) {
      mobileServiceToggle.addEventListener('click', function () {
        var open = mobileServiceGroup.classList.toggle('open');
        mobileServiceToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      });
    }
    mobileMenu.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        closeMobileMenu();
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
    var implementationDebt = workdayCalc.querySelector('[data-calc-implementation-debt]');
    var reactiveSupport = workdayCalc.querySelector('[data-calc-reactive-support]');
    var dataLatency = workdayCalc.querySelector('[data-calc-data-latency]');
    var aiLicenseValue = workdayCalc.querySelector('[data-calc-ai-license-value]');
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
      var total = lowAdoptionCost + hrInefficiencyCost + reportingDelayCost + governanceFailureCost + ticketBacklogCost + managerSelfServiceCost;
      return {
        implementationDebtCost: total * 0.30,
        reactiveSupportCost: total * 0.40,
        dataLatencyCost: total * 0.15,
        aiLicenseValueCost: total * 0.15,
        total: total
      };
    }

    function updateWorkdayCalculator() {
      var idx = Number(slider.value);
      var employees = employeeValues[idx] || employeeValues[0];
      var costs = calculateWorkdayCosts(employees);
      var progress = idx / (employeeValues.length - 1) * 100;

      workdayCalc.style.setProperty('--calc-progress', progress + '%');
      employeeCount.textContent = employees >= 10000 ? '10,000+' : numberFormatter.format(employees);
      totalCost.textContent = formatCurrency(costs.total);
      implementationDebt.textContent = formatCurrency(costs.implementationDebtCost);
      reactiveSupport.textContent = formatCurrency(costs.reactiveSupportCost);
      dataLatency.textContent = formatCurrency(costs.dataLatencyCost);
      aiLicenseValue.textContent = formatCurrency(costs.aiLicenseValueCost);
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

  /* ── Home service tabs ─────────────────────────────────────── */
  document.querySelectorAll('[data-service-tabs]').forEach(function (tabsRoot) {
    var tabs = Array.prototype.slice.call(tabsRoot.querySelectorAll('[data-service-tab]'));
    var panels = Array.prototype.slice.call(tabsRoot.querySelectorAll('[data-service-panel]'));
    var prev = tabsRoot.querySelector('[data-service-tab-prev]');
    var next = tabsRoot.querySelector('[data-service-tab-next]');
    if (!tabs.length || !panels.length) return;

    var activeIndex = 0;

    function setActive(index, shouldScroll) {
      activeIndex = Math.max(0, Math.min(index, tabs.length - 1));
      tabs.forEach(function (tab, i) {
        var active = i === activeIndex;
        tab.classList.toggle('is-active', active);
        tab.setAttribute('aria-selected', active ? 'true' : 'false');
        tab.setAttribute('tabindex', active ? '0' : '-1');
      });
      panels.forEach(function (panel, i) {
        panel.classList.toggle('is-active', i === activeIndex);
      });
      if (prev) prev.disabled = activeIndex === 0;
      if (next) next.disabled = activeIndex === tabs.length - 1;
      if (shouldScroll && tabs[activeIndex]) {
        tabs[activeIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
      }
    }

    var canHoverTabs = window.matchMedia && window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    tabs.forEach(function (tab, i) {
      tab.addEventListener('click', function () { setActive(i, true); });
      if (canHoverTabs) {
        tab.addEventListener('mouseenter', function () { setActive(i, false); });
      }
      tab.addEventListener('keydown', function (event) {
        var nextIndex = i;
        if (event.key === 'ArrowRight') nextIndex = (i + 1) % tabs.length;
        else if (event.key === 'ArrowLeft') nextIndex = (i - 1 + tabs.length) % tabs.length;
        else return;
        event.preventDefault();
        tabs[nextIndex].focus();
        setActive(nextIndex, true);
      });
    });
    if (prev) prev.addEventListener('click', function () { setActive(activeIndex - 1, true); });
    if (next) next.addEventListener('click', function () { setActive(activeIndex + 1, true); });
    setActive(0, false);
  });

  /* ── Looping carousels ─────────────────────────────────────── */
  document.querySelectorAll('[data-loop-carousel]').forEach(function (carousel) {
    var track = carousel.querySelector('[data-loop-track]');
    var prev = carousel.querySelector('[data-loop-prev]');
    var next = carousel.querySelector('[data-loop-next]');
    var dotsEl = carousel.querySelector('[data-loop-dots]');
    var cardClass = carousel.getAttribute('data-loop-card-class');
    var dotClass = carousel.getAttribute('data-loop-dot-class') || 'home-carousel-dot';
    if (!track || !prev || !next || !dotsEl || !cardClass) return;

    var originalCards = Array.prototype.slice.call(track.querySelectorAll('.' + cardClass));
    var count = originalCards.length;
    if (count < 2) return;

    function makeClone(card) {
      var clone = card.cloneNode(true);
      clone.setAttribute('aria-hidden', 'true');
      clone.querySelectorAll('a,button,input,select,textarea,[tabindex]').forEach(function (focusable) {
        focusable.setAttribute('tabindex', '-1');
      });
      return clone;
    }

    originalCards.slice().reverse().forEach(function (card) {
      track.insertBefore(makeClone(card), track.firstChild);
    });
    originalCards.forEach(function (card) {
      track.appendChild(makeClone(card));
    });

    var offset = count;
    var timer = null;
    var snapping = false;
    var autoStopped = false;

    for (var i = 0; i < count; i += 1) {
      var dot = document.createElement('button');
      dot.type = 'button';
      dot.className = dotClass + (i === 0 ? ' active' : '');
      dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
      dot.setAttribute('data-loop-dot', String(i));
      dotsEl.appendChild(dot);
    }

    function getStep() {
      var card = track.querySelectorAll('.' + cardClass)[count];
      if (!card) return 400;
      var gap = parseFloat(window.getComputedStyle(track).columnGap) || 0;
      return card.offsetWidth + gap;
    }

    function updateDots() {
      var realIndex = ((offset - count) % count + count) % count;
      dotsEl.querySelectorAll('[data-loop-dot]').forEach(function (dot, i) {
        dot.classList.toggle('active', i === realIndex);
      });
    }

    function setTranslate(animated) {
      if (!animated) track.style.transition = 'none';
      track.style.transform = 'translateX(-' + (offset * getStep()) + 'px)';
      if (!animated) {
        track.offsetHeight;
        track.style.transition = '';
      }
    }

    function goTo(nextOffset) {
      offset = nextOffset;
      setTranslate(true);
      updateDots();
    }

    function startAuto() {
      if (autoStopped) return;
      clearInterval(timer);
      timer = setInterval(function () { goTo(offset + 1); }, 5200);
    }

    function stopAuto() {
      autoStopped = true;
      clearInterval(timer);
    }

    track.addEventListener('transitionend', function () {
      if (snapping) return;
      if (offset >= count * 2) {
        snapping = true;
        offset -= count;
        setTranslate(false);
        snapping = false;
      } else if (offset < count) {
        snapping = true;
        offset += count;
        setTranslate(false);
        snapping = false;
      }
      updateDots();
    });

    prev.addEventListener('click', function () { goTo(offset - 1); stopAuto(); });
    next.addEventListener('click', function () { goTo(offset + 1); stopAuto(); });
    dotsEl.addEventListener('click', function (event) {
      var dot = event.target.closest('[data-loop-dot]');
      if (!dot) return;
      goTo(count + parseInt(dot.getAttribute('data-loop-dot'), 10));
      stopAuto();
    });
    window.addEventListener('resize', function () { setTranslate(false); }, { passive: true });

    setTranslate(false);
    startAuto();
  });

  /* ── AMS interactive dial ─────────────────────────────────── */
  document.querySelectorAll('[data-ams-dial]').forEach(function (dial) {
    var jsonEl = dial.querySelector('[data-ams-dial-json]');
    var items = [];

    if (jsonEl) {
      try {
        items = JSON.parse(jsonEl.textContent || '[]');
      } catch (err) {
        items = [];
      }
    }

    var wheel = dial.querySelector('[data-ams-dial-wheel]');
    var nodes = Array.prototype.slice.call(dial.querySelectorAll('[data-ams-dial-node]'));
    var pills = Array.prototype.slice.call(dial.querySelectorAll('[data-ams-dial-pill]'));
    var count = dial.querySelector('[data-ams-dial-count]');
    var title = dial.querySelector('[data-ams-dial-title]');
    var body = dial.querySelector('[data-ams-dial-body]');
    var core = dial.querySelector('.svc-ams-dial-core');
    var activeIndex = 0;
    var currentAngle = null;

    function shortestAngle(from, to) {
      if (from === null) return to;
      var delta = ((to - from + 540) % 360) - 180;
      return from + delta;
    }

    function updateDialHand(index, instant) {
      if (!wheel || !core || !nodes[index]) return;

      var wheelRect = wheel.getBoundingClientRect();
      var coreRect = core.getBoundingClientRect();
      var nodeRect = nodes[index].getBoundingClientRect();
      var originX = coreRect.left + coreRect.width / 2 - wheelRect.left;
      var originY = coreRect.top + coreRect.height / 2 - wheelRect.top;
      var targetX = nodeRect.left + nodeRect.width / 2 - wheelRect.left;
      var targetY = nodeRect.top + nodeRect.height / 2 - wheelRect.top;
      var dx = targetX - originX;
      var dy = targetY - originY;
      var targetAngle = Math.atan2(dy, dx) * 180 / Math.PI;
      var targetLength = Math.sqrt(dx * dx + dy * dy);

      currentAngle = instant ? targetAngle : shortestAngle(currentAngle, targetAngle);
      wheel.classList.toggle('is-instant', !!instant);
      wheel.style.setProperty('--ams-dial-angle', currentAngle + 'deg');
      wheel.style.setProperty('--ams-dial-length', targetLength + 'px');
      wheel.style.setProperty('--ams-dial-origin-x', originX + 'px');
      wheel.style.setProperty('--ams-dial-origin-y', originY + 'px');
      if (instant) {
        requestAnimationFrame(function () {
          wheel.classList.remove('is-instant');
        });
      }
    }

    function setActive(index) {
      var activeItem = items[index];
      if (!activeItem) return;
      activeIndex = index;

      nodes.forEach(function (node, i) {
        var isActive = i === index;
        node.classList.toggle('is-active', isActive);
        node.setAttribute('aria-pressed', isActive ? 'true' : 'false');
      });
      pills.forEach(function (pill, i) {
        var isActive = i === index;
        pill.classList.toggle('is-active', isActive);
        pill.setAttribute('aria-pressed', isActive ? 'true' : 'false');
      });

      if (count) count.textContent = String(index + 1).padStart(2, '0') + ' / ' + String(items.length).padStart(2, '0');
      if (title) title.textContent = activeItem.title || activeItem.label || '';
      if (body) body.textContent = activeItem.body || '';
      if (wheel) {
        wheel.setAttribute('data-active-index', String(index));
        requestAnimationFrame(function () {
          updateDialHand(index, currentAngle === null);
        });
      }
    }

    nodes.concat(pills).forEach(function (control) {
      var index = parseInt(control.getAttribute('data-index'), 10);
      control.addEventListener('mouseenter', function () { setActive(index); });
      control.addEventListener('focus', function () { setActive(index); });
      control.addEventListener('click', function () { setActive(index); });
    });

    setActive(0);
    window.addEventListener('resize', function () {
      updateDialHand(activeIndex, true);
    }, { passive: true });
  });

  /* ── FAQ Accordion ─────────────────────────────────────────── */
  document.querySelectorAll('.faq-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item').forEach(function (el) {
        el.classList.remove('open');
        var elBtn = el.querySelector('.faq-btn');
        if (elBtn) elBtn.setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        item.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
      }
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
      var originalButtonHtml = btn.innerHTML;
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
          btn.innerHTML = originalButtonHtml;
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
