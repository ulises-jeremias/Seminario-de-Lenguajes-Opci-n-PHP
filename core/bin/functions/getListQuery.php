<?php

function get_list_query()
{
  $db = new Connection();
  $_tables = 'Vehiculos v INNER JOIN Modelos M ON (v.idModelo = M.idModelo)
              INNER JOIN Marcas m ON (M.idMarca = m.idMarca)
              INNER JOIN Tipos t ON (v.idTipo = t.idTipo)';
  if (isset($_GET['mode']) && (isset($_GET['campo']))) {
    $mode=strtolower($_GET['mode']);
    $campo=strtolower($_GET['campo']);
    switch ($campo) {
      case 'precio':
        switch ($mode) {
          case 'asc':
            $sql = $db->query("SELECT * FROM $_tables
                               ORDER BY v.Precio;"
                             );
            break;
          case 'desc':
            $sql = $db->query("SELECT * FROM $_tables
                               ORDER BY v.Precio DESC;"
                             );
            break;
          default:
            $sql = $db->query("SELECT * FROM $_tables
                               ORDER BY v.Precio;"
                             );
            break;
        }
        case 'marca':
          switch ($mode) {
            case 'asc':
              $sql = $db->query("SELECT * FROM $_tables
                                 ORDER BY m.Marca;"
                               );
              break;
            case 'desc':
              $sql = $db->query("SELECT * FROM $_tables
                                 ORDER BY m.Marca DESC;"
                               );
              break;
            default:
            $sql = $db->query("SELECT * FROM $_tables
                               ORDER BY m.Marca;"
                             );
              break;
          }
          break;
        break;
      default:
        $sql = $db->query("SELECT * FROM $_tables
                           ORDER BY v.idVehiculo;"
                         );
        break;
    }
  } else {
    $sql = $db->query("SELECT * FROM $_tables;");
  }
  $db->close();
  return $sql;
}

?>
