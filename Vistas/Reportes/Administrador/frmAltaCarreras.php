<form class="form" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=AltaCarreras" method="POST" enctype="multipart/form-data">
    <h2>ALTA CARRERAS</h2>
    
    <div class="form-group">
      <label for="carrera">Ingresa el nombre de la carrera</label>
      <input type="text" id="carrera" name="txtCarrera" required pattern="^[a-zA-Z\s]+$" minlength="5" maxlength="50">
    </div>
    
    <div class="form-group">
      <label for="fileLogo">Selecciona el logo de la carrera</label>
      <input type="file" id="fileLogo" name="fileLogo" required>
    </div>

    <div class="form-group">
      <button type="submit">Guardar</button>
    </div>
</form>