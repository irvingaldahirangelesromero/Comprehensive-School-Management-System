<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  	<link rel="stylesheet" href="Estilos/completo.css">
    <link rel="icon" href="img/SIGE1.png">

</head>
<body>
    
    <header>
    
		<div id="main-menu">
        
			<nav id="menu-area">
                      
				<ul>
                <div class="logo">
                    <img src="img/becas3.png" alt="Logo">
                </div>  
					<li><a href="/SistemaBecados/index?clase=controladorprincipal&metodo=inicio">Inicio</a></li>
					<li><a href="#">Catalogos</a>
						<ul class="submenu-1">
								<li><a href="/INTEGRADORA/index?clase=controladorcatalogos&metodo=AltaBecas">Alta Tipo Becas</a></li>
								<li><a href="/INTEGRADORA/index?clase=controladoralumnos&metodo=AltaAlumnos">Registro Alumnos</a></li>
								<li><a href="/INTEGRADORA/index?clase=controladorusuarios&metodo=AltaUsuarios">Registro Usuarios</a></li>
						</ul>
					</li>
                    <li><a href="">Reportes</a>
						<ul class="submenu-1">
							
							<li><a href="/INTEGRADORA/index?clase=controladorreportes&metodo=reporteBecas">Ver por tipo de beca</a></li>
							<li><a href="/INTEGRADORA/index?clase=controladorreportes&metodo=reportePorMatricula">Ver Por Matricula</a></li>
							
						</ul>
					</li>
					<li><a href="/SistemaBecados/index?clase=controladorlogin&metodo=cerrarsesion">Cerrar sesión</a></li>
					
				</ul>
			</nav>
		</div>
	</header>  

     <!-- Este es el cuerpo -->
     <?php include_once($vista); ?> 


<!-- Este es el pie de la pagina -->
<br></br>
<footer>
    
        <p> &copy; Sitio desarrollado por GRH-Gadiel Ramos 2023 - <?php date('d-m-Y H:i') ?> </p>
    
</footer>

</body>
</html>
