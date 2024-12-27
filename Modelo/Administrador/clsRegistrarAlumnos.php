<?php
include_once 'Modelo/clsconexion.php';

class clsRegistrarAlumnos extends clsconexion 
{
    public function registrarAlumnos($matricula, $nombre, $apaterno, $amaterno, $horario, $sexo, $tutor)
    {
        $sql = "CALL spInsertarAlumnos('$matricula', '$nombre', '$apaterno', '$amaterno', '$horario', '$sexo', '$tutor', @pMensaje, @pRespuesta);";
        
        $this->conectar->query($sql);
        $result = $this->conectar->query("SELECT @pRespuesta AS Respuesta, @pMensaje AS Mensaje")->fetch_assoc();
        return $result;
    }
}
?>