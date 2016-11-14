<?php

/**
 * creado por Ulises J. Cornejo Fandos  in 2/10/2016
 */

 function isLoggedIn()
 {
     return (isset($_SESSION['app_id']));
 }

function get_types ()
{
  $db = new Connection();
  $sql = $db->query("SELECT * FROM Tipos;");
  if ($db->rows($sql) > 0) {
    //make Types matrix to return
    while ($d = $db->get_array($sql)) {
      $vehicle_types[$d['idTipo']] = array(
        'id_type' => $d['idTipo'],
        'type' => $d['Tipo'],
      );
    }
  } else {
    $vehicle_types = false; //if can not generate the matrix, return false
  }

  $db->break_free($sql);
  $db->close();
  return $vehicle_types;
}

function get_models ()
{
  $db = new Connection();
  $sql = $db->query("SELECT * FROM Modelos M INNER JOIN Marcas m ON (M.idMarca = m.idMarca)
                     ORDER BY m.Marca;");
  if ($db->rows($sql) > 0) {
    //make Types matrix to return
    while ($d = $db->get_array($sql)) {
      $vehicle_models[$d['idModelo']] = array(
        'id_model' => $d['idModelo'],
        'model' => $d['Modelo'],
        'brand' => $d['Marca']
      );
    }
  } else {
    $vehicle_models = false; //if can not generate the matrix, return false
  }

  $db->break_free($sql);
  $db->close();
  return $vehicle_models;
}

function get_brands ()
{
  $db = new Connection();
  $sql = $db->query("SELECT * FROM Marcas;");
  if ($db->rows($sql) > 0) {
    //make Types matrix to return
    while ($d = $db->get_array($sql)) {
      $vehicle_brands[$d['idMarca']] = array(
        'id_brand' => $d['idMarca'],
        'brand' => $d['Marca'],
      );
    }
  } else {
    $vehicle_brands = false; //if can not generate the matrix, return false
  }

  $db->break_free($sql);
  $db->close();
  return $vehicle_brands;
}

function get_characts ()
{
  $db = new Connection();
  $sql = $db->query("SELECT * FROM Caracteristicas;");
  if ($db->rows($sql) > 0) {
    //make Types matrix to return
    while ($d = $db->get_array($sql)) {
      $vehicle_characts[$d['idCaracteristica']] = array(
        'id_charact' => $d['idCaracteristica'],
        'charact' => $d['Caracteristica'],
      );
    }
  } else {
    $vehicle_characts = false; //if can not generate the matrix, return false
  }

  $db->break_free($sql);
  $db->close();
  return $vehicle_characts;
}

?>
