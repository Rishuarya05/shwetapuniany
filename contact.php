<?php
$page = 'contact';
$pageTitle = 'Contact — Shweta Puniany';
include 'includes/header.php';

$faqs = [
  ['q' => 'What happens during a healing session?',
   'a' => 'Every session begins with a gentle conversation about what you are experiencing. I then work with your energy through Chakra Healing or Pendulum Dowsing while you simply relax. Most people feel deeply calm and lighter during the process.'],
  ['q' => 'Which healing modality is right for me?',
   'a' => 'You don&rsquo;t need to decide alone. Share what you are going through and I will lovingly guide you toward the modality that best supports your situation and intentions.'],
  ['q' => 'Are sessions available remotely?',
   'a' => 'Yes. Distance healing sessions are just as effective and are conducted with the same care and intention, wherever you are in the world.'],
  ['q' => 'How long does a session take?',
   'a' => 'A typical session lasts between 45 and 60 minutes, depending on what your energy needs on the day.'],
  ['q' => 'How do I prepare for my session?',
   'a' => 'Nothing special is required &mdash; come with an open heart, wear comfortable clothing, keep a glass of water nearby and give yourself a few quiet minutes after the session to rest.'],
];
?>

<!-- ============ Hero ============ -->
<section class="page-hero hero-bg hero-bg-contact">
  <div class="container">
    <div class="hero-copy">
      <span class="kicker">Let's Connect</span>
      <h1>Begin Your <br>Healing Conversation</h1>
      <hr class="hero-divider">
      <p>Have a question about a healing session or want to understand which modality may be right for you? Reach out. I'm here for you.</p>
    </div>
    <div class="hero-media m-banner">
      <img src="assets/images/4th.jpeg" alt="Amethyst crystals beside a lit candle">
    </div>
  </div>
</section>

<!-- ============ Contact info + form ============ -->
<section class="contact-section">
  <div class="container">

    <div class="contact-info">
      <h2 class="lc-title">Let's Connect</h2>

      <div class="lc-item">
        <span class="lc-ico">
          <svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.7 2.05z"/></svg>
        </span>
        <div>
          <h4>Phone</h4>
          <a href="tel:+919876543210"><?php echo $PHONE; ?></a>
        </div>
      </div>

      <div class="lc-item">
        <span class="lc-ico">
          <svg viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/></svg>
        </span>
        <div>
          <h4>Email</h4>
          <a href="mailto:<?php echo $EMAIL; ?>"><?php echo $EMAIL; ?></a>
        </div>
      </div>

      <div class="lc-item">
        <span class="lc-ico">
          <svg viewBox="0 0 24 24"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </span>
        <div>
          <h4>Location</h4>
          <p><?php echo $LOCATION; ?></p>
        </div>
      </div>

      <div class="lc-item">
        <span class="lc-ico wa">
          <img src="assets/images/wpicon.png" alt="" width="30" height="30" loading="lazy" decoding="async">
        </span>
        <div>
          <h4>WhatsApp</h4>
          <a class="wa-link" href="<?php echo $WA_CHAT; ?>" target="_blank" rel="noopener">Chat on WhatsApp</a>
        </div>
      </div>

      <div class="lc-quote">
        <p>You don't have to have everything figured out before you begin.</p>
        <svg viewBox="0 0 40 40" aria-hidden="true">
          <path d="M20 8c-3 5-3 10 0 15 3-5 3-10 0-15z"/>
          <path d="M20 23c-2-6.5-7-10.5-13-11.5C8.5 18 13 22.5 20 23z"/>
          <path d="M20 23c2-6.5 7-10.5 13-11.5C31.5 18 27 22.5 20 23z"/>
          <path d="M20 24.5c-5 3-12 3-16.5-1.5 4 6.5 11 9 16.5 6.5 5.5 2.5 12.5 0 16.5-6.5C32 27.5 25 27.5 20 24.5z"/>
        </svg>
      </div>
    </div>

    <div class="contact-form-card">
      <form class="contact-form" data-wa="<?php echo $WA_NUMBER; ?>">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="tel" name="phone" placeholder="Phone Number">
        <label class="form-label" for="support">What would you like support with?</label>
        <div class="select-wrap">
          <select id="support" name="support">
            <option value="" selected disabled>Select an option</option>
            <option>Chakra Healing</option>
            <option>Pendulum Healing</option>
            <option>Distance Healing</option>
            <option>Energy Cleansing</option>
            <option>Aura Cleansing</option>
            <option>Personalized Healing</option>
            <option>I'm not sure yet</option>
          </select>
          <svg viewBox="0 0 24 24"><path d="m6 9 6 6 6-6"/></svg>
        </div>
        <textarea name="message" placeholder="Tell me a little about what you're looking for"></textarea>
        <button type="submit" class="btn">Send Message</button>
      </form>
    </div>

  </div>
</section>

<!-- ============ FAQ ============ -->
<section class="faq-section">
  <div class="container">
    <h2>Frequently Asked Questions</h2>
    <div class="faq-list">
      <?php foreach ($faqs as $f): ?>
      <div class="faq-item">
        <button class="faq-q" type="button" aria-expanded="false">
          <span><?php echo $f['q']; ?></span>
          <span class="fplus">+</span>
        </button>
        <div class="faq-a"><p><?php echo $f['a']; ?></p></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ Closing band ============ -->
<section class="closing-band">
  <div class="container">
    <h2>I look forward to connecting with you and supporting your healing journey.</h2>
    <img class="cta-art art-blend" src="assets/images/closing-lotus-hd.png" alt="" aria-hidden="true">
  </div>
</section>

<?php
$hideCta = true;
include 'includes/footer.php';
?>