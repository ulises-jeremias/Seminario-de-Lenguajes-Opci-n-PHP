<?php

function Users() {
  $db = new Connection();
  $sql = $db->query("SELECT * FROM usuarios;");
  if($db->rows($sql) > 0) {
    //make users matrix to return
    while ($d = $db->get_array($sql)) {
      $users[$d['idUsuario']] = array(
        'idUsuario' => $d['idUsuario'],
        'name' => $d['nombre'],
        'surname' => $d['apellido'],
        'email' => $d['email'],
        'telefono' => $d['telefono']
        //put user's info here if there is more in the db
      );
    }
  } else {
    $users = false; //if can not generate the matrix, return false
  }
  $db->break_free($sql);
  $db->close();

  return $users;
}

?>
