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
  <div class="Principal-div">
    <div class="Contenedor-agregar">
      <h1>Nuevo Producto</h1>
      <form action="" method="post" class="forms" onsubmit="handleSubmit(event)">
        <div class="quantity">
          <label class="forms-label" for="nombre">Descripcion</label>
          <input class="forms-input" name="nombre" id="nombre" type="text" required>
        </div>
        <div class="inputs-vr">
          <div class="quantity">
            <label class="forms-label" for="precio">Precio</label>
            <input class="forms-input" name="precio" type="number" type="number" min="0" value="0" step="1" required>
          </div>
          <div class="quantity">
            <label class="forms-label" for="stock">Stock</label>
            <input class="forms-input" name="stock" id="stock" value="0" type="number" min="0" step="1" required>
          </div>
        </div>
        <div class="content-buttons">
          <Button class="forms-input-checkbox" type="submit" id="boton-recargar">Cargar producto</Button>
          <button class="forms-input-checkbox1" type="button" onclick="borrar()">Borrar</button>
        </div>
      </form>
    </div>
    <section class="info-a-mostrar">
      <div id="productos" class="contenedor-productos">

      </div>
      <div id="seccion-a-recargar">

      </div>
    </section>
  </div>
</body>
<script src="../../js/admin.js">
</script>

</html>

<div class="contenedor-productos"></div>
<script>

</script>