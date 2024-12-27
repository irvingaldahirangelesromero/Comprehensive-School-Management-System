<?php
include_once 'Modelo/clsconexion.php';

class clsAñadirCarrera extends clsconexion 
{
    public function AltaCarreras($nombre, $logo)
    {
        $sql = "CALL spInsertarCarrera('$nombre', '$logo', @pRespuesta, @pMensaje);";
        
        $this->conectar->query($sql);
        $result = $this->conectar->query("SELECT @pRespuesta AS Respuesta, @pMensaje AS Mensaje")->fetch_assoc();
        return $result;
    }
}
?>