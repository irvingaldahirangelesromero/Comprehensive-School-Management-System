<?php
include_once 'Modelo/clsconexion.php';
//Este es el modelo clsBecas para guardar en la tabla tblbecas

class clsProfesor extends clsconexion
{
	
	public function insertarCalificaciones($matricula,$cuatrimestre,$p1,$p2,$p3,$pfinal,$materia)
	{
		$sql = "CALL spRegistrarCalificaciones('$matricula','$cuatrimestre',$p1,$p2,$p3,$pfinal,'$materia');";

		$this->conectar->query($sql);
	}

    public function filtrarCalificaciones($usr, $materia, $periodo, $cuatrimestre, $grupo) {
    $stmt = $this->conectar->prepare("CALL spFiltrarCalificaciones(?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $usr, $materia, $periodo, $cuatrimestre, $grupo);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
    }



    public function consultarCalificaciones()
	{
		$sql = "CALL spTraerCalificaciones();";

        $resultado = $this->conectar->query($sql);
        return $resultado;
	}

     
    public function consultarCalificacionesxAlumno($matricula)
	{
		$sql = "CALL spTraerCalificacionesAlumno('$matricula');";

        $resultado = $this->conectar->query($sql);
        return $resultado;
	}
	
    //------

public function filtrarAsistencias($usuario, $materia, $periodo, $cuatrimestre, $grupo) {
    $stmt = $this->conectar->prepare("CALL spFiltrarAsistencias(?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $usuario, $materia, $periodo, $cuatrimestre, $grupo);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

public function obtenerFechasAsistencias() {
    $stmt = $this->conectar->prepare("SELECT DISTINCT Fecha FROM tblasistencia ORDER BY Fecha DESC");
    $stmt->execute();
    $result = $stmt->get_result();
    $fechas = [];
    while ($row = $result->fetch_assoc()) {
        $fechas[] = $row['Fecha'];
    }
    $stmt->close();
    return $fechas;
}

//     public function actualizarAsistencia($idAsistencia, $horaEntrada, $fecha, $horaSalida, $idMatricula, $idMateria, $asistencia, $periodo, $cuatrimestre) {
//         $stmt = $this->conectar->prepare("CALL spActualizarAsistencia(?, ?, ?, ?, ?, ?, ?, ?, ?)");
//         $stmt->bind_param('issssssis', $idAsistencia, $horaEntrada, $fecha, $horaSalida, $idMatricula, $idMateria, $asistencia, $periodo, $cuatrimestre);
//         $stmt->execute();
//         $stmt->close();
//     }


public function actualizarAsistencia($idAsistencia, $horaEntrada, $fecha, $horaSalida, $idMatricula, $nombreMateria, $asistencia, $periodo, $cuatrimestre) {
    $stmt = $this->conectar->prepare("CALL spActualizarAsistencia(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Cambiar el IDmaterias a nombreMateria y manejar la conversión dentro del procedimiento
    $stmt->bind_param('issssssis', $idAsistencia, $horaEntrada, $fecha, $horaSalida, $idMatricula, $nombreMateria, $asistencia, $periodo, $cuatrimestre);
    $stmt->execute();
    $stmt->close();
}

public function consultarAsistencia($IDMatricula, $NombreMateria) {
            $sql = "CALL spTraerAsistencias(?, ?)";
            $stmt = $this->conectar->prepare($sql);
            $stmt->bind_param('is', $IDMatricula, $NombreMateria);
            $stmt->execute();
            $result = $stmt->get_result();
            $asistencias = array();
    
            while ($row = $result->fetch_assoc()) {
                $asistencias[] = $row;
            }
    
            $stmt->close();
            return $asistencias;
    
}
    //------

public function actualizarCalificaciones($idCal, $matricula, $cuatrimestre, $p1, $p2, $p3, $pfinal, $materia)
{
    $sql = "CALL spActualizarCalificaciones(?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conectar->prepare($sql);
    $stmt->bind_param("issdddds", $idCal, $matricula, $cuatrimestre, $p1, $p2, $p3, $pfinal, $materia);
    $stmt->execute();
    $stmt->close();
    $this->freeResults();
}
    private function freeResults()
    {
        while($this->conectar->more_results() && $this->conectar->next_result()) {
            if ($result = $this->conectar->store_result()) {
                $result->free();
                $stmt->close();
            }
        }
    }
}





?>