<?php
include_once 'Modelo/clsconexion.php';

class clsConsultaCalificaciones extends clsconexion
{
    public function consultarCalificaciones($matricula)
    {
        $sql = "CALL spTraerCalificacionesAlumno('$matricula');";
        
        $result = $this->conectar->query($sql);

        return $result;
    }
}
?>
