<?php
$page = '';
$pageTitle = 'Privacy Policy — Shweta Puniany';
include 'includes/header.php';
?>

<section class="article-hero">
  <div class="container">
    <span class="kicker">Your Privacy Matters</span>
    <h1>Privacy Policy</h1>
    <div class="article-meta">Last updated: August 2026</div>
  </div>
</section>

<div class="legal-wrap">
  <p>Your trust is sacred to me. This policy explains, in plain words, how your information is handled when you visit this website or reach out for a healing session.</p>

  <h2>What this website collects</h2>
  <p>This website does not use accounts, tracking cookies or analytics that identify you, and it does not store your personal information on any server. Browsing here is simply browsing.</p>

  <h2>When you contact me</h2>
  <p>All bookings and messages happen through <strong>WhatsApp</strong>, email or phone. When you use the contact form, the details you type are composed into a WhatsApp message on your own device &mdash; nothing is saved by this website. Whatever you share with me directly is treated with complete confidentiality.</p>

  <h2>Confidentiality of sessions</h2>
  <p>Everything discussed before, during or after a healing session stays between us. Your story, your experiences and your personal details are never shared with anyone.</p>

  <h2>Third-party services</h2>
  <ul>
    <li><strong>WhatsApp</strong> &mdash; used for bookings and conversations, governed by WhatsApp&rsquo;s own privacy policy.</li>
    <li><strong>Google Fonts</strong> &mdash; used to display the typefaces on this website.</li>
  </ul>

  <h2>Your choices</h2>
  <p>You may contact me through whichever channel feels most comfortable, and you may ask me at any time to delete our conversation history from my devices.</p>

  <h2>Questions</h2>
  <p>If anything about this policy is unclear, write to me at <a href="mailto:<?php echo $EMAIL; ?>" style="color:var(--purple);"><?php echo $EMAIL; ?></a> &mdash; I will be happy to explain.</p>
</div>

<?php
$hideCta = true;
include 'includes/footer.php';
?>