<?php

include_once('Modelo/clsBecas.php');

class controladorbecas
{
	private $vista;
	
	public function AltaBecas()
	{
		$becas=new clsBecas();//modelo clsBecas
		if(empty($_POST))
		{
			$Consulta=$becas->ConsultaBecas();
			$vista="Vistas/Catalogos/frmBecas.php";
			include_once("Vistas/Reportes/frmplantillaProfesores.php");
		}
		else
		{
			$nombreBeca=$_POST['txtbeca'];
			$monto=$_POST['txtmonto'];
			$imagen = $_FILES['imagen'];
			
			// Manejo de la subida de la imagen

            $carpeta = "img/";
            $nombreimagen = basename($imagen["name"]);
            $tipoiamgen = strtolower(pathinfo($nombreimagen, PATHINFO_EXTENSION));
            move_uploaded_file($imagen["tmp_name"], $carpeta.$nombreimagen);

			$becas->GuardarBecas($nombreBeca,$monto,$nombreimagen);//llamo a la funcion del modelo clsBecas
			$Consulta=$becas->ConsultaBecas();
			$vista="Vistas/Catalogos/frmBecas.php";
			include_once("Vistas/frmplantillaprivada.php");
		}
	}
	public function EliminaActualizaBecas()
	{
			if(isset($_POST['btnEliminar']))
			{
				$becas=new clsBecas();//modelo clsBecas	
				$id=$_POST['txtIdBeca'];
				$becas->EliminarBecas($id);
				$Consulta=$becas->ConsultaBecas();
				$vista="Vistas/Catalogos/frmBecas.php";
				include_once("Vistas/frmplantillaprivada.php");
			}
			else if(isset($_POST['btnActualizar']))
			{
				$becas=new clsBecas();//modelo clsBecas	
				
				$id=$_POST['txtIdBeca'];
				$NombreBeca=$_POST['txtNombre'];
				$Monto=$_POST['txtMonto'];

				$becas->ActualizarBecas($id,$NombreBeca,$Monto);
				$Consulta=$becas->ConsultaBecas();
				$vista="Vistas/Catalogos/frmBecas.php";
				include_once("Vistas/frmplantillaprivada.php");
			}
	}
	public function Becas()
	{
		$becas=new clsBecas();//modelo clsBecas
		
		$Consulta=$becas->ConsultaBecasCatalogo();
		$vista="Vistas/Publico/frmCatalogo.php";
		include_once("Vistas/frmplantillapublica.php");
	}

}
?>