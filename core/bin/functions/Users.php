<?php

function Users() {
  $db = new Connection();
  $sql = $db->query("SELECT * FROM users;");
  if($db->rows($sql) > 0) {
    //make users matrix to return
    while ($d = $db->travel($sql)) {
      $users[$d['id']] = array(
        'id' => $d['id'],
        'user' => $d['user'],
        'pass' => $d['pass']
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
