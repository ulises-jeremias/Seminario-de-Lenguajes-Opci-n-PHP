<?php

/**
 * creado por Ulises J. Cornejo Fandos  in 24/9/2016
 */

function Vehicles()
{
  $db = new Connection();
  $sql = get_query();
  if ($db->rows($sql) > 0) {
    //make Vehicles matrix to return
    while ($d = $db->get_array($sql)){
      $vehicles[$d['idVehiculo']] = array(
        'id' => $d['idVehiculo'],
        'type' => $d['Tipo'],
        'model' => $d['Modelo'],
        'brand' => $d['Marca'],
        'domain' => $d['Dominio'],
        'year' => $d['Anio'],
        'price' => $d['Precio'],
      );
    }
  } else {
    $vehicles = false; //if can not generate the matrix, return false
  }

  $db->break_free($sql);
  $db->close();
  return $vehicles;
}

?>
