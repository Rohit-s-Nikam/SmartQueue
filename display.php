<?php $root=''; require __DIR__.'/includes/helpers.php'; head('Token display'); ?>
<body class="disp-body"><main class="disp" id="disp" aria-live="polite">
 <div class="disp-top"><div><div class="disp-h" id="d-hosp">—</div><div class="disp-s" id="d-sub"></div></div>
  <div class="disp-ctl"><div class="disp-clock" id="d-clock"></div><button class="dbtn" id="d-sound" type="button" aria-pressed="false" aria-label="Toggle sound"><i class="bi bi-volume-mute"></i></button><button class="dbtn" id="d-full" type="button" aria-label="Full screen"><i class="bi bi-arrows-fullscreen"></i></button><a class="dbtn" href="display-login.php" aria-label="Exit display"><i class="bi bi-box-arrow-left"></i></a></div></div>
 <div class="disp-mid"><div class="disp-lbl">NOW SERVING</div><div class="disp-token" id="d-token">—</div><div class="disp-pat" id="d-pat"></div></div>
 <div class="disp-bot"><div class="disp-lbl sm">NEXT</div><div class="disp-next" id="d-next"></div><div class="disp-wait" id="d-wait"></div></div>
</main><?php scripts(); ?>
