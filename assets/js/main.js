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

  /* ==========================================================================
     Booking → WhatsApp
     The same form markup is used by the popup (every page) and by book.php,
     so everything below is scoped per-form instead of by id.
     ========================================================================== */
  var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'];
  var DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

  /* "2026-08-20" → "20 August 2026 (Thursday)", built from parts so the date is
     never shifted by the browser's timezone */
  var prettyDate = function (raw) {
    var p = raw.split('-');
    if (p.length !== 3) return raw;
    var d = new Date(+p[0], +p[1] - 1, +p[2]);
    if (isNaN(d.getTime())) return raw;
    return d.getDate() + ' ' + MONTHS[d.getMonth()] + ' ' + d.getFullYear() + ' (' + DAYS[d.getDay()] + ')';
  };

  var scrollToEl = function (el) {
    el.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'center' });
  };

  /* ---------- Service picker ----------
     A native <select> drops an OS-drawn list that no stylesheet can reach, so
     the list is rebuilt here as a listbox. The <select> stays exactly where it
     was and goes on holding the value, which means prefilling, validation and
     the WhatsApp message all keep working untouched — and if this never runs,
     visitors simply get the plain select.

     The panel is parked on <body> and positioned fixed so the popup's scroll
     box can never clip it. */
  var initServicePicker = function (select) {
    var field   = select.closest('.bf-field');
    var tpl     = field && field.querySelector('.bf-opt-tpl');
    var box     = field && field.querySelector('.bf-box');
    var inner   = select.parentNode;
    var labelEl = inner.querySelector('label');
    if (!tpl || !box || !labelEl || !('content' in tpl)) return;

    var form = select.form;
    var placeholder = select.options[0] ? select.options[0].text : 'Select a service';

    var trigger = document.createElement('button');
    trigger.type = 'button';
    trigger.className = 'bf-pick';
    trigger.id = select.id + '-btn';
    trigger.setAttribute('aria-haspopup', 'listbox');
    trigger.setAttribute('aria-expanded', 'false');
    trigger.setAttribute('aria-labelledby', labelEl.id + ' ' + trigger.id);

    var valueEl = document.createElement('span');
    valueEl.className = 'bf-pick-val';
    trigger.appendChild(valueEl);
    inner.insertBefore(trigger, select);

    var menu = document.createElement('ul');
    menu.className = 'bf-menu';
    menu.setAttribute('role', 'listbox');
    menu.setAttribute('aria-labelledby', labelEl.id);
    menu.hidden = true;
    menu.appendChild(tpl.content.cloneNode(true));
    document.body.appendChild(menu);
    tpl.remove();

    var opts = Array.prototype.slice.call(menu.querySelectorAll('.bf-opt'));
    opts.forEach(function (o, i) { o.id = select.id + '-opt-' + i; });

    /* the select is about to leave the page, so the label loses its `for` and
       drives the trigger instead */
    labelEl.removeAttribute('for');
    labelEl.addEventListener('click', function () { toggle(); });

    select.hidden = true;
    select.pickTrigger = trigger; // so a failed check focuses something visible

    var sync = function () {
      var chosen = null;
      opts.forEach(function (o) {
        var on = select.value !== '' && o.getAttribute('data-value') === select.value;
        o.classList.toggle('chosen', on);
        o.setAttribute('aria-selected', on ? 'true' : 'false');
        if (on) chosen = o;
      });
      valueEl.textContent = chosen ? chosen.querySelector('.bf-opt-txt').textContent : placeholder;
      valueEl.classList.toggle('is-placeholder', !chosen);
    };

    var active = -1;
    var setActive = function (i) {
      if (!opts.length) return;
      active = (i + opts.length) % opts.length;
      opts.forEach(function (o, n) { o.classList.toggle('active', n === active); });

      var el = opts[active];
      menu.setAttribute('aria-activedescendant', el.id);
      if (el.offsetTop < menu.scrollTop) {
        menu.scrollTop = el.offsetTop;
      } else if (el.offsetTop + el.offsetHeight > menu.scrollTop + menu.clientHeight) {
        menu.scrollTop = el.offsetTop + el.offsetHeight - menu.clientHeight;
      }
    };

    /* drop downwards unless the field is low on the screen */
    var place = function () {
      var r = box.getBoundingClientRect();
      var below = window.innerHeight - r.bottom - 14;
      var above = r.top - 14;
      var up = below < 210 && above > below;

      menu.classList.toggle('drop-up', up);
      menu.style.left = r.left + 'px';
      menu.style.width = r.width + 'px';
      menu.style.maxHeight = Math.max(132, Math.min(310, up ? above : below)) + 'px';

      if (up) {
        menu.style.top = 'auto';
        menu.style.bottom = (window.innerHeight - r.top + 6) + 'px';
      } else {
        menu.style.bottom = 'auto';
        menu.style.top = (r.bottom + 6) + 'px';
      }
    };

    var isOpen = function () { return !menu.hidden; };

    var open = function () {
      if (isOpen()) return;
      menu.hidden = false;
      trigger.setAttribute('aria-expanded', 'true');
      field.classList.add('picking');
      place();

      var start = 0;
      opts.forEach(function (o, i) { if (o.classList.contains('chosen')) start = i; });
      setActive(start);
    };

    var close = function (refocus) {
      if (!isOpen()) return;
      menu.hidden = true;
      menu.removeAttribute('aria-activedescendant');
      trigger.setAttribute('aria-expanded', 'false');
      field.classList.remove('picking');
      if (refocus) trigger.focus({ preventScroll: true });
    };

    var toggle = function () {
      if (isOpen()) { close(true); return; }
      trigger.focus({ preventScroll: true });
      open();
    };

    var choose = function (o) {
      select.value = o.getAttribute('data-value');
      select.dispatchEvent(new Event('change', { bubbles: true }));
      close(true);
    };

    trigger.addEventListener('click', toggle);

    menu.addEventListener('click', function (e) {
      var o = e.target.closest('.bf-opt');
      if (o) choose(o);
    });

    menu.addEventListener('mousemove', function (e) {
      var o = e.target.closest('.bf-opt');
      if (o) setActive(opts.indexOf(o));
    });

    /* type-ahead — "p" jumps to Pendulum */
    var typed = '', typedAt = 0;
    var jumpTo = function (ch) {
      var now = Date.now();
      typed = (now - typedAt < 900 ? typed : '') + ch;
      typedAt = now;

      /* one letter held down cycles through its matches, the way a native
         select behaves; distinct letters extend the search instead */
      var same = typed.split('').every(function (c) { return c === typed.charAt(0); });
      var needle = same ? typed.charAt(0) : typed;
      var from = same ? 1 : 0; // cycling starts past the current item

      for (var i = 0; i < opts.length; i++) {
        var n = (active + from + i) % opts.length;
        if (opts[n].querySelector('.bf-opt-txt').textContent.toLowerCase().indexOf(needle) === 0) {
          setActive(n);
          return;
        }
      }
    };

    trigger.addEventListener('keydown', function (e) {
      var k = e.key;

      if (!isOpen()) {
        if (k === 'ArrowDown' || k === 'ArrowUp' || k === 'Enter' || k === ' ') {
          e.preventDefault();
          open();
        }
        return;
      }

      // Escape must not travel on to the popup, or the whole form would close
      if (k === 'Escape') { e.preventDefault(); e.stopPropagation(); close(true); return; }
      if (k === 'Tab') { close(false); return; }
      if (k === 'ArrowDown') { e.preventDefault(); setActive(active + 1); return; }
      if (k === 'ArrowUp') { e.preventDefault(); setActive(active - 1); return; }
      if (k === 'Home') { e.preventDefault(); setActive(0); return; }
      if (k === 'End') { e.preventDefault(); setActive(opts.length - 1); return; }
      if (k === 'Enter' || k === ' ') {
        e.preventDefault();
        if (opts[active]) choose(opts[active]);
        return;
      }
      if (k.length === 1 && /\S/.test(k)) { e.preventDefault(); jumpTo(k.toLowerCase()); }
    });

    document.addEventListener('click', function (e) {
      if (!isOpen() || menu.contains(e.target) || field.contains(e.target)) return;
      close(false);
    });

    /* the panel is pinned to the viewport, so it has to be re-anchored whenever
       the field moves under it — bar the list scrolling itself */
    var reanchor = function (e) {
      if (isOpen() && (!e || e.target !== menu)) place();
    };
    window.addEventListener('resize', reanchor);
    window.addEventListener('scroll', reanchor, true);

    select.addEventListener('change', sync);
    if (form) {
      form.addEventListener('reset', function () {
        close(false);
        window.setTimeout(sync, 0); // the reset lands after this event
      });
    }

    sync();
  };

  var initBookingForm = function (form) {
    var shell = form.closest('.book-shell');
    var formPane = shell.querySelector('.book-form-pane');
    var donePane = shell.querySelector('.book-done');
    var summaryEl = donePane.querySelector('.bd-summary');
    var hintEl = donePane.querySelector('.bd-hint');

    var field = function (name) { return form.querySelector('[name="' + name + '"]'); };
    var val = function (name) { var el = field(name); return el ? el.value.trim() : ''; };

    /* selects carry slugs as values — the message needs the human-readable text */
    var label = function (name) {
      var el = field(name);
      if (!el || !el.value) return '';
      return el.tagName === 'SELECT' ? el.options[el.selectedIndex].text.trim() : el.value.trim();
    };

    var syncSelect = function (sel) { sel.classList.toggle('filled', !!sel.value); };

    form.querySelectorAll('select').forEach(function (sel) {
      syncSelect(sel);
      sel.addEventListener('change', function () { syncSelect(sel); });
    });

    var serviceSelect = form.querySelector('.bf-field-service select');
    if (serviceSelect) initServicePicker(serviceSelect);

    var phoneEl = field('phone');
    if (phoneEl) {
      phoneEl.addEventListener('input', function () {
        phoneEl.value = phoneEl.value.replace(/\D/g, '').slice(0, 10);
      });
    }

    /* clear a field's error as soon as the visitor edits it */
    form.querySelectorAll('input, select, textarea').forEach(function (el) {
      var clear = function () {
        var wrap = el.closest('.bf-field');
        if (wrap) wrap.classList.remove('invalid');
      };
      el.addEventListener('input', clear);
      el.addEventListener('change', clear);
    });

    var validate = function () {
      var bad = [];
      var check = function (name, ok) {
        var el = field(name);
        if (!el) return;
        var wrap = el.closest('.bf-field');
        if (wrap) wrap.classList.toggle('invalid', !ok);
        if (!ok) bad.push(el);
      };

      check('name', val('name').length >= 2);
      check('phone', /^[6-9]\d{9}$/.test(val('phone')));
      check('service', val('service') !== '');
      check('date', val('date') !== '');

      if (bad.length) {
        // the service select is hidden behind its picker — focus that instead
        (bad[0].pickTrigger || bad[0]).focus({ preventScroll: true });
        scrollToEl(bad[0].closest('.bf-field') || bad[0]);
      }
      return bad.length === 0;
    };

    var reset = function () {
      form.reset();
      form.querySelectorAll('.invalid').forEach(function (w) { w.classList.remove('invalid'); });
      form.querySelectorAll('select').forEach(syncSelect);
      donePane.hidden = true;
      formPane.hidden = false;
    };

    /* let the modal controller put the form back to a clean state */
    shell.bookingReset = reset;

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!validate()) return;

      var name = val('name');
      var rows = [
        ['Name', name],
        ['Phone', '+91 ' + val('phone')],
        ['Service', label('service')],
        ['Preferred Date', prettyDate(val('date'))]
      ];

      var lines = ['*New Session Booking Request*', ''];
      rows.forEach(function (r) { lines.push(r[0] + ': ' + r[1]); });
      lines.push('', 'Sent from the website booking form. Please confirm my slot.');

      var waUrl = 'https://wa.me/' + form.getAttribute('data-wa') +
                  '?text=' + encodeURIComponent(lines.join('\n'));

      summaryEl.innerHTML = '';
      rows.forEach(function (r) {
        var li = document.createElement('li');
        var k = document.createElement('span');
        k.className = 'bd-k';
        k.textContent = r[0];
        var v = document.createElement('span');
        v.className = 'bd-v';
        v.textContent = r[1];
        li.appendChild(k);
        li.appendChild(v);
        summaryEl.appendChild(li);
      });

      donePane.querySelector('.bd-name').textContent = name.split(' ')[0];
      donePane.querySelectorAll('.bd-wa').forEach(function (a) { a.href = waUrl; });

      var win = window.open(waUrl, '_blank');
      hintEl.hidden = !!win; // only nudge them if the tab was blocked

      formPane.hidden = true;
      donePane.hidden = false;
      scrollToEl(donePane);
    });

    donePane.querySelector('.bd-again').addEventListener('click', function () {
      reset();
      scrollToEl(formPane);
    });
  };

  document.querySelectorAll('.book-form').forEach(initBookingForm);

  /* ---------- Booking popup ---------- */
  var modal = document.getElementById('bookModal');

  if (modal) {
    var dialog = modal.querySelector('.bm-dialog');
    var shell = modal.querySelector('.book-shell');
    var lastTrigger = null;

    var openBooking = function (slug, trigger) {
      lastTrigger = trigger || null;

      if (shell.bookingReset) shell.bookingReset();

      var sel = modal.querySelector('[name="service"]');
      if (sel && slug) {
        sel.value = slug;
        sel.dispatchEvent(new Event('change', { bubbles: true }));
      }

      modal.hidden = false;
      document.documentElement.classList.add('book-locked');
      dialog.scrollTop = 0;

      // focus the dialog rather than the first input, so mobile keyboards
      // don't spring open the moment the popup appears
      dialog.focus({ preventScroll: true });
    };

    var closeBooking = function () {
      modal.hidden = true;
      document.documentElement.classList.remove('book-locked');
      if (lastTrigger) { lastTrigger.focus({ preventScroll: true }); lastTrigger = null; }
    };

    modal.querySelectorAll('[data-book-close]').forEach(function (el) {
      el.addEventListener('click', closeBooking);
    });

    /* Every "Book a Session" link points at book.php, so it still works with
       JavaScript off; here we intercept it and open the popup instead. */
    document.addEventListener('click', function (e) {
      var trigger = e.target.closest('a[href^="book.php"]');
      if (!trigger) return;
      if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return; // open-in-new-tab
      e.preventDefault();

      var m = (trigger.getAttribute('href') || '').match(/[?&]s=([^&#]+)/);
      openBooking(m ? decodeURIComponent(m[1]) : '', trigger);

      // if the tap came from the mobile menu, fold it away behind the popup
      if (nav && nav.classList.contains('open')) {
        nav.classList.remove('open');
        if (toggle) {
          toggle.classList.remove('open');
          toggle.setAttribute('aria-expanded', 'false');
        }
      }
    });

    document.addEventListener('keydown', function (e) {
      if (modal.hidden) return;

      if (e.key === 'Escape') { closeBooking(); return; }

      /* keep tabbing inside the dialog while it is open */
      if (e.key !== 'Tab') return;
      var focusable = dialog.querySelectorAll(
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
      );
      var open = Array.prototype.filter.call(focusable, function (el) {
        return !el.disabled && el.offsetParent !== null;
      });
      if (!open.length) return;
      var first = open[0], last = open[open.length - 1];
      if (e.shiftKey && (document.activeElement === first || document.activeElement === dialog)) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    });

  } else {
    /* book.php carries the form inline and has no popup, so the same links
       should walk down to that form rather than reload the page. */
    var inlineShell = document.querySelector('.book-shell');

    if (inlineShell) {
      document.addEventListener('click', function (e) {
        var trigger = e.target.closest('a[href^="book.php"]');
        if (!trigger) return;
        if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
        e.preventDefault();

        var sel = inlineShell.querySelector('[name="service"]');
        var m = (trigger.getAttribute('href') || '').match(/[?&]s=([^&#]+)/);
        if (sel && m) {
          sel.value = decodeURIComponent(m[1]);
          sel.dispatchEvent(new Event('change', { bubbles: true }));
        }
        scrollToEl(inlineShell);
      });
    }
  }

  /* ---------- Floating WhatsApp button ----------
     The button itself is a plain link to book.php, so the handlers above pick
     it up and open the popup (or scroll to the inline form on book.php).
     All we do here is flash the "Book Your Session Now" greeting once on
     arrival, so visitors notice the button is a way to book.               */
  var waFloat = document.getElementById('waFloat');

  if (waFloat) {
    var TIP_DELAY = 700;   // let the page settle before the greeting appears
    var TIP_HOLD  = 2600;  // how long it stays fully readable, then it fades

    window.setTimeout(function () {
      waFloat.classList.add('tip-on');
      window.setTimeout(function () { waFloat.classList.remove('tip-on'); }, TIP_HOLD);
    }, TIP_DELAY);
  }

});
