<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/burguer.png" type="image/x-icon">
</head>
<body>
<div id="loading-screen" class="loading">
  <img src="../../img/Dual Ring@1x-1.0s-200px-200px (1).gif" alt="">
</div>


<div id="content">
<?php
session_start();
if (isset( $_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    include_once('../../php/db/conexion.php');
    $usuario = $_POST['Usuario'];
    $password = $_POST['Contraseña'];
    
    $stmt = mysqli_prepare($link, "SELECT contrasena FROM usuario WHERE usuario = ?");
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);

    // Obtener el resultado como un objeto de resultado
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashed_password = $row['contrasena'];

        if (password_verify($password, $hashed_password)) {
            echo "usuario y contraseña correctos";
            header("Location: ../../php/admin/admin.php");
        } else {
            echo "usuario y contraseña incorrectos";
            header("Location: ../../index.php");
        }
    } else {
        echo "<p>Usuario no encontrado</p>";
        header("Location: ../../index.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);

} else {
    header("Location: ../../index.php");
}

?>
  </div>
</body>
<script>
window.onload = function() {
    document.getElementById('loading-screen').style.display = 'none';
    document.getElementById('content').style.display = 'block';
};
</script>
<style>
  .loading {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: white;
  display: flex;
  justify-content: center;
  align-items: center;  

  z-index: 9999;
}

.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg);  
 
 }
}
</style>
</html>
