<?php
/* ---- Site config (no backend — WhatsApp handles all bookings/contact) ---- */
$SITE_NAME  = 'Shweta Puniany';
$SITE_TAG   = 'Healing. Transformation. You';
$PHONE      = '+91 98765 43210';
$EMAIL      = 'connect@shwetapuniany.com';
$LOCATION   = 'Mumbai, India';
$WA_NUMBER  = '919876543210'; // digits only, for wa.me links
$WA_BOOK    = 'https://wa.me/' . $WA_NUMBER . '?text=' . rawurlencode("Hi Shweta, I'd like to book a healing session.");
$WA_CHAT    = 'https://wa.me/' . $WA_NUMBER . '?text=' . rawurlencode("Hi Shweta, I have a question about your healing sessions.");

$page      = $page      ?? '';
$pageTitle = $pageTitle ?? $SITE_NAME . ' — ' . $SITE_TAG;

$navItems = [
  'home'         => ['Home', 'index.php'],
  'about'        => ['About', 'about.php'],
  'services'     => ['Services', 'services.php'],
  'journey'      => ['Healing Journey', 'healing-journey.php'],
  'testimonials' => ['Testimonials', 'testimonials.php'],
  'blog'         => ['Blog', 'blog.php'],
  'contact'      => ['Contact', 'contact.php'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="Shweta Puniany — Chakra Healer & Pendulum Healing Practitioner. Helping you heal, align and awaken your true potential.">
  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css?v=<?php echo filemtime(__DIR__ . '/../assets/css/style.css'); ?>">
</head>
<body>

<header class="site-header">
  <div class="container header-inner">
    <a href="index.php" class="brand" aria-label="<?php echo $SITE_NAME; ?> — Home">
      <span class="brand-logo-wrap">
      <svg class="brand-logo" viewBox="0 0 64 64" aria-hidden="true">
        <g fill="none" stroke="#c9891f" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
          <path d="M32 8c-5.5 9-5.5 19 0 28 5.5-9 5.5-19 0-28z"/>
          <path d="M32 36c-3-11-12-18-22-20 2 11 10 19.5 22 20z"/>
          <path d="M32 36c3-11 12-18 22-20-2 11-10 19.5-22 20z"/>
          <path d="M32 38.5c-8.5 4.5-19.5 4.5-28-2.5 6.5 11 18.5 15.5 28 11 9.5 4.5 21.5 0 28-11-8.5 7-19.5 7-28 2.5z"/>
          <path d="M20 52c4 2.5 8 3.8 12 3.8S40 54.5 44 52"/>
        </g>
        <circle cx="14" cy="12" r="1" fill="#c9891f"/>
        <circle cx="50" cy="10" r="1" fill="#c9891f"/>
        <circle cx="55" cy="26" r="1" fill="#c9891f"/>
      </svg>
      </span>
      <span class="brand-text">
        <span class="brand-name"><?php echo $SITE_NAME; ?></span>
        <span class="brand-tagline"><?php echo $SITE_TAG; ?></span>
      </span>
    </a>

    <button class="nav-toggle" id="navToggle" aria-label="Open menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <nav class="main-nav" id="mainNav" aria-label="Main navigation">
      <ul>
        <?php foreach ($navItems as $key => $item): ?>
          <li><a href="<?php echo $item[1]; ?>" class="<?php echo $page === $key ? 'active' : ''; ?>"><?php echo $item[0]; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <div class="header-cta">
      <a href="<?php echo $WA_BOOK; ?>" target="_blank" rel="noopener" class="btn">Book a Session</a>
    </div>
  </div>
</header>
