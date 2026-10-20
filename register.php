<?php $root=''; require __DIR__.'/includes/helpers.php'; head('Register'); $m=($_GET['role']??'patient')==='staff'?'staff':'patient'; ?>
<body><div class="auth">
 <div class="L" style="--img:url(assets/images/hospitals/h2.jpg)"><a href="index.php"><?= logo(40) ?></a><div><h1>Join SmartQueue</h1><p class="lead">Book in minutes, skip the guesswork.</p></div><small>SmartQueue · Smarter Queues. Healthier Communities.</small></div>
 <div class="R"><div><a class="backl dark" href="role-selection.php?mode=register" data-back data-fallback="role-selection.php?mode=register"><i class="bi bi-arrow-left"></i> Back</a>
  <h2 class="h3 mt-2">Create your account</h2>
  <div class="seg" role="group" aria-label="Account type" data-seg><button type="button" class="<?= $m==='patient'?'on':'' ?>" data-r="patient" data-go="patient-dashboard.php">Patient</button><button type="button" class="<?= $m==='staff'?'on':'' ?>" data-r="staff" data-go="role-selection.php?mode=login">Hospital staff</button></div>
  <form class="demo-form" novalidate id="regForm" data-after="<?= $m==='patient'?'patient-dashboard.php':'role-selection.php?mode=login' ?>">
   <div class="mb-3"><label class="form-label" for="n">Full name</label><input class="form-control" id="n" required><div class="invalid-feedback">Name is required.</div></div>
   <div class="mb-3"><label class="form-label" for="m">Mobile number</label><input class="form-control" id="m" required pattern="[0-9]{10}" inputmode="numeric"><div class="invalid-feedback">Enter a 10-digit mobile number.</div></div>
   <div data-show-for="staff" <?= $m==='staff'?'':'hidden' ?>><div class="mb-3"><label class="form-label" for="sh">Hospital</label><select class="form-select" id="sh"><?php foreach($hospitals as $h) echo '<option>'.esc($h['name']).'</option>'; ?></select></div>
   <div class="mb-3"><label class="form-label" for="sr">Staff role</label><select class="form-select" id="sr"><option>Receptionist</option><option>Doctor</option></select></div></div>
   <div class="mb-3"><label class="form-label" for="o">OTP</label><input class="form-control" id="o" required pattern="[0-9]{6}" inputmode="numeric" placeholder="123456"><div class="invalid-feedback">Enter 6 digits.</div></div>
   <button class="btn btn-sq w-100 py-2" type="submit">Register</button></form>
  <p class="small text-center mt-3">Already registered? <a href="login.php">Login</a></p></div></div></div><?php scripts(); ?>
