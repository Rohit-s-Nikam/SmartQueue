<?php $m = (($_GET['mode'] ?? '') === 'register') ? '?mode=register' : ''; header('Location: login.php' . $m); exit;
