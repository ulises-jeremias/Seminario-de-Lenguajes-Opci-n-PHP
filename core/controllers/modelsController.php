<?php

if (isLoggedIn()) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;
  require('core/models/class.Models.php');
  $models = new Models();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'add':
      if ($_POST) {
        $models->Add();
      } else {
        include(HTML_DIR . 'management/models/add.php');
      }
      break;
    case 'edit':
      if ($_POST && $isset_id) {
        $models->Edit();
      } else {
        include(HTML_DIR . 'management/models/edit.php');
      }
      break;
    case 'delete':
      if ($isset_id) {
        $models->Delete();
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
