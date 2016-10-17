<?php

/**
 * created by Ulises Jeremias Cornejo Fandos in 8/9/2016
 */

class Vehicle
{
  private $db;
  private $id;

  public function __construct()
  {
    $this->db = new Connection();
    $args = func_get_args();
    $nargs = func_num_args();
    switch ($nargs) {
      case 1:
          $this->__construct0($args[0]);
        break;
    }
  }

  private function __construct0($id)
  {
    $this->id = $id;
  }



  /*
      public function Error()
      {

      }

      public function Add()
      {

      }

      public function Edit()
      {

      }

      public function Delete()
      {

      }
  */


  public function __destruct()
  {
    $this->db->close();
  }

}

?>
