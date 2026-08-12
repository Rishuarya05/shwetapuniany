<?php
$diffBlock = '
  <h2>The Simple Difference</h2>
  <div class="diff-grid">
    <div class="diff-card">
      <h3>Aura Cleansing</h3>
      <p>Focuses on the energy field <strong>around</strong> you.</p>
    </div>
    <div class="diff-card">
      <h3>Energy Cleansing</h3>
      <p>Focuses on the energetic experience <strong>within and around</strong> you.</p>
    </div>
  </div>
  <p>Both can be offered as complementary practices depending on what you feel you need at that moment.</p>';

$services = [
  'chakra-healing' => [
    'title'   => 'Chakra Healing',
    'img'     => '16th.jpeg',
    'tagline' => 'Come back to yourself. Rebalance your energy. Reconnect with your inner light.',
    'body'    => '
      <p>Chakra Healing is a gentle energy-balancing practice designed to help you reconnect with yourself, release emotional blockages, and restore a greater sense of inner harmony.</p>
      <p>Our body is believed to have seven primary energy centres, each associated with different aspects of our emotional, mental, and spiritual well-being. Through intuitive energy work, meditation, intention, and chakra-balancing techniques, we create a peaceful space for you to pause, reflect, and reconnect with your inner energy.</p>
      <p>Whether you are feeling emotionally overwhelmed, energetically drained, stuck in certain areas of life, or simply seeking deeper self-awareness, chakra healing can be a beautiful journey towards greater balance, clarity, and inner peace.</p>',
  ],
  'pendulum-healing' => [
    'title'   => 'Pendulum Healing',
    'img'     => '17th.jpeg',
    'tagline' => 'Trust your inner wisdom. Clear the energy. Create space for a more balanced you.',
    'body'    => '
      <p>Pendulum Healing is an intuitive energy practice that uses the movement of a pendulum as a tool for energetic assessment, insight, and balancing.</p>
      <p>A pendulum can be used to explore areas of energetic imbalance, identify possible blockages, and bring awareness to patterns that may be affecting your emotional and energetic well-being. Through focused intention and energy-balancing techniques, the session creates a calm and reflective space to reconnect with yourself.</p>
      <p>Each session is personalised to your individual energy and intentions, helping you gain greater clarity, release stagnant energy, and move forward with a renewed sense of balance and awareness.</p>',
  ],
  'distance-healing' => [
    'title'   => 'Distance Healing Through Pendulum',
    'img'     => '18th.jpeg',
    'tagline' => 'Energy knows no distance. Set your intention, open yourself to balance, and allow your inner harmony to unfold.',
    'body'    => '
      <p>Distance Pendulum Healing is a gentle energy practice that can be conducted remotely, allowing you to receive an intuitive energy-balancing session without being physically present.</p>
      <p>Using a pendulum as a tool for energetic assessment and focused intention, the session explores areas where energy may feel stagnant or out of balance. The practice is centred around creating a sense of relaxation, emotional clarity, and energetic harmony.</p>
      <p>Distance healing can be experienced from the comfort of your own space, making it a convenient and deeply personal approach to self-reflection and energy work.</p>
      <p>Every session is guided with intention, compassion, and respect for your individual journey.</p>',
  ],
  'energy-cleansing' => [
    'title'   => 'Energy Cleansing',
    'img'     => '19th.jpeg',
    'tagline' => 'Release what feels heavy. Forgive, cleanse, rebalance &mdash; and create space for a renewed you.',
    'body'    => '
      <p>Energy Cleansing focuses broadly on your overall energetic state. It may involve working with perceived energetic blockages, stagnant energy, emotional patterns, and areas that feel out of balance.</p>
      <p>Using practices such as pendulum work and Ho&rsquo;oponopono, the session is designed to support reflection, release, and a renewed sense of inner balance.</p>
      <p><em>Think of it as clearing and rebalancing the energy within you.</em></p>
      <div class="combo-box">
        <h2>Energy Cleansing with Ho&rsquo;oponopono &amp; Pendulum</h2>
        <p>A beautiful combination of Ho&rsquo;oponopono and Pendulum Healing designed to support emotional release, energetic cleansing, and inner balance.</p>
        <p>Ho&rsquo;oponopono is a practice of forgiveness, compassion, and letting go, centred around the intention to release limiting emotions, memories, and patterns. The pendulum is used as an intuitive tool to identify areas of energetic imbalance and support focused cleansing and balancing.</p>
        <p>Together, these practices create a deeply personal space for reflection, release, and renewal. The session is guided with intention to help you let go of what no longer serves you and reconnect with a lighter, more peaceful state within.</p>
      </div>
      {{DIFF}}',
  ],
  'aura-cleansing' => [
    'title'   => 'Aura Cleansing',
    'img'     => '20th.jpeg',
    'tagline' => 'Think of it as refreshing the energy around you.',
    'body'    => '
      <p>Aura Cleansing focuses on the energetic field surrounding the individual. It is intended to clear and refresh the aura from feelings of heaviness, emotional residue, or energies that may have accumulated through daily experiences and interactions.</p>
      <p>The practice creates a sense of energetic freshness and helps you reconnect with a feeling of calm, clarity, and personal space.</p>
      {{DIFF}}',
  ],
  'personalised-healing' => [
    'title'   => 'Personalised Healing',
    'img'     => '21th.jpeg',
    'tagline' => 'One intention. One journey. One personalised approach &mdash; created especially for you.',
    'body'    => '
      <p>Every person carries a unique story, emotional landscape, and energetic experience. Personalised Healing is a one-to-one journey created around your individual needs, intentions, and areas of focus.</p>
      <p>Rather than following a fixed approach, each session is intuitively guided and may incorporate practices such as Chakra Healing, Pendulum Healing, Ho&rsquo;oponopono, energy cleansing, and other supportive techniques.</p>
      <p>The intention is to create a deeply personal space where you can pause, reconnect with yourself, explore what may be feeling out of balance, and move towards greater clarity, calm, and inner harmony.</p>
      <p><em>Your journey is unique. Your healing experience should be too.</em></p>',
  ],
];

$slug = isset($_GET['s']) ? $_GET['s'] : '';
if (!isset($services[$slug])) {
  header('Location: services.php');
  exit;
}
$s = $services[$slug];

$page = 'services';
$pageTitle = $s['title'] . ' — Shweta Puniany';
include 'includes/header.php';

$body = str_replace('{{DIFF}}', $diffBlock, $s['body']);
$waThis = 'https://wa.me/' . $WA_NUMBER . '?text=' . rawurlencode("Hi Shweta, I'd like to book a " . $s['title'] . " session.");
?>

<!-- ============ Service hero ============ -->
<section class="article-hero">
  <div class="container">
    <span class="kicker">Our Services</span>
    <h1><?php echo $s['title']; ?></h1>
  </div>
</section>

<!-- ============ Service body ============ -->
<article class="article-wrap">
  <img class="svc-detail-art" src="assets/images/<?php echo $s['img']; ?>" alt="<?php echo htmlspecialchars($s['title']); ?>">
  <div class="article-body">
    <?php echo $body; ?>
  </div>

  <p class="svc-tagline"><?php echo $s['tagline']; ?></p>

  <div class="svc-detail-cta">
    <a href="<?php echo $waThis; ?>" target="_blank" rel="noopener" class="btn">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
      Book This Session
    </a>
  </div>

  <div class="article-back">
    <a class="link-more" href="services.php">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="transform:rotate(180deg)"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
      Back to All Services
    </a>
  </div>
</article>

<?php
$ctaText = 'Your Healing Journey Can Begin Today.';
$ctaBtnText = 'Book a Healing Session';
include 'includes/footer.php';
?>