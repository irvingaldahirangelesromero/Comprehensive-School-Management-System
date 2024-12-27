<?php


include_once 'LibreriaFPDF/fpdf.php';

class controladorprincipal
{
	private $vista;
	
	
	public function publico()
	{	
		$vista="Vistas/Principal/frmcontenidopublico.php";
        include_once("Vistas/frmplantillapublica.php");
    }
    public function alumnos()
	{	
		$vista="Vistas/Principal/frmcontenidoAlumno.php";
        include_once("Vistas/Reportes/frmplantillaAlumnos.php");
    }

	public function profesores()
	{	
		$vista="Vistas/Principal/frmcontenidoProfesor.php";
        include_once("Vistas/Reportes/frmplantillaProfesores.php");
    }

	public function admin()
	{	
		$vista="Vistas/Principal/frmcontenidoAdmin.php";
        include_once("Vistas/Reportes/frmplantillaAdministrador.php");
    }
}
?>