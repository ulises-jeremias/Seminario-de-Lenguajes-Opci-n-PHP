<?php

if (isLoggedIn()) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;
  require('core/models/class.Characteristics.php');
  $characteristics = new Characteristics();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'add':
      if ($_POST) {
        $characteristics->Add();
      } else {
        include(HTML_DIR . 'management/characteristics/add.php');
      }
      break;
    case 'edit':
      if ($_POST && $isset_id) {
        $characteristics->Edit();
      } else {
        include(HTML_DIR . 'management/characteristics/edit.php');
      }
      break;
    case 'delete':
      if ($isset_id) {
        $characteristics->Delete();
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
