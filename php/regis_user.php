<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  

    <title>Registro de Usuario</title>
</head>

<body>
    <h1>Registro</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <br>
        <input type="submit" value="Registrar">
    </form>
    <?php
    // Incluir el archivo de conexión a la base de datos
    include_once('../php/db/conexion.php');
    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $usuario = $_POST['usuario'];
        $password = $_POST['contrasena'];
        // Hashear la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Preparar y ejecutar la consulta SQL
        $stmt = mysqli_prepare($link, "INSERT INTO `usuario`(`USUARIO`, `CONTRASENA`) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            // Registro exitoso, redirigir al usuario
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error al registrar el usuario.";
            header("Location: ../index.php");
        }
        mysqli_stmt_close($stmt);
    }
    ?>
</body>

</html>