<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div id="id02" class="modal">
   				<form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
             <div class="div_img_login_form">
                 <p class="p_img_login_form">Sign up</p>
                 <img class="img_login_form" src="img/ola_tubo.jpg" alt="">
             </div>
   					<div class="imgcontainer">
   					  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
   					</div>

   					<div class="container">
               <label for="uname"><b>Nombre</b></label>
   					  <input class="imput_login_signin" type="text" placeholder="Ingresa tu nombre" name="nombre" required>

   					  <label for="uname"><b>Email</b></label>
   					  <input class="imput_login_signin" type="email" placeholder="ej@email.com" name="email" required>

               <label for="uname"><b>Nombre de usuario</b></label>
   					  <input class="imput_login_signin" type="text" placeholder="Ingrese un nombre de usuario" name="usu" required>

   					  <label for="psw"><b>Contraseña</b></label>
   					  <input class="imput_login_signin" type="password" placeholder="Ingrese la contraseña" name="contra" required>

   					  <input type="submit" class="submit" value="Sign up">
   					  <label>
   						<input type="checkbox" checked="checked" name="remember"> Recordar Usuario y Contraseña
   					  </label>
   					</div>
   				</form>
   </div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['nombre']) {
    function limpiar($data){
      $data=trim($data);
      $data=htmlentities($data);
      $data=htmlspecialchars($data);
      $data=stripslashes($data);

      return $data;
    }

    $insert = "insert into clientes(nombre,email,usuario,contrasena,fax)
               values('".limpiar($_POST['nombre'])."','".limpiar($_POST['email'])."','".limpiar($_POST['usu'])."',
               '".limpiar($_POST['contra'])."','reg')";

    mysqli_query($connect,$insert);


}
?>

  </body>
</html>
