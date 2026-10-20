<?php $root=''; require __DIR__.'/includes/helpers.php'; head('Display screen login'); ?>
<body><div class="auth admin"><div class="L" style="--img:url(assets/images/hospitals/h5.jpg)"><a href="index.php"><?= logo(40) ?></a><div><h1>Waiting-room display</h1><p class="lead">Show the current token for one doctor on the whole screen.</p></div><small><?= icon('display') ?> Open on a TV or monitor at the hospital</small></div>
<div class="R"><div><a class="backl dark" href="login.php" data-back data-fallback="login.php"><?= icon('arrow-left') ?> Back</a><h2 class="h3 mt-3">Set up a display</h2><p class="small text-muted">Choose the hospital, department and doctor. The screen then shows only that doctor's token number.</p>
<form id="dispForm" novalidate>
 <div class="mb-3"><label class="form-label" for="dh">Hospital</label><select class="form-select" id="dh" required></select></div>
 <div class="mb-3"><label class="form-label" for="dd">Department</label><select class="form-select" id="dd" required></select></div>
 <div class="mb-3"><label class="form-label" for="dc">Doctor</label><select class="form-select" id="dc" required></select><div class="invalid-feedback">Select a doctor.</div></div>
 <button class="btn btn-sq w-100 py-2" type="submit"><?= icon('display') ?> Start display</button></form>
 <div class="altlinks"><a href="login.php"><?= icon('person') ?> Patient / staff login</a><a href="receptionist/token-display.php"><?= icon('ticket-perforated') ?> In-app token view</a></div></div></div></div><?php scripts(); ?>
