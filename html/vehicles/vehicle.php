<!DOCTYPE html>
<html>
  <?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
  <?php include(HTML_DIR . 'overall/topnav.php'); ?>
  <div class="umd_jumb"><div class="umd_container"></div></div>
  <div class="umd_container">
      <article style="background:rgba(0,0,0,.75);">
        <?php
          $id=$_GET['veh'];
          $HTML = '<h2>Vehicle n° '.$_vehicles[$id]['id'].'</h2>
                <hr>
                <img class="_vehicle_img_" src="?view=show&img='.$id.'">
                <div class="text-R">
                  <p><strong>Characteristics:</strong> - ';
          foreach ($_vehicles_characts as $id2 => $content_array) {
              $HTML .= ($_vehicles[$id]['id'] == $_vehicles_characts[$id2]['idVehicle']) ? $_vehicles_characts[$id2]['Characteristic'] . ' - ' : '';
          }
          $HTML .= '</p>
                  <p><strong>Type:</strong> '.$_vehicles[$id]['type'].'</p>
                  <p><strong>Model:</strong> '.$_vehicles[$id]['model'].'</p>
                  <p><strong>Brand:</strong> '.$_vehicles[$id]['brand'].'</p>
                  <p><strong>Domain:</strong> '.$_vehicles[$id]['domain'].'</p>
                  <p><strong>Year:</strong> '.$_vehicles[$id]['year'].'</p>
                  <p><strong>Price:</strong> '.$_vehicles[$id]['price'].'</p>';
                if(isLoggedIn()){
                  $HTML .= '<td><div class="btn-group">
                              <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              <li><a href="?view=vehicles&mode=edit&veh='.$_vehicles[$id]['id'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a></li>
                              <li><a onclick="DeleteItem(\'Are you sure about this?\',\'?view=vehicles&mode=delete&veh='.$_vehicles[$id]['id'].'\')"><i class="fa fa-times" aria-hidden="true"></i>  Delete</a></li>
                              </ul>
                            </div></td>
                          </tr>';
                } else {
                  $HTML .= '<p>LOG IN SO THAT YOU CAN EDIT/DELETE THIS VEHICLE.
                            <a data-toggle="modal" data-target="#Login" class="btn btn-raised btn-primary">
                              <i class="glyphicon glyphicon-log-in"></i>  Log In
                            </a></p>';
                }
          $HTML .= '</div>';
          echo($HTML);
        ?>
      </article>
  </div>

  <?php include(HTML_DIR . 'overall/footer.php'); ?>
</body>
</html>
