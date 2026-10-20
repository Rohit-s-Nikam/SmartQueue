<?php $root=''; require __DIR__.'/includes/helpers.php'; public_start('About','about'); ?>
<section class="phero" style="--bg-img:url('assets/images/hero-banner.png')"><?= back_link() ?><h1>About SmartQueue</h1><p>One shared queue for hospitals, front-desk staff, doctors and patients, so nobody has to guess the wait.</p></section>
<section class="sec-pad"><div class="sec-in"><div class="grid3">
<?php foreach([['bullseye','Mission','Make healthcare visits predictable and calmer for everyone.'],['eye','Vision','Every hospital queue visible, fair and measurable.'],['shield-check','Values','Clarity, privacy and respect for patients\' time.']] as $f): ?>
<div class="tile reveal"><span class="kpi-i"><?= icon($f[0]) ?></span><h3><?= esc($f[1]) ?></h3><p><?= esc($f[2]) ?></p></div><?php endforeach; ?></div>
<h2 class="sec-h mt-5">What makes it different</h2><ul class="chk mt-3"><?php foreach(['Multi-hospital support with independent queues','Online and walk-in patients in one token line','Wait estimates that update as the queue moves','QR check-in and printable token slips','Role-based views for admin, reception, doctors and patients'] as $t) echo '<li>'.icon('check-circle-fill').esc($t).'</li>'; ?></ul>
</div></section>
<?php public_end(); ?>
