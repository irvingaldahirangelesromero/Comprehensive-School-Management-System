<?php
include_once('Modelo/Administrador/clsReiniciarContraseña.php');
include_once('Modelo/Administrador/clsRegistrarAlumnos.php');
include_once ('Modelo/Administrador/clsRegistrarUsuarios.php');
include_once ('Modelo/Administrador/clsAñadirCarrera.php');
include_once ('Modelo/Administrador/clsAñadirHorarios.php');
include_once ('Modelo/Administrador/clsAñadirMaterias.php');
include_once ('Modelo/Administrador/clsConsultaCalificaciones.php');
include_once('Modelo/Administrador/clsConsultaHorarios.php');
include_once('Modelo/Administrador/clsAñadirDocente.php');
include_once 'LibreriaFPDF/fpdf.php';
class controladorAdmin
{
    private $vista;

    public function dashboard()
    {
        $this->vista = "Vistas/Principal/frmcontenidoAdmin.php";
        global $vista;
        $vista = $this->vista;
        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
    }

    public function registrarAlumnos()
    {
        session_start();
        $alumnos = new clsRegistrarAlumnos();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matricula = $_POST['txtMatricula'];
            $nombre = $_POST['txtNombre'];
            $apaterno = $_POST['txtAP'];
            $amaterno = $_POST['txtAM'];
            $horario = $_POST['txtHorario'];
            $sexo = $_POST['sexo'];
            $tutor = $_POST['txtTutor'];

            $resultado = $alumnos->registrarAlumnos($matricula, $nombre, $apaterno, $amaterno, $horario, $sexo, $tutor);

            if ($resultado['Respuesta'] == 1) {
                echo "<script>alert('".$resultado['Mensaje']."');</script>";
            } else {
                echo "<script>alert('".$resultado['Mensaje']."');</script>";
            }
        }

        $this->vista = "Vistas/Reportes/Administrador/frmRegistroAlumnos.php";
        global $vista;
        $vista = $this->vista;
        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
    }
    

    public function registrarUsuarios() 
    {
        session_start();
        $usuarios = new clsRegistrarUsuario();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tipoUsuario = $_POST['txtTipoUsuario'];
            $usuario = $_POST['txtUsuario'];
            $contraseña = $_POST['txtContraseña'];
            $telefono = $_POST['txtTelefono'];
            $correo = $_POST['txtCorreo'];

            $resultado = $usuarios->registrarUsuario($tipoUsuario, $usuario, $contraseña, $telefono, $correo);

            if ($resultado['Respuesta'] == 1) {
                echo "<script>alert('".$resultado['Mensaje']."');</script>";
            } else {
                echo "<script>alert('".$resultado['Mensaje']."');</script>";
            }
        }

        $this->vista = "Vistas/Reportes/Administrador/frmRegistroUsuarios.php";
        global $vista;
        $vista = $this->vista;
        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
    
    }

    public function AltaHorarios()
    {
        session_start();
        $horario = new clsAñadirHorario();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombreCarrera = $_POST['nombreCarrera'];
            $imgHorario = $_FILES['imgHorario']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($imgHorario);

            // Try to upload the file
            if (move_uploaded_file($_FILES['imgHorario']['tmp_name'], $target_file)) {
                $resultado = $horario->AltaHorarios($imgHorario, $nombreCarrera);

                echo "<script>alert('".$resultado['Mensaje']."');</script>";
            } else {
                echo "<script>alert('Error al subir el archivo.');</script>";
            }
        }

        $this->vista = "Vistas/Reportes/Administrador/frmAltaHorarios.php";
        global $vista;
        $vista = $this->vista;
        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
    }

    public function reiniciarContraseña()
    {
        session_start();
        $contraseña = new clsReiniciarContraseña();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $usuario = $_POST['txtusuario'];
            $nuevaContraseña = $_POST['txtnuevacontraseña'];
            
            $datos = $contraseña->ReiniciarContraseña($usuario, $nuevaContraseña);
            
            if ($datos['Respuesta'] == 1) // Verifica si la respuesta es positiva
            {
                $_SESSION['mensaje'] = $datos['Mensaje'];
                $this->vista = "Vistas/Reportes/Administrador/frmReiniciarContraseñas.php";
                global $vista;
                $vista = $this->vista;
                echo "<script>alert('".$_SESSION['mensaje']."');</script>";
                unset($_SESSION['mensaje']);
                include_once("Vistas/Reportes/frmplantillaAdministrador.php");
            }
            else
            {
                $_SESSION['error'] = $datos['Mensaje'];
                $this->vista = "Vistas/Reportes/Administrador/frmReiniciarContraseñas.php";
                global $vista;
                $vista = $this->vista;
                echo "<script>alert('".$_SESSION['error']."');</script>";
                unset($_SESSION['error']);
                include_once("Vistas/Reportes/frmplantillaAdministrador.php");
            }
        }
        else
        {
            $this->vista = "Vistas/Reportes/Administrador/frmReiniciarContraseñas.php";
            global $vista;
            $vista = $this->vista;
            include_once("Vistas/Reportes/frmplantillaAdministrador.php");
        }
    }

    public function consultarCalificaciones()
    {
        $profesor = new clsConsultaCalificaciones();
        if (!empty($_POST)) {
            
            // Obtener la matrícula desde POST
            $matricula = isset($_POST['txtmatricula']) ? $_POST['txtmatricula'] : null;
    
            if ($matricula) {
                // Consultar las calificaciones del alumno
                $Consulta = $profesor->consultarCalificaciones($matricula);
        
                if ($Consulta && $Consulta->num_rows > 0) {
                    // Generar el PDF
                    $pdf = new FPDF();
                    $pdf->AddPage();
                    $pdf->Cell(190,30,$pdf->Image('./img/Logo_UTHH.png',35,12,140,30),0,1,'R');
                    $pdf->SetFont('Arial', 'B', 20);
                    $pdf->Cell(0, 20, utf8_decode('Reporte de calificación por matrícula del alumno'), 0, 1, 'C');
                    
                    // Calcular el margen izquierdo para centrar la tabla
                    $tableWidth = 30 + 20 + 20 + 20 + 30 + 40; // Suma de los anchos de las columnas
                    $leftMargin = (210 - $tableWidth) / 2; // Ancho de la página A4 es 210 mm
                    $pdf->SetLeftMargin($leftMargin);
        
                    $pdf->SetFont('Arial', 'B', 10);
        
                    // Encabezados de la tabla
                    $pdf->Cell(30, 10, 'Matricula', 1, 0, 'C');
                    $pdf->Cell(20, 10, 'Parcial 1', 1, 0, 'C');
                    $pdf->Cell(20, 10, 'Parcial 2', 1, 0, 'C');
                    $pdf->Cell(20, 10, 'Parcial 3', 1, 0, 'C');
                    $pdf->Cell(30, 10, 'Promedio final', 1, 0, 'C');
                    $pdf->Cell(40, 10, 'Materia', 1, 1, 'C');
                    $pdf->SetFont('Arial', '', 10);
        
                    // Datos de la tabla
                    while ($row = $Consulta->fetch_assoc()) {
                        $pdf->Cell(30, 10, $row["Matricula"], 1, 0, 'C');
                        $pdf->Cell(20, 10, $row["Par1"], 1, 0, 'C');
                        $pdf->Cell(20, 10, $row["Par2"], 1, 0, 'C');
                        $pdf->Cell(20, 10, $row["Par3"], 1, 0, 'C');
                        $pdf->Cell(30, 10, $row["PromFinal"], 1, 0, 'C');
                        $pdf->Cell(40, 10, $row["NombreMateria"], 1, 1, 'C'); // Mostrar el nombre de la materia
                    }
        
                    $pdf->Ln(10);
                    $pdf->Output();
                } else {
                    // echo "No se encontraron registros.";
                }
            } else {
                // echo "Matrícula no proporcionada.";
            }
        } else {
            $vista = "Vistas/Reportes/Administrador/frmConsultarCalificaciones.php";
            include_once("Vistas/Reportes/frmplantillaAdministrador.php");
        }

    }
    
    public function consultarHorarios()
    {
    $horarios = new clsConsultaHorarios();
    if (!empty($_POST)) {
        // Obtener los datos del formulario
        $nombreCarrera = $_POST['nombreCarrera'];
        $cuatrimestre = $_POST['cuatrimestre'];
        $grupo = $_POST['grupo'];

        // Consultar los horarios
        $Consulta = $horarios->consultarHorarios($nombreCarrera, $cuatrimestre, $grupo);

        if ($Consulta && $Consulta->num_rows > 0) {
            // Crear el objeto FPDF
            $pdf = new FPDF();
            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 20);
            $pdf->Cell(0, 20, utf8_decode('Reporte de Horarios'), 0, 1, 'C');

            // Logo de la universidad
            $pdf->Image('./img/logo_UTHH.png', 10, 30, 30);
            $pdf->Ln(40);

            // Iterar sobre los resultados de la consulta
            while ($row = $Consulta->fetch_assoc()) {
                // Nombre de la carrera y logotipo
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(0, 10, utf8_decode($row['NombreCarrera']), 0, 1, 'C');

                // Convertir la imagen a no interlazada
                $srcFilePath = './img/logo_carrera/logo_UTHH.png';
                $destFilePath = './img/logo_carrera/no_interlace_' . $row['logoCarrera'];
                if (!file_exists($destFilePath)) {
                    $this->convertPngToNonInterlaced($srcFilePath, $destFilePath);
                }

                // Imprimir la imagen
                $pdf->Image($destFilePath, 10, null, 30, 30, 'PNG');
                $pdf->Ln(10);

                // Encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(40, 10, 'Materia', 1);
                $pdf->Cell(50, 10, 'Horario', 1);
                $pdf->Cell(50, 10, 'Grupo', 1);
                $pdf->Ln();

                // Contenido de la tabla
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(40, 10, utf8_decode($row['Materia']), 1);
                $pdf->Cell(50, 10, utf8_decode($row['Horario']), 1);
                $pdf->Cell(50, 10, utf8_decode($row['Grupo']), 1);
                $pdf->Ln();
            }

            $pdf->Output();
        } else {
            echo "No se encontraron registros para los criterios proporcionados.";
        }
    } else {
        $this->vista = "Vistas/Reportes/Administrador/frmConsultarHorarios.php";
        global $vista;
        $vista = $this->vista;
        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
    }
    }


    private function convertPngToNonInterlaced($srcFilePath, $destFilePath)
    {
        $image = imagecreatefrompng($srcFilePath);
        if ($image === false) {
            echo "<script>alert('No se pudo cargar la imagen.');</script>";
            return;
        }

        // Crear una imagen no interlazada
        imagepng($image, $destFilePath, 0); // El nivel de compresión se establece en 0 (sin compresión)

        // Liberar la memoria
        imagedestroy($image);
    }

    public function AltaMaterias()
    {
        session_start();
        $materias = new clsAñadirMaterias();
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $nombreMateria = $_POST['txtNombreMateria'];
            $nivel = $_POST['txtNivel'];
            $horas = $_POST['txtHoras'];
    
            $datos = $materias->AltaMaterias($nombreMateria, $nivel, $horas);
    
            if ($datos['Respuesta'] == 1) // Verifica si la respuesta es positiva
            {
                $_SESSION['mensaje'] = $datos['Mensaje'];
                $this->vista = "Vistas/Reportes/Administrador/frmAltaMaterias.php";
                global $vista;
                $vista = $this->vista;
                echo "<script>alert('".$_SESSION['mensaje']."');</script>";
                unset($_SESSION['mensaje']);
                include_once("Vistas/Reportes/frmplantillaAdministrador.php");
            }
            else
            {
                $_SESSION['error'] = $datos['Mensaje'];
                $this->vista = "Vistas/Reportes/Administrador/frmAltaMaterias.php";
                global $vista;
                $vista = $this->vista;
                echo "<script>alert('".$_SESSION['error']."');</script>";
                unset($_SESSION['error']);
                include_once("Vistas/Reportes/frmplantillaAdministrador.php");
            }
        }
        else
        {
            $this->vista = "Vistas/Reportes/Administrador/frmAltaMaterias.php";
            global $vista;
            $vista = $this->vista;
            include_once("Vistas/Reportes/frmplantillaAdministrador.php");
        }
    }
public function AltaCarreras()
    {
        session_start();
        $carrera = new clsAñadirCarrera();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['txtCarrera'];
            $logo = $_FILES['fileLogo']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($logo);

            // Intentar subir el archivo
            if (move_uploaded_file($_FILES['fileLogo']['tmp_name'], $target_file)) {
                $resultado = $carrera->AltaCarreras($nombre, $logo);

                echo "<script>alert('".$resultado['Mensaje']."');</script>";
            } else {
                echo "<script>alert('Error al subir el archivo.');</script>";
            }
        }

        $this->vista = "Vistas/Reportes/Administrador/frmAltaCarreras.php";
        global $vista;
        $vista = $this->vista;
        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
    }

    
     public function AltaDocente()
    {
        session_start();
        $docente = new clsAñadirDocente();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $numTrabajador = isset($_POST['txtnumTrabajador']) ? (int)$_POST['txtnumTrabajador'] : 0;
            $nomCarrera = $_POST['txtnomCarrera'] ?? '';
            $periodo = $_POST['txtperiodo'] ?? '';
            $cuatrimestre = $_POST['txtcuatrimestre'] ?? '';
            $grupo = $_POST['txtgrupo'] ?? '';
            $materia = $_POST['txtmateria'] ?? '';
            $numHorario = isset($_POST['txtnumHorario']) ? (int)$_POST['txtnumHorario'] : 0;

            // Validar que todas las variables estén definidas
            if (empty($nomCarrera) || empty($periodo) || empty($cuatrimestre) || empty($grupo) || empty($materia)) {
                echo "<script>alert('Por favor complete todos los campos.');</script>";
            } else {
                $resultado = $docente->AltaDocente($numTrabajador, $nomCarrera, $periodo, $cuatrimestre, $grupo, $materia, $numHorario);

                echo "<script>alert('".$resultado['Mensaje']."');</script>";
            }
        }

        $this->vista = "Vistas/Reportes/Administrador/frmAltaDocente.php";
        global $vista;
        $vista = $this->vista;
        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
    }


}
?>
