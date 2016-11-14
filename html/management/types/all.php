<div id="types" class="umd_container">
  <div class="vehicles_table">
    <div class="vehicles_management">Types</div>
    <div class="table-responsive" style="margin-bottom: 0;">
        <?php
          $_types = get_types();
          if(false != ($_types)) {
           $HTML = '<table class="table table-hover" style="margin-bottom: 0;"><thead class="thead"><tr class="row cajas">
           <th>Type</th>';
           if(isLoggedIn()){
             $HTML .= '<th style="width: 20%">Actions</th>';
           }
           $HTML .= '</tr></thead>
           <tbody>';
           foreach ($_types as $id => $content_array) {
                $HTML .= '<tr class="row cajas">
                  <td>'.$_types[$id]['type'].'</td>';
                if(isLoggedIn()){
                  $HTML .= '<td><div class="btn-group">
                              <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="?view=types&mode=edit&id='.$_types[$id]['id_type'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a></li>
                                <li><a onclick="DeleteItem(\'Are you sure about this?\',\'?view=types&mode=delete&id='.$_types[$id]['id_type'].'\')"><i class="fa fa-times" aria-hidden="true"></i>  Delete</a></li>
                              </ul>
                            </div></td>
                          </tr>';
                }
            }
            $HTML .= '</tbody></table>';
          } else {
            $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMATION: </strong> No types loaded.</div>';
          }
          echo $HTML;
        ?>
    </div>
  </div>
</div>
