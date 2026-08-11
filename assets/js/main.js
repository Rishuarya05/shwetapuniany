/* Shweta Puniany — site scripts (no backend: everything routes to WhatsApp) */

document.addEventListener('DOMContentLoaded', function () {

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Header: shadow + hide on scroll down / show on scroll up ---------- */
  var header = document.querySelector('.site-header');
  if (header) {
    var lastY = window.scrollY;
    var onScroll = function () {
      var y = window.scrollY;
      header.classList.toggle('scrolled', y > 10);
      if (y > lastY + 4 && y > 140) {
        header.classList.add('header-hidden');   // scrolling down — tuck away
      } else if (y < lastY - 4 || y <= 140) {
        header.classList.remove('header-hidden'); // scrolling up — glide back in
      }
      lastY = y;
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ---------- Scroll reveal ---------- */
  if (!reduceMotion && 'IntersectionObserver' in window) {
    var revealSelector = [
      '.section-title', '.phil-card', '.why-item', '.tl-item',
      '.svc-card', '.post-card', '.t-card', '.tf-card',
      '.featured-img', '.featured-copy',
      '.journey-photo', '.journey-copy', '.hm-photo', '.hm-copy',
      '.lc-item', '.lc-quote', '.cert-strip',
      '.contact-form-card', '.faq-item', '.filter-bar .pill'
    ].join(', ');

    var targets = document.querySelectorAll(revealSelector);

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('revealed');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    targets.forEach(function (el) {
      var siblings = el.parentNode ? el.parentNode.children : [el];
      var idx = Array.prototype.indexOf.call(siblings, el);
      el.style.setProperty('--rd', ((idx % 6) * 0.08).toFixed(2) + 's');
      el.classList.add('js-reveal');
      observer.observe(el);
    });
  }

  /* ---------- Ambient floating light particles ---------- */
  if (!reduceMotion) {
    var sprinkle = function (el, count, size) {
      for (var i = 0; i < count; i++) {
        var s = document.createElement('span');
        s.className = 'amb-spark';
        s.style.left = (5 + Math.random() * 90) + '%';
        s.style.top = (10 + Math.random() * 75) + '%';
        s.style.setProperty('--dur', (7 + Math.random() * 6).toFixed(1) + 's');
        s.style.setProperty('--delay', (Math.random() * 8).toFixed(1) + 's');
        var scale = 0.6 + Math.random() * 0.9;
        s.style.width = s.style.height = (size * scale).toFixed(1) + 'px';
        el.appendChild(s);
      }
    };

    // purple bands & heroes — larger drifting lights
    document.querySelectorAll('.page-hero, .cta-band, .news-band, .closing-band, .soft-cta-box, .hj-quote-box, .exp-box').forEach(function (band) {
      sprinkle(band, 7, 9);
    });

    // photos — small glitter twinkles over the imagery
    document.querySelectorAll('.journey-photo, .aw-photo, .approach-photo, .hm-photo, .featured-img, .hero-media, .svc-photo, .pace-img, .soft-cta-img').forEach(function (photo) {
      sprinkle(photo, 5, 7);
    });
  }

  /* ---------- Click ripple on buttons & pills ---------- */
  if (!reduceMotion) {
    document.addEventListener('click', function (e) {
      var target = e.target.closest('.btn, .pill');
      if (!target) return;
      var rect = target.getBoundingClientRect();
      var size = Math.max(rect.width, rect.height);
      var ripple = document.createElement('span');
      ripple.className = 'ripple';
      ripple.style.width = ripple.style.height = size + 'px';
      ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
      ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
      target.appendChild(ripple);
      ripple.addEventListener('animationend', function () { ripple.remove(); });
    });
  }


  /* ---------- Mobile nav toggle ---------- */
  var toggle = document.getElementById('navToggle');
  var nav = document.getElementById('mainNav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      toggle.classList.toggle('open', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  /* ---------- Filter pills (blog / testimonials) ---------- */
  document.querySelectorAll('.filter-bar').forEach(function (bar) {
    var pills = bar.querySelectorAll('.pill');
    pills.forEach(function (pill) {
      pill.addEventListener('click', function () {
        pills.forEach(function (p) { p.classList.remove('active'); });
        pill.classList.add('active');
        var filter = pill.getAttribute('data-filter');
        document.querySelectorAll('[data-cat]').forEach(function (item) {
          var show = filter === 'all' || item.getAttribute('data-cat').split(' ').indexOf(filter) !== -1;
          item.toggleAttribute('hidden', !show);
        });
      });
    });
  });

  /* ---------- FAQ accordion ---------- */
  document.querySelectorAll('.faq-item').forEach(function (item) {
    var q = item.querySelector('.faq-q');
    var a = item.querySelector('.faq-a');
    q.addEventListener('click', function () {
      var isOpen = item.classList.contains('open');
      // close others
      document.querySelectorAll('.faq-item.open').forEach(function (other) {
        other.classList.remove('open');
        other.querySelector('.faq-a').style.maxHeight = null;
        other.querySelector('.faq-q').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        item.classList.add('open');
        a.style.maxHeight = a.scrollHeight + 'px';
        q.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ---------- Contact form → WhatsApp ---------- */
  document.querySelectorAll('.contact-form').forEach(function (form) {
    var select = form.querySelector('select');
    if (select) {
      select.addEventListener('change', function () { select.classList.add('filled'); });
    }
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var v = function (name) {
        var el = form.querySelector('[name="' + name + '"]');
        return el ? el.value.trim() : '';
      };
      var lines = ['Hi Shweta, I\'d like to begin a healing conversation.'];
      if (v('name')) lines.push('Name: ' + v('name'));
      if (v('email')) lines.push('Email: ' + v('email'));
      if (v('phone')) lines.push('Phone: ' + v('phone'));
      if (v('support')) lines.push('I\'d like support with: ' + v('support'));
      if (v('message')) lines.push('About me: ' + v('message'));
      var number = form.getAttribute('data-wa');
      window.open('https://wa.me/' + number + '?text=' + encodeURIComponent(lines.join('\n')), '_blank');
    });
  });

  /* ---------- Newsletter subscribe → WhatsApp ---------- */
  document.querySelectorAll('.subscribe-form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var email = form.querySelector('input[name="email"]').value.trim();
      if (!email) return;
      var number = form.getAttribute('data-wa');
      var msg = "Hi Shweta, I'd like to join your community and receive healing tips & updates. My email is: " + email;
      window.open('https://wa.me/' + number + '?text=' + encodeURIComponent(msg), '_blank');
      form.reset();
    });
  });

});
