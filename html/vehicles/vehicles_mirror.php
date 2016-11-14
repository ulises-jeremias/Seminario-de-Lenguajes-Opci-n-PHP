<div class="container">
  <?php
    if(isset($_GET['success'])) {
      echo '<div class="alert alert-dismissible alert-success">
        <strong>Done!</strong> The requested operation has been successfully performed.
      </div>';
    }
    if(isset($_GET['error'])) {
     echo '<div class="alert alert-dismissible alert-danger">
        <strong>Error!</strong></strong> '. $_GET['error'] .'.
       </div>';
    }
    if (isLoggedIn()) {
      include(HTML_DIR . 'vehicles/vehicles_option.php');
    } else {
      echo ('<p>LOG IN TO MANAGE THE INFORMATION.
              <a data-toggle="modal" data-target="#Login" class="btn btn-raised btn-primary">
                <i class="glyphicon glyphicon-log-in"></i>  Log In
              </a>
             </p>'
           );
    }
  ?>

  <div class="vehicles_table">
    <div class="vehicles_management">Vehicles Managment</div>
    <div class="table-responsive" style="margin-bottom: 0;">
        <?php
          if(false != ($_vehicles) && false != ($_vehicles_characts)) {
           $HTML = '<table class="table table-hover" style="margin-bottom: 0;"><thead class="thead"><tr class="row cajas">
           <th style="width:15%;">Vehiculo</th>
           <th>Characteristics</th>
           <th>Type</th>
           <th>Model</th>
           <th>Brand
           <a href="?view=vehicles&campo=Marca&mode=DESC"><i class="fa fa-arrow-down" aria-hidden="true" title="desc"></i></a>
           <a href="?view=vehicles&campo=Marca&mode=ASC"><i class="fa fa-arrow-up" aria-hidden="true" title="asc"></i></a>
           </th>
           <th>Domain</th>
           <th>Year</th>
           <th>Price
              <a href="?view=vehicles&campo=Precio&mode=DESC"><i class="fa fa-arrow-down" aria-hidden="true" title="desc"></i></a>
              <a href="?view=vehicles&campo=Precio&mode=ASC"><i class="fa fa-arrow-up" aria-hidden="true" title="asc"></i></a>
           </th>';
           if(isLoggedIn()){
             $HTML .= '<th style="width: 20%">Actions</th>';
           }
           $HTML .= '</tr></thead>
           <tbody>';
           foreach ($_vehicles as $id => $content_array) {
                $HTML .= '<tr class="row cajas">
                  <td><a href="?view=vehicles&veh='.$id.'"><img class="img-thumbnail vehicle_img" src="?view=show&img='.$id.'"></a></td>
                  <td>- ';
                  foreach ($_vehicles_characts as $id2 => $content_array) {
                      $HTML .= ($_vehicles[$id]['id'] == $_vehicles_characts[$id2]['idVehicle']) ? $_vehicles_characts[$id2]['Characteristic'] . ' - ' : '';
                  }
                $HTML .= '</td>
                  <td>'.$_vehicles[$id]['type'].'</td>
                  <td>'.$_vehicles[$id]['model'].'</td>
                  <td>'.$_vehicles[$id]['brand'].'</td>
                  <td>'.$_vehicles[$id]['domain'].'</td>
                  <td>'.$_vehicles[$id]['year'].'</td>
                  <td>'.$_vehicles[$id]['price'].'</td>';
                if(isLoggedIn()){
                  $HTML .= '<td><div class="btn-group">
                              <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="?view=vehicles&mode=edit&veh='.$_vehicles[$id]['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a></li>
                                <li><a onclick="DeleteItem(\'Are you sure about this?\',\'?view=vehicles&mode=delete&veh='.$_vehicles[$id]['id'].'\')"><i class="fa fa-times" aria-hidden="true"></i>  Delete</a></li>
                              </ul>
                            </div></td>
                          </tr>';
                }
            }
            $HTML .= '</tbody></table>';
          } else {
            $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMATION: </strong> No vehicles loaded.</div>';
          }
          echo $HTML;
        ?>
    </div>
  </div>
</div>
