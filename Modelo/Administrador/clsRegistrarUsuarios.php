<?php
include_once 'Modelo/clsconexion.php';

class clsRegistrarUsuario extends clsconexion 
{
    public function registrarUsuario($tipoUsuario, $usuario, $contraseña, $telefono, $correo)
    {
        $sql = "CALL spInsertarUsuario('$tipoUsuario', '$usuario', '$contraseña', '$telefono', '$correo', @pRespuesta, @pMensaje);";
        
        $this->conectar->query($sql);
        $result = $this->conectar->query("SELECT @pRespuesta AS Respuesta, @pMensaje AS Mensaje")->fetch_assoc();
        return $result;
    }
}
?>
