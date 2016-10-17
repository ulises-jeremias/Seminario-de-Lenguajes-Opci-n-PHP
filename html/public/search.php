<div class="modal fade" id="Search" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4><span class="glyphicon glyphicon-lock"></span> Search</h4>
       </div>
       <div class="modal-body">
         <form role="form" method="post" action="?view=vehicles">
           <div class="form-group">
              <label for="characts" class="col-md-2 control-label">Characts</label>
              <div class="col-md-10">
                <select id="characts" class="form-control" name="charact">
                  <?php
                     $HTML = '<option value="0">All charac</option>';
                     $_characts = get_characts();
                     if (false != $_characts){
                       foreach ($_characts as $id => $content_array) {
                         $HTML .= '<option name="type" value="'.$id.'">'.$_characts[$id]['charact'].'</option>';
                       }
                       echo $HTML;
                     }
                   ?>
                </select>
              </div>
           </div>
           <div class="form-group">
              <label for="types" class="col-md-2 control-label">Types</label>
              <div class="col-md-10">
                <select id="types"  class="form-control" name="type">
                  <?php
                     $HTML = '<option value="0">All types</option>';
                     $_types = get_types();
                     if (false != $_types){
                       foreach ($_types as $id => $content_array) {
                         $HTML .= '<option name="type" value="'.$id.'">'.$_types[$id]['type'].'</option>';
                       }
                       echo $HTML;
                     }
                   ?>
                </select>
              </div>
           </div>
           <div class="form-group">
              <label for="models" class="col-md-2 control-label">Models</label>
              <div class="col-md-10">
                <select id="types"  class="form-control" name="model">
                  <?php
                     $HTML = '<option value="0">All models</option>';
                     $_models = get_models();
                     if (false != $_models){
                       foreach ($_models as $id => $content_array) {
                         $HTML .= '<option name="type" value="'.$id.'">'.$_models[$id]['model'].'</option>';
                       }
                       echo $HTML;
                     }
                   ?>
                </select>
              </div>
           </div>
           <div class="form-group">
              <label for="marcas" class="col-md-2 control-label">Marcas</label>
              <div class="col-md-10">
                <select id="marcas"  class="form-control" name="marca">
                  <?php
                     $HTML = '<option value="0">All marcas</option>';
                     $_marcas = get_marcas();
                     if (false != $_marcas){
                       foreach ($_marcas as $id => $content_array) {
                         $HTML .= '<option name="type" value="'.$id.'">'.$_marcas[$id]['marca'].'</option>';
                       }
                       echo $HTML;
                     }
                   ?>
                </select>
              </div>
           </div>
           <input class="btn btn-raised btn-primary" type="submit" name="search" value="Search &raquo;">
         </form>
       </div>
     </div>
   </div>
 </div>
