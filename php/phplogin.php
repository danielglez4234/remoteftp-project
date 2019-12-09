<?php
include 'connect.inc';
 ?>
<?php
session_start();

$userlogin = $_POST['usuario'];
$passwd = $_POST['contrasena'];


$sql = "select * from clientes;";
$result = mysqli_query($connect,$sql);

while ($fila=mysqli_fetch_array($result)) {
  if ($userlogin==$fila['usuario'] && $passwd==$fila['contrasena'] && $fila['fax'] == 'reg') {
    $_SESSION['userlogin']=$fila['usuario'];
    $_SESSION['passwd']=$fila['contrasena'];
    $_SESSION['fax']=$fila['fax'];

    header("location: ../indexRegistrado.php");
  }
  elseif ($userlogin==$fila['usuario'] && $passwd==$fila['contrasena'] && $fila['fax'] == 'admin') {
    $_SESSION['userlogin']=$fila['usuario'];
    $_SESSION['passwd']=$fila['contrasena'];
    $_SESSION['fax']=$fila['fax'];

    header("location: ../admin/index.php");
  }


  // elseif ($userlogin!==$fila['usuario'] && $passwd===$fila['contrasena']) {
  //   header("location: ../index.php?idr=1ty");
  // }
  // elseif ($userlogin===$fila['usuario'] && $passwd!==$fila['contrasena']) {
  //   header("location: ../index.php?idr=1av");
  // }
  // elseif ($userlogin!==$fila['usuario'] && $passwd!==$fila['contrasena']) {
  //   header("location: ../index.php?idr=1zx");
  // }
  // else {
  //   header("location: ../index.php?idr=1r");
  // }

}


 ?>
