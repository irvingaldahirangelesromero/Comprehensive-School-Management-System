<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="Estilos/completo2.css">
    <link rel="stylesheet" href="Estilos/formularios.css">
    <title>Alta Horarios</title>
</head>
<body>
    <div class="form-container">
        <form class="form" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=AltaHorarios" method="POST" enctype="multipart/form-data">
            <h2>ALTA HORARIOS</h2>
            
            <div class="form-group">
                <label for="imgHorario">Sube el horario:</label>
                <input type="file" id="imgHorario" name="imgHorario" accept="image/*" required>
            </div>
            
            <div class="form-group">
                <label for="nombreCarrera">Nombre de la carrera:</label>
                <input type="text" id="nombreCarrera" name="nombreCarrera" required pattern="^[a-zA-Z\s]+$" minlength="5" maxlength="50">
            </div>

            <div class="form-group">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>
