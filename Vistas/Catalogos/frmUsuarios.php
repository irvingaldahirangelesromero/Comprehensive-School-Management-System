<form class="form" action="/INTEGRADORA/index?clase=controladorusuarios&metodo=AltaUsuarios" method="POST">
    <h2>REGISTRO DE USUARIOS</h2>
    
    <div class="form-group">
      <label for="usuario">Usuario:</label>
      <input type="text" id="usuario" name="txtUsuario" required>
    </div>
   <div class="form-group">
      <label for="password">Password:</label>
      <input type="text" id="pass" name="txtPassword" required>
    </div>
    <div class="form-group">
      <label for="telefono">Numero de telefono:</label>
      <input type="text" id="telefono" name="txtNoTelefono" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" id="email" name="txtEmail" required>
    </div>
    <div class="form-group">
      <label for="tipousuario">Tipo de Usuario:</label>
      <input type="text" id="tipo" name="txtTipoUsuario" required>
    </div>
    
    <div class="form-group">
      <button type="submit">Guardar</button>
    </div>
</form>