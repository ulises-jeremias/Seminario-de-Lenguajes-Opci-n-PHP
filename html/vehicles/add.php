<!DOCTYPE html>
<html>
  <?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
  <?php include(HTML_DIR . 'overall/topnav.php'); ?>
  <div class="umd_jumb"><div class="umd_container"></div></div>

  <div class="umd_form_container">
		<div class="wrap">
			<form name="umd_form" class="umd_form" action="?view=vehicles&mode=add" method="post" enctype="multipart/form-data">
        <div>
					<div class="umd_input-group">
						<input type="text" id="domain" name="domain">
						<label class="umd_label" for="domain">Domain</label>
					</div>
          <div class="umd_input-group">
						<input type="text" id="price" name="price">
						<label class="umd_label" for="price">Price</label>
					</div>
          <div class="umd_input-group">
						<input type="text" id="year" name="year">
						<label class="umd_label" for="year">Year</label>
					</div>
          <div class="umd_input-group">
						<input type="file" id="image" name="image">
					</div>
          <div class="umd_input-group">
             <label for="characts" class="col-md-2 control-label">Characteristics</label>
             <div class="col-md-10">
               <select id="idCharact[]" class="form-control" name="idCharact[]" multiple>
                 <?php
                    $HTML = '<option selected disabled value="blank">All charac</option>';
                    $_characts = get_characts();
                    if (false != $_characts){
                      foreach ($_characts as $id => $content_array) {
                        $HTML .= '<option value="'.$id.'">'.$_characts[$id]['charact'].'</option>';
                      }
                      echo $HTML;
                    }
                  ?>
               </select>
             </div>
          </div>
          <div class="umd_input-group">
             <label for="types" class="col-md-2 control-label">Types</label>
             <div class="col-md-10">
               <select id="idType"  class="form-control" name="idType">
                 <?php
                    $HTML = '<option selected disabled value="blank">All types</option>';
                    $_types = get_types();
                    if (false != $_types){
                      foreach ($_types as $id => $content_array) {
                        $HTML .= '<option value="'.$id.'">'.$_types[$id]['type'].'</option>';
                      }
                      echo $HTML;
                    }
                  ?>
               </select>
             </div>
          </div>
          <div class="umd_input-group">
             <label for="models" class="col-md-2 control-label">Models</label>
             <div class="col-md-10">
               <select id="idModel"  class="form-control" name="idModel">
                 <?php
                    $HTML = '<option selected disabled value="blank">All models</option>';
                    $_models = get_models();
                    if (false != $_models){
                      foreach ($_models as $id => $content_array) {
                        $HTML .= '<option value="'.$id.'">'.$_models[$id]['brand'].' > '.$_models[$id]['model'].'</option>';
                      }
                      echo $HTML;
                    }
                  ?>
               </select>
             </div>
          </div>
        </div>
        <input type="submit" id="btn-submit" value="Add">
			</form>
    </div>
	</div>

  <?php include(HTML_DIR . 'overall/footer.php'); ?>
  <script src="views/app/js/vehicles/manage.js"></script>
</body>
</html>
