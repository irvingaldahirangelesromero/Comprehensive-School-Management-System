<?php

include_once('Modelo/clsUsuarios.php');

class controladorusuarios
{
	private $vista;
	
	public function AltaUsuarios()
	{
		$usuarios=new clsUsuarios();
		if(empty($_POST))
		{
			
			$vista="Vistas/Catalogos/frmUsuarios.php";
			include_once("Vistas/frmplantillaprivada.php");
		}
		else
		{
			$usuario=$_POST['txtUsuario'];
			$pass=$_POST['txtPassword'];
			$tel=$_POST['txtNoTelefono'];
			$email=$_POST['txtEmail'];
			$tipoUsuario=$_POST['txtTipoUsuario'];
			

			$usuarios->GuardarUsuarios($usuario,$pass,$tel,$email,$tipoUsuario);//llamo a la funcion del modelo clsAlumnos
			
			$vista="Vistas/Catalogos/frmUsuarios.php";
			include_once("Vistas/frmplantillaprivada.php");
		}
	}
	
}
?>