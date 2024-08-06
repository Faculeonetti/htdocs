<div id="checkbox-produtos">
  <?php
  include_once('../db/conexion.php');
  ?>
  <table>
     <thead>
         <tr>
           <th>ACCION</th>
         </tr>
     </thead>
    <?php
    $consulta= "SELECT codigo, descripcion, precio, stock, estado FROM producto";
    $producto= $link->query($consulta);
    while($row = $producto->fetch_assoc()){
     echo "<th> <input type="."checkbox"." id=".$row["codigo"]." > </th> <tr>";
    }
    ?>
    </table>
  </div>