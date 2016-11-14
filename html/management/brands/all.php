<div id="brands" class="umd_container">
  <div class="vehicles_table">
    <div class="vehicles_management">Brands</div>
    <div class="table-responsive" style="margin-bottom: 0;">
        <?php
          $_brands = get_brands();
          if(false != ($_brands)) {
           $HTML = '<table class="table table-hover" style="margin-bottom: 0;"><thead class="thead"><tr class="row cajas">
           <th>Brand</th>';
           if(isLoggedIn()){
             $HTML .= '<th style="width: 20%">Actions</th>';
           }
           $HTML .= '</tr></thead>
           <tbody>';
           foreach ($_brands as $id => $content_array) {
                $HTML .= '<tr class="row cajas">
                  <td>'.$_brands[$id]['brand'].'</td>';
                if(isLoggedIn()){
                  $HTML .= '<td><div class="btn-group">
                              <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="?view=brands&mode=edit&id='.$_brands[$id]['id_brand'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a></li>
                                <li><a onclick="DeleteItem(\'Are you sure about this?\',\'?view=brands&mode=delete&id='.$_brands[$id]['id_brand'].'\')"><i class="fa fa-times" aria-hidden="true"></i>  Delete</a></li>
                              </ul>
                            </div></td>
                          </tr>';
                }
            }
            $HTML .= '</tbody></table>';
          } else {
            $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMATION: </strong> No brands loaded.</div>';
          }
          echo $HTML;
        ?>
    </div>
  </div>
</div>
