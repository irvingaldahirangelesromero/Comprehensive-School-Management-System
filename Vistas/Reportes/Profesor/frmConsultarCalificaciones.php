<form class="form" action="/INTEGRADORA/index?clase=controladorProfesor&metodo=consultarCalificaciones" method="POST">
    <h2>CONSULTAR CALIFICACIONES </h2>
    <div class="form-group">
      <label for="cuatrismestre">Ingresa el cuatrimestre</label>
      <input type="text" id="cuatrimestre" name="txtcuatrimestre" required pattern="^\d+$" minlength="1" maxlength="2">
    </div>

    <div class="form-group">
      <button type="submit">Generar</button>
    </div>
</form>