<?php $root=''; require __DIR__.'/includes/helpers.php'; public_start('Help','contact'); ?>
<section class="phero"><?= back_link() ?><h1>Help &amp; support</h1><p>Answers to common questions, and a way to reach us.</p></section>
<section class="sec-pad"><div class="sec-in"><div class="row g-4"><div class="col-lg-7"><h2 class="sec-h">Frequently asked questions</h2>
<div class="accordion mt-3" id="fq"><?php foreach([['How are wait times estimated?','Each patient ahead of you in the same doctor\'s line adds about 12 minutes'.],['What is the QR code for?','Reception scans it, or types the booking reference, to confirm your arrival.'],['How do I cancel an appointment?','Open My Token and use Cancel booking. Cancelled bookings keep a record in your history.']] as $n=>$q): ?>
<div class="accordion-item"><h3 class="accordion-header"><button class="accordion-button <?= $n?'collapsed':'' ?>" data-bs-toggle="collapse" data-bs-target="#q<?= $n ?>"><?= esc($q[0]) ?></button></h3><div id="q<?= $n ?>" class="accordion-collapse collapse <?= $n?'':'show' ?>" data-bs-parent="#fq"><div class="accordion-body"><?= esc($q[1]) ?></div></div></div><?php endforeach; ?></div></div>
<div class="col-lg-5"><form class="card-sq p-4 demo-form" novalidate><h3 class="h5">Send us a message</h3>
<div class="mb-3"><label class="form-label" for="cn">Name</label><input class="form-control" id="cn" required><div class="invalid-feedback">Name is required.</div></div>
<div class="mb-3"><label class="form-label" for="ce">Email</label><input class="form-control" id="ce" type="email" required><div class="invalid-feedback">Enter a valid email.</div></div>
<div class="mb-3"><label class="form-label" for="cm">Message</label><textarea class="form-control" id="cm" rows="3" required></textarea><div class="invalid-feedback">Write a short message.</div></div>
<button class="btn btn-sq w-100" type="submit">Send message</button></form></div></div></div></section>
<?php public_end(); ?>
