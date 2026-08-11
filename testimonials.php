<?php
$page = 'testimonials';
$pageTitle = 'Testimonials — Shweta Puniany';
include 'includes/header.php';

$testimonials = [
  ['cat' => 'emotional', 'name' => 'Pooja M.',  'invert' => false, 'avatar' => 'avatar-1', 'text' => 'The healing session release years of emotional pain. I am truly grateful for this journey.'],
  ['cat' => 'energy',    'name' => 'Neha S.',   'invert' => false, 'avatar' => 'avatar-2', 'text' => 'I felt a huge shift in my energy after just one session. Highly recommend to anyone seeking inner peace.'],
  ['cat' => 'emotional', 'name' => 'Kavita D.', 'invert' => false, 'avatar' => 'avatar-3', 'text' => 'I experienced deep relaxation and emotional clarity. I feel more aligned than ever.'],
  ['cat' => 'growth',    'name' => 'Ritua K.',  'invert' => true,  'avatar' => 'avatar-4', 'text' => 'Shweta creates such a safe space. I always leave the session feeling refreshed and healed.'],
  ['cat' => 'growth',    'name' => 'Sonia R.',  'invert' => false, 'avatar' => 'avatar-5', 'text' => 'Pendulum readings are so accurate and the guidance is always spot-on.'],
  ['cat' => 'energy',    'name' => 'Meera J.',  'invert' => false, 'avatar' => 'avatar-6', 'text' => 'The energy cleansing session brought so much positivity into my life.'],
];

function stars() { ?>
  <span class="stars">
    <?php for ($i = 0; $i < 5; $i++): ?>
    <svg viewBox="0 0 24 24"><path d="M12 2.5l2.9 6.2 6.8.8-5 4.6 1.3 6.7L12 17.5l-6 3.3 1.3-6.7-5-4.6 6.8-.8z"/></svg>
    <?php endfor; ?>
  </span>
<?php } ?>

<!-- ============ Hero ============ -->
<section class="page-hero hero-bg hero-bg-testimonials">
  <div class="container">
    <div class="hero-copy">
      <span class="kicker">Client Love</span>
      <h1>Stories of <br>Transformation</h1>
      <hr class="hero-divider">
      <p>Real experiences from beautiful souls who chose to begin their healing journey.</p>
    </div>
  </div>
</section>

<!-- ============ Featured testimonial ============ -->
<section class="testi-feature">
  <div class="container">
    <div class="tf-card">
      <div class="tf-body">
        <span class="tf-mark">&ldquo;</span>
        <p class="tf-text">The session with Shweta helped me understand myself in a completely different way. I felt lighter, calmer and more focused. Truly a beautiful experience.</p>
        <div class="testi-sign">
          <span class="t-name">&ndash; Ananya R.</span>
          <?php stars(); ?>
        </div>
      </div>
      <div class="tf-photo">
        <img src="assets/images/2nd.jpeg" alt="Ananya R.">
      </div>
    </div>
  </div>
</section>

<!-- ============ Filters ============ -->
<section class="testi-filters">
  <div class="container">
    <div class="filter-bar alt" role="tablist" aria-label="Filter testimonials">
      <button class="pill active" data-filter="all">All</button>
      <button class="pill" data-filter="emotional">Emotional Healing</button>
      <button class="pill" data-filter="energy">Energy &amp; Balance</button>
      <button class="pill" data-filter="growth">Personal Growth</button>
    </div>
  </div>
</section>

<!-- ============ Testimonial cards ============ -->
<section class="testi-grid-section">
  <div class="container">
    <div class="testi-grid">
      <?php foreach ($testimonials as $t): ?>
      <article class="t-card<?php echo $t['invert'] ? ' invert' : ''; ?>" data-cat="<?php echo $t['cat']; ?>">
        <div class="t-card-top">
          <img class="t-avatar" src="assets/images/<?php echo $t['avatar']; ?>.png" alt="<?php echo $t['name']; ?>">
          <p><?php echo $t['text']; ?></p>
        </div>
        <div class="testi-sign">
          <span class="t-name">&ndash; <?php echo $t['name']; ?></span>
          <?php stars(); ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ CTA ============ -->
<section class="cta-band cta-stack">
  <div class="container">
    <div class="cta-copy">
      <h2 class="serif">Your Story Could Begin Here.</h2>
      <a href="<?php echo $WA_BOOK; ?>" target="_blank" rel="noopener" class="btn">Book a Healing Session</a>
    </div>
    <img class="cta-art art-blend" src="assets/images/cta-lotus-hd.png" alt="" aria-hidden="true">
  </div>
</section>

<?php
$hideCta = true;
include 'includes/footer.php';
?>