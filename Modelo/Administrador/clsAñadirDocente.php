
<?php
include_once 'Modelo/clsconexion.php';

class clsAñadirDocente extends clsconexion 
{
    public function AltaDocente($numTrabajador, $nomCarrera, $periodo, $cuatrimestre, $grupo, $materia, $numHorario)
    {
        // Preparar la llamada al procedimiento almacenado con todos los parámetros
        $sql = "CALL spInsertarMatxAsignatura(?, ?, ?, ?, ?, ?, ?, @pRespuesta, @pMensaje);";

        // Preparar y ejecutar la consulta
        $stmt = $this->conectar->prepare($sql);
        $stmt->bind_param('issssss', $numTrabajador, $nomCarrera, $periodo, $cuatrimestre, $grupo, $materia, $numHorario);
        $stmt->execute();

        // Recuperar los valores de los parámetros de salida
        $result = $this->conectar->query("SELECT @pRespuesta AS Respuesta, @pMensaje AS Mensaje")->fetch_assoc();
        return $result;
    }
}
?>