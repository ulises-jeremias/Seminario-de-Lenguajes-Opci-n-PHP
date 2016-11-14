<!DOCTYPE html>
<html>
  <?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
  <?php include(HTML_DIR . 'overall/topnav.php'); ?>
  <div class="umd_jumb"><div class="umd_container"></div></div>

  <div class="umd_form_container">
		<div class="wrap">
      <form name="umd_form" class="umd_form" action="?view=vehicles&mode=edit&veh=<?php echo ($_GET['veh']); ?>" method="post" enctype="multipart/form-data">
        <div>
          <div class="umd_input-group">
            <input type="text" id="domain" name="domain" value="<?php echo ($_vehicles[$_GET['veh']]['domain']); ?>">
            <label class="umd_label" for="domain">Domain</label>
          </div>
          <div class="umd_input-group">
            <input type="text" id="price" name="price" value="<?php echo ($_vehicles[$_GET['veh']]['price']); ?>">
            <label class="umd_label" for="price">Price</label>
          </div>
          <div class="umd_input-group">
            <input type="text" id="year" name="year" value="<?php echo ($_vehicles[$_GET['veh']]['year']); ?>">
            <label class="umd_label" for="year">Year</label>
          </div>
          <div class="umd_input-group">
						<input type="file" id="image" name="image">
					</div>
          <div class="umd_group">
             <label for="idCharact[]" class="col-md-2 control-label">Characteristics</label>
             <div class="col-md-10">
               <?php
                  $_characts = get_characts();
                  $HTML = '<select id="idCharact[]" class="form-control" name="idCharact[]" multiple>
                            <option selected disabled>All characts</option>
                          ';
                    if (false != $_characts){
                      foreach ($_characts as $id => $content_array) {
                        $HTML .= '<option value="'.$id.'">'.$_characts[$id]['charact'].'</option>';
                      }
                    }
                  $HTML .= '</select>';
                  echo $HTML;
               ?>
             </div>
          </div>
          <div class="umd_group">
             <label for="types" class="col-md-2 control-label">Types</label>
             <div class="col-md-10">
               <?php
                  $_types = get_types();
                  $HTML = '<select id="idType" class="form-control" name="idType">';
                    if (false != $_types){
                      foreach ($_types as $id => $content_array) {
                        if ($_vehicles[$_GET['veh']]['type'] == $_types[$id]['type']) {
                          $HTML .= '<option selected value="'.$id.'">'.$_types[$id]['type'].'</option>';
                        } else {
                          $HTML .= '<option value="'.$id.'">'.$_types[$id]['type'].'</option>';
                        }
                      }
                    }
                  $HTML .= '</select>';
                  echo $HTML;
               ?>
             </div>
          </div>
          <div class="umd_group">
             <label for="models" class="col-md-2 control-label">Models</label>
             <div class="col-md-10">
               <?php
                  $_models = get_models();
                  $HTML = '<select id="idModel" class="form-control" name="idModel">';
                    if (false != $_models){
                      foreach ($_models as $id => $content_array) {
                        if ($_vehicles[$_GET['veh']]['model'] == $_models[$id]['model'] && $_vehicles[$_GET['veh']]['brand'] == $_models[$id]['brand']) {
                          $HTML .= '<option selected value="'.$id.'">'.$_models[$id]['brand'].' > '.$_models[$id]['model'].'</option>';
                        } else {
                          $HTML .= '<option value="'.$id.'">'.$_models[$id]['brand'].' > '.$_models[$id]['model'].'</option>';
                        }
                      }
                    }
                  $HTML .= '</select>';
                  echo $HTML;
               ?>
             </div>
          </div>
        </div>
        <br>
        <input type="submit" id="btn-submit" value="Edit">
			</form>
    </div>
	</div>

  <?php include(HTML_DIR . 'overall/footer.php'); ?>
  <script src="views/app/js/vehicles/manage.js"></script>
</body>
</html>
