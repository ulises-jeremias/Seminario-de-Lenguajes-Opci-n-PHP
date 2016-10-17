<?php
  if (isset($_GET['img']) && (is_numeric($_GET['img'])) && ($_GET['img'] > 0)) {
    include(HTML_DIR . 'vehicles/show_image.php');
  }
?>
