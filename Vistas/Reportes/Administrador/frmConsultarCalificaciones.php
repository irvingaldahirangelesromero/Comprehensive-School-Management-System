<form class="form" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=consultarCalificaciones" method="POST">
    <h2>CONSULTA DE CALIFICACIONES</h2>
    <div class="form-group">
      <label for="matricula">Ingresa tu matricula:</label>
      <input type="text" id="matricula" name="txtmatricula" required pattern="^\d{1,15}$" minlength="3" maxlength="15">
    </div>

    <div class="form-group">
      <button type="submit">Generar</button>
    </div>
</form>