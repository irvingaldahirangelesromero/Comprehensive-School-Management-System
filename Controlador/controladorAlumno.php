<?php
include_once 'Modelo\Alumnos\clsConsultaCalificaciones.php';
include_once 'LibreriaFPDF/fpdf.php';

class controladorAlumno
{
    public function dashboard()
    {
        $vista = "Vistas/Principal/frmcontenidoAlumno.php";
        include_once("Vistas/Reportes/frmplantillaAlumnos.php");
    }

    public function consultarCalificaciones()
    {
        session_start();
        // Verificar si la matrícula está en la sesión
        if (isset($_SESSION['usuario'])) {
            $matricula = $_SESSION['usuario'];
            
            // Crear instancia del modelo
            $modelo = new clsConsultaCalificaciones();
            
            // Consultar las calificaciones del alumno
            $resultado = $modelo->consultarCalificaciones($matricula);
            
            if ($resultado && $resultado->num_rows > 0) {
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
                while ($row = $resultado->fetch_assoc()) {
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
            echo "Matrícula no encontrada en la sesión.";
        }
    }
    
    public function consultarHorario()
    {
        $vista = "Vistas/Reportes/Alumnos/frmReporteHorario.php";
        include_once("Vistas/Reportes/frmplantillaAlumnos.php");
    }
}
?>
