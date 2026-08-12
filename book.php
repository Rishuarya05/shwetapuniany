<?php
/* Standalone booking page. The popup in includes/footer.php is the primary
   experience — this page is the fallback for direct links and no-JS visitors. */
$page       = 'book';
$crumbLabel = 'Book a Session';
$pageTitle  = 'Book Your Session — Shweta Puniany';
include 'includes/header.php';

$preSlug = isset($_GET['s']) ? $_GET['s'] : '';
?>

<!-- ============ Booking hero ============ -->
<section class="book-hero">
  <div class="container">
    <div class="bh-copy">
      <h1>Book Your <em>Session</em></h1>
      <div class="bh-rule" aria-hidden="true"><span></span></div>
      <p>
        Take the first step towards inner peace and holistic well-being.
        Fill in the details below and our team will get back to you.
      </p>
    </div>
    <div class="bh-art">
      <img src="assets/images/4th.jpeg" alt="Amethyst crystals glowing beside a lit candle">
    </div>
  </div>
</section>

<!-- ============ Booking form ============ -->
<section class="book-section">
  <div class="container">
    <div class="book-card">
      <?php include 'includes/booking-form.php'; ?>
    </div>

    <div class="book-help">
      <img src="assets/images/journey-photo.png" alt="Shweta Puniany">
      <div class="bh-help-copy">
        <h3>Need Help?</h3>
        <p>Our team is here to assist you.</p>
      </div>
      <a href="contact.php" class="btn btn-outline">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.5 8.5 0 0 1-12.2 7.6L3.5 20.5l1.4-5.2A8.5 8.5 0 1 1 21 11.5z"/></svg>
        Contact Us
      </a>
    </div>
  </div>
</section>

<?php
$hideCta = true;
include 'includes/footer.php';
?>
