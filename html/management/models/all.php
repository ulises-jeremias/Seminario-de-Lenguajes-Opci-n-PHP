<div id="models" class="umd_container">
  <div class="vehicles_table">
    <div class="vehicles_management">Models</div>
    <div class="table-responsive" style="margin-bottom: 0;">
        <?php
          $_models = get_models();
          if(false != ($_models)) {
           $HTML = '<table class="table table-hover" style="margin-bottom: 0;"><thead class="thead"><tr class="row cajas">
           <th>Model</th>
           <th>Brand</th>';
           if(isLoggedIn()){
             $HTML .= '<th style="width: 20%">Actions</th>';
           }
           $HTML .= '</tr></thead>
           <tbody>';
           foreach ($_models as $id => $content_array) {
                $HTML .= '<tr class="row cajas">
                  <td>'.$_models[$id]['model'].'</td>
                  <td>'.$_models[$id]['brand'].'</td>';
                if(isLoggedIn()){
                  $HTML .= '<td><div class="btn-group">
                              <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="?view=models&mode=edit&id='.$_models[$id]['id_model'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a></li>
                                <li><a onclick="DeleteItem(\'Are you sure about this?\',\'?view=models&mode=delete&id='.$_models[$id]['id_model'].'\')"><i class="fa fa-times" aria-hidden="true"></i>  Delete</a></li>
                              </ul>
                            </div></td>
                          </tr>';
                }
            }
            $HTML .= '</tbody></table>';
          } else {
            $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMATION: </strong> No models loaded.</div>';
          }
          echo $HTML;
        ?>
    </div>
  </div>
</div>
