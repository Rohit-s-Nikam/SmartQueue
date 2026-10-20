<?php $root=''; require __DIR__.'/includes/helpers.php'; http_response_code(404); public_start('Page not found'); ?>
<section class="sec-pad"><div class="sec-in text-center"><?= empty_state('compass','Page not found','The page you opened does not exist on this site.') ?><a class="btn btn-sq mt-3" href="index.php">Go to home</a></div></section>
<?php public_end(); ?>
