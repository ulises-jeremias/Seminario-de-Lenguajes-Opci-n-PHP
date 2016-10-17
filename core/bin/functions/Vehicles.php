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
        'charact' => $d['Caracteristica'],
        'tipo' => $d['Tipo'],
        'modelo' => $d['Modelo'],
        'marca' => $d['Marca'],
        'dominio' => $d['Dominio'],
        'anio' => $d['Anio'],
        'precio' => $d['Precio'],
        /*'contenidoImg' => $d['contenidoImagen'],
        'tipoImg' => $d['tipoImagen'],*/
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
