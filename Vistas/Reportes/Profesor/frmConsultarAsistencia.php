<form class="form" action="/INTEGRADORA/index?clase=controladorProfesor&metodo=consultarAsistencia" method="POST">
    <h2>CONSULTA DE ASISTENCIA </h2>
    <div class="form-group">
      <label for="matricula">Ingresa tu matricula</label>
      <input type="text" id="matricula" name="txtmatricula" required>
    </div>
    <div class="form-group">
      <label for="materia">Ingresa el nombre de la materia</label>
      <input type="text" id="materia" name="txtmateria" required>
    </div>
    <div class="form-group">
      <button type="submit">Generar</button>
    </div>
</form>