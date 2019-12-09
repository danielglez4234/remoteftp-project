<?php
session_start();
include 'connect.inc';
 ?>
<?php
$username = $_SESSION['userlogin'];
$cantidad=$_GET['cantidad'];
$idproducto = $_GET['id_producto'];

$compra = "insert into pedidos(idcliente,fecha,estado) VALUES((select id from clientes where nombre='".$username."'),NOW(),1);";
$lineapedido= "insert into lineaspedido(idpedido,idproducto,unidades) VALUES((select pedidos.id from clientes inner join pedidos on clientes.id=pedidos.idcliente and nombre='".$username."' ORDER by id desc limit 1),$idproducto,$cantidad);";


$resultado1 = mysqli_query($connect,$compra);
$resultado1 = mysqli_query($connect,$lineapedido);
header("location: ../carrito.php");


?>
