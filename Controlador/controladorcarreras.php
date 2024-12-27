<?php

include_once('Modelo/clsCarreras.php');

class controladorcarreras
{
	
	public function Carreras()
	{
		$becas=new clsCarreras();//modelo clsBecas
		
		$Consulta=$becas->ConsultaBecasCatalogo();
		$vista="Vistas/Publico/frmCatalogo.php";
		include_once("Vistas/frmplantillapublica.php");
	}

}
?>