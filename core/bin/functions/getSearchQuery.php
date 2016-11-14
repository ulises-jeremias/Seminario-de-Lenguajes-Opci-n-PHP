<?php

function get_search_query()
{
  try {
    $db = new Connection();
    $_tables = 'Vehiculos_Caracteristicas vc, Caracteristicas c, Vehiculos v, Modelos M, Marcas m, Tipos t';
    $_where = 'vc.idVehiculo = v.idVehiculo AND c.idCaracteristica = vc.idCaracteristica AND v.idModelo = M.idModelo AND M.idMarca = m.idMarca AND v.idTipo = t.idTipo';
    $_type = $_POST['type'];
    $_model = $_POST['model'];
    $_brand = $_POST['brand'];

    if ($_type != "0") {
      $_where .= ' AND t.idTipo = '.$_type;
    }
    if ($_model != "0") {
      $_where .= ' AND M.idModelo = '.$_model;
    }
    if ($_brand != "0") {
      $_where .= ' AND m.idMarca = '.$_brand;
    }
    if(isset($_POST['charact'])) {
      $_charact = $_POST['charact'];
      for ($i=0; $i < count($_charact); $i++) {
        $_where .= " AND v.idVehiculo IN ( SELECT vc.idVehiculo FROM Vehiculos_Caracteristicas vc WHERE vc.idCaracteristica = '". $_charact[$i]. "')";
      }
    }

    $sql = $db->query("SELECT * FROM $_tables
                       WHERE $_where;"
                     );
    $db->close();
    return $sql;
  } catch (Exception $error) {
      header('location: ?vehicles&error' . $error->getMessage());
  }
}

?>
