<form class="form" action="/INTEGRADORA/index?clase=controladorbecas&metodo=AltaCalificaciones" method="POST" enctype="multipart/form-data">
    <h2>ALTA DE CALIFICACIONES</h2>
    
    <div class="form-group">
      <label for="matricula">Matricula</label>
      <input type="text" id="matricula" name="txtmatricula" required placeholder="Ingrese la matricula">
    </div>
    <div class="form-group">
      <label for="p1">Parcial 1:</label>
      <input type="text" id="p1" name="txtp1" required placeholder="Ingrese la calificación del parcial 1">
    </div>
    <div class="form-group">
      <label for="p2">Parcial 2:</label>
      <input type="text" id="p2" name="txtp2" required placeholder="Ingrese la calificación del parcial 2">
    </div>
    <div class="form-group">
      <label for="p3">Parcial 3:</label>
      <input type="text" id="p3" name="txtp3" required placeholder="Ingrese la calificación del parcial 3">
    </div>
    <div class="form-group">
      <button type="submit">Guardar</button>
    </div>
</form>

<div class="table-container">
  <table class="centered-table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre del alumno</th>
        <th>P1</th>
        <th>P2</th>
        <th>P3</th>
        <th>Final</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>
    
     <center><label for="p2">Actualize y elimine los datos que lo requieran:</label></center>
      <?php
            while ($todasbecas= $Consulta->fetch_object()) {
              echo '<form class="form" action="/SistemaBecados/index?clase=controladorbecas&metodo=EliminaActualizaBecas" method="POST">';
                echo '<tr>';
                echo '<td> <input type="text" name="txtIdAlumno" value="'.$todasbecas->idTipoBeca.'" readonly> </td>';
                echo '<td> <input type="text" name="txtNombre" value="'.$todasbecas->vchTipoBeca.'" ></td>';
                echo '<td> <input type="text" name="txtp1" value="'.$todasbecas->fltMonto.'" ></td>';
                echo '<td> <input type="text" name="txtp2" value="'.$todasbecas->fltMonto.'" ></td>';
                echo '<td> <input type="text" name="txtp3" value="'.$todasbecas->fltMonto.'" ></td>';
                echo '<td> <input type="text" name="txtProm" value="'.$todasbecas->fltMonto.'" ></td>';
                echo '<td width=250>';
                echo '<button type="submit" name="btnEliminar" value="btnEliminar" class="submit-button">Eliminar</button>';
                echo '&nbsp;';
                echo '<button type="submit" name="btnActualizar" value="btnActualizar" class="submit-button">Actualizar</button>';
                echo '</td>';
                echo '</tr>';
                
                echo '</form>';
            }
      
      ?>
    
    </tbody>
  </table>
</div>
