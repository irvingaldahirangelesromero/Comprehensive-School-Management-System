<form class="form long" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=registrarAlumnos" method="POST">
    <h2>REGISTRO DE ALUMNOS</h2>
    <div class="form-cont">
        <div>
            <div class="form-group">
                <label for="nombre">Nombre del alumno:</label>
                <input type="text" id="nombre" name="txtNombre" required pattern="^[a-zA-Z\s]{1,15}$" minlength="3" maxlength="15">
            </div>

            <div class="form-group">
                <label for="ap">Apellido Paterno:</label>
                <input type="text" id="ap" name="txtAP" required pattern="^[a-zA-Z\s]{1,15}$" minlength="3" maxlength="15">
            </div>

            <div class="form-group">
                <label for="am">Apellido Materno:</label>
                <input type="text" id="am" name="txtAM" required pattern="^[a-zA-Z\s]{1,15}$" minlength="3" maxlength="15">
            </div>

            <div class="form-group">
                <label for="sexo"><i class="sexo"></i> Género:</label>
                <select id="sexo" name="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label for="matricula">Matricula:</label>
                <input type="text" id="matricula" name="txtMatricula" required pattern="^\d{1,15}$" minlength="3" maxlength="15">
            </div>
            <div class="form-group">
                <label for="horario">Horario:</label>
                <input type="text" id="horario" name="txtHorario" required pattern="^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])\s(0[0-9]|1[0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$">
            </div>

            <div class="form-group">
                <label for="tutor">Nombre del tutor:</label>
                <input type="text" id="tutor" name="txtTutor" required pattern="^[a-zA-Z\s]+$" minlength="3" maxlength="35">
            </div>
        </div>
    </div>

    
    <div class="form-group">
        <button type="submit">Guardar</button>
    </div>
</form>
