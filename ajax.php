<?php

if($_POST) {
    require('core/core.php');

    switch (isset($_GET['mode'])) {
      case 'login':
        require('core/bin/ajax/goLogin.php');
        break;

      default:
        header('location: ?view=index');
        break;
    }

}

?>
