<?php
  include_once('../db/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include('../../common/metareferers.php');
  ?>
  <link rel="stylesheet" href="../../css/admin/admin.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
</head>
<body>  
<!-- Esto es para el formulario de ingreso de productos y stock -->
  <div class="Contenedor-agregar">
    <h1>Ingresar un producto</h1>
    <form action="" method="post" class="forms" onsubmit="handleSubmit(event)">
      <label for="nombre">Descripcion</label>
        <input name="nombre" id="nombre" type="text" required>
      <label for="precio">Precio</label>
        <input name="precio" id="precio" type="number" required>
      <label for="stock">Stock</label>
        <input name="stock" id="stock" type="number" required>
          <div class="content-buttons">
            <Button type="submit" id="boton-recargar" onclick="cargar()">Cargar producto</Button>
            <button type="button" onclick="borrar()">Borrar</button>
          </div>
    </form>
  </div>
  <section class="info-a-mostrar">
  <div id="productos" class="contenedor-productos">

  </div>
  <div id="seccion-a-recargar">
    <table>
          <thead>
                  <tr>
                      <th>ACCION</th>
                  </tr>
          </thead>
    </table>
    </div>
  </section>
</body>
<script src="../../js/admin.js">

</script>
</html>

<div class="contenedor-productos"></div>
<script>

</script>