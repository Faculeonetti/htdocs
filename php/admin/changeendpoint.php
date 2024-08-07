<?php
include_once('../db/conexion.php');
try {
  $conn = mysqli_connect($server, $usuario, $clave, $basededatos);


  // Obtener los datos enviados en la solicitud
  $data1 = json_decode(file_get_contents('php://input'), true);
  $numeroProducto = $data1['numeroProducto'];
  $nuevoValor = $data1['nuevoValor'];

  $stmt = $link->prepare("SELECT ESTADO FROM producto WHERE CODIGO = ?");
  $stmt->bind_param("i", $numeroProducto);
  $stmt->execute();
  $result = $stmt->get_result();

  // Verificar si la consulta se ejecutó correctamente
  if (!$result) {
    die('Error en la consulta: ' . $link->error);
  }

  // Obtener el primer resultado (asumiendo que solo hay uno)
  $row = $result->fetch_assoc();

  if ($row) {
    $nuevoValor = $row['ESTADO'] == 1 ? 0 : 1;
  } else {
    // Manejar el caso en que no se encontró ningún resultado
    echo "No se encontró ningún producto con el código $numeroProducto";
  }

  // Preparar y ejecutar la consulta SQL
  $stmt = $conn->prepare("UPDATE producto SET ESTADO = ? WHERE CODIGO = ?");
  $stmt->bind_param("si", $nuevoValor, $numeroProducto);
  $stmt->execute();

  // Enviar una respuesta exitosa
  echo json_encode(['message' => 'Producto actualizado correctamente']);
} catch (PDOException $e) {
  // Enviar una respuesta de error
  echo json_encode(['error' => $e->getMessage()]);
}

// Cerrar la sentencia y la conexión      
