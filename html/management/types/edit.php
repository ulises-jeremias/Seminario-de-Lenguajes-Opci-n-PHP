<!DOCTYPE html>
<html>
  <?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
  <?php include(HTML_DIR . 'overall/topnav.php'); ?>
  <div class="umd_jumb"><div class="umd_container"></div></div>

  <div class="umd_form_container">
		<div class="wrap">
      <form name="umd_form" class="umd_form" action="?view=types&mode=edit&id=<?php echo $_GET['id']; ?>" method="post">
				<div>
          <?php
          $types = get_types();
					echo ('<div class="umd_input-group">
						<input type="text" id="type" name="type" value="' . $types[$_GET['id']]['type'] . '">
						<label class="umd_label" for="type">Type</label>
					</div>
          ');
          ?>
        </div>
        <input type="submit" id="btn-submit" value="Edit">
			</form>
    </div>
	</div>

  <?php include(HTML_DIR . 'overall/footer.php'); ?>
  <script src="views/app/js/umd_form.js"></script>
</body>
</html>
