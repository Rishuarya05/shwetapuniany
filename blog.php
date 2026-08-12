<?php
$page = 'blog';
$pageTitle = 'Blog — Shweta Puniany';
include 'includes/header.php';

$posts = [
  ['cat' => 'chakra',   'label' => 'Chakra Healing',   'title' => 'What Are Chakras <br>&amp; Why Do They Matter?', 'date' => 'May 12, 2024', 'img' => '8th.jpeg',  'slug' => 'what-are-chakras-and-why-do-they-matter'],
  ['cat' => 'energy',   'label' => 'Energy',           'title' => 'Understanding <br>Energy Blockages',            'date' => 'May 18, 2024', 'img' => '9th.jpeg',  'slug' => 'understanding-energy-blockages'],
  ['cat' => 'pendulum', 'label' => 'Pendulum Healing', 'title' => 'How Pendulum <br>Healing Works',                'date' => 'May 08, 2024', 'img' => '10th.jpeg', 'slug' => 'how-pendulum-healing-works'],
  ['cat' => 'self',     'label' => 'Self Healing',     'title' => 'Signs You Need <br>Emotional Rest',             'date' => 'May 05, 2024', 'img' => '11th.jpeg', 'slug' => 'signs-you-need-emotional-rest'],
  ['cat' => 'energy',   'label' => 'Energy',           'title' => 'Creating an Energetic <br>Morning Ritual',      'date' => 'Apr 30, 2024', 'img' => '12th.jpeg', 'slug' => 'creating-an-energetic-morning-ritual'],
  ['cat' => 'chakra',   'label' => 'Chakra Healing',   'title' => 'What Happens During <br>a Healing Session?',    'date' => 'Apr 28, 2024', 'img' => '13th.jpeg', 'slug' => 'what-happens-during-a-healing-session'],
];
?>

<!-- ============ Hero ============ -->
<section class="page-hero hero-bg hero-bg-blog">
  <div class="container">
    <div class="hero-copy">
      <span class="kicker">From the Journal</span>
      <h1>Thoughts for Your <br>Healing Journey</h1>
      <p>Insights, guidance and gentle reminders to support your inner growth and transformation.</p>
    </div>
    <div class="hero-media m-banner">
      <img src="assets/images/6th.jpeg" alt="An open book beside a candle, crystals and lavender">
    </div>
  </div>
</section>

<!-- ============ Filters ============ -->
<section class="blog-filters">
  <div class="container">
    <div class="filter-bar" role="tablist" aria-label="Filter articles">
      <button class="pill active" data-filter="all">All</button>
      <button class="pill" data-filter="chakra">Chakra Healing</button>
      <button class="pill" data-filter="energy">Energy</button>
      <button class="pill" data-filter="self">Self Healing</button>
      <button class="pill" data-filter="pendulum">Pendulum Healing</button>
      <button class="pill" data-filter="mindfulness">Mindfulness</button>
    </div>
  </div>
</section>

<!-- ============ Featured article ============ -->
<section class="featured-post">
  <div class="container">
    <div class="featured-img">
      <img src="assets/images/7th.jpeg" alt="Meditation at sunrise in the mountains">
    </div>
    <div class="featured-copy">
      <span class="kicker">Featured</span>
      <h2>7 Signs Your Energy<br>May Need Attention</h2>
      <p>Learn to recognize subtle signs of energetic imbalance and how to gently restore your natural flow.</p>
      <a class="link-more" href="article.php?post=seven-signs-your-energy-may-need-attention">Read Article
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ============ Post grid ============ -->
<section class="post-grid-section">
  <div class="container">
    <div class="post-grid">
      <?php foreach ($posts as $p): ?>
      <article class="post-card" data-cat="<?php echo $p['cat']; ?>">
        <a href="article.php?post=<?php echo $p['slug']; ?>" class="post-thumb"><img src="assets/images/<?php echo $p['img']; ?>" alt=""></a>
        <div class="post-body">
          <span class="post-cat"><?php echo $p['label']; ?></span>
          <h3 class="post-title"><a href="article.php?post=<?php echo $p['slug']; ?>"><?php echo $p['title']; ?></a></h3>
          <div class="post-date"><?php echo $p['date']; ?></div>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ============ Newsletter band ============ -->
<section class="news-band">
  <div class="container">
    <form class="news-form subscribe-form" data-wa="<?php echo $WA_NUMBER; ?>">
      <div class="news-copy">
        <h2>A Little Healing.<br>Delivered to Your Inbox.</h2>
        <p>Receive gentle insights, healing practices and energy guidance from Shweta.</p>
        <button type="submit" class="btn">Send Message</button>
      </div>
      <input class="news-input" type="email" name="email" placeholder="Your email address" required>
    </form>
    <img class="news-art art-blend" src="assets/images/news-crystals-hd.png" alt="" aria-hidden="true">
  </div>
</section>

<?php
$hideCta = true;
include 'includes/footer.php';
?>