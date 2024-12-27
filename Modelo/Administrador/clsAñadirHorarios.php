<?php
include_once 'Modelo/clsconexion.php';
    class clsAñadirHorario extends clsconexion 
    {
        public function AltaHorarios($imgHorario, $nombreCarrera)
        {
            $sql = "CALL spInsertarHorario('$imgHorario', '$nombreCarrera', @pRespuesta, @pMensaje);";

            $this->conectar->query($sql);
            $result = $this->conectar->query("SELECT @pRespuesta AS Respuesta, @pMensaje AS Mensaje")->fetch_assoc();
            return $result;
        }
    }
?>  