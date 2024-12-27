<div class="table-container">
  <form class="form tbl" action="/INTEGRADORA/index?clase=controladorProfesor&metodo=actualizaCalificaciones" method="POST">
    <table class="centered-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Matricula</th>
          <th>Cuatrimestre</th>
          <th>P1</th>
          <th>P2</th>
          <th>P3</th>
          <th>Final</th>
          <th>Materia</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($Consulta) && $Consulta->num_rows > 0) {
            $i = 0;
            while ($todasProfesor = $Consulta->fetch_object()) {
                echo '<tr>';
                echo '<td><input type="hidden" name="rows['.$i.'][idcalificacion]" value="'.$todasProfesor->IDcalificaciones.'"> '.$todasProfesor->IDcalificaciones.'</td>';
                echo '<td><input type="text" name="rows['.$i.'][matricula]" value="'.$todasProfesor->Matricula.'"></td>';
                echo '<td><input type="text" name="rows['.$i.'][cuatrimestre]" value="'.$todasProfesor->Cuatrimestre.'"></td>';
                echo '<td><input type="text" name="rows['.$i.'][p1]" value="'.$todasProfesor->Par1.'"></td>';
                echo '<td><input type="text" name="rows['.$i.'][p2]" value="'.$todasProfesor->Par2.'"></td>';
                echo '<td><input type="text" name="rows['.$i.'][p3]" value="'.$todasProfesor->Par3.'"></td>';
                echo '<td><input type="text" name="rows['.$i.'][pfinal]" value="'.$todasProfesor->PromFinal.'"></td>';
                echo '<td><input type="text" name="rows['.$i.'][materia]" value="'.$todasProfesor->NombreMateria.'"></td>';
                echo '</tr>';
                $i++;
            }
        } else {
            // echo '<tr><td colspan="8">No se encontraron registros.</td></tr>';
            // echo '<tr><td colspan="8">Número de filas: ' . $Consulta->num_rows . '</td></tr>';
        }
        ?>
      </tbody>
    </table>
    <div class="form-group">
      <button type="submit" name="btnActualizar" value="btnActualizar" class="submit-button">Actualizar Todo</button>
    </div>
  </form>
</div>
