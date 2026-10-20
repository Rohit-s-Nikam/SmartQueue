<?php $root=''; require __DIR__.'/includes/helpers.php'; public_start('Track token','track'); ?>
<section class="phero" style="--bg-img:url('assets/images/hospitals/h3.jpg')"><?= back_link() ?><h1>Track your token</h1><p>Enter your booking reference to see your status, patients ahead and the estimated wait.</p></section>
<section class="sec-pad"><div class="sec-in" style="max-width:640px">
<form class="sbox" id="trackForm" novalidate><input id="tk-in" placeholder="Booking reference, e.g. BQ202610190047" aria-label="Booking reference" required><button class="btn btn-sq px-4" type="submit"><?= icon('search') ?> Track</button></form>

<div id="track-out" class="mt-3"><?= empty_state('ticket-perforated','No token tracked yet','Your live position appears here.') ?></div></div></section>
<?php public_end(); ?>
