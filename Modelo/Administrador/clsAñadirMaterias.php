<?php
include_once 'Modelo/clsconexion.php';

class clsAñadirMaterias extends clsconexion 
{
    public function AltaMaterias($nombreMateria, $nivel, $horas)
    {
        $sql = "CALL spInsertarMaterias('$nombreMateria', '$nivel', $horas, @pRespuesta, @pMensaje);";
        $this->conectar->query($sql);
        $result = $this->conectar->query("SELECT @pRespuesta AS Respuesta, @pMensaje AS Mensaje")->fetch_assoc();
        return $result;
    }
}
?>
