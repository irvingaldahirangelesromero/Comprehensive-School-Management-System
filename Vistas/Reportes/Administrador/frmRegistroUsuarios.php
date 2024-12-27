<form class="form" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=registrarUsuarios" method="POST">
    <h2>REGISTRO DE USUARIOS</h2>
    
    <div class="form-group">
      <label for="tipoUsuario">Tipo de Usuario:</label>
      <select id="tipoUsuario" name="txtTipoUsuario" required>
          <option value="Administrador">Administrador</option>
          <option value="Alumno">Alumno</option>
          <option value="Profesor">Profesor</option>
      </select>
    </div>
    <div class="form-group">
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="txtUsuario" required  pattern="^[a-zA-Z0-9]{3,15}$" minlength="3" maxlength="15">
    </div>
    <div class="form-group">
      <label for="contraseña">Contraseña:</label>
      <input type="password" id="contraseña" name="txtContraseña" required  pattern="^[A-Za-z0-9]{3,15}$" minlength="3" maxlength="15">
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono:</label>
      <input type="text" id="telefono" name="txtTelefono" required pattern="^\d{10}$" maxlength="10">
    </div>
    <div class="form-group">
      <label for="correo">Correo:</label>
      <input type="text" id="correo" name="txtCorreo" required maxlength="30">
    </div>
    <div class="form-group">
      <button type="submit">Guardar</button>
    </div>
</form>
