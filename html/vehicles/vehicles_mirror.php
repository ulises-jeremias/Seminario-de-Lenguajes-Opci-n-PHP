<div class="container">
  <?php
    if(isset($_GET['success'])) {
      echo '<div class="alert alert-dismissible alert-success">
        <strong>Realizado!</strong> El vehículo se ha borrado correctamente.
      </div>';
    }
  ?>
  <div class="vehicles_table">
    <div class="characteristic">Gestión de Vehiculos</div>
        <div class="table-responsive" style="margin-bottom: 0;">
            <?php
              if(false != ($_vehicles )) {
               $HTML = '<table class="table table-hover" style="margin-bottom: 0;><thead class="thead"><tr class="row cajas">
               <th style="width:15%;">Vehiculo</th>
               <th>Caracteristica</th>
               <th>Tipo</th>
               <th>Modelo</th>
               <th>Marca
               <a href="?view=vehicles&campo=Marca&mode=DESC"><i class="fa fa-arrow-down" aria-hidden="true" title="desc"></i></a>
               <a href="?view=vehicles&campo=Marca&mode=ASC"><i class="fa fa-arrow-up" aria-hidden="true" title="asc"></i></a>
               </th>
               <th>Dominio</th>
               <th>Año</th>
               <th>Precios
                  <a href="?view=vehicles&campo=Precio&mode=DESC"><i class="fa fa-arrow-down" aria-hidden="true" title="desc"></i></a>
                  <a href="?view=vehicles&campo=Precio&mode=ASC"><i class="fa fa-arrow-up" aria-hidden="true" title="asc"></i></a>
               </th>
               <th style="width: 20%">Acciones</th>
               </tr></thead>
               <tbody>';
               foreach ($_vehicles as $id => $content_array) {
                    $HTML .= '<tr class="row cajas">
                      <td><img class="img-thumbnail vehicle_img" src="?view=show&img='.$id.'"></td>
                      <td>'.$_vehicles[$id]['charact'].'</td>
                      <td>'.$_vehicles[$id]['tipo'].'</td>
                      <td>'.$_vehicles[$id]['modelo'].'</td>
                      <td>'.$_vehicles[$id]['marca'].'</td>
                      <td>'.$_vehicles[$id]['dominio'].'</td>
                      <td>'.$_vehicles[$id]['anio'].'</td>
                      <td>'.$_vehicles[$id]['precio'].'</td>
                      <td><div class="btn-group">
                            <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li><a href="?view=gestion&mode=edit&id='.$_vehicles[$id]['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Editar</a></li>
                              <li><a onclick="DeleteItem(\'¿Está seguro de eliminar esta categoría?\',\'?view=gestion&mode=delete&id='.$_vehicles[$id]['id'].'\')"><i class="fa fa-times" aria-hidden="true"></i>  Eliminar</a></li>
                            </ul>
                          </div>
                      </td></tr>';
                }
                $HTML .= '</tbody></table>';
              } else {
                $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACIÓN: </strong> Ningun vehículo cargado.</div>';
              }
              echo $HTML;
            ?>
      </div>
    </div>
  </div>
</div>
