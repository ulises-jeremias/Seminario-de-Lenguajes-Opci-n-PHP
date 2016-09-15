<?php

/**
 * created by Ulises Jeremias Cornejo Fandos in 8/9/2016
 */
class Vehicle
{

  private $db;
  private $id;
  private $idModel;
  private $idType;
  private $domain;
  private $year;
  private $cost;

  public function __construct()
  {
    $this->db = new Conexion();
  }



}



?>
