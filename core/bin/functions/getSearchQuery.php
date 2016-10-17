<?php

function get_search_query()
{
  $db = new Connection();
  $_tables = 'Vehiculos_Caracteristicas vc, Caracteristicas c, Vehiculos v, Modelos M, Marcas m, Tipos t';
  $_where = 'vc.idVehiculo = v.idVehiculo AND c.idCaracteristica = vc.idCaracteristica AND v.idModelo = M.idModelo AND M.idMarca = m.idMarca AND v.idTipo = t.idTipo';
  $_charact = $_POST['charact'];
  $_type = $_POST['type'];
  $_model = $_POST['model'];
  $_marca = $_POST['marca'];
  if ($_charact != '0') {
    $_where .= ' AND c.idCaracteristica = '.$_charact;
  }
  if ($_type != '0') {
    $_where .= ' AND t.idTipo = '.$_type;
  }
  if ($_model != '0') {
    $_where .= ' AND M.idModelo = '.$_model;
  }
  if ($_marca != '0') {
    $_where .= ' AND m.idMarca = '.$_marca;
  }

  $sql = $db->query("SELECT * FROM $_tables
                     WHERE $_where;"
                   );
  $db->close();
  return $sql;
}

?>
