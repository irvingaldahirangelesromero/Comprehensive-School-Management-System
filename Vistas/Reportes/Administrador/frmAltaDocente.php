

<form class="form" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=AltaDocente" method="POST">
    <h2>ASIGNACION DE MATERIAS, CARRERAS, GRUPOS, HORARIOS AL PROFESOR</h2>
    
    <div class="form-group">
        <label for="numTrabajador">Numero de trabajador:</label>
        <input type="text" id="numTrabajador" name="txtnumTrabajador" required pattern="^\d+$" minlength="1" maxlength="2">
    </div>
    <div class="form-group">
        <label for="nomCarrera">Nombre de la carrera:</label>
        <input type="text" id="nomCarrera" name="txtnomCarrera" required pattern="^[a-zA-Z]+$" minlength="5" maxlength="25">
    </div>
    <div class="form-group">
        <label for="periodo">Periodo</label>
        <input type="text" id="periodo" name="txtperiodo" >
    </div>
    <div class="form-group">
        <label for="cuatrimestre">Cuatrimestre</label>
        <input type="text" id="cuatrimestre" name="txtcuatrimestre" required pattern="^\d+$" minlength="1" maxlength="2">
    </div>
    <div class="form-group">
        <label for="grupo">Grupo</label>
        <input type="text" id="grupo" name="txtgrupo" required pattern="^[a-zA-Z]+$" minlength="1" maxlength="1">
    </div>
    <div class="form-group">
        <label for="materia">Materia</label>
        <input type="text" id="materia" name="txtmateria" required pattern="^[a-zA-Z0-9\s]+$" minlength="5" maxlength="20">
    </div>
    <div class="form-group">
        <label for="numHorario">Código de Horario:</label>
        <input type="text" id="numHorario" name="txtnumHorario" required pattern="^\d+$" minlength="1" maxlength="2">
    </div>
    <div class="form-group">
        <button type="submit">Guardar</button>
    </div>
    </div>
</form>
