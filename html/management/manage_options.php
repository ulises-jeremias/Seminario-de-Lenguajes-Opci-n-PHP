<div class="umd_container">
  <div class="vehicles_table">
    <div class="vehicles_management">Options</div>
    <div class="table-responsive" style="margin-bottom: 0;">
      <table class="table table" style="margin-bottom: 0";>
        <thead class="thead">
          <tr class="cajas">
            <th>Characteristics</th>
            <th>Types</th>
            <th>Brands</th>
            <th>Models</th>
          <tr>
        </thead>
        <tbody>
          <tr class="">
            <td>
              <p><a class="btn btn-raised btn-primary" href="#characts" role="button"> Characteristics &raquo;</a></p>
            </td>
            <td>
              <p><a class="btn btn-raised btn-primary" href="#types" role="button"> Types &raquo;</a></p>
            </td>
            <td>
              <p><a class="btn btn-raised btn-primary" href="#brands" role="button"> Brands &raquo;</a></p>
            </td>
            <td>
              <p><a class="btn btn-raised btn-primary" href="#models" role="button"> Models &raquo;</a></p>
            </td>
          </tr>
          <?php
            if (isLoggedIn()) {
              echo('<tr class="">
                      <td><p><a class="btn btn-raised btn-primary" href="?view=characts&mode=add" role="button"> Add &raquo;</a></p></td>
                      <td><p><a class="btn btn-raised btn-primary" href="?view=types&mode=add" role="button"> Add &raquo;</a></p></td>
                      <td><p><a class="btn btn-raised btn-primary" href="?view=models&mode=add" role="button"> Add &raquo;</a></p></td>
                      <td><p><a class="btn btn-raised btn-primary" href="?view=brands&mode=add" role="button"> Add &raquo;</a></p></td>
                    </tr>');
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
