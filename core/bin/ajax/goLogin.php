<?php

if(!empty($_POST['email']) and !empty($_POST['pass'])) {
  $db = new Connection();
  //prepare login data for query
  $email = $db->real_escape_string($_POST['email']);
  $pass = $_POST['pass']; //Encrypt($_POST['pass']);
  $sql = $db->query("SELECT idUsuario FROM usuarios WHERE (email='$email' AND clave='$pass') LIMIT 1;");
  if($db->rows($sql) > 0) {
    if($_POST['session']) { ini_set('session.cookie_lifetime', time() + (60*60*24)); }
    $data = $db->get_array($sql);
    $_SESSION['app_id'] = $data['idUsuario'];
    $_SESSION['time_online'] = time() - (60*6);
    echo 1;
  } else {
    echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>ERROR:</strong> Credentials are incorrect.
  </div>';
  }
  $db->break_free($sql);
  $db->close();
} else {
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>ERROR:</strong> All data must be full.
</div>';
}

?>
