<div id="checkbox-produtos">
  <?php
  include_once('../db/conexion.php');
  ?>
  <table class="tabla-conectada">
    <thead>
      <tr>
        <th class="x-small">H/D</th>
        <th>BORRAR</th>
      </tr>

    </thead>
    <?php
    $consulta = "SELECT codigo, descripcion, precio, stock, estado FROM producto";
    $producto = $link->query($consulta);
    while ($row = $producto->fetch_assoc()) {

      if ($row["estado"] == 1) {
        echo "
                <tr>
                <th class='x-small'>  

        <div class=" . "checkbox-wrapper-7" . ">
           <input class='tgl tgl-ios'  id=" . "cb2-" . $row["codigo"] . " type=" . "checkbox" . " checked/>
           <label class=" . "tgl-btn" . " for=" . "cb2-" . $row["codigo"] . ">
         </div>
        </th>";
        echo "  
      <th> 
         <button type=" . "button" . " id=" . $row["codigo"] . " onclick='borrarProducto()' >BORRAR</button>
      </th>
              </tr>
        ";
      } else {
        echo "
                 <tr>
                 <th class='x-small'> 

         <div class=" . "checkbox-wrapper-7" . ">
            <input class='tgl tgl-ios'  id=" . "cb2-" . $row["codigo"] . " type=" . "checkbox" . " />
            <label class=" . "tgl-btn" . " for=" . "cb2-" . $row["codigo"] . ">
          </div>
         </th>";
        echo "  
         <th> 
         <button type=" . "button" . " id=" . $row["codigo"] . ">BORRAR</button>
         </th>
          </tr>
           ";
      }
    }
    ?>
  </table>

</div>