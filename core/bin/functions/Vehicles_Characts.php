<?php

/**
 * creado por Ulises J. Cornejo Fandos  in 24/9/2016
 */

function Vehicles_Characteristics()
{
  $db = new Connection();
  $sql = $db->query("SELECT * FROM Vehiculos_Caracteristicas vc, Caracteristicas c
                     WHERE vc.idCaracteristica = c.idCaracteristica;"
                   );
  if ($db->rows($sql) > 0) {
    //make Vehicles_Characteristics matrix to return
    while ($d = $db->get_array($sql)) {
      $vehicles_characts[$d['idVehiculoCaracteristica']] = array(
        'id_charact' => $d['idCaracteristica'],
        'charact' => $d['Caracteristica'],
        'id_vehicle' => $d['idVehiculo'],
      );
    }
  } else {
    $vehicles_characts = false; //if can not generate the matrix, return false
  }

  $db->break_free($sql);
  $db->close();
  return $vehicles_characts;
}

?>
