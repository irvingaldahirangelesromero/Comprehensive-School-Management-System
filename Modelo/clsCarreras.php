<?php
include_once 'Modelo/clsconexion.php';
//Este es el modelo clsBecas para guardar en la tabla tblbecas

class clsCarreras extends clsconexion
{
	
	
	public function ConsultaBecasCatalogo()
	{
		$sql = "CALL spConsultaCarreras();";
       
		$resultado=$this->conectar->query($sql);
		return $resultado;
	}
}

?>
