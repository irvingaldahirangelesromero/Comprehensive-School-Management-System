<?php
include_once 'Modelo/clsconexion.php';

class clsReportes extends clsconexion{

	
	public function ConsultaXtipobeca($beca)
	{
		$sql = "CALL spReportes(1,'$beca');";
       
		$resultado = $this->conectar->query($sql);
		
		return $resultado;
	}

	public function ConsultaXmatricula($matricula)
	{
		$sql = "CALL spReportes(2,'$matricula');";
       
		$resultado = $this->conectar->query($sql);
		
		return $resultado;
	}
}


?>
