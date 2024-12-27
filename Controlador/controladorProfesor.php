<?php
include_once('Modelo/Profesor/clsProfesor.php');
include_once 'LibreriaFPDF/fpdf.php';
include_once('Modelo/clsLogin.php');

class controladorProfesor {
    private $vista;
    
    public function dashboard() {
        $vista = "Vistas/Principal/frmcontenidoProfesor.php";
        include_once("Vistas/Reportes/frmplantillaProfesores.php");
    }

public function asignarCalificaciones() {
    session_start();
    
    if (isset($_SESSION['usuario'])) {
        $usr = $_SESSION['usuario'];
        
        $profesor = new clsProfesor();
        if (empty($_POST)) {
            $cuatrimestre = '';
            $Consulta = $profesor->consultarCalificaciones();
            $vista = "Vistas/Reportes/Profesor/frmPreviewAsignarCalificaciones.php";
            include_once("Vistas/Reportes/frmplantillaProfesores.php");
        } else {
            if (isset($_POST['txtmateria'], $_POST['txtperiodo'], $_POST['txtcuatrimestre'], $_POST['txtgrupo'])) {
                $materia = $_POST['txtmateria'];
                $periodo = $_POST['txtperiodo'];
                $cuatrimestre = $_POST['txtcuatrimestre'];
                $grupo = $_POST['txtgrupo'];
            
                // Insertar calificaciones
                $Consulta = $profesor->filtrarCalificaciones($usr, $materia, $periodo, $cuatrimestre, $grupo);
        
                // Consultar calificaciones después de insertar
                $vista = "Vistas/Reportes/Profesor/frmAsignarCalificaciones.php";
                include_once("Vistas/Reportes/frmplantillaProfesores.php");
            } else {
                echo "Error: Faltan campos en el formulario.";
            }
        }
    } else {
        echo "No hay usuario en la sesión.";
        header("Location: Vistas/Acceso/frmLogin.php");
        exit();
    }
}



    
    public function consultarCalificaciones() {
        $profesor = new clsProfesor();
        if (!empty($_POST)) {
            $cuatrimestre = $_POST['txtcuatrimestre'];
            
            // primero validar que el cuatrimestre no este vacio
            if (!empty($cuatrimestre)) {
                // Obtener todas las calificaciones
                $Consulta = $profesor->consultarCalificaciones();
                
                if ($Consulta && $Consulta->num_rows > 0) {
                    // Filtrar los resultados por cuatrimestre
                    $filteredResults = [];
                    while ($row = $Consulta->fetch_assoc()) {
                        if ($row["Cuatrimestre"] == $cuatrimestre) {
                            $filteredResults[] = $row;
                        }
                    }
                    
                    if (!empty($filteredResults)) {
                        $pdf = new FPDF();
                        $pdf->AddPage();
                        $pdf->SetFont('Arial', 'B', 20);
                        $pdf->Cell(0, 20, utf8_decode('Reporte de calificación por cuatrimestre'), 0, 1, 'C');
                        
                        // Calcular el margen izquierdo para centrar la tabla
                        $tableWidth = 30 + 30 + 20 + 20 + 20 + 30 + 40; // Suma de los anchos de las columnas
                        $pageWidth = 210; // Ancho de la página A4 en mm
                        $leftMargin = ($pageWidth - $tableWidth) / 2; // Margen izquierdo para centrar la tabla
                        
                        $pdf->SetLeftMargin($leftMargin);
                        $pdf->SetX($leftMargin); // Establecer posición X para centrar la tabla
                        $pdf->SetFont('Arial', 'B', 10);
                
                        // Encabezados de la tabla
                        $pdf->Cell(30, 10, 'Matricula', 1, 0, 'C');
                        $pdf->Cell(30, 10, 'Cuatrimestre', 1, 0, 'C');
                        $pdf->Cell(20, 10, 'Parcial 1', 1, 0, 'C');
                        $pdf->Cell(20, 10, 'Parcial 2', 1, 0, 'C');
                        $pdf->Cell(20, 10, 'Parcial 3', 1, 0, 'C');
                        $pdf->Cell(30, 10, 'Promedio final', 1, 0, 'C');
                        $pdf->Cell(40, 10, 'Materia', 1, 1, 'C');
                        
                        $pdf->SetFont('Arial', '', 10);
                
                        // Datos de la tabla
                        foreach ($filteredResults as $row) {
                            $pdf->Cell(30, 10, $row["Matricula"], 1, 0, 'C');
                            $pdf->Cell(30, 10, $row["Cuatrimestre"], 1, 0, 'C');
                            $pdf->Cell(20, 10, $row["Par1"], 1, 0, 'C');
                            $pdf->Cell(20, 10, $row["Par2"], 1, 0, 'C');
                            $pdf->Cell(20, 10, $row["Par3"], 1, 0, 'C');
                            $pdf->Cell(30, 10, $row["PromFinal"], 1, 0, 'C');
                            $pdf->Cell(40, 10, $row["NombreMateria"], 1, 1, 'C'); // Mostrar el nombre de la materia
                        }
                
                        $pdf->Ln(10);
                        $pdf->Output();
                    } else {
                        echo "No se encontraron registros para el cuatrimestre especificado.";
                    }
                } else {
                    echo "No se encontraron registros.";
                }
            } else {
                echo "Por favor, ingrese un cuatrimestre válido.";
            }
        } else {
            $vista = "Vistas/Reportes/Profesor/frmConsultarCalificaciones.php";
            include_once("Vistas/Reportes/frmplantillaProfesores.php");
        }
    }
    
    
    /* FUNCION QUE ME OBTIENE TODAS LAS CALIFICACIONES SIN IMPORTAR EL CUATRIMESTRE
    public function consultarCalificacion() {
        $profesor = new clsProfesor();
        if (!empty($_POST)) {
            $cuatrimestre=$_POST['txtcuatrimestre'];
            $Consulta = $profesor->consultarCalificaciones();
    
            if ($Consulta && $Consulta->num_rows > 0) {
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 20);
                $pdf->Cell(0, 20, utf8_decode('Reporte de calificación por matrícula del alumno'), 0, 1, 'C');
                
                // Calcular el margen izquierdo para centrar la tabla
                $tableWidth = 30 + 30 + 20 + 20 + 20 + 30 + 40; // Suma de los anchos de las columnas
                $pageWidth = 210; // Ancho de la página A4 en mm
                $leftMargin = ($pageWidth - $tableWidth) / 2; // Margen izquierdo para centrar la tabla
                
                $pdf->SetLeftMargin($leftMargin);
                $pdf->SetX($leftMargin); // Establecer posición X para centrar la tabla
                $pdf->SetFont('Arial', 'B', 10);
        
                // Encabezados de la tabla
                $pdf->Cell(30, 10, 'Matricula', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Cuatrimestre', 1, 0, 'C');
                $pdf->Cell(20, 10, 'Parcial 1', 1, 0, 'C');
                $pdf->Cell(20, 10, 'Parcial 2', 1, 0, 'C');
                $pdf->Cell(20, 10, 'Parcial 3', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Promedio final', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Materia', 1, 1, 'C');
                
                $pdf->SetFont('Arial', '', 10);
        
                // Datos de la tabla
                while ($row = $Consulta->fetch_assoc()) {
                    $pdf->Cell(30, 10, $row["Matricula"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["Cuatrimestre"], 1, 0, 'C');
                    $pdf->Cell(20, 10, $row["Par1"], 1, 0, 'C');
                    $pdf->Cell(20, 10, $row["Par2"], 1, 0, 'C');
                    $pdf->Cell(20, 10, $row["Par3"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["PromFinal"], 1, 0, 'C');
                    $pdf->Cell(40, 10, $row["IDmaterias"], 1, 1, 'C');
                }
        
                $pdf->Ln(10);
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }
        } else {
            $vista = "Vistas/Reportes/Profesor/frmConsultarCalificaciones.php";
            include_once("Vistas/Reportes/frmplantillaProfesores.php");
        }
    }*/
    
    public function consultarCalificacionesxAlumno() {
        $profesor = new clsProfesor();
        if (!empty($_POST)) {
            
            // Obtener la matrícula desde POST
            $matricula = isset($_POST['txtmatricula']) ? $_POST['txtmatricula'] : null;
    
            if ($matricula) {
                // Consultar las calificaciones del alumno
                $Consulta = $profesor->consultarCalificacionesxAlumno($matricula);
        
                if ($Consulta && $Consulta->num_rows > 0) {
                    // Generar el PDF
                    $pdf = new FPDF();
                    $pdf->AddPage();
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
                    echo "No se encontraron registros.";
                }
            } else {
                echo "Matrícula no proporcionada.";
            }
        } else {
            $vista = "Vistas/Reportes/Profesor/frmConsultarCalificacionesxAlumno.php";
            include_once("Vistas/Reportes/frmplantillaProfesores.php");
        }
    }
    

public function actualizaCalificaciones() {
    if (isset($_POST['btnActualizar'])) {
        // Validar que se hayan enviado los datos de las filas
        if (isset($_POST['rows']) && is_array($_POST['rows'])) {
            // Crear instancia de la clase Profesor
            $profesor = new clsProfesor();

            // Iterar sobre cada fila
            foreach ($_POST['rows'] as $row) {
                $idCal = isset($row['idcalificacion']) ? intval($row['idcalificacion']) : null;
                $matricula = isset($row['matricula']) ? $row['matricula'] : null;
                $cuatrimestre = isset($row['cuatrimestre']) ? $row['cuatrimestre'] : null;
                $p1 = isset($row['p1']) ? floatval($row['p1']) : null;
                $p2 = isset($row['p2']) ? floatval($row['p2']) : null;
                $p3 = isset($row['p3']) ? floatval($row['p3']) : null;
                $pfinal = isset($row['pfinal']) ? floatval($row['pfinal']) : null;
                $materia = isset($row['materia']) ? $row['materia'] : null;

                if ($idCal && $matricula && $cuatrimestre && $p1 !== null && $p2 !== null && $p3 !== null && $pfinal !== null && $materia) {
                    // Llamar al método para actualizar las calificaciones
                    $profesor->actualizarCalificaciones($idCal, $matricula, $cuatrimestre, $p1, $p2, $p3, $pfinal, $materia);
                }
            }

            // Consultar las calificaciones actualizadas
            // $Consulta = $profesor->consultarCalificaciones();

            $urlFormularioAnterior = '/INTEGRADORA/index?clase=controladorProfesor&metodo=asignarCalificaciones';
            header("Location: " . $urlFormularioAnterior);
            exit();

            // Definir la vista a cargar
            $vista = "Vistas/Reportes/Profesor/frmAsignarCalificaciones.php";
            
            // Incluir la plantilla de la vista
            include_once("Vistas/Reportes/frmplantillaProfesores.php");
        } else {
            echo "Error: No se encontraron datos para actualizar.";
        }
    }
}




//_---------- ASISTENCIAS

// ESTE ES LA COPIA DE SEG BUENA DE LA FUNCIÓN XD

//    public function asignarAsistencias() {
//     session_start();
    
//     if (isset($_SESSION['usuario'])) {
//         $usr = $_SESSION['usuario'];
//         $profesor = new clsProfesor();
        
//         if (empty($_POST)) {
//             $vista = "Vistas/Reportes/Profesor/frmPreviewAsignarAsistencias.php";
//             include_once("Vistas/Reportes/frmplantillaProfesores.php");
//         } else {
//             if (isset($_POST['txtmateria'], $_POST['txtperiodo'], $_POST['txtcuatrimestre'], $_POST['txtgrupo'])) {
//                 $materia = $_POST['txtmateria'];
//                 $periodo = $_POST['txtperiodo'];
//                 $cuatrimestre = $_POST['txtcuatrimestre'];
//                 $grupo = $_POST['txtgrupo'];
            
//                 // Filtrar asistencias con el usuario
//                 $Consulta = $profesor->filtrarAsistencias($usr, $materia, $periodo, $cuatrimestre, $grupo);
        
//                 $vista = "Vistas/Reportes/Profesor/frmAsignarAsistencias.php";
//                 include_once("Vistas/Reportes/frmplantillaProfesores.php");
//             } else {
//                 echo "Error: Faltan campos en el formulario.";
//             }
//         }
//     } else {
//         echo "No hay usuario en la sesión.";
//         header("Location: Vistas/Acceso/frmLogin.php");
//         exit();
//     }
// }


public function asignarAsistencias() {
    session_start();
    
    if (isset($_SESSION['usuario'])) {
        $usr = $_SESSION['usuario'];
        $profesor = new clsProfesor();

        // Obtener las fechas únicas de asistencia
        $fechas = $profesor->obtenerFechasAsistencias();
        
        if (empty($_POST)) {
            $vista = "Vistas/Reportes/Profesor/frmPreviewAsignarAsistencias.php";
            include_once("Vistas/Reportes/frmplantillaProfesores.php");
        } else {
            if (isset($_POST['txtmateria'], $_POST['txtperiodo'], $_POST['txtcuatrimestre'], $_POST['txtgrupo'])) {
                $materia = $_POST['txtmateria'];
                $periodo = $_POST['txtperiodo'];
                $cuatrimestre = $_POST['txtcuatrimestre'];
                $grupo = $_POST['txtgrupo'];
            
                // Filtrar asistencias con el usuario
                $Consulta = $profesor->filtrarAsistencias($usr, $materia, $periodo, $cuatrimestre, $grupo);
        
                $vista = "Vistas/Reportes/Profesor/frmAsignarAsistencias.php";
                include_once("Vistas/Reportes/frmplantillaProfesores.php");
            } else {
                echo "Error: Faltan campos en el formulario.";
            }
        }
    } else {
        echo "No hay usuario en la sesión.";
        header("Location: Vistas/Acceso/frmLogin.php");
        exit();
    }
}





    // public function actualizaAsistencias() {
    //     if (isset($_POST['btnActualizar'])) {
    //         if (isset($_POST['rows']) && is_array($_POST['rows'])) {
    //             $profesor = new clsProfesor();

    //             foreach ($_POST['rows'] as $row) {
    //                 $idAsistencia = isset($row['idasistencia']) ? intval($row['idasistencia']) : null;
    //                 $horaEntrada = isset($row['horaentrada']) ? $row['horaentrada'] : null;
    //                 $fecha = isset($row['fecha']) ? $row['fecha'] : null;
    //                 $horaSalida = isset($row['horasalida']) ? $row['horasalida'] : null;
    //                 $idMatricula = isset($row['idmatricula']) ? $row['idmatricula'] : null;
    //                 $idMateria = isset($row['idmateria']) ? intval($row['idmateria']) : null;
    //                 $asistencia = isset($row['asistencia']) ? intval($row['asistencia']) : null;
    //                 $periodo = isset($row['periodo']) ? $row['periodo'] : null;
    //                 $cuatrimestre = isset($row['cuatrimestre']) ? $row['cuatrimestre'] : null;

    //                 if ($idAsistencia && $horaEntrada && $fecha && $horaSalida && $idMatricula && $idMateria && $asistencia !== null && $periodo && $cuatrimestre) {
    //                     $profesor->actualizarAsistencia($idAsistencia, $horaEntrada, $fecha, $horaSalida, $idMatricula, $idMateria, $asistencia, $periodo, $cuatrimestre);
    //                 }
    //             }

    //             $urlFormularioAnterior = '/INTEGRADORA/index?clase=controladorProfesor&metodo=asignarAsistencias';
    //             header("Location: " . $urlFormularioAnterior);
    //             exit();
    //         } else {
    //             echo "Error: No se encontraron datos para actualizar.";
    //         }
    //     }
    // }


public function actualizaAsistencias() {
    if (isset($_POST['btnActualizar'])) {
        if (isset($_POST['rows']) && is_array($_POST['rows'])) {
            $profesor = new clsProfesor();

            foreach ($_POST['rows'] as $row) {
                $idAsistencia = isset($row['idasistencia']) ? intval($row['idasistencia']) : null;
                $horaEntrada = isset($row['horaentrada']) ? $row['horaentrada'] : null;
                $fecha = isset($row['fecha']) ? $row['fecha'] : null;
                $horaSalida = isset($row['horasalida']) ? $row['horasalida'] : null;
                $idMatricula = isset($row['idmatricula']) ? $row['idmatricula'] : null;
                $nombreMateria = isset($row['nombremateria']) ? $row['nombremateria'] : null;
                $asistencia = isset($row['asistencia']) ? intval($row['asistencia']) : null;
                $periodo = isset($row['periodo']) ? $row['periodo'] : null;
                $cuatrimestre = isset($row['cuatrimestre']) ? $row['cuatrimestre'] : null;

                if ($idAsistencia && $horaEntrada && $fecha && $horaSalida && $idMatricula && $nombreMateria && $asistencia !== null && $periodo && $cuatrimestre) {
                    $profesor->actualizarAsistencia($idAsistencia, $horaEntrada, $fecha, $horaSalida, $idMatricula, $nombreMateria, $asistencia, $periodo, $cuatrimestre);
                }
            }

            // Redirigir al formulario de filtrado de asistencias
            $urlFormularioAnterior = '/INTEGRADORA/index?clase=controladorProfesor&metodo=asignarAsistencias';
            header("Location: " . $urlFormularioAnterior);
            exit();
        } else {
            echo "Error: No se encontraron datos para actualizar.";
        }
    }
}








//_----------



public function consultarAsistencia() {
    $profesor = new clsProfesor();
    
    if (!empty($_POST)) {
        // Obtener el ID de matrícula y el nombre de la materia desde POST
        $IDMatricula = isset($_POST['txtmatricula']) ? $_POST['txtmatricula'] : null;
        $NombreMateria = isset($_POST['txtmateria']) ? $_POST['txtmateria'] : null;
        
        if ($IDMatricula && $NombreMateria) {
            // Consultar las asistencias del alumno
            $asistencias = $profesor->consultarAsistencia($IDMatricula, $NombreMateria);
            
            if (!empty($asistencias)) {
                // Generar el PDF
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 20);
                $pdf->Cell(0, 20, utf8_decode('Reporte de Asistencias'), 0, 1, 'C');
                
                // Calcular el margen izquierdo para centrar la tabla
                $tableWidth = 30 + 30 + 30 + 30 + 30; // Suma de los anchos de las columnas
                $pageWidth = 210; // Ancho de la página A4 en mm
                $leftMargin = ($pageWidth - $tableWidth) / 2; // Margen izquierdo para centrar la tabla
                
                $pdf->SetLeftMargin($leftMargin);
                $pdf->SetX($leftMargin); // Establecer posición X para centrar la tabla
                $pdf->SetFont('Arial', 'B', 10);
        
                // Encabezados de la tabla
                $pdf->Cell(30, 10, 'Fecha', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Hora Entrada', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Hora Salida', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Asistencia', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Materia', 1, 1, 'C');
                
                $pdf->SetFont('Arial', '', 10);
        
                // Datos de la tabla
                foreach ($asistencias as $row) {
                    $pdf->Cell(30, 10, $row["Fecha"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["HoraEntrada"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["HoraSalida"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["Asistencia"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["NombreMateria"], 1, 1, 'C');
                }
        
                $pdf->Ln(10);
                $pdf->Output();
                
            } else {
                echo "No se encontraron registros de asistencia.";
            }
        } else {
            echo "ID de matrícula o nombre de materia no proporcionado.";
        }
    } else {
        $vista = "Vistas/Reportes/Profesor/frmConsultarAsistencia.php";
        include_once("Vistas/Reportes/frmplantillaProfesores.php");
    }
}

     public function consultarHorario() {
        $vista = "Vistas/Reportes/Profesor/frmConsultaHorario.php";
        include_once("Vistas/Reportes/frmplantillaProfesores.php");        
    }
}
?>