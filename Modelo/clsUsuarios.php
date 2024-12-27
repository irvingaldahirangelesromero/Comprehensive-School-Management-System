<?php
include_once 'Modelo/clsconexion.php';
//Este es el modelo clsBecas para guardar en la tabla tblbecas

class clsUsuarios extends clsconexion
{
	
	public function GuardarUsuarios($usuario,$pass,$tel,$email,$tipoUsuario)
	{
		$sql = "CALL spInsertarUsuarios('$usuario','$pass','$tel','$email','$tipoUsuario');";
       
		$this->conectar->query($sql);
	}
	
}

?>