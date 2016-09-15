<?php
  /**
   * creado por Ulises J. Cornejo Fandos  in 8/9/2016
   */

  class Vehicle_Category implements Functions
  {
    private $db;
    private $id;
    private $idVehicle;
    private $idCategory;

    public function __construct()
    {
      $this->db = new Connection();
    }

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

    public function __destruct()
    {
      this->$db->close();
    }
  }

?>
