/* ==========================================================================
   LEZO Finance – Main JS
   ========================================================================== */
(function () {
  'use strict';

  /* ---------- Animated counters ---------- */
  function animateCounter(el) {
    var target = +el.getAttribute('data-target');
    var suffix = el.getAttribute('data-suffix') || '';
    var duration = 2000;
    var start = 0;
    var startTime = null;

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);
      el.textContent = Math.floor(progress * target) + suffix;
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = target + suffix;
    }
    requestAnimationFrame(step);
  }

  var counters = document.querySelectorAll('.counter');
  if ('IntersectionObserver' in window && counters.length) {
    var observer = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    counters.forEach(function (c) { observer.observe(c); });
  } else {
    counters.forEach(function (c) {
      c.textContent = c.getAttribute('data-target') + (c.getAttribute('data-suffix') || '');
    });
  }

  /* ---------- Back to top ---------- */
  var backToTop = document.getElementById('backToTop');
  window.addEventListener('scroll', function () {
    if (window.scrollY > 400) backToTop.classList.add('show');
    else backToTop.classList.remove('show');
  });

  /* ---------- Navbar active link on scroll ---------- */
  var sections = document.querySelectorAll('section[id]');
  var navLinks = document.querySelectorAll('.main-navbar .nav-link');
  window.addEventListener('scroll', function () {
    var current = '';
    sections.forEach(function (section) {
      if (window.scrollY >= section.offsetTop - 150) current = section.getAttribute('id');
    });
    navLinks.forEach(function (link) {
      link.classList.remove('active');
      if (link.getAttribute('href') === '#' + current) link.classList.add('active');
    });
  });

  /* ---------- Close mobile menu on link click ---------- */
  var navCollapse = document.getElementById('mainNav');
  navLinks.forEach(function (link) {
    link.addEventListener('click', function () {
      if (navCollapse.classList.contains('show')) {
        new bootstrap.Collapse(navCollapse).hide();
      }
    });
  });

  /* ---------- Scroll reveal animation ---------- */
  var revealGroups = [
    '.section-heading', '.about-section .col-lg-6', '.about-img-wrap',
    '.why-section .col-lg-6', '.feature-box', '.counter-box',
    '.advisor-card', '.news-card', '.testimonial-box', '.growth-chart',
    '.quote-inner'
  ];
  var revealEls = [];
  revealGroups.forEach(function (sel) {
    document.querySelectorAll(sel).forEach(function (el) {
      el.classList.add('reveal');
      revealEls.push(el);
    });
  });

  if ('IntersectionObserver' in window && revealEls.length) {
    var revealObserver = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry, i) {
        if (entry.isIntersecting) {
          // stagger nhẹ theo thứ tự phần tử cùng cha
          var siblings = entry.target.parentElement
            ? Array.prototype.slice.call(entry.target.parentElement.children).filter(function (c) { return c.classList.contains('reveal'); })
            : [];
          var idx = siblings.indexOf(entry.target);
          entry.target.style.transitionDelay = (idx > 0 ? idx * 0.12 : 0) + 's';
          entry.target.classList.add('in-view');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    revealEls.forEach(function (el) { revealObserver.observe(el); });
  } else {
    revealEls.forEach(function (el) { el.classList.add('in-view'); });
  }

  /* ---------- Theme customizer ---------- */
  var customizer = document.getElementById('themeCustomizer');
  var tcToggle = document.getElementById('tcToggle');
  var tcColors = document.querySelectorAll('.tc-color');
  var tcReset = document.getElementById('tcReset');
  var root = document.documentElement;

  if (tcToggle) {
    tcToggle.addEventListener('click', function () {
      customizer.classList.toggle('open');
    });

    // Đóng panel khi bấm ra ngoài
    document.addEventListener('click', function (e) {
      if (!customizer.contains(e.target)) customizer.classList.remove('open');
    });

    function applyColor(color, dark, btn) {
      root.style.setProperty('--primary', color);
      root.style.setProperty('--primary-dark', dark);
      tcColors.forEach(function (c) { c.classList.remove('active'); });
      if (btn) btn.classList.add('active');
    }

    tcColors.forEach(function (btn) {
      btn.addEventListener('click', function () {
        applyColor(btn.getAttribute('data-color'), btn.getAttribute('data-dark'), btn);
      });
    });

    if (tcReset) {
      tcReset.addEventListener('click', function () {
        applyColor('#17a9e0', '#0f8fc0', tcColors[0]);
      });
    }
  }

  /* ---------- Demo forms (quote + newsletter) — không đụng form WP ---------- */
  document.querySelectorAll('.quote-form, .newsletter-form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      alert('Cảm ơn bạn! Đây là form demo, hãy nối với plugin (Contact Form 7 / WPForms) để nhận dữ liệu.');
      form.reset();
    });
  });

})();
