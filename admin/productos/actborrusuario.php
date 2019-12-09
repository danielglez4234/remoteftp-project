<?php
include '../../php/connect.inc';
 ?>
<?php

function limpiar($data){
  $data=trim($data);
  $data=htmlentities($data);
  $data=htmlspecialchars($data);
  $data=stripslashes($data);

  return $data;
}


$idclient = $_POST['idcl'];
$actuborr = $_POST['ctbr'];
if ($actuborr == 1) {
  $actusu = "update clientes set nombre='".limpiar($_POST['nombre'])."', email='".limpiar($_POST['email'])."',
             usuario='".limpiar($_POST['usuario'])."', fax='".limpiar($_POST['fax'])."'
             where id = $idclient;";

            $actualizar = mysqli_query($connect, $actusu);
            header("location: adminproductos.php");
}
else {
  $borrusu = "delete from clientes where id = $idclient;";
  $sql3 = "delete from favoritos where idcliente = $idclient;";

  $borrar2 = mysqli_query($connect, $sql3);
  $borrar2 = mysqli_query($connect, $borrusu);

  header("location: adminproductos.php");
}


 ?>
