<div class="umd_form_container">
  <div class="wrap">
    <form name="umd_form" class="umd_form" onkeypress="return runScriptContact(event)">
      <div>
        <div class="umd_input-group">
          <input type="text" id="nombre" name="nombre">
          <label class="umd_label" for="nombre">Nombre:</label>
        </div>
        <div class="umd_input-group">
          <input type="email" id="correo" name="correo">
          <label class="umd_label" for="correo">Correo:</label>
        </div>
        <div class="umd_input-group">
          <input type="password" id="pass" name="pass">
          <label class="umd_label" for="pass">Contraseña:</label>
        </div>
        <div class="umd_input-group">
          <input type="password" id="pass2" name="pass2">
          <label class="umd_label" for="pass2">Repetir Contraseña:</label>
        </div>
        <div class="umd_input-group umd_radio">
          <input type="radio" name="sexo" id="hombre" value="Hombre">
          <label for="hombre">Hombre</label>
          <input type="radio" name="sexo" id="mujer" value="Mujer">
          <label for="mujer">Mujer</label>
        </div>
        <div class="umd_input-group umd_checkbox">
          <input type="checkbox" name="terminos" id="terminos" value="true">
          <label for="terminos">Acepto los Terminos y Condiciones</label>
        </div>

        <input type="submit" id="btn-submit" value="Create">

      </div>
    </form>
  </div>
</div>
