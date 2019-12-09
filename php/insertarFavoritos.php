<?php
session_start();
include 'connect.inc';
 ?>
<?php
$redirec_INDEX_DETALLES = $_POST['nub_index'];

  if ($redirec_INDEX_DETALLES == 1) {
    $username = $_SESSION['userlogin'];
    $idproducto = $_POST['id_producto'];

    $insert_idex = "insert into favoritos(idcliente,idproducto) VALUES((select id from clientes where nombre='".$username."'), $idproducto);";

    $resultado1 = mysqli_query($connect,$insert_idex);
    header("location: ../tiendaRegistrado.php");
  }
  elseif ($redirec_INDEX_DETALLES == 3) {
    $username = $_SESSION['userlogin'];
    $idproducto = $_POST['id_producto'];
    echo "$idproducto";
    echo "$username";
    $delete = "delete from favoritos where idcliente=(select id from clientes where nombre='".$username."') and idproducto=$idproducto";

    $resultado3 = mysqli_query($connect,$delete);
    header("location: ../favoritos.php");

  }


?>
