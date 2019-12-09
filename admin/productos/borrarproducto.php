<?php
include '../../php/connect.inc';
 ?>
<?php
$iden = $_POST['idse'];
$rutadestino = $_POST['ruta_destino'];

if ($rutadestino == 'shopAdmin') {
  $sql4 = "delete from favoritos where idproducto=".$iden.";";
  $sql3 = "delete from favoritos where idproducto=".$iden.";";
  $sql2 = "delete from imagenesproductos where idproducto=".$iden.";";
  $sql =  "delete from productos where id=".$iden.";";

   mysqli_query($connect, $sql4);
   mysqli_query($connect, $sql3);
   mysqli_query($connect, $sql2);
   mysqli_query($connect, $sql);

  header("location: ../tiendaAdmin.php");
}
elseif ($rutadestino == 'adminProduct') {
  $sqls4 = "delete from lineaspedido where idproducto=".$iden.";";
  $sqls3 = "delete from favoritos where idproducto=".$iden.";";
  $sqls2 = "delete from imagenesproductos where idproducto=".$iden.";";
  $sqls =  "delete from productos where id=".$iden.";";

   mysqli_query($connect, $sqls4);
   mysqli_query($connect, $sqls3);
   mysqli_query($connect, $sqls2);
   mysqli_query($connect, $sqls);

  header("location: adminproductos.php");
}



?>
