<!DOCTYPE html>
<html>
  <?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
  <?php include(HTML_DIR . 'overall/topnav.php'); ?>
  <div class="umd_jumb"><div class="umd_container"></div></div>

  <div class="umd_form_container">
		<div class="wrap">
      <form name="umd_form" class="umd_form" action="?view=models&mode=edit&id=<?php echo $_GET['id']; ?>" method="post">
        <div>
          <?php
          $models = get_models();
					echo ('<div class="umd_input-group">
						<input type="text" id="model" name="model" value="' . $models[$_GET['id']]['model'] . '">
						<label class="umd_label" for="model">Model</label>
					</div>
          ');
          ?>
        </div>
        <div class="umd_input-group">
           <label for="brands" class="col-md-2 control-label">Brands</label>
           <div class="col-md-10">
             <select id="idBrand"  class="form-control" name="idBrand">
               <?php
                  $HTML = '';
                  $_brands = get_brands();
                  if (false != $_brands){
                    foreach ($_brands as $id => $content_array) {
                      if ($_brands[$id]['brand'] == $models[$_GET['id']]['brand']) {
                        $HTML .= '<option selected name="type" value="'.$id.'">'.$_brands[$id]['brand'].'</option>';
                      } else {
                        $HTML .= '<option name="type" value="'.$id.'">'.$_brands[$id]['brand'].'</option>';
                      }
                    }
                    echo $HTML;
                  }
                ?>
             </select>
           </div>
        </div>
        <input type="submit" id="btn-submit" value="Edit">
			</form>
    </div>
	</div>

  <?php include(HTML_DIR . 'overall/footer.php'); ?>
  <script src="views/app/js/umd_form.js"></script>
</body>
</html>
