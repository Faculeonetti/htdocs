<?php
include_once('../db/conexion.php');
$conn = mysqli_connect($server, $usuario, $clave, $basededatos);

// Verificar la conexión
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Obtener los datos enviados desde el formulario (en formato JSON)
$data = json_decode(file_get_contents('php://input'), true);

// Preparar la sentencia SQL para insertar los datos (más segura contra inyecciones SQL)
$stmt = $conn->prepare("INSERT INTO producto (descripcion, precio, stock, estado) VALUES (?, ?, ?, 0)");
$stmt->bind_param("sid", $data['nombre'], $data['precio'], $data['stock']);
// Ejecutar la sentencia
if ($stmt->execute()) {
  echo json_encode(['message' => 'Producto cargado correctamente']);
} else {
  echo json_encode(['error' => 'Error al cargar el producto: ' . $stmt->error]);
}

// Cerrar la sentencia y la conexión      
$stmt->close();
$conn->close();
