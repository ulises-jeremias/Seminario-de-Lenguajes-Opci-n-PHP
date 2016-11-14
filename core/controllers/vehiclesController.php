<?php

if ((!isset($_GET['veh']) && !isset($_GET['mode'])) || (isset($_GET['campo']) && isset($_GET['mode']))) {
  include(HTML_DIR . 'vehicles/vehicles.php');
} else {
  if (!isset($_GET['mode'])) {
    include(HTML_DIR . 'vehicles/vehicle.php');
  } else {
    if (isLoggedIn()) {
      $isset_id = isset($_GET['veh']) and is_numeric($_GET['veh']) and $_GET['veh'] >= 1;
      require('core/models/class.Vehicles.php');
      $vehicles = new Vehicles();

      switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'add':
          if ($_POST) {
            $vehicles->Add();
          } else {
            include(HTML_DIR . 'vehicles/add.php');
          }
          break;
        case 'edit':
          if ($isset_id && $_POST) {
            $vehicles->Edit();
          } else {
            include(HTML_DIR . 'vehicles/edit.php');
          }
          break;
        case 'delete':
          if ($isset_id) {
            $vehicles->Delete();
          }
          break;
        default:
          header('location: ?view=vehicles');
          break;
      }
    }
  }
}

?>
