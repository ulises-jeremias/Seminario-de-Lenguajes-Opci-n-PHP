<?php

if(!empty($_POST['email']) and !empty($_POST['pass'])) {
  $db = new Connection();
  //prepare login data for query
  $email = $db->real_escape_string($_POST['email']);
  $pass = $_POST['pass']; //Encrypt($_POST['pass']);
  $sql = $db->query("SELECT id FROM users WHERE (email='$email' AND pass='$pass') LIMIT 1;");
  if($db->rows($sql) > 0) {
    if($_POST['session']) { ini_set('session.cookie_lifetime', time() + (60*60*24)); }
    $_SESSION['app_id'] = $db->travel($sql)[0];
    $_SESSION['time_online'] = time() - (60*6);
    header('location: ?view=index');
  } else {
    echo '<div class="alert alert-dismissible alert-danger">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>ERROR:</strong> Las credenciales son incorrectas.
  </div>';
  }
  $db->break_free($sql);
  $db->close();
} else {
  echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>ERROR:</strong> Todos los datos deben estar llenos.
</div>';
}

?>
