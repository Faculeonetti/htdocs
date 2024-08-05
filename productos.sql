-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2024 a las 23:45:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: productos
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla clientes
--

  CREATE TABLE clientes (
    ID int(11) NOT NULL,
    DNI int(10) NOT NULL,
    NOMBRE varchar(20) NOT NULL,
    APELLIDO varchar(20) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla linea_pedidos
  --

  CREATE TABLE linea_pedidos (
    CANTIDAD int(11) NOT NULL,
    PRECIO_VENTA int(11) NOT NULL,
    ESTADO int(11) NOT NULL,
    N_ORDER int(11) DEFAULT NULL,
    COD_PROD int(11) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla ordenes
  --

  CREATE TABLE ordenes (
    N_ORDEN int(11) NOT NULL,
    TOTAL int(11) NOT NULL,
    ESTADO int(11) NOT NULL,
    ID_CL int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla producto
  --

  CREATE TABLE producto (
    CODIGO int(11) NOT NULL,
    DESCRIPCION varchar(100) NOT NULL,
    PRECIO int(11) NOT NULL,
    STOCK int(11) NOT NULL,
    ESTADO int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla usuario
  --

  CREATE TABLE usuario (
    ID int(11) NOT NULL,
    USUARIO varchar(1000) NOT NULL,
    CONTRASENA varchar(1000) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

  --
  -- Índices para tablas volcadas
  --

  --
  -- Indices de la tabla clientes
  --
  ALTER TABLE clientes
    ADD PRIMARY KEY (ID),
    ADD UNIQUE KEY DNI (DNI);

  --
  -- Indices de la tabla linea_pedidos
  --
  ALTER TABLE linea_pedidos
    ADD KEY PK_ORD (N_ORDER),
    ADD KEY PK_PROD (COD_PROD);

  --
  -- Indices de la tabla ordenes
  --
  ALTER TABLE ordenes
    ADD PRIMARY KEY (N_ORDEN),
    ADD KEY ordenes_ibfk_1 (ID_CL);

  --
  -- Indices de la tabla producto
  --
  ALTER TABLE producto
    ADD PRIMARY KEY (CODIGO);

  --
  -- Indices de la tabla usuario
  --
  ALTER TABLE usuario
    ADD PRIMARY KEY (ID);

  --
  -- AUTO_INCREMENT de las tablas volcadas
  --

  --
  -- AUTO_INCREMENT de la tabla clientes
  --
  ALTER TABLE clientes
    MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT de la tabla ordenes
  --
  ALTER TABLE ordenes
    MODIFY N_ORDEN int(11) NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT de la tabla producto
  --
  ALTER TABLE producto
    MODIFY CODIGO int(11) NOT NULL AUTO_INCREMENT;

  --
  -- AUTO_INCREMENT de la tabla usuario
  --
  ALTER TABLE usuario
    MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

  --
  -- Restricciones para tablas volcadas
  --

  --
  -- Filtros para la tabla linea_pedidos
  --
  ALTER TABLE linea_pedidos
    ADD CONSTRAINT PK_ORD FOREIGN KEY (N_ORDER) REFERENCES ordenes (N_ORDEN),
    ADD CONSTRAINT PK_PROD FOREIGN KEY (COD_PROD) REFERENCES producto (CODIGO);

  --
  -- Filtros para la tabla ordenes
  --
  ALTER TABLE ordenes
    ADD CONSTRAINT ordenes_ibfk_1 FOREIGN KEY (ID_CL) REFERENCES clientes (ID);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
