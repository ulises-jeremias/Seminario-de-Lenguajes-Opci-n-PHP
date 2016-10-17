<?php

if(isset($_GET['img'])) {
  $id = $_GET['img'];
  show_img($id);
} else {
  echo "No se puede cargar la imagen";
}

?>
