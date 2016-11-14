<!DOCTYPE html>
<html>
  <?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
  <?php include(HTML_DIR . 'overall/topnav.php'); ?>
  <div class="umd_jumb"><div class="umd_container"></div></div>

  <div class="umd_form_container">
		<div class="wrap">
			<form name="umd_form" class="umd_form" action="?view=models&mode=add" method="post">
        <div>
					<div class="umd_input-group">
						<input type="text" id="model" name="model">
						<label class="umd_label" for="model">Models</label>
					</div>
        </div>
        <div class="umd_input-group">
           <label for="brands" class="col-md-2 control-label">Brands</label>
           <div class="col-md-10">
             <select id="idBrand"  class="form-control" name="idBrand">
               <?php
                  $HTML = '<option selected disabled>All brands</option>';
                  $_brands = get_brands();
                  if (false != $_brands){
                    foreach ($_brands as $id => $content_array) {
                      $HTML .= '<option value="'.$id.'">'.$_brands[$id]['brand'].'</option>';
                    }
                    echo $HTML;
                  }
                ?>
             </select>
           </div>
        </div>
        <input type="submit" id="btn-submit" value="Add">
			</form>
    </div>
	</div>

  <?php include(HTML_DIR . 'overall/footer.php'); ?>
  <script src="views/app/js/umd_form.js"></script>
</body>
</html>
