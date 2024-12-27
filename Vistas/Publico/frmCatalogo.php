<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carreras</title>
    <link rel="icon" href="img/SIGE1.png">
    <link rel="stylesheet" href="Estilos/catalogo.css">
</head>
<body>
    <header class="header">
        <h1>Carreras</h1>
    </header>
    <div class="container">
        <?php
        if ($Consulta->num_rows > 0) {
            //Salida de cada fila de datos
            while($row = $Consulta->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="img/logo_carrera/'. $row["logoCarrera"] . '" alt="' . $row["Nombre"] . '">';
                echo '<div class="card-content">';
                echo '<h3>' . $row["Nombre"] . '</h3>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            // echo "0 resultados";
        }
        
        ?>
    </div>
</body>
</html>