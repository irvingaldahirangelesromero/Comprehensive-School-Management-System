<div class="table-container">
    <form class="form tbl" action="/INTEGRADORA/index?clase=controladorProfesor&metodo=actualizaAsistencias" method="POST">
        <table class="centered-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hora Entrada</th>
                    <th>Fecha</th>
                    <th>Hora Salida</th>
                    <th>Matricula</th>
                    <th>Materia</th>
                    <th>Asistencia</th>
                    <th>Periodo</th>
                    <th>Cuatrimestre</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $Consulta->fetch_assoc()): ?>
                    <tr>
                        <td><input type="hidden" name="rows[<?php echo $row['IDasistencias']; ?>][idasistencia]" value="<?php echo $row['IDasistencias']; ?>"><?php echo $row['IDasistencias']; ?></td>
                        <td><input type="time" name="rows[<?php echo $row['IDasistencias']; ?>][horaentrada]" value="<?php echo $row['HoraEntrada']; ?>"></td>
                        <td><input type="date" name="rows[<?php echo $row['IDasistencias']; ?>][fecha]" value="<?php echo $row['Fecha']; ?>"></td>
                        <td><input type="time" name="rows[<?php echo $row['IDasistencias']; ?>][horasalida]" value="<?php echo $row['HoraSalida']; ?>"></td>
                        <td><input type="text" name="rows[<?php echo $row['IDasistencias']; ?>][idmatricula]" value="<?php echo $row['IDmatricula']; ?>"></td>
                        <td><input type="text" name="rows[<?php echo $row['IDasistencias']; ?>][nombremateria]" value="<?php echo $row['NombreMateria']; ?>" readonly></td>
                        <td><input type="number" name="rows[<?php echo $row['IDasistencias']; ?>][asistencia]" value="<?php echo $row['Asistencia']; ?>"></td>
                        <td><input type="text" name="rows[<?php echo $row['IDasistencias']; ?>][periodo]" value="<?php echo $row['Periodo']; ?>"></td>
                        <td><input type="text" name="rows[<?php echo $row['IDasistencias']; ?>][cuatrimestre]" value="<?php echo $row['Cuatrimestre']; ?>"></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button type="submit" name="btnActualizar">Actualizar Asistencias</button>
    </form>
</div>
