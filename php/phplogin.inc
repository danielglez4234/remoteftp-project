<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="id01" class="modal">
          <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="div_img_login_form">
                <p class="p_img_login_form">Log in</p>
                <img class="img_login_form" src="img/ola_neg.jpg" alt="">
            </div>
    					<div class="imgcontainer">
    					  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    					</div>

    					<div class="container">
    					  <label for="uname"><b>Nombre de Usuario</b></label>
    					  <input class="imput_login_signin" name="usuario" type="text" placeholder="Ingrese un nombre de usuario" name="uname" required>

    					  <label for="psw"><b>Contraseña</b></label>
    					  <input class="imput_login_signin" name="contrasena" type="password" placeholder="Ingrese la contraseña" name="psw" required>

    					  <input type="submit" class="submit" value="Registrate">
    					  <label>
    						<input type="checkbox" checked="checked" name="remember"> Recordar Usuario y Contraseña
    					  </label>
    					</div>
    			 </form>
    </div>
<?php
// include 'connect.inc';
 ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['usuario']) {
session_start();
function limpiar($data){
  $data=trim($data);
  $data=htmlentities($data);
  $data=htmlspecialchars($data);
  $data=stripslashes($data);

  return $data;
}


$userlogin = limpiar($_POST['usuario']);
$passwd = limpiar($_POST['contrasena']);


$sql = "select * from clientes;";
$result = mysqli_query($connect,$sql);

while ($fila=mysqli_fetch_array($result)) {
  if ($userlogin==$fila['usuario'] && $passwd==$fila['contrasena'] && $fila['fax'] == 'reg') {
    $_SESSION['userlogin']=$fila['usuario'];
    $_SESSION['passwd']=$fila['contrasena'];
    $_SESSION['fax']=$fila['fax'];

    header("location: indexRegistrado.php");
  }
  elseif ($userlogin==$fila['usuario'] && $passwd==$fila['contrasena'] && $fila['fax'] == 'admin') {
    $_SESSION['userlogin']=$fila['usuario'];
    $_SESSION['passwd']=$fila['contrasena'];
    $_SESSION['fax']=$fila['fax'];

    header("location: admin/index.php");
  }
}
  // header("location: ../index.php");
  echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=index.php?idr=1'>";
}

 ?>

</body>
</html>
