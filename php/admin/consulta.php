<?php
include_once('../db/conexion.php');
?>

<table>

  <thead>
    <tr>
      <th>PRODUCTO</th>
      <th>PRECIO</th>
      <th>STOCK</th>
      <th>ESTADO</th>
    </tr>
  </thead>
  <?php
  $consulta = "SELECT codigo, descripcion, precio, stock, estado FROM producto";
  $producto = $link->query($consulta);
  while ($row = $producto->fetch_assoc()) {
    echo "<tr> <th>" . $row["descripcion"] . "</th>" . "<th>" . $row["precio"] . "</th>" . "<th>" . $row["stock"] . "</th>";
    if ($row["estado"] == 1) {
      echo "<th>Habilitado</th> ";
    } elseif ($row["estado"] == 0) {
      echo "<th>Deshabilitado</th> ";
    }
  }

  ?>