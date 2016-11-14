<?php

if (isLoggedIn()) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;
  require('core/models/class.Types.php');
  $types = new Types();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'add':
      if ($_POST) {
        $types->Add();
      } else {
        include(HTML_DIR . 'management/types/add.php');
      }
      break;
    case 'edit':
      if ($_POST && $isset_id) {
        $types->Edit();
      } else {
        include(HTML_DIR . 'management/types/edit.php');
      }
      break;
    case 'delete':
      if ($isset_id) {
        $types->Delete();
      }
      break;
    default:
      header('location: ?view=management');
      break;
  }
} else {
  header('location: ?view=management');
}

?>
