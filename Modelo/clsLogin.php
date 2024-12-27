<?php
include_once 'Modelo/clsconexion.php';

class clsLogin extends clsconexion
{
    public function Acceder($rol, $usuario, $password)
    {
        $sql = "CALL spLogin('$rol', '$usuario', '$password', @pRespuesta, @pMensaje);";
        $resultado = $this->conectar->query($sql);
        $result = $this->conectar->query("SELECT @pRespuesta AS Respuesta, @pMensaje AS Mensaje")->fetch_assoc();
        return $result;
    }
}
?>

