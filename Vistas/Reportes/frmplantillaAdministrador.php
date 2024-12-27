<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="Estilos/completo2.css">
    <link rel="stylesheet" href="Estilos/formularios.css">
    <link rel="icon" href="img/SIGE1.png">
    <title>Administrador</title>
</head>
<body>
    <header>
        <div id="main-menu">
            <nav id="menu-area">
                <ul>
                    <div class="logo">
                        <a href="/INTEGRADORA/index?clase=controladorprincipal&metodo=admin"><img src="img/SIGE1.png" alt="Logo"></a>
                    </div>  
                    <li><a href="#">Administrar</a>
                        <ul class="submenu-1">
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=registrarAlumnos">Registro de alumnos</a></li> 
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=registrarUsuarios">Registro de usuarios</a></li>
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=reiniciarContraseña">Reinicializacion de contraseñas</a></li>
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=AltaDocente">Asignacion de materias al profesor</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Añadir</a>
                        <ul class="submenu-1">    
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=AltaCarreras">Añadir Carreras</a></li>
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=AltaHorarios">Añadir Horario</a></li>
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=AltaMaterias">Añadir Materias</a></li>        
                        </ul>
                    </li>
                    <li><a href="#">Reportes</a>
                        <ul class="submenu-1">
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=consultarCalificaciones">Consultar Calificaciones</a></li>
                            <li><a href="/INTEGRADORA/index?clase=controladorAdmin&metodo=consultarHorarios">Consultar Horarios</a></li>
                        </ul>
                    </li>
                    <li><a href="/INTEGRADORA/index?clase=controladorlogin&metodo=CerrarSesion">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php if($vista == "Vistas/Principal/frmcontenidoAdmin.php") { ?>
        <?php include_once($vista); ?>
    <?php } ?>

        <?php include_once($vista); ?>

    <footer>
        <p>&copy; Sitio desarrollado por integrantes del equipo 1. Fecha: <?php echo date('d-m-Y H:i'); ?></p>
    </footer>
</body>
</html>
