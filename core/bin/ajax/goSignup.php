<?php

$db = new Connection();

$name = $db->real_escape_string($_POST['name']);
$surname = $db->real_escape_string($_POST['surname']);
$email = $db->real_escape_string($_POST['email']);
$tel = $_POST['telefono'];
$pass = $_POST['pass']; //Encrypt($_POST['pass']);

$sql = $db->query("SELECT idUsuario FROM usuarios WHERE email='$email' LIMIT 1;");
if($db->rows($sql) > 0) {
  $HTML = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>ERROR:</strong>The email entered already exists.
</div>';
} else {
  $db->query("INSERT INTO usuarios (clave, apellido, nombre, email, telefono)
              VALUES ('$pass', '$surname', '$name', '$email', '$tel');");
  $sql_2 = $db->query("SELECT MAX(idUsuario) AS idUsuario FROM usuarios;");
  $data = $db->get_array($sql_2);
  $_SESSION['app_id'] = $data['idUsuario'];
  $db->break_free($sql_2);
  $HTML = 1;
}

$db->break_free($sql);
$db->close();
echo $HTML;
?>
