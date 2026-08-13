<?php
/* ---------------------------------------------------------------------------
   Shared booking form — used by the popup (includes/footer.php) and by the
   standalone book.php page (the no-JS / direct-link fallback).

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
  'user'    => 'M12 21.2a9.2 9.2 0 1 0 0-18.4 9.2 9.2 0 0 0 0 18.4z|M12 11.6a2.9 2.9 0 1 0 0-5.8 2.9 2.9 0 0 0 0 5.8z|M6.6 19.4a5.6 5.6 0 0 1 10.8 0',
  'mail'    => 'M3 5.8h18v12.4H3z|m3.4 6.3 8.6 6 8.6-6',
  'phone'   => 'M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.13.96.36 1.9.7 2.8a2 2 0 0 1-.45 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.45c.9.34 1.84.57 2.8.7a2 2 0 0 1 1.7 2.05z',
  'lotus'   => 'M12 4c-2 3-2 6.4 0 9.4 2-3 2-6.4 0-9.4z|M12 13.4C10.7 9 7.2 6.4 3 6c.7 4.4 4 7.2 9 7.4z|M12 13.4c1.3-4.4 4.8-7 9-7.4-.7 4.4-4 7.2-9 7.4z|M12 15.4c-3.2 1.9-7.6 1.9-10.5-.8 2.4 4.2 6.8 5.9 10.5 4.3 3.7 1.6 8.1-.1 10.5-4.3-2.9 2.7-7.3 2.7-10.5.8z',
  'cal'     => 'M4 5.6h16v15H4z|M16 3v4M8 3v4M4 10.4h16',
  'clock'   => 'M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z|M12 7.4V12l3.2 2',
  'pencil'  => 'M17 3.6a2.1 2.1 0 0 1 3 3L8.5 18.1l-4 1 1-4z|m14.4 6.2 3.4 3.4',
  'shield'  => 'M12 2.8 4.8 5.4v6c0 4.6 3 8.5 7.2 9.9 4.2-1.4 7.2-5.3 7.2-9.9v-6z|m9.2 11.8 2 2 3.6-3.6',
  'people'  => 'M9.4 11.6a3.1 3.1 0 1 0 0-6.2 3.1 3.1 0 0 0 0 6.2z|M2.8 19.4a6.6 6.6 0 0 1 13.2 0|M16.4 5.8a3.1 3.1 0 0 1 0 5.9|M18.2 13.6a6.6 6.6 0 0 1 3 5.8',
];

$bfIco = function ($name) use ($bfIcons) {
  $out = '';
  foreach (explode('|', $bfIcons[$name]) as $d) { $out .= '<path d="' . $d . '"/>'; }
  return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" '
       . 'stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $out . '</svg>';
};

$trustPoints = [
  ['lotus',  'Personalized', 'Care'],
  ['shield', 'Safe &amp;',       'Confidential'],
  ['lotus',  'Holistic',     'Approach'],
  ['people', 'Trusted by',   'Thousands'],
];
?>
<div class="book-shell">

  <div class="book-form-pane">
    <div class="book-card-head">
      <span class="book-card-ico" aria-hidden="true"><?php echo $bfIco('cal'); ?></span>
      <div>
        <h2>Let's Plan Your Session</h2>
        <p>We'll connect with you within <strong>24 hours</strong> to confirm.</p>
      </div>
    </div>

    <form class="book-form" data-wa="<?php echo $WA_NUMBER; ?>" novalidate>

      <div class="bf-field">
        <div class="bf-box">
          <span class="bf-ico"><?php echo $bfIco('user'); ?></span>
          <span class="bf-inner">
            <label for="<?php echo $p; ?>-name">Full Name</label>
            <input type="text" id="<?php echo $p; ?>-name" name="name"
                   placeholder="Enter your full name" autocomplete="name" required>
          </span>
        </div>
        <span class="bf-error">Please tell us your name.</span>
      </div>

      <div class="bf-row">
        <div class="bf-field">
          <div class="bf-box">
            <span class="bf-ico"><?php echo $bfIco('mail'); ?></span>
            <span class="bf-inner">
              <label for="<?php echo $p; ?>-email">Email Address</label>
              <input type="email" id="<?php echo $p; ?>-email" name="email"
                     placeholder="Enter your email" autocomplete="email" required>
            </span>
          </div>
          <span class="bf-error">Enter a valid email.</span>
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

      <div class="bf-field">
        <div class="bf-box">
          <span class="bf-ico"><?php echo $bfIco('lotus'); ?></span>
          <span class="bf-inner">
            <label for="<?php echo $p; ?>-service">Choose a Service</label>
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
        <span class="bf-error">Please choose a service.</span>
      </div>

      <div class="bf-row">
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

        <div class="bf-field">
          <div class="bf-box">
            <span class="bf-ico"><?php echo $bfIco('clock'); ?></span>
            <span class="bf-inner">
              <label for="<?php echo $p; ?>-time">Preferred Time</label>
              <select id="<?php echo $p; ?>-time" name="time" required>
                <option value="" selected disabled>Select a time</option>
                <option>Morning (8 AM &ndash; 12 PM)</option>
                <option>Afternoon (12 PM &ndash; 4 PM)</option>
                <option>Evening (4 PM &ndash; 8 PM)</option>
                <option>Night (8 PM &ndash; 10 PM)</option>
                <option>Flexible &mdash; you decide</option>
              </select>
            </span>
            <span class="bf-chev" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </span>
          </div>
          <span class="bf-error">Please pick a time.</span>
        </div>
      </div>

      <div class="bf-field">
        <div class="bf-box bf-box-area">
          <span class="bf-ico"><?php echo $bfIco('pencil'); ?></span>
          <span class="bf-inner">
            <label for="<?php echo $p; ?>-message">Message <span class="opt">(Optional)</span></label>
            <textarea id="<?php echo $p; ?>-message" name="message" rows="3"
                      placeholder="Tell us anything we should know..."></textarea>
          </span>
        </div>
      </div>

      <ul class="bf-trust">
        <?php foreach ($trustPoints as $tp): ?>
        <li>
          <span class="bft-ico"><?php echo $bfIco($tp[0]); ?></span>
          <span class="bft-txt"><?php echo $tp[1]; ?><br><?php echo $tp[2]; ?></span>
        </li>
        <?php endforeach; ?>
      </ul>

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
