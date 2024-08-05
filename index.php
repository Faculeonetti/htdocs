<?php
session_start();
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./img/burguer.png" type="image/x-icon">
  <link rel="stylesheet" href="/css/index.css">
  <title>Murialbingo</title>
</head>
<body>
  <section class="layout">
    <div class="Options">
      <button class="Button-behavior" data-url="./php/cocina/verificacion.php">COCINA</button>
    </div>
    <div class="Options">
      <button class="Button-behavior" data-url="./php/cajero/verificacion.php">CAJERO</button>
    </div>
    <div class="Options">
      <button class="Button-behavior" data-url="./php/cliente/verificacion.php">CLIENTE</button>
    </div>
    <div class="Options">
      <button class="Button-behavior" data-url="./php/despacho/verificacion.php">DESPACHO</button>
    </div>
    <div class="Options">
      <button class="Button-behavior" data-url="./php/admin/verificacion.php">ADMIN</button>
    </div>
    <div class="Options">
      <button class="Button-behavior" data-url="./php/nosotros/verificacion.php">NOSOTROS</button>
    </div>
  </section>
  <section class="layout">
    <div class="showinfo">
        <h1 id="idshowoption"></h1>
        <form id="login" method="post">
            <input class="Input-info" type="text" placeholder="Ingrese usuario" name="Usuario" required >
            <input class="Input-info" type="password" placeholder="ingrese contraseña" name="Contraseña" required>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
          <button type="submit" class="submit-button">Ingresar</button>    
        </form>
        <div class="container-buttons" id="div1">
          <a href="./php/regis_user.php">Sign In</a>
          <a href="">Forgot password</a>
        </div>
    </div>
  </section>
</body>
<script src="./js/index.js"></script>
</html>