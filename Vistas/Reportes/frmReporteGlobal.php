

<br><br> 
  <div class="table-container">
  <table class="centered-table">
    <thead>
      <tr>
        <th>Id Beca</th>
        <th>Matrícula</th>
        <th>Promedio</th>
        <th>Tipo de beca</th>
        
      </tr>
    </thead>
    <tbody>
    
      <?php
        
            while ($fila= $Consulta->fetch_object()) {
             echo '<form class="form"  action="#" method="POST"';
                echo '<tr>';
                echo '<td> <input type="text" name="txtIdBeca" value="'.$fila->intBeca.'" readonly> </td>';
                echo '<td> <input type="text" name="txtMatricula" value="'.$fila->vchMatricula.'" readonly> </td>';
                echo '<td> <input type="text" name="txtPromedio" value="'.$fila->promedio.'" ></td>';
                echo '<td> <input type="text" name="txtTipo" value="'.$fila->vchTipoBeca.'" ></td>';
                echo '</tr>';
              echo '</form>';    
            }

      ?>
    
    </tbody>
  </table>
</div>
<form  action="/SistemaBecados/index?clase=controladorreportes&metodo=reporteBecasGlobal" method="POST">
<center>
<button type="submit" name="btnGenerar"  value="btnGenerar" class="submit-button" >Generar</button>
</center>  
</form>
