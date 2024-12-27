<?php

include_once 'Modelo/clsReportes.php';
include_once 'LibreriaFPDF/fpdf.php';

class controladorreportes
{
	private $vista;
	
	public function reporteBecas()
	{	
	
		$becas=new clsReportes();//clase que esta en el modelo
        if(!empty($_POST))
		{
            //recibo la caja de texto del formulario html
            $tipobeca=$_POST['txtbeca'];
           
            // Crear el objeto FPDF
		    $pdf = new FPDF();
		
		    // Agregar una página
		    $pdf->AddPage();
		    $pdf->Cell(190,30,$pdf->Image('./img/becas.png',130,12,60,30),0,1,'R');
		
		    // Establecer la fuente y el tamaño del título
		    $pdf->SetFont('Arial', 'B', 20);
            
		    $pdf->Cell(0, 20,utf8_decode('Reporte por tipo de beca'), 0, 1, 'C');

		    // Consulta a la base de datos
            
            $Consulta=$becas->ConsultaXtipobeca($tipobeca);	 
               
		    //Centrar la tabla
            $pdf->SetLeftMargin(10);
            if ($Consulta->num_rows > 0) {
        
                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);

                // Imprimir los encabezados de la tabla
                $pdf->Cell(40, 10, 'Nombre', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Apellido Paterno', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Apellido Materno', 1, 0, 'C');
                $pdf->Cell(20, 10, 'Promedio', 1, 0, 'C');
                $pdf->Cell(50, 10, 'Tipo de Beca', 1, 1, 'C');
            
                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 10);

                // Imprimir los datos de la tabla
                while ($row = $Consulta->fetch_assoc()) {
                    $pdf->Cell(40, 10, $row["vchNombre"], 1, 0, 'L');
                    $pdf->Cell(40, 10, $row["vchAPaterno"], 1, 0, 'C');
                    $pdf->Cell(40, 10, $row["vchAMaterno"], 1, 0, 'C');
                    $pdf->Cell(20, 10, $row["promedio"], 1, 0, 'C');
                    $pdf->Cell(50, 10, $row["vchTipoBeca"], 1, 1, 'C');
                   
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                $becas->conectar->close();
                // Mostrar el PDF
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }

           
            //******************	
            
           
        }else
        {
            $vista="Vistas/Reportes/frmReportes.php";
			include_once("Vistas/frmplantillaprivada.php");
        }

    }
    
    public function reportePorMatricula()
    {
        $becas=new clsReportes();//clase que esta en el modelo
        if(!empty($_POST))
        {
            //recibo la caja de texto del formulario html
            $matricula=$_POST['txtmatricula'];
           
            // Crear el objeto FPDF
            $pdf = new FPDF();
        
            // Agregar una página
            $pdf->AddPage();
          //IMAGEN DE BECAS EN PDF !!!DA ERROR!!  $pdf->Cell(190,30,$pdf->Image('./img/becas.png',130,12,60,30),0,1,'R');
        
            // Establecer la fuente y el tamaño del título
            $pdf->SetFont('Arial', 'B', 20);
            
            $pdf->Cell(0, 20,utf8_decode('Reporte por matricula del alumno'), 0, 1, 'C');

            // Consulta a la base de datos
            
            $Consulta=$becas->ConsultaXmatricula($matricula);  
            
            
            //Centrar la tabla
            $pdf->SetLeftMargin(10);
            if ($Consulta->num_rows > 0) {
        
                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);

                // Imprimir los encabezados de la tabla
                $pdf->Cell(20, 10, 'Matricula', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Nombre', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Apellido Paterno', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Apellido Materno', 1, 0, 'C');
                $pdf->Cell(20, 10, 'Promedio', 1, 0, 'C');
                $pdf->Cell(30, 10, 'Tipo de Beca', 1, 1, 'C');
            
                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 10);

                // Imprimir los datos de la tabla
                while ($row = $Consulta->fetch_assoc()) {
                    $pdf->Cell(20, 10, $row["vchMatricula"], 1, 0, 'L');
                    $pdf->Cell(30, 10, $row["vchNombre"], 1, 0, 'L');
                    $pdf->Cell(40, 10, $row["vchAPaterno"], 1, 0, 'C');
                    $pdf->Cell(40, 10, $row["vchAMaterno"], 1, 0, 'C');
                    $pdf->Cell(20, 10, $row["promedio"], 1, 0, 'C');
                    $pdf->Cell(30, 10, $row["vchTipoBeca"], 1, 1, 'C');
                   
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                $becas->conectar->close();
                // Mostrar el PDF
                $pdf->Output();
            } else {
                echo "No se encontraron registros.";
            }

           
            //******************    
            
           
        }else
        {
            $vista="Vistas/Reportes/frmReportePorMatricula.php";
            include_once("Vistas/Reportes/frmplantillaProfesores.php");
        }

    }
}
?>