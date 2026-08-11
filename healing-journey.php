<?php
$page = 'journey';
$pageTitle = 'Healing Journey — Shweta Puniany';
include 'includes/header.php';

$steps = [
  ['num' => 1, 'title' => 'Awareness',      'text' => 'Becoming aware of your thoughts, emotions and patterns is the first step to healing.',
   'icon' => '<path d="M20 8c-3.5 6-3.5 12 0 17 3.5-5 3.5-11 0-17z"/><path d="M20 25c-2.5-7-8.5-11-14-11.5C7.5 20 12.5 24.5 20 25z"/><path d="M20 25c2.5-7 8.5-11 14-11.5C32.5 20 27.5 24.5 20 25z"/><path d="M13 31c2.2 1.4 4.6 2.1 7 2.1s4.8-.7 7-2.1"/>'],
  ['num' => 2, 'title' => 'Release',        'text' => 'Letting go of blockages, past wounds and negative energies that hold you back.',
   'icon' => '<path d="M20 5v6"/><circle cx="20" cy="12.5" r="1.8"/><path d="M20 14.5l-6 9 6 11 6-11-6-9z"/><path d="M14 23.5h12"/>'],
  ['num' => 3, 'title' => 'Healing',        'text' => 'Restoring balance to your mind, body and soul through holistic practices.',
   'icon' => '<path d="M20 6l-7 14 7 14 7-14-7-14z"/><path d="M13 20h14"/><path d="M9 24l-3 6 5 4M31 24l3 6-5 4"/>'],
  ['num' => 4, 'title' => 'Alignment',      'text' => 'Aligning with your true self, your values and your soul\'s purpose.',
   'icon' => '<circle cx="20" cy="20" r="3.5"/><path d="M20 7c-2 3-2 5.5 0 8.5 2-3 2-5.5 0-8.5zM20 33c-2-3-2-5.5 0-8.5 2 3 2 5.5 0 8.5zM7 20c3-2 5.5-2 8.5 0-3 2-5.5 2-8.5 0zM33 20c-3-2-5.5-2-8.5 0 3 2 5.5 2 8.5 0z"/><path d="M11 11c3.3.8 5.2 2.7 6 6-3.3-.8-5.2-2.7-6-6zM29 29c-3.3-.8-5.2-2.7-6-6 3.3.8 5.2 2.7 6 6zM29 11c-.8 3.3-2.7 5.2-6 6 .8-3.3 2.7-5.2 6-6zM11 29c.8-3.3 2.7-5.2 6-6-.8 3.3-2.7 5.2-6 6z"/>'],
  ['num' => 5, 'title' => 'Transformation', 'text' => 'Embracing the new you and stepping into a life of clarity, peace and abundance.',
   'icon' => '<path d="M20 12v18"/><path d="M20 16c-3-6-9-8-13-6 0 6 5 10 13 10-7 0-11 4-10 8.5 4 1 8-2 10-7.5"/><path d="M20 16c3-6 9-8 13-6 0 6-5 10-13 10 7 0 11 4 10 8.5-4 1-8-2-10-7.5"/><path d="M17 10c1 1 2 1.5 3 1.8 1-.3 2-.8 3-1.8"/>'],
];

$experiences = [
  ['title' => 'Emotional Release', 'text' => 'Heal emotional wounds and find inner peace.',
   'icon' => '<path d="M20 13c1.8-3.4 5.2-4.4 7.6-2.8 2.6 1.7 3 5.3.8 7.9-1.6 2-4.6 4.3-8.4 6.9-3.8-2.6-6.8-4.9-8.4-6.9-2.2-2.6-1.8-6.2.8-7.9 2.4-1.6 5.8-.6 7.6 2.8z"/><path d="M8 30c2.5 2.2 5 3.4 8 3.4M32 30c-2.5 2.2-5 3.4-8 3.4"/>'],
  ['title' => 'Energy Balance',   'text' => 'Restore your natural energy flow.',
   'icon' => '<path d="M20 5v6"/><circle cx="20" cy="12.5" r="1.8"/><path d="M20 14.5l-6 9 6 11 6-11-6-9z"/><path d="M14 23.5h12"/>'],
  ['title' => 'Inner Clarity',    'text' => 'Gain clarity, confidence and direction.',
   'icon' => '<path d="M20 8c-3.5 6-3.5 12 0 17 3.5-5 3.5-11 0-17z"/><path d="M20 25c-2.5-7-8.5-11-14-11.5C7.5 20 12.5 24.5 20 25z"/><path d="M20 25c2.5-7 8.5-11 14-11.5C32.5 20 27.5 24.5 20 25z"/><path d="M13 31c2.2 1.4 4.6 2.1 7 2.1s4.8-.7 7-2.1"/>'],
  ['title' => 'Spiritual Growth', 'text' => 'Deepen your connection with your higher self.',
   'icon' => '<path d="M20 6c-6 5-9 10-9 15a9 9 0 0 0 18 0c0-5-3-10-9-15z"/><path d="M20 14v14M20 20l-4.5-3.5M20 24l4.5-3.5"/>'],
];
?>

<!-- ============ Hero ============ -->
<section class="page-hero">
  <div class="container">
    <div class="hero-copy">
      <span class="kicker">Healing Journey</span>
      <h1>A Path to Inner <br>Healing &amp; Growth</h1>
      <hr class="hero-divider">
      <p>Your healing journey is unique. Explore the path of transformation that awakens your true self.</p>
    </div>
    <div class="hero-media">
      <img src="assets/images/7th.jpeg" alt="Meditating at sunset in the mountains">
    </div>
  </div>
</section>

<!-- ============ The Healing Journey (steps) ============ -->
<section class="hj-steps">
  <div class="container">
    <h2 class="section-title">The Healing Journey</h2>
    <p class="section-sub">Healing is not a destination, it's a journey within. Each step brings you closer to your true essence.</p>

    <div class="steps">
      <?php foreach ($steps as $s): ?>
      <div class="step">
        <div class="step-num"><?php echo $s['num']; ?></div>
        <div class="step-card">
          <div class="icon-circle">
            <svg viewBox="0 0 40 40"><?php echo $s['icon']; ?></svg>
          </div>
          <div>
            <h3><?php echo $s['title']; ?></h3>
            <p><?php echo $s['text']; ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ What You Will Experience ============ -->
<section class="exp-section">
  <div class="container">
    <div class="exp-box">
      <h2 class="section-title">What You Will Experience</h2>
      <div class="cards-4">
        <?php foreach ($experiences as $e): ?>
        <div class="value-card">
          <div class="icon-circle">
            <svg viewBox="0 0 40 40"><?php echo $e['icon']; ?></svg>
          </div>
          <h3><?php echo $e['title']; ?></h3>
          <p><?php echo $e['text']; ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ============ Your Journey, Your Pace ============ -->
<section class="pace-section">
  <div class="container">
    <div class="pace-copy">
      <h2>Your Journey, Your Pace</h2>
      <p>There is no right or wrong way to heal. Trust the process and honor where you are.</p>
      <a href="<?php echo $WA_BOOK; ?>" target="_blank" rel="noopener" class="btn">Book a Session</a>
    </div>
    <div class="pace-img">
      <img src="assets/images/21th.jpeg" alt="An amethyst crystal glowing beside a candle" class="art-blend">
    </div>
  </div>
</section>

<!-- ============ Healing Journeys, Real Transformations ============ -->
<section class="hj-quote">
  <div class="container">
    <div class="hj-quote-box">
      <div>
        <h2 class="serif">Healing Journeys, Real Transformations</h2>
        <blockquote>&ldquo;Shweta's guidance helped me release years of emotional weight and step into a lighter, more empowered version of myself. Truly life-changing.&rdquo;</blockquote>
        <div class="testi-sign">
          <span class="t-name">&ndash; Priya S.</span>
          <span class="stars">
            <?php for ($i = 0; $i < 5; $i++): ?><svg viewBox="0 0 24 24"><path d="M12 2.5l2.9 6.2 6.8.8-5 4.6 1.3 6.7L12 17.5l-6 3.3 1.3-6.7-5-4.6 6.8-.8z"/></svg><?php endfor; ?>
          </span>
        </div>
      </div>
      <div class="hj-quote-photo">
        <img src="assets/images/2nd.jpeg" alt="Priya S.">
      </div>
    </div>
  </div>
</section>

<?php
$hideCta = true;
include 'includes/footer.php';
?>