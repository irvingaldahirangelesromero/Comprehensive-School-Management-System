<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="Estilos/completo2.css">
    <link rel="stylesheet" href="Estilos/formularios.css">
    <link rel="icon" href="img/SIGE1.png">

    <title>Alumno</title>
</head>
<body>
    <header>
        <div id="main-menu">
            <nav id="menu-area">
                <ul>
                    <div class="logo">
                        <a href="/INTEGRADORA/index?clase=controladorprincipal&metodo=alumnos"><img src="img/SIGE1.png" alt="Logo"></a>
                    </div>  
                    <li><a href="#">Alumnos</a>
                        <ul class="submenu-1">
                            <li><a href="/INTEGRADORA/index?clase=controladorAlumno&metodo=consultarHorario">Consulta Horarios</a></li>
                        </ul>
                    </li>
                    <li><a href="">Reportes</a>
    <ul class="submenu-1">
        <li><a href="/INTEGRADORA/index?clase=controladorAlumno&metodo=consultarCalificaciones">Consultar Calificaciones</a></li>
    </ul>
                    </li>
                    <li><a href="/INTEGRADORA/index?clase=controladorlogin&metodo=CerrarSesion">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

	<?php if($vista == "Vistas/Principal/frmcontenidoAlumno.php") { ?>
        <?php include_once($vista); ?>
    <?php } ?>

        <?php include_once($vista); ?>

    <footer>
        <p>&copy; Sitio desarrollado por integrantes del equipo 1 <?php echo date('d-m-Y H:i'); ?></p>
    </footer>
</body>
</html>

