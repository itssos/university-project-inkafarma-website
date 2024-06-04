-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2023 a las 00:08:19
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inkafarma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_Categoria` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Estado` int(11) NOT NULL,
  `acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_Categoria`, `Nombre`, `Descripcion`, `Estado`, `acciones`) VALUES
(1, 'Analgésicos', 'Productos utilizados para aliviar el dolor y reducir la inflamación.', 1, NULL),
(2, 'Antibióticos', 'Medicamentos utilizados para tratar infecciones bacterianas', 1, NULL),
(3, 'Antiinflamatorios', 'Reducen la inflamación en el cuerpo', 1, NULL),
(4, 'Antihistamínicos', 'Medicamentos utilizados para tratar alergias y síntomas relacionados', 1, NULL),
(5, 'Antidepresivos', 'Medicamentos utilizados para tratar la depresión y los trastornos del estado de ánimo', 1, NULL),
(6, 'Antipiréticos', 'Medicamentos utilizados para reducir la fiebre', 1, NULL),
(7, 'Antiácidos', 'Medicamentos utilizados para aliviar la acidez estomacal y la indigestión', 1, NULL),
(8, 'Anticoagulantes', 'Medicamentos utilizados para prevenir la formación de coágulos sanguíneos', 1, NULL),
(9, 'Antiespasmódicos', 'Medicamentos utilizados para aliviar los espasmos musculares', 1, NULL),
(10, 'Antivirales', 'Medicamentos utilizados para tratar infecciones virales', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `ID_Empleado` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(40) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID_Empleado`, `Nombre`, `Apellido`, `DNI`, `Telefono`, `Correo`, `Password`, `acciones`) VALUES
(1, 'Sair', 'Marquez Hidalgo', '12345678', '999666999', 'sairmh@inkafarma.pe', 'admin', NULL),
(2, 'Aizak', 'Juarez', '12121212', '999111999', 'aizakj@gmail.com', 'admin', NULL),
(3, 'Maucer', 'Bermudez', '61616161', '999777333', 'maucer@gmail.com', 'admin', NULL),
(4, 'Sebastian', 'Simon', '21212121', '999222333', 'sebastian@gmail.com', 'admin', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Precio` double DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `Estado` int(11) NOT NULL,
  `ID_Categoria` int(11) DEFAULT NULL,
  `ID_Proveedor` int(11) NOT NULL,
  `img` varchar(1000) DEFAULT NULL,
  `acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Producto`, `Nombre`, `Descripcion`, `Precio`, `Stock`, `Estado`, `ID_Categoria`, `ID_Proveedor`, `img`, `acciones`) VALUES
(1, 'Paracetamol', 'Analgésico y antipirético para aliviar el dolor y reducir la fiebre.', 9.99, 50, 1, 1, 1, 'https://www.tylenolcentroamerica.com/sites/tylenol_cam/files/styles/product_image/public/product-images/tylenol-caja-50-tabletas_980x980_1.png', NULL),
(2, 'Ibuprofeno', 'Antiinflamatorio no esteroideo utilizado para aliviar el dolor y reducir la inflamación.', 8.99, 70, 1, 2, 2, 'https://www.hogarysalud.com.pe/wp-content/uploads/2021/07/80991.jpg', NULL),
(3, 'Omeprazol', 'Inhibidor de la bomba de protones que reduce la producción de ácido en el estómago.', 12.99, 30, 1, 3, 3, 'https://calox.com/wp-content/uploads/2022/12/OMEPRAZOL.jpg', NULL),
(4, 'Loratadina', 'Antihistamínico utilizado para aliviar los síntomas de las alergias.', 7.99, 60, 1, 4, 4, 'https://mvgapharma.com/wp-content/uploads/2021/05/Loratadina-10mg-Tableta-Lateral.jpg', NULL),
(5, 'Aspirina', 'Analgésico, antiinflamatorio y antipirético utilizado para aliviar el dolor y reducir la inflamación.', 6.99, 80, 1, 5, 5, 'https://eqf.com.mx/wp-content/uploads/2022/09/LIV008.png', NULL),
(6, 'Amoxicilina', 'Antibiótico de amplio espectro utilizado para tratar diversas infecciones bacterianas.', 11.99, 40, 1, 6, 6, 'https://quefarmacia.com/wp-content/uploads/2017/03/7503006569524_1-1.jpg', NULL),
(7, 'Clorhexidina', 'Antiséptico utilizado para desinfectar heridas y prevenir infecciones.', 8.99, 90, 1, 7, 7, 'https://farmaciauniversal.com/assets/sources/PERIO%20AID%20INTEN.CAR%200.12-500ML-19693-Farmacia%20Universal.jpg', NULL),
(8, 'Diazepam', 'Benzodiazepina utilizada para tratar la ansiedad, el insomnio y los trastornos convulsivos.', 10.99, 55, 1, 8, 8, 'https://farmacenter.cdn1.dattamax.com/userfiles/images/productos/600/2687.jpg?v=1624281555', NULL),
(9, 'Lansoprazol', 'Inhibidor de la bomba de protones utilizado para reducir la producción de ácido en el estómago.', 9.99, 65, 1, 9, 9, 'https://www.lasanteca.com/userfiles/2018/12/LANSOPRAZOL-30MG-CAJA-POR-28-CAPSULAS-INCLINADO.jpg', NULL),
(11, 'Metformina', 'Medicamento antidiabético utilizado para controlar los niveles de glucosa en sangre.', 12.99, 35, 1, 1, 1, 'https://i0.wp.com/www.boticasdelnorte.pe/wp-content/uploads/2022/01/00000620.jpg?fit=960%2C960&ssl=1', NULL),
(12, 'Simvastatina', 'Estatina utilizada para reducir los niveles de colesterol y triglicéridos en sangre.', 8.99, 85, 1, 2, 2, 'https://quefarmacia.com/wp-content/uploads/2019/09/7502223708983_4.jpg', NULL),
(13, 'Sertralina', 'Antidepresivo de la clase de los inhibidores selectivos de la recaptación de serotonina (ISRS).', 11.99, 45, 1, 3, 3, 'https://farmacenter.cdn1.dattamax.com/userfiles/images/productos/600/654719.jpg?v=1655750751', NULL),
(14, 'Pantoprazol', 'Inhibidor de la bomba de protones utilizado para reducir la producción de ácido en el estómago.', 9.99, 55, 1, 4, 4, 'https://quefarmacia.com/wp-content/uploads/2017/08/7502223702356_1.jpg', NULL),
(15, 'Atorvastatina', 'Estatina utilizada para reducir los niveles de colesterol y triglicéridos en sangre.', 10.99, 65, 1, 5, 5, 'https://farmaciaslider.pe/my-assets/image/product/dd19366dcc4530feea415f12e5a25183.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `ID_Proveedor` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `CorreoElectronico` varchar(255) DEFAULT NULL,
  `acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID_Proveedor`, `Nombre`, `Direccion`, `Telefono`, `CorreoElectronico`, `acciones`) VALUES
(1, 'P&G DISTRIBUIDORES SRL', 'Jirón Añaquito 169 B - San Miguel ', '994 616 327', 'distri_pg@hotmail.com', NULL),
(2, 'Drogueria Cobefar SAC', 'Calle Carlos Pedemonte 145 B\r\nint 3er piso - Urb. Lotización', '982 577 809', 'info@cobefar.com.pe', NULL),
(3, 'PeruFarma SA', 'Calle Sta Francisca Romana 1092, Cercado de Lima - Perú', '(511)-711 7000', 'contacto@perufarma.pe', NULL),
(4, 'J & R PERUVIAN S.A.C.', 'Jirón Carhuaz - 381 Chacra Colorada', '(+511) 240 1870', 'ventas@jrperuvian.com', NULL),
(5, 'Clinica San Jose', 'Av Jose Olaya 505', '999111222', 'contacto@sanjose.pe', NULL),
(6, 'DrogasFarmaceuticas SAC', 'Av Martin Vizcarra 112', '966888111', 'tienda@dgsfarm.com', NULL),
(7, 'GlobalFarm', 'Av Morion Calle Chacha 555', '655-1954', 'ventas@globalfarm.com', NULL),
(8, 'Pastillas Total', 'Av Lima Jr Pacifico 102', '933222111', 'compras@pastillastotal.com', NULL),
(9, 'Sanidad Asegurada', 'Av. Pepito Ortiaga 130', '988111666', 'contacto@sanidadasegurada.pe', NULL),
(10, 'Almacen Quimicos Juarez SAC', 'Av. Independencia Calle 2 111', '988666444', 'ventas@almacenjuarez.pe', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(40) DEFAULT NULL,
  `Apellido` varchar(40) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `CorreoElectronico` varchar(255) DEFAULT NULL,
  `Password` varchar(100) NOT NULL,
  `acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_Usuario`, `Nombre`, `Apellido`, `DNI`, `Direccion`, `Telefono`, `CorreoElectronico`, `Password`, `acciones`) VALUES
(1, 'Thomas', 'Condorcanqui Becker', '11001100', 'Jr Belaunde 508 Lima', '977977977', 'thomascb@gmail.com', '1234', NULL),
(2, 'Benilda', 'Hidalgo Solano', '77117711', 'AV Holanda Calle Mora 121 Ica', '999666999', 'benildahidalgo@gmail.com', '5678', NULL),
(3, 'Maria', 'Campos', '21322132', 'Av Lugar donde quien sabe 555', '987654321', 'mariacampos@gmail.com', '1234', NULL),
(4, 'Jorge', 'Pilar', '21322132', 'Av Lugar donde quien sabe 555', '987654321', 'jorgepilar@gmail.com', '1234', NULL),
(5, 'Javier', 'Ramirez', '11122132', 'Av Lugar donde quien sabe 555', '987654321', 'javier@gmail.com', '1234', NULL),
(6, 'Carlos', 'Diondo', '00022132', 'Av Lugar donde quien sabe 555', '987654321', 'carlos@gmail.com', '1234', NULL),
(7, 'Pedro', 'Casas', '99922132', 'Av Lugar donde quien sabe 555', '987654321', 'pedro@gmail.com', '1234', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID_Venta` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `Detalle_Venta` varchar(1000) NOT NULL,
  `acciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID_Venta`, `ID_Cliente`, `Fecha`, `Total`, `Detalle_Venta`, `acciones`) VALUES
(1, 1, '2023-06-19', 11, 'Paracetamol x2', NULL),
(2, 2, '2023-06-19', 27.5, 'Ibuprofeno 600mg x1', NULL),
(3, 1, '2023-05-23', 20.21, 'x2 Amoxicilina 500ml', NULL),
(5, 1, '2023-07-18', 27.97, '2 Ibuprofeno,1 Paracetamol', NULL),
(7, 1, '2023-07-18', 65.94, '4 Amoxicilina,1 Aspirina,1 Diazepam', NULL),
(8, 1, '2023-07-18', 18.98, '1 Ibuprofeno,1 Paracetamol', NULL),
(9, 2, '2023-07-18', 42.96, '3 Atorvastatina,1 Pantoprazol', NULL),
(10, 2, '2023-07-18', 86.93, '6 Metformina,1 Simvastatina', NULL),
(11, 2, '2023-07-18', 64.95, '5 Omeprazol', NULL),
(12, 2, '2023-07-18', 9.99, '1 Lansoprazol', NULL),
(13, 1, '2023-02-15', 50.55, 'x4 Paracetamol', NULL),
(14, 3, '2023-07-18', 49.95, '5 Pantoprazol', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID_Empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`),
  ADD KEY `ID_Categoria` (`ID_Categoria`),
  ADD KEY `ID_Proveedor` (`ID_Proveedor`) USING BTREE;

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID_Proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID_Venta`),
  ADD KEY `ID_Cliente` (`ID_Cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categoria` (`ID_Categoria`),
  ADD CONSTRAINT `productos_ibfk_pro` FOREIGN KEY (`ID_Proveedor`) REFERENCES `proveedores` (`ID_Proveedor`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_idcl` FOREIGN KEY (`ID_Cliente`) REFERENCES `usuarios` (`ID_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
