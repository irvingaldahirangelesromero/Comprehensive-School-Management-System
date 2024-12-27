<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Formulario de Acceso</title>
        <link rel="stylesheet" href="Estilos/loginform.css">
        <link rel="icon" href="img/SIGE1.png">
    </head>
    <body>
        <div id="contenedor">
            <div id="contenedorcentrado">
                <div id="login">
                    <form id="loginform" action="/INTEGRADORA/index?clase=controladorlogin&metodo=Acceso" method="POST" enctype="multipart/form-data">
                        <div class="logo">
                            
                        </div>
                        <h2>Bienvenido</h2>
                        </section>
                        <section id="sesion-options">
                            <label for="sesion"><i class="sesion>"></i> Sesión</label>
                            <select id="sesion" name="sesion">
                                <option value="alumno">Alumno</option>
                                <option value="profesor">Profesor</option>
                                <option value="administrador">Administrador</option>      
                                                    
                            </select>
                        </section>
                        <label for="usuario"><i class="usuario"></i> Usuario</label>
                        <input id="usuario" type="text" name="txtusuario" placeholder="Usuario" required pattern="^[a-zA-Z0-9]{3,15}$" minlength="3" maxlength="15">
                        <label for="password"><i class="contraseña"></i> Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="txtpassword" required  pattern="^[A-Za-z0-9]{3,15}$" minlength="3" maxlength="15">
                        <button type="submit" title="Ingresar" name="Ingresar">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
