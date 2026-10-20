<?php $root=''; $GLOBALS['page']='home'; require __DIR__.'/includes/helpers.php'; public_start('Home','home');
$icons=['Cardiology'=>'heart-pulse','Orthopedics'=>'person-walking','Dermatology'=>'droplet','General Medicine'=>'clipboard2-pulse','Pediatrics'=>'emoji-smile','Neurology'=>'activity','ENT'=>'soundwave','Gynecology'=>'gender-female'];
$serving=array_slice(array_values(array_filter($bookings,fn($b)=>$b['q']&&$b['status']==='In Consultation')),0,2);
$waiting=array_values(array_filter($bookings,fn($b)=>$b['q']&&$b['status']==='Waiting')); ?>
<header class="hero" style="background-image:url('assets/images/hero-banner.png')">
  <div class="hero-in">
    <span class="tagchip"><span class="live-dot"></span> Live queues across 8 cities</span>
    <h1 class="mt-3">Smarter Queues.<br><span>Healthier Communities.</span></h1>
    <p class="lead my-3">One platform for online bookings and walk-ins across hospitals: live tokens, honest wait estimates and QR check-in.</p>
    <form class="sbox" action="hospitals.php" method="get" role="search">
      <input name="q" placeholder="Search hospital, doctor or city" aria-label="Search hospitals">
      <select name="dept" aria-label="Department"><option value="">All departments</option><?php foreach($departments as $d) echo '<option>'.esc($d['name']).'</option>'; ?></select>
      <button class="btn btn-sq px-4" type="submit"><?= icon('search') ?> Search</button>
    </form>
    <div class="d-flex flex-wrap gap-2 mt-3"><a class="btn btn-sq" href="booking.php">Book appointment</a><a class="btn btn-sq-ghost" href="hospitals.php">Explore hospitals</a><a class="btn btn-wh border" href="role-selection.php?mode=login">Sign in</a></div>
    <div class="hero-live" id="hero-live" style="margin-top:22px;max-width:420px" aria-label="Live tokens"></div>
  </div>
</header>
<section class="strip"><div class="row text-center g-3">
  <?php foreach([[count($hospitals),'Partner hospitals'],[count($patients),'Registered patients'],[count($departments),'Departments'],[count($bookings),'Appointments booked']] as $s): ?>
  <div class="col-6 col-md-3"><b class="cnt"><?= (int)$s[0] ?></b><small><?= esc($s[1]) ?></small></div><?php endforeach; ?></div></section>
<section class="sec-pad"><div class="sec-in"><h2 class="sec-h text-center">Browse by department</h2><p class="sec-sub text-center">Pick a specialty and see which hospitals offer it.</p>
  <div class="row g-3"><?php foreach($departments as $d): ?><div class="col-6 col-md-3 col-lg-3 reveal"><a class="catc" href="hospitals.php?dept=<?= urlencode($d['name']) ?>"><i class="bi bi-<?= $icons[$d['name']] ?>"></i><?= esc($d['name']) ?></a></div><?php endforeach; ?></div></div></section>
<section class="sec-pad alt"><div class="sec-in"><div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3"><div><h2 class="sec-h">Featured hospitals</h2><p class="sec-sub mb-0">Book with our partner hospitals.</p></div><a class="btn btn-sq-ghost btn-sm" href="hospitals.php">View all hospitals</a></div>
  <div class="grid3"><?php foreach(array_slice(array_values(array_filter($hospitals,fn($h)=>$h['status']==='Approved')),0,3) as $i=>$h): ?>
  <article class="card-sq hcard lift reveal"><div class="h-art"><?= hosp_art($h['id']) ?></div><div class="p-3"><h3><?= esc($h['name']) ?></h3><p class="small text-muted mb-1"><?= icon('geo-alt') ?> <?= esc($h['city']) ?> &middot; <?= esc($h['dist']) ?> &middot; <?= icon('star-fill') ?> <?= esc($h['rating']) ?></p><p class="small"><?= esc(implode(', ', $h['depts'])) ?></p><a class="btn btn-sq btn-sm w-100" href="booking.php?h=<?= (int)$h['id'] ?>">Book appointment</a></div></article><?php endforeach; ?></div></div></section>
<section class="sec-pad"><div id="root"></div></section>
<section class="sec-pad"><div class="sec-in"><h2 class="sec-h text-center">Why SmartQueue</h2><p class="sec-sub text-center">Built for patients, front desks and doctors.</p><div class="grid3">
<?php foreach([['building','Multi-hospital platform','Each hospital runs its own departments, doctors and queue.'],['list-ol','Unified queue','Online and walk-in patients share one token line per doctor.'],['clock','Live wait estimates','Position in line becomes minutes, updated as the queue moves.'],['qr-code','QR check-in','Show the token QR at reception to confirm arrival.'],['bar-chart','Reports and exports','Daily, department and doctor views with CSV export.'],['bell','Notifications','Confirmations, reminders and queue updates.']] as $f): ?>
<div class="tile reveal"><span class="kpi-i"><?= icon($f[0]) ?></span><h3><?= esc($f[1]) ?></h3><p><?= esc($f[2]) ?></p></div><?php endforeach; ?></div></div></section>
<section class="sec-pad"><div class="sec-in"><div class="row g-5 align-items-center"><div class="col-lg-6"><div class="mosaic reveal"><img src="<?= esc(hosp_img(1)) ?>" alt="Hospital building" loading="lazy"><img src="<?= esc(hosp_img(2)) ?>" alt="Hospital entrance at dusk" loading="lazy"><img src="<?= esc(hosp_img(6)) ?>" alt="Modern hospital campus" loading="lazy"></div></div>
<div class="col-lg-6"><span class="tagchip">Built for the whole hospital</span><h2 class="sec-h mt-3">Online, walk-in and on screen, all in sync</h2><ul class="chk mt-3"><?php foreach(['Patients book, pay the booking fee and get a token with its QR code','Reception scans the QR with a camera or types the booking ID','Doctors see the next patient and finish consultations in one tap','A full-screen display shows only the current token for one doctor','Patients can track their token without logging in'] as $t) echo '<li>'.icon('check-circle-fill').esc($t).'</li>'; ?></ul>
<div class="d-flex gap-2 flex-wrap"><a class="btn btn-sq" href="track.php">Track a token</a><a class="btn btn-sq-ghost" href="display-login.php">Open display screen</a></div></div></div></div></section>
<section class="sec-pad dark-sec" id="roles"><div class="sec-in"><h2 class="sec-h text-center">Sign in as</h2><p class="text-center mb-4" style="color:#9fc4d2">Choose your role. Every login is in one place.</p>
  <div class="row g-3 justify-content-center"><?php foreach(['patient','receptionist','doctor','hospital-admin','super-admin'] as $r): ?><div class="col-sm-6 col-lg reveal"><a class="role-card h-100" href="login.php?role=<?= $r ?>"><i class="bi bi-<?= role_icon($r) ?>"></i><b><?= esc($NAV[$r]['label']) ?> login</b><span><?= esc(role_blurb($r)) ?></span></a></div><?php endforeach; ?></div>
  <div class="altlinks center dark mt-4"><a href="hospital-admin-login.php"><?= icon('hospital') ?> Hospital admin login</a><a href="admin-login.php"><?= icon('shield-lock') ?> Platform admin login</a><a href="display-login.php"><?= icon('display') ?> Waiting-room display</a></div></div></section>
<section class="sec-pad"><div class="sec-in text-center"><h2 class="sec-h">How it works</h2><p class="sec-sub">Four steps from search to consultation.</p><div class="row g-4">
<?php foreach([['search','Find','Search by city, department or doctor.'],['calendar-check','Book','Pick a free slot and pay the booking fee.'],['qr-code','Get token','Receive a token number and QR.'],['hospital','Check in','Show the QR and wait for your number.']] as $i=>$s): ?>
<div class="col-6 col-md-3 reveal"><div class="tile"><div class="step mb-2"><?= $i+1 ?></div><i class="bi bi-<?= $s[0] ?> big"></i><h3><?= esc($s[1]) ?></h3><p><?= esc($s[2]) ?></p></div></div><?php endforeach; ?></div></div></section>
<section class="sec-pad alt"><div class="sec-in"><h2 class="sec-h text-center">Built for everyone in the hospital</h2><p class="sec-sub text-center">One platform, four ways to save time.</p><div class="row g-3">
<?php foreach([['person-heart','Patients','Book online, get a token and track your turn from anywhere.'],['heart-pulse','Doctors','See the next patient, history and prescriptions in one workspace.'],['person-workspace','Receptionists','Check in, scan QR codes and call tokens without paper registers.'],['hospital','Hospitals','Manage departments, doctors and queues across the day.']] as $t): ?>
<div class="col-md-6 col-lg-3 reveal"><div class="tile"><span class="kpi-i"><?= icon($t[0]) ?></span><h3><?= esc($t[1]) ?></h3><p><?= esc($t[2]) ?></p></div></div><?php endforeach; ?></div></div></section>
<section class="sec-pad"><div class="sec-in"><div class="ctab" style="--bg-img:url('assets/images/hero-banner.png')"><h2 class="text-white">Ready for a calmer waiting room?</h2><p style="color:#cfe6ee">Book an appointment or sign in to your portal.</p><a class="btn btn-sq me-2" href="booking.php">Book now</a><a class="btn btn-sq-o" href="role-selection.php?mode=login">Login</a></div></div></section>
<?php public_end(); ?>
