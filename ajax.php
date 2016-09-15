<?php

if($_POST) {
    require('core/core.php');
    switch (isset($_GET['mode'])) {
      case 'login':
        require('core/bin/ajax/goLogin.php');
        break;
      case 'signup':
        require('core/bin/ajax/goSignup.php');
        break;
      default:
        header('location: ?view=index');
        break;
    }
}

?>
