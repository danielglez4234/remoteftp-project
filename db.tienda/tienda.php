<?php
header("Content-Type: text/html;charset=utf-8");

$server = "localhost";
$user = "root";
$passwd = "";
$dbnombre ="tiendaSurf";

// Conexión root ------------------------------------------------------------------------------------------------------------------------------------------------------------------
$connect = mysqli_connect($server,$user,$passwd);

if (!$connect){
  die("FALLO de conexión: ". mysqli_error($connect));
}
else{
  echo "Conexión realizada con éxito.";
}


// Crear Base de Datos
$sql = "create database if not exists `tiendaSurf`;";

if(mysqli_query($connect, $sql)){
  echo "<br>Base de datos creada con éxito.";
}
else{
  echo ("<br>ERROR al crear la base de datos: ".mysqli_error($connect));
}


// Creación del usuario adminsurf y sus privilegios
$sql = "create user 'adminsurf'@'localhost' identified by '1234';";
$sql .= "grant all privileges on tiendaSurf.* to 'adminsurf'@'localhost' with grant option;";
$sql .= "update mysql.user set create_user_priv ='Y' where user='adminsurf' and host='localhost';";
$sql .= "flush privileges;";

if(mysqli_multi_query($connect, $sql)){
  echo "<br>Usuario adminsurf creado con éxito.";
}
else{
  die("<br>ERROR al crear el usuario: ".mysqli_error($connect));
}


// Cerrar conexión de ROOT
mysqli_close($connect);

sleep(1);
// Conexión a Admin ------------------------------------------------------------------------------------------------------------------------------------------------------------------
$Adminconnect = mysqli_connect('localhost', 'adminsurf', '1234', $dbnombre);

if (!$Adminconnect){
  die("<br>FALLO de conexión al usuario Admin: ". mysqli_error($Adminconnect));
}
else{
  echo "<br>Conexión realizada con éxito a Admin.";
}

//  Base de datos: `tiendaSurf.0`

$table = "USE `tiendaSurf`;

 /*--------------------------------------------------------*/


/*----------Estructura de tabla para la tabla `clientes`----------*/


 CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `telefono` int(12) DEFAULT NULL,
  `movil` int(12) DEFAULT NULL,
  `fax` varchar(12) DEFAULT NULL,
  `direccioncalle` varchar(255) DEFAULT NULL,
  `codigopostal` varchar(255) DEFAULT NULL,
  `poblacion` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `dninif` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


 /*------Volcado de datos para la tabla `clientes`----------*/


INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `email`, `usuario`, `contrasena`, `telefono`, `movil`, `fax`, `direccioncalle`, `codigopostal`, `poblacion`, `pais`, `dninif`) VALUES
(1, 'Pepe', 'pepon', 'pepe@gmail.com', 'pepe', '1234', NULL, NULL, 'reg', NULL, NULL, NULL, NULL, NULL),
(2, 'Daniel', 'gonzalez', 'daniel@gmail.com', 'daniel', '1234', NULL, NULL, 'admin', NULL, NULL, NULL, NULL, NULL);

/* -------------------------------------------------------- */


/*------ Estructura de tabla para la tabla `productos`----------*/


 CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `muestra_descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(30,2) DEFAULT NULL,
  `peso` int(255) DEFAULT NULL,
  `tamano` int(255) DEFAULT NULL,
  `talla` varchar(255) DEFAULT NULL,
  `existencias` int(255) DEFAULT NULL,
  `activado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


/*------ Volcado de datos para la tabla `productos`----------*/


 INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `muestra_descripcion`, `precio`, `peso`, `tamano`, `talla`, `existencias`, `activado`) VALUES
(1, 'Polaroid', 'Cámara instantánea que te ofrece la posibilidad de revelar tus fotos con este tipo de formato que te estamos presentando', 'esto es una muestra1', '150.00', 1, 20, '', 7, 1),
(2, 'CMEHA VM8', 'Es un modelo de cámara analógica de tipo compacto producido por CMEHA como parte de sus serie CMEHA Colorpix', 'esto es una muestra2', '85.00', 1, 25, 'S', 17, 1),
(3, 'Nikon D740', 'El funcionamiento fácil e intuitivo permite divertirse y a la vez capturar unas fotos magníficas', 'esto es una muestra3', '110.00', 1, 20, '', 13, 1);


/* -------------------------------------------------------- */


/*------ Estructura de tabla para la tabla `imagenesproductos`----------*/


 CREATE TABLE IF NOT EXISTS `imagenesproductos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idproducto` int(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idproducto`) REFERENCES productos(`id`)
);


/*------ Volcado de datos para la tabla `imagenesproductos`----------*/


 INSERT INTO `imagenesproductos` (`id`, `idproducto`, `imagen`, `titulo`) VALUES
(1, 1, 'camara1a.jpg', 'Título'),
(2, 1, 'camara1b.jpg', 'Título'),
(3, 2, 'camara2a.jpg', 'Título'),
(4, 2, 'camara2b.jpg', 'Título'),
(5, 3, 'camara3a.jpg', 'Título'),
(6, 3, 'camara3b.jpg', 'Título');


/*--------------------------------------------------------*/


/*-----Estructura de tabla para la tabla `favoritos`------*/

 CREATE TABLE IF NOT EXISTS `favoritos` (
   `id` int(100) NOT NULL AUTO_INCREMENT,
   `idcliente` int(100) DEFAULT NULL,
   `idproducto` int(100) DEFAULT NULL,
   PRIMARY KEY (`id`),
   FOREIGN KEY (`idproducto`) REFERENCES productos(`id`),
   FOREIGN KEY (`idcliente`) REFERENCES clientes(`id`)
 );


/*--------------------------------------------------------*/
INSERT INTO `favoritos` (`idcliente`, `idproducto`) VALUES
(1, 3),
(1, 2);

/*------ Estructura de tabla para la tabla `pedidos`----------*/


 CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idcliente` int(100) DEFAULT NULL,
  `fecha` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idcliente`) REFERENCES clientes(`id`)
);


/*------ Volcado de datos para la tabla `pedidos`----------*/


 INSERT INTO `pedidos` (`id`, `idcliente`, `fecha`, `estado`) VALUES
(2, 1, '1378370611', '1'),
(3, 2, '1378370703', '1'),
(4, 2, '1378371165', '2'),
(5, 1, '1378371384', '1'),
(6, 2, '1378371744', '0'),
(7, 2, '1378371813', '0'),
(8, 1, '1378371829', '0'),
(9, 1, '1378371869', '0'),
(10, 1, '1378372025', '1'),
(11, 1, '1378373074', '0'),
(12, 1, '1378373135', '2'),
(13, 1, '1378373247', '0'),
(14, 1, '1378373329', '0'),
(15, 1, '1378373395', '0'),
(16, 1, '1378373425', '0'),
(17, 1, '1378375518', '0'),
(18, 1, '1378375558', '0'),
(19, 1, '1378391155', '0');

/* -------------------------------------------------------- */


/*------ Estructura de tabla para la tabla `lineaspedido`----------*/


 CREATE TABLE IF NOT EXISTS `lineaspedido` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idpedido` int(100) DEFAULT NULL,
  `idproducto` int(100) DEFAULT NULL,
  `unidades` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idpedido`) REFERENCES pedidos(`id`),
  FOREIGN KEY (`idproducto`) REFERENCES productos(`id`)
);


/*------ Volcado de datos para la tabla `lineaspedido`----------*/


 INSERT INTO `lineaspedido` (`id`, `idpedido`, `idproducto`, `unidades`) VALUES
(3, 5, 1, 1),
(4, 5, 2, 1),
(5, 5, 3, 1),
(6, 6, 1, 1),
(7, 6, 2, 1),
(8, 6, 3, 1),
(9, 7, 1, 1),
(10, 7, 2, 1),
(11, 7, 3, 1),
(12, 8, 1, 1),
(13, 8, 2, 1),
(14, 8, 3, 1),
(15, 9, 1, 1),
(16, 9, 2, 1),
(17, 9, 3, 1),
(18, 10, 1, 1),
(19, 10, 2, 1),
(20, 10, 3, 1),
(21, 11, 1, 1),
(22, 12, 1, 1),
(23, 13, 1, 1),
(24, 14, 1, 1),
(25, 15, 1, 1),
(26, 16, 1, 1),
(27, 17, 1, 1),
(28, 18, 1, 1),
(29, 18, 2, 1),
(30, 18, 3, 1),
(31, 19, 1, 1),
(32, 19, 2, 1),
(33, 19, 3, 1),
(34, 19, 2, 1);
";

sleep(1);

if (mysqli_multi_query($Adminconnect, $table)) {
  echo "<br>Tablas Creadas con éxito.";
}
else {
  echo "<br>ERROR al crear las tablas: " . mysqli_error($Adminconnect);
}
header("location: ../index.php");


?>
