<form class="form" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=AltaMaterias" method="POST">
    <h2>ALTA MATERIAS</h2>
    
    <div class="form-group">
        <label for="nombreMateria">Nombre de la materia:</label>
        <input type="text" id="nombreMateria" name="txtNombreMateria" required pattern="^[a-zA-Z0-9\s]+$" minlength="5" maxlength="20">
    </div>
    <div class="form-group">
        <label for="nivel">Nivel:</label>
        <input type="text" id="nivel" name="txtNivel" required pattern="^[a-zA-Z]+$" minlength="5" maxlength="15">
    </div>
    <div class="form-group">
        <label for="horas">Horas:</label>
        <input type="number" id="horas" name="txtHoras" required>
    </div>
    <div class="form-group">
        <button type="submit">Guardar</button>
    </div>
    </div>
</form>