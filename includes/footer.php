<?php
/* $ctaText / $ctaBtnText can be set per page before including this file.
   Set $hideCta = true to skip the purple CTA band. */
$ctaText    = $ctaText    ?? 'Your Healing Journey Can Begin Today.';
$ctaBtnText = $ctaBtnText ?? 'Book a Healing Session';
$hideCta    = $hideCta    ?? false;
$ctaArt     = $ctaArt     ?? 'cta-lotus-hd.png';
?>
<?php if (!$hideCta): ?>
<!-- Pre-footer CTA band -->
<section class="cta-band">
  <div class="container">
    <h2 class="serif"><?php echo $ctaText; ?></h2>
    <a href="<?php echo $BOOK_URL; ?>" class="btn"><?php echo $ctaBtnText; ?></a>
    <img class="cta-art art-blend" src="assets/images/<?php echo $ctaArt; ?>" alt="" aria-hidden="true">
  </div>
</section>
<?php endif; ?>

<!-- Footer -->
<footer class="site-footer">
  <div class="container footer-main">

    <div class="footer-brand">
      <div class="f-logo-row">
        <svg viewBox="0 0 64 64" aria-hidden="true">
          <g fill="none" stroke="#e9b458" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M32 8c-5.5 9-5.5 19 0 28 5.5-9 5.5-19 0-28z"/>
            <path d="M32 36c-3-11-12-18-22-20 2 11 10 19.5 22 20z"/>
            <path d="M32 36c3-11 12-18 22-20-2 11-10 19.5-22 20z"/>
            <path d="M32 38.5c-8.5 4.5-19.5 4.5-28-2.5 6.5 11 18.5 15.5 28 11 9.5 4.5 21.5 0 28-11-8.5 7-19.5 7-28 2.5z"/>
            <path d="M20 52c4 2.5 8 3.8 12 3.8S40 54.5 44 52"/>
          </g>
        </svg>
        <span class="f-name"><?php echo $SITE_NAME; ?></span>
      </div>
      <p>Chakra Healer &amp; Pendulum Healing Practitioner</p>
      <p>Helping you heal, align and awaken your true potential.</p>
      <div class="footer-social">
        <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.8.07 1.2.05 1.8.24 2.2.4.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.4.35 1 .4 2.2.07 1.2.07 1.6.07 4.8s0 3.6-.07 4.8c-.05 1.2-.24 1.8-.4 2.2-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.4.16-1 .35-2.2.4-1.2.07-1.6.07-4.8.07s-3.6 0-4.8-.07c-1.2-.05-1.8-.24-2.2-.4a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.4-.35-1-.4-2.2C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.8c.05-1.2.24-1.8.4-2.2.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.4-.16 1-.35 2.2-.4C8.4 2.2 8.8 2.2 12 2.2zm0 3.13a6.67 6.67 0 1 0 0 13.34 6.67 6.67 0 0 0 0-13.34zm0 11a4.33 4.33 0 1 1 0-8.66 4.33 4.33 0 0 1 0 8.66zm8.5-11.27a1.56 1.56 0 1 1-3.12 0 1.56 1.56 0 0 1 3.12 0z"/></svg></a>
        <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24"><path d="M13.5 21.9v-9h3l.45-3.5H13.5V7.2c0-1 .28-1.7 1.73-1.7h1.84V2.36c-.32-.04-1.41-.14-2.68-.14-2.65 0-4.47 1.62-4.47 4.6v2.58H6.9v3.5h3.02v9h3.58z"/></svg></a>
        <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24"><path d="M21.6 7.2c-.23-.86-.9-1.54-1.77-1.77C18.25 5 12 5 12 5s-6.25 0-7.83.43c-.86.23-1.54.9-1.77 1.77C2 8.78 2 12 2 12s0 3.22.4 4.8c.23.86.9 1.54 1.77 1.77C5.75 19 12 19 12 19s6.25 0 7.83-.43c.86-.23 1.54-.9 1.77-1.77.4-1.58.4-4.8.4-4.8s0-3.22-.4-4.8zM10 15.2V8.8l5.2 3.2-5.2 3.2z"/></svg></a>
        <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24"><path d="M6.94 8.5v12.4H3.06V8.5h3.88zM7.2 4.66a2.2 2.2 0 1 1-4.4 0 2.2 2.2 0 0 1 4.4 0zM20.94 13.3v7.6h-3.87v-7.15c0-1.8-.64-3.02-2.25-3.02-1.22 0-1.95.83-2.27 1.62-.12.29-.15.68-.15 1.08v7.47H8.53s.05-12.12 0-13.38h3.87v1.9c.52-.8 1.44-1.94 3.5-1.94 2.55 0 4.47 1.67 4.47 5.27z"/></svg></a>
      </div>
    </div>

    <div class="footer-col">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="about.php">About Me</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="healing-journey.php">Healing Journey</a></li>
        <li><a href="testimonials.php">Testimonials</a></li>

        <li><a href="service.php?s=chakra-healing">Chakra Healing</a></li>
        <li><a href="service.php?s=pendulum-healing">Pendulum Healing</a></li>
        <li><a href="service.php?s=distance-healing">Distance Healing</a></li>
        <li><a href="service.php?s=energy-cleansing">Energy Cleansing</a></li>
        <li><a href="service.php?s=aura-cleansing">Aura Cleansing</a></li>
        <li><a href="service.php?s=personalised-healing">Personalised Healing</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Get In Touch</h4>
      <ul class="footer-contact">
        <li>
          <span class="f-ico"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.7 2.05z"/></svg></span>
          <a href="tel:+919876543210"><?php echo $PHONE; ?></a>
        </li>
        <li>
          <span class="f-ico"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg></span>
          <a href="mailto:<?php echo $EMAIL; ?>"><?php echo $EMAIL; ?></a>
        </li>
        <li>
          <span class="f-ico"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
          <span><?php echo $LOCATION; ?></span>
        </li>
        <li>
          <span class="f-ico wa-ico"><img src="assets/images/wpicon.png" alt="" width="18" height="18" loading="lazy" decoding="async"></span>
          <a class="wa-link" href="<?php echo $WA_CHAT; ?>" target="_blank" rel="noopener">WhatsApp Chat</a>
        </li>
      </ul>
    </div>

    <div class="footer-col footer-news">
      <h4>Join My Community</h4>
      <p>Subscribe for healing tips, energy practices &amp; updates.</p>
      <form class="subscribe-form" data-wa="<?php echo $WA_NUMBER; ?>">
        <input type="email" name="email" placeholder="Your email address" required>
        <button type="submit" class="btn">Subscribe</button>
      </form>
    </div>

  </div>

  <div class="footer-bottom">
    <div class="container">
      <span>&copy; 2024 <?php echo $SITE_NAME; ?>. All Rights Reserved.</span>
      <div class="footer-legal">
        <a href="privacy-policy.php">Privacy Policy</a>
        <span class="sep">|</span>
        <a href="terms.php">Terms &amp; Conditions</a>
      </div>
    </div>
  </div>
</footer>

<?php if ($page !== 'book'): /* book.php shows the form inline instead */ ?>
<!-- Booking popup — opened by every "Book a Session" button on the page -->
<div class="book-modal" id="bookModal" hidden>
  <div class="bm-backdrop" data-book-close></div>
  <div class="bm-dialog" role="dialog" aria-modal="true" aria-labelledby="bmTitle">
    <button type="button" class="bm-close" data-book-close aria-label="Close booking form">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 6l12 12M18 6 6 18"/></svg>
    </button>
    <div class="bm-head">
      <span class="book-orn" aria-hidden="true"></span>
      <h2 id="bmTitle">Book Your <em>Session</em></h2>
      <p>Take the first step towards inner peace and holistic well-being.</p>
    </div>
    <div class="bm-body">
      <?php include __DIR__ . '/booking-form.php'; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<script src="assets/js/main.js?v=<?php echo filemtime(__DIR__ . '/../assets/js/main.js'); ?>"></script>
</body>
</html>
