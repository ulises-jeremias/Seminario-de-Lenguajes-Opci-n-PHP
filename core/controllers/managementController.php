<?php

if (isset($_GET['mode']) and IsLoggedIn()) {
  if(file_exists(HTML_DIR . 'vehicles/' . strtolower($_GET['mode']) . '.php')) {
    include(HTML_DIR . 'vehicles/' . strtolower($_GET['mode']) . '.php');
  }
} else {
  include(HTML_DIR . 'management/management.php');
}

?>
