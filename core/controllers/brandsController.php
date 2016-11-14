<?php

if (isLoggedIn()) {

  $isset_id = isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1;
  require('core/models/class.Brands.php');
  $brands = new Brands();

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
    case 'add':
      if ($_POST) {
        $brands->Add();
      } else {
        include(HTML_DIR . 'management/brands/add.php');
      }
      break;
    case 'edit':
      if ($_POST && $isset_id) {
        $brands->Edit();
      } else {
        include(HTML_DIR . 'management/brands/edit.php');
      }
      break;
    case 'delete':
      if ($isset_id) {
        $brands->Delete();
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
