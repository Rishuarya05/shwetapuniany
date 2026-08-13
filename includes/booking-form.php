<?php
/* ---------------------------------------------------------------------------
   Shared booking form — used by the popup (includes/footer.php) and by the
   standalone book.php page (the no-JS / direct-link fallback).

   Two panes side by side: an image panel that carries the mood and the trust
   points, and a short four-field form. Splitting it this way is what keeps the
   whole thing on one screen — the reassurance sits beside the fields instead of
   stacking on top of them. On phones the panel folds down to a slim banner.

   Only name, phone, service and date are asked for; everything else is settled
   in the WhatsApp conversation that follows.

   Set $bfPrefix before including if two copies ever share a page, so the
   label/input id pairs stay unique.
   --------------------------------------------------------------------------- */
$bfPrefix = $bfPrefix ?? 'bf';
$p        = $bfPrefix;

$bookServices = [
  'chakra-healing'       => 'Chakra Healing',
  'pendulum-healing'     => 'Pendulum Healing',
  'distance-healing'     => 'Distance Healing Through Pendulum',
  'energy-cleansing'     => 'Energy Cleansing',
  'aura-cleansing'       => 'Aura Cleansing',
  'personalised-healing' => 'Personalised Healing',
  'not-sure'             => "I'm not sure — please guide me",
];

$preSlug = $preSlug ?? '';

/* icon path sets — multiple paths separated by | */
$bfIcons = [
  'user'  => 'M12 21.2a9.2 9.2 0 1 0 0-18.4 9.2 9.2 0 0 0 0 18.4z|M12 11.6a2.9 2.9 0 1 0 0-5.8 2.9 2.9 0 0 0 0 5.8z|M6.6 19.4a5.6 5.6 0 0 1 10.8 0',
  'phone' => 'M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.7 2.05z',
  'lotus' => 'M12 4c-2 3-2 6.4 0 9.4 2-3 2-6.4 0-9.4z|M12 13.4C10.7 9 7.2 6.4 3 6c.7 4.4 4 7.2 9 7.4z|M12 13.4c1.3-4.4 4.8-7 9-7.4-.7 4.4-4 7.2-9 7.4z|M12 15.4c-3.2 1.9-7.6 1.9-10.5-.8 2.4 4.2 6.8 5.9 10.5 4.3 3.7 1.6 8.1-.1 10.5-4.3-2.9 2.7-7.3 2.7-10.5.8z',
  'cal'   => 'M4 5.6h16v15H4z|M16 3v4M8 3v4M4 10.4h16',
  'tick'  => 'm5 12.5 4.2 4.2L19 7',

  /* one glyph per service, for the picker list */
  'chakra'   => 'M12 20.8a8.8 8.8 0 1 0 0-17.6 8.8 8.8 0 0 0 0 17.6|M12 15.4a3.4 3.4 0 1 0 0-6.8 3.4 3.4 0 0 0 0 6.8|M12 3.2v5.4M12 15.4v5.4M3.2 12h5.4M15.4 12h5.4',
  'pendulum' => 'M12 2.6v5.2|m12 7.8 2.7 3.4-2.7 6.2-2.7-6.2z|M6.4 20.6a8 8 0 0 1 11.2 0',
  'waves'    => 'M13.6 12a1.6 1.6 0 1 0-3.2 0 1.6 1.6 0 0 0 3.2 0|M8.6 15.4a4.8 4.8 0 0 1 0-6.8|M15.4 8.6a4.8 4.8 0 0 1 0 6.8|M5.8 18.2a9.4 9.4 0 0 1 0-12.4|M18.2 5.8a9.4 9.4 0 0 1 0 12.4',
  'spark'    => 'M12 3.2c.9 3.8 2.9 5.8 6.8 6.8-3.9 1-5.9 3-6.8 6.8-.9-3.8-2.9-5.8-6.8-6.8 3.9-1 5.9-3 6.8-6.8z|M17.8 16.4c.35 1.3 1 2 2.4 2.4-1.4.4-2.05 1.1-2.4 2.4-.35-1.3-1-2-2.4-2.4 1.4-.4 2.05-1.1 2.4-2.4z',
  'aura'     => 'M12 12.2a3.1 3.1 0 1 0 0-6.2 3.1 3.1 0 0 0 0 6.2|M6.6 19.6a5.4 5.4 0 0 1 10.8 0|M3.6 13.4a8.8 8.8 0 0 1 1.9-6.6|M20.4 13.4a8.8 8.8 0 0 0-1.9-6.6',
  'heart'    => 'M12 20.3s-7-4.1-7-9a3.9 3.9 0 0 1 7-2.4 3.9 3.9 0 0 1 7 2.4c0 4.9-7 9-7 9z',
  'compass'  => 'M12 20.8a8.8 8.8 0 1 0 0-17.6 8.8 8.8 0 0 0 0 17.6|m15.4 8.6-2.2 4.6-4.6 2.2 2.2-4.6z',
];

/* the glyph shown beside each service in the picker */
$serviceIcons = [
  'chakra-healing'       => 'chakra',
  'pendulum-healing'     => 'pendulum',
  'distance-healing'     => 'waves',
  'energy-cleansing'     => 'spark',
  'aura-cleansing'       => 'aura',
  'personalised-healing' => 'heart',
  'not-sure'             => 'compass',
];

$bfIco = function ($name) use ($bfIcons) {
  $out = '';
  foreach (explode('|', $bfIcons[$name]) as $d) { $out .= '<path d="' . $d . '"/>'; }
  return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" '
       . 'stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $out . '</svg>';
};

$asidePoints = [
  'Personalised one-to-one care',
  'Safe &amp; completely confidential',
  'Trusted by thousands',
];
?>
<div class="book-shell">

  <div class="book-form-pane">

    <aside class="book-aside">
      <img class="ba-photo" src="assets/images/12th.jpeg" alt=""
           loading="lazy" decoding="async">
      <span class="ba-veil" aria-hidden="true"></span>
      <span class="ba-glow" aria-hidden="true"></span>

      <div class="ba-copy">
        <span class="ba-orn" aria-hidden="true"></span>
        <h3>Begin Your <em>Healing</em></h3>
        <p class="ba-lede">Four small details &mdash; and we'll confirm your slot within 24 hours.</p>

        <ul class="ba-points">
          <?php foreach ($asidePoints as $pt): ?>
            <li><span class="ba-tick"><?php echo $bfIco('tick'); ?></span><?php echo $pt; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </aside>

    <div class="book-main">
      <div class="book-card-head">
        <span class="book-card-ico" aria-hidden="true"><?php echo $bfIco('cal'); ?></span>
        <div>
          <h2>Let's Plan Your Session</h2>
          <p>Tell us who you are and when <strong>suits you</strong> best.</p>
        </div>
      </div>

      <form class="book-form" data-wa="<?php echo $WA_NUMBER; ?>" novalidate>

        <div class="bf-row">
          <div class="bf-field">
            <div class="bf-box">
              <span class="bf-ico"><?php echo $bfIco('user'); ?></span>
              <span class="bf-inner">
                <label for="<?php echo $p; ?>-name">Full Name</label>
                <input type="text" id="<?php echo $p; ?>-name" name="name"
                       placeholder="Your name" autocomplete="name" required>
              </span>
            </div>
            <span class="bf-error">Please tell us your name.</span>
          </div>

          <div class="bf-field">
            <div class="bf-box">
              <span class="bf-ico"><?php echo $bfIco('phone'); ?></span>
              <span class="bf-inner">
                <label for="<?php echo $p; ?>-phone">Phone Number</label>
                <span class="bf-phone-row">
                  <span class="bf-cc">+91</span>
                  <input type="tel" id="<?php echo $p; ?>-phone" name="phone"
                         placeholder="Your number" inputmode="numeric"
                         autocomplete="tel" maxlength="10" required>
                </span>
              </span>
            </div>
            <span class="bf-error">Enter a 10-digit mobile number.</span>
          </div>
        </div>

        <?php /* main.js upgrades this into a styled listbox; the <select> stays
                 as the value holder and as the fallback when JS is off */ ?>
        <div class="bf-field bf-field-service">
          <div class="bf-box">
            <span class="bf-ico"><?php echo $bfIco('lotus'); ?></span>
            <span class="bf-inner">
              <label for="<?php echo $p; ?>-service" id="<?php echo $p; ?>-service-label">Choose a Service</label>
              <select id="<?php echo $p; ?>-service" name="service" required>
                <option value="" <?php echo isset($bookServices[$preSlug]) ? '' : 'selected'; ?> disabled>Select a service</option>
                <?php foreach ($bookServices as $slug => $label): ?>
                  <option value="<?php echo $slug; ?>"<?php echo $preSlug === $slug ? ' selected' : ''; ?>><?php echo $label; ?></option>
                <?php endforeach; ?>
              </select>
            </span>
            <span class="bf-chev" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </div>

          <template class="bf-opt-tpl">
            <?php foreach ($bookServices as $slug => $label): ?>
              <li class="bf-opt<?php echo $slug === 'not-sure' ? ' bf-opt-guide' : ''; ?>"
                  role="option" aria-selected="false" data-value="<?php echo $slug; ?>">
                <span class="bf-opt-ico"><?php echo $bfIco($serviceIcons[$slug]); ?></span>
                <span class="bf-opt-txt"><?php echo $label; ?></span>
                <span class="bf-opt-tick"><?php echo $bfIco('tick'); ?></span>
              </li>
            <?php endforeach; ?>
          </template>

          <span class="bf-error">Please choose a service.</span>
        </div>

        <div class="bf-field">
          <div class="bf-box">
            <span class="bf-ico"><?php echo $bfIco('cal'); ?></span>
            <span class="bf-inner">
              <label for="<?php echo $p; ?>-date">Preferred Date</label>
              <input type="date" id="<?php echo $p; ?>-date" name="date"
                     min="<?php echo date('Y-m-d'); ?>" required>
            </span>
          </div>
          <span class="bf-error">Please pick a date.</span>
        </div>

        <button type="submit" class="btn bf-submit">
          <span>Book My Session</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </button>

        <p class="bf-secure">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="4.5" y="10.5" width="15" height="10.5" rx="2.5"/><path d="M8 10.5V7a4 4 0 0 1 8 0v3.5"/></svg>
          Your information is secure and confidential.
        </p>
      </form>
    </div>

  </div>

  <!-- Confirmation, revealed after the WhatsApp message is handed off -->
  <div class="book-done" hidden>
    <span class="bd-check" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m4.5 12.5 5 5 10-11"/></svg>
    </span>
    <h2>Your booking has been sent through WhatsApp</h2>
    <p class="bd-lede">
      Thank you, <strong class="bd-name">friend</strong>. Your session request has opened in
      WhatsApp &mdash; press <strong>send</strong> there to deliver it to Shweta.
      We'll confirm your slot within 24 hours.
    </p>

    <ul class="bd-summary"></ul>

    <p class="bd-hint" hidden>
      WhatsApp didn't open automatically? <a class="bd-wa" href="#" target="_blank" rel="noopener">Tap here to open it</a>.
    </p>

    <div class="bd-actions">
      <a class="btn bd-wa" href="#" target="_blank" rel="noopener">
        <img class="wa-glyph" src="assets/images/wpicon.png" alt="" width="16" height="16" decoding="async">
        Open WhatsApp
      </a>
      <button type="button" class="btn-ghost bd-again">Book another session</button>
    </div>
  </div>

</div>
