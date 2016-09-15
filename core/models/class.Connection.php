<?php

/**
 * created by Ulises J. Cornejo Fandos in 3/9/2016
 */

class Connection extends mysqli
{

  public function __construct()
  {
    parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $this->connect_errno ? die("Error en la conexion a la base de datos") : null;
    $this->set_charset("utf-8");
  }

  public function rows($query)
  {
    return mysqli_num_rows($query);
  }

  public function break_free($query)
  {
    return mysqli_free_result($query);
  }

  public function travel($query)
  {
    return mysqli_fetch_array($query);
  }
}

?>
