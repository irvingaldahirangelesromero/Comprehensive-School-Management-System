<?php
include_once 'Modelo/clsconexion.php';

class clsReiniciarContraseña extends clsconexion
{
    public function ReiniciarContraseña($usuario, $nuevaContraseña)
    {
        $sql = "CALL spReiniciarContraseña('$usuario', '$nuevaContraseña', @pRespuesta, @pMensaje);";
        $this->conectar->query($sql);
        $result = $this->conectar->query("SELECT @pRespuesta AS Respuesta, @pMensaje AS Mensaje")->fetch_assoc();
        return $result;
    }
}
?>
