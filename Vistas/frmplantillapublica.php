<!DOCTYPE html>
<html>
<head>
    <title>SIGE</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" href="img/SIGE1.png">
    <link rel="stylesheet" href="Estilos\InicioplanPublica.css">


</head>
<body>
    <div class="fondo">
        <aside class="sidebar">
            <div class="logo">
                <img src="img/SIGE1.png" alt="Logo">
            </div>  
            <nav id="menu-area">
                <ul>
                    <li><a href="/INTEGRADORA/index?clase=controladorprincipal&metodo=publico">Inicio</a></li>
                    <li><a href="/INTEGRADORA/index?clase=controladorcarreras&metodo=carreras">Carreras</a>
                    <!-- <ul class="submenu-1">
                        <li><a href="/INTEGRADORA/index?clase=controladorbecas&metodo=Becas">Becas</a></li>
                    </ul> -->
                    </li>
                    <li><a href="/INTEGRADORA/index?clase=controladorlogin&metodo=Acceso">Login</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Este es el cuerpo -->
        <div class="content">
            <?php include_once($vista); ?>
        </div>

        <!-- Este es el pie de la pagina -->
        <!-- Para que no muestre el pie de pagina en el login --> 
        
    </div>
</body>
</html>
