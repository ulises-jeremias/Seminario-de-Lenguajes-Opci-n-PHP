<?php
if($_POST) {
  require('core/core.php');

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'login':
      require('core/bin/ajax/goLogin.php');
    break;
    case 'signup':
      require('core/bin/ajax/goSignup.php');
    break;
    case 'lostpass':
      require('core/bin/ajax/goLostpass.php');
    break;
    default:
      header('location: index.php');
    break;
  }
} else {
  header('location: index.php');
}
?>
