<?php
include_once 'Modelo/clsconexion.php';

class clsConsultaHorarios extends clsconexion
{
    public function consultarHorarios($nombreCarrera, $cuatrimestre, $grupo)
    {
        // Llamada al procedimiento almacenado
        $sql = "CALL spTraerHorarios('$nombreCarrera', '$cuatrimestre', '$grupo', @mensaje);";
        $result = $this->conectar->query($sql);

        if ($result) {
            // Liberar resultados de la primera consulta
            $this->conectar->next_result();
            
            // Obtener el mensaje del procedimiento almacenado
            $res = $this->conectar->query("SELECT @mensaje as mensaje;");
            if ($res) {
                $row = $res->fetch_assoc();
                $mensaje = $row['mensaje'];
                $res->free();  // Liberar el conjunto de resultados
                if ($mensaje == 'Consulta exitosa.') {
                    return $result;  // Devolver el resultado de la consulta
                } else {
                    echo "<script>alert('$mensaje');</script>";
                    return false;
                }
            } else {
                echo "<script>alert('Error al obtener el mensaje del procedimiento.');</script>";
                return false;
            }
        } else {
            echo "<script>alert('Error al consultar los horarios.');</script>";
            return false;
        }
    }
}

?>