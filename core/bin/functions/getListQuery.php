<?php

function get_list_query()
{
  $db = new Connection();
  $_tables = 'Vehiculos_Caracteristicas vc, Caracteristicas c, Vehiculos v, Modelos M, Marcas m, Tipos t';
  $_where = 'vc.idVehiculo = v.idVehiculo AND c.idCaracteristica = vc.idCaracteristica AND v.idModelo = M.idModelo AND M.idMarca = m.idMarca AND v.idTipo = t.idTipo';
  if (isset($_GET['mode']) && (isset($_GET['campo']))) {
    $mode=strtolower($_GET['mode']);
    $campo=strtolower($_GET['campo']);
    switch ($campo) {
      case 'precio':
        switch ($mode) {
          case 'asc':
            $sql = $db->query("SELECT * FROM $_tables
                               WHERE $_where
                               ORDER BY v.Precio ASC;"
                             );
            break;
          case 'desc':
            $sql = $db->query("SELECT * FROM $_tables
                               WHERE $_where
                               ORDER BY v.Precio DESC;"
                             );
            break;
          default:
            $sql = $db->query("SELECT * FROM $_tables
                               WHERE $_where
                               ORDER BY v.Precio;"
                             );
            break;
        }
        case 'marca':
          switch ($mode) {
            case 'asc':
              $sql = $db->query("SELECT * FROM $_tables
                                 WHERE $_where
                                 ORDER BY m.Marca ASC;"
                               );
              break;
            case 'desc':
              $sql = $db->query("SELECT * FROM $_tables
                                 WHERE $_where
                                 ORDER BY m.Marca DESC;"
                               );
              break;
            default:
            $sql = $db->query("SELECT * FROM $_tables
                               WHERE $_where
                               ORDER BY m.Marca;"
                             );
              break;
          }
          break;
        break;
      default:
        $sql = $db->query("SELECT * FROM $_tables
                           WHERE $_where
                           ORDER BY v.idVehiculo;"
                         );
        break;
    }
  } else {
    $sql = $db->query("SELECT * FROM $_tables
                       WHERE $_where;"
                     );
  }
  $db->close();
  return $sql;
}

?>
