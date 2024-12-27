<?php
include_once('Modelo/clsLogin.php');

class controladorlogin
{
    private $vista;

    public function Acceso()
    {
        session_start();
         // Añade esta línea para hacer la variable $vista global
        $login = new clsLogin();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $rol = $_POST['sesion']; // Obtener el valor del rol del usuario
            $usuario = $_POST['txtusuario'];
            $password = $_POST['txtpassword'];
            
            $datos = $login->Acceder($rol, $usuario, $password);
            
            if ($datos['Respuesta'] == 1) // Verifica si la respuesta es positiva
            {
                $_SESSION['usuario'] = $usuario;
                $_SESSION['mensaje'] = $datos['Mensaje'];
                $_SESSION['rol'] = $rol; // Asignar el rol del usuario

                // Redirigir según el rol
                switch ($rol)
                {
                    case 'alumno':
                        $vista = "Vistas/Principal/frmcontenidoAlumno.php";
                        include_once("Vistas/Reportes/frmplantillaAlumnos.php");
                        break;
                    case 'profesor':
                        $vista = "Vistas/Principal/frmcontenidoProfesor.php";
                        include_once("Vistas/Reportes/frmplantillaProfesores.php");
                        break;
                    case 'administrador':
                        $vista = "Vistas/Principal/frmcontenidoAdmin.php";
                        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
                        break;
                    default:
                        echo "Sesión no válida.";
                        break;
                }
            }
            else
            {
                $_SESSION['error'] = $datos['Mensaje'];
                $vista = "Vistas/Acceso/frmLogin.php";
                echo "<script>alert('".$_SESSION['error']."');</script>";
                include_once("Vistas/frmplantillapublica.php");
            }
        }
        else
        {
            $vista = "Vistas/Acceso/frmLogin.php";
            include_once("Vistas/frmplantillapublica.php");
        }
    }

    public function CerrarSesion()
    {
        session_start();
        session_destroy();
        $vista = "Vistas/Acceso/frmLogin.php";
        include_once("Vistas/frmplantillapublica.php");
    }
}
?>



