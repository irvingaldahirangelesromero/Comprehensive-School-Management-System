<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="Estilos/completo2.css">
    <link rel="stylesheet" href="Estilos/formularios.css">
    <title>Consulta Horarios</title>
</head>
<body>
    <div class="form-container">
        <form class="form" action="/INTEGRADORA/index?clase=controladorAdmin&metodo=consultarHorarios" method="POST">
            <h2>CONSULTA DE HORARIOS</h2>            
            <div class="form-group">
                <label for="nombreCarrera">Nombre de la carrera:</label>
                <input type="text" id="nombreCarrera" name="nombreCarrera" required pattern="^[a-zA-Z\s]+$" minlength="3" maxlength="50">
            </div>
            
            <div class="form-group">
                <label for="cuatrimestre">Cuatrimestre:</label>
                <input type="text" id="cuatrimestre" name="cuatrimestre" required pattern="^\d+$" minlength="1" maxlength="2">
            </div>
            
            <div class="form-group">
                <label for="grupo">Grupo:</label>
                <input type="text" id="grupo" name="grupo" required pattern="^[a-zA-Z]+$" minlength="1" maxlength="1">
            </div>

            <div class="form-group">
                <button type="submit">Generar</button>
            </div>
        </form>
    </div>
</body>
</html>