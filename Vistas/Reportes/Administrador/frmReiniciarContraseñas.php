<form class="form" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=reiniciarContraseña" method="POST">
    <h2>REINICIAR CONTRASEÑA</h2>
    
    <div class="form-group">
      <label for="matricula">Ingresa el usuario</label>
      <input type="text" id="matricula" name="txtusuario" required pattern="^[a-zA-Z0-9]{3,15}$" minlength="3" maxlength="15">
    </div>

    <div class="form-group">
      <label for="contraseña">Ingresa la nueva contraseña</label>
      <input type="text" id="contraseña" name="txtnuevacontraseña" required pattern="^[A-Za-z0-9]{3,15}$" minlength="3" maxlength="15">
    </div>

    
    <div class="form-group">
      <button type="submit">Guardar</button>
    </div>
</form>