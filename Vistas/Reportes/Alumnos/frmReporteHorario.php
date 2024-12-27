<form class="form" action="/INTEGRADORA/index?clase=controladorAlumno&metodo=consultarHorario" method="POST">
    <h2>CONSULTA DE HORARIO</h2>
    <div class="form-group">
      <label for="matricula">Ingresa tu grupo</label>
      <input type="text" id="matricula" name="txtmatricula" required pattern="^[a-zA-Z]+$" minlength="1" maxlength="1">
    </div>

    <div class="form-group">
      <button type="submit">Generar</button>
    </div>
</form>