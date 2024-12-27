<form class="form" action="/INTEGRADORA/index?clase=controladoralumnos&metodo=AltaAlumnos" method="POST">
    <h2>REGISTRO DE ALUMNOS</h2>
    
    <div class="form-group">
      <label for="matricula">Matricula:</label>
      <input type="text" id="matricula" name="txtMatricula" required>
    </div>
   <div class="form-group">
      <label for="nombre">Nombre del alumno:</label>
      <input type="text" id="nombre" name="txtNombre" required>
    </div>
    <div class="form-group">
      <label for="ap">Apellido Paterno:</label>
      <input type="text" id="ap" name="txtAP" required>
    </div>
    <div class="form-group">
      <label for="am">Apellido Materno:</label>
      <input type="text" id="am" name="txtAM" required>
    </div>
    <div class="form-group">
      <label for="p1">Calificacion P1:</label>
      <input type="text" id="p1" name="txtP1" required>
    </div>
    <div class="form-group">
      <label for="p2">Calificacion P2:</label>
      <input type="text" id="p2" name="txtP2" required>
    </div>
    <div class="form-group">
      <label for="p3">Calificacion P3:</label>
      <input type="text" id="p3" name="txtP3" required>
    </div>
    <div class="form-group">
      <button type="submit">Guardar</button>
    </div>
</form>