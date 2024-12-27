<form class="form" action="/INTEGRADORA/index?clase=controladorProfesor&metodo=asignarAsistencias" method="POST">
    <h2>ASIGNAR ASISTENCIAS</h2>
    <div class="form-group">
        <label for="materia">Materia</label>
        <input type="text" id="materia" name="txtmateria" required pattern="^[a-zA-Z0-9\s]+$" minlength="5" maxlength="20">
    </div>
    <div class="form-group">
        <label for="periodo">Periodo</label>
        <input type="text" id="periodo" name="txtperiodo" required>
    </div>
    <div class="form-group">
        <label for="cuatri">Cuatrimestre</label>
        <input type="text" id="cuatri" name="txtcuatrimestre" required pattern="^\d+$" minlength="1" maxlength="2">
    </div>
    <div class="form-group">
        <label for="grupo">Grupo</label>
        <input type="text" id="grupo" name="txtgrupo" required pattern="^[a-zA-Z]+$" minlength="1" maxlength="1">
    </div>

    <div class="form-group">
        <label for="fecha">Fecha</label>
        <select id="fecha" name="txtfecha" required>
            <option value="" disabled selected>Seleccione una fecha</option>
            <?php foreach ($fechas as $fecha): ?>
                <option value="<?= htmlspecialchars($fecha) ?>"><?= htmlspecialchars($fecha) ?></option>
            <?php endforeach; ?>
            <option>Generar nueva lista</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit">Generar</button>
    </div>
</form>

