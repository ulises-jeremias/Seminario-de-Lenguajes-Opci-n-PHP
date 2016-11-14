<!DOCTYPE html>
<html>
  <?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
  <?php include(HTML_DIR . 'overall/topnav.php'); ?>
  <div class="umd_jumb">
    <div class="umd_container">
      <?php

        if(isset($_GET['success'])) {
          echo '<div class="alert alert-dismissible alert-success">
            <strong>Done!</strong> The requested operation has been successfully performed.
          </div>';
        }
        if(isset($_GET['error'])) {
         echo '<div class="alert alert-dismissible alert-danger">
           <strong>Error!</strong> The requested operation was not performed. ' . $_GET['error'] . '
         </div>';
       }

      ?>
    </div>
  </div>
  <?php
  include(HTML_DIR . 'management/manage_options.php');
  include(HTML_DIR . 'management/characteristics/all.php');
  include(HTML_DIR . 'management/types/all.php');
  include(HTML_DIR . 'management/brands/all.php');
  include(HTML_DIR . 'management/models/all.php');
  include(HTML_DIR . 'overall/footer.php');
  ?>
  <div class="umd_jumb" style="background: rgba(0,0,0,0);"><div class="umd_container"></div></div>

</body>
</html>
