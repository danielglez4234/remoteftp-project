<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../CSS/style.css">
  </head>
  <body>
      <?php include '../php/cabecera.inc'?>
      <?php include '../php/connect.inc'?>
      <?php
  //---------------------Comprobar usuario-------------------
          $user_name= $_SESSION['userlogin'];

          if ( (empty($_SESSION['userlogin'])) && (empty($_SESSION['passwd'])) && (empty($_SESSION['fax'])) ) {
            header("location: ../php/redireccion.php");
          }
          else {
            $sql2= "select usuario, fax from clientes where usuario = '".$user_name."';";
            $resultado2= mysqli_query($connect,$sql2);

            while ($fila3 = mysqli_fetch_array($resultado2)) {
              if ($user_name = $fila3['usuario'] && $fila3['fax'] == 'reg') {
                header("location: ../php/redireccion.php");
              }
            }
          }
       ?>
      <header class="header">
        <img src="../img/mar3.jpg" class="header_img">
        <div class="cuadro_titulo">
        <p class="titulo_pri">Obten artículos de la mayor calidad</p>
        <img class="img_pri" src="../img/iconosurf.png" alt="">
        </div>
      </header>


      <nav class="cssmenu nav nav_fixed">
          <a href="index.php"><div class="logo"></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='active li'><a href='#'>INICIO</a></li>
              <li><a href='tiendaAdmin.php'>TIENDA</a></li>
              <li><a href="productos/adminproductos.php">GESTIÓN</a></li>
              <li class="has-sub" id="user_nav"><a><img src="../img/user_color.png" alt="" class="user_img"><b class="user_nav_a"><?php echo $_SESSION['userlogin'];?></b></a>
                <ul class="li">
                    <li class="has-sub"><a href='productos/adminproductos.php'>Gestión</a></li>
                    <li class="has-sub"><a href="../php/session_destroy.php">Cerrar Sesión</a></li>
                </ul>
              </li>
          </ul>
      </nav>

      <div class="contenedor_product contenedor_product_index">
      <div class="div_titulo_product">
        <div class="triangulo_borde"></div>
        <div class="triangulo_borde_2"></div>
        <h2 class="h2_div_titulo_product h2_div_titulo_product_index">Descubre Nuestra Tienda</h2>
      </div>
      </div>

      <div class="div_fixed_info div_fixed_info_index div_fixed_info_2">
        <div class="cuadro_info">
            <div class="h1_info">
              <h1 class="">Inicia Sesión y ve las <br> mejores ofertas✮</h1>
            </div>
            <div class="div_img_info">
              <img src="../img/surficon.png" alt="" class="img_info">
            </div>
        </div>
      </div>


      <div class="contenedor_product contenedor_product_index">
      <div class="div_titulo_product">
          <div class="triangulo_borde"></div>
          <div class="triangulo_borde_2"></div>
        <h2 class="h2_div_titulo_product h2_div_titulo_product_index">Infórmate</h2>
      </div>
     </div>


      <div class="div_contenedor_mas_informacion">
        <div class="div_img_index_lateral"></div>

        <div class="div_texto_mas_info">
          <p class="info_titulo_index espacio_top">Conoce más</p>
      <div class="parrafo_info_index">
          <span class="">Montar las olas durante todo el día.
            Ese es el gran sueño de todo rider. Un sueño que en las Islas Canarias
            puede hacerse realidad. Los largos días de sol, el clima es estable y la
            temperatura del agua en torno a los 20º todo el año permiten salir a surfear
            todos los días tantas horas como se desee. Es por ello el archipiélago
            canario se ha convertido ya en un paraíso del Surf al que acuden
            aficionados de toda Europa.</span>
      </div>
          <p class="info_titulo_index">¿Eres nuevo en este mundo?</p>
      <div class="parrafo_info_index">
          <span class="">El surf se popularizó en los años 60 en muchos continentes.
            Pasando a ser practicado en casi todo el mundo. Entre los destinos más
            solicitados por los viajeros practicantes están Australia y el Sudeste Asiático.
             El surf es un deporte importante también en Latinoamérica
             con una gran cantidad de playas aptas
             para este deporte en donde podrás practicar todo lo que quieras.</span>
      </div>
          <p class="info_titulo_index">¿Te interesa entrar en contacto con nosotros?</p>
      <div class="parrafo_info_index espacio_bottom">
          <span class="">Dirígete hacia los links de contacto ubicados en la parte superior
            o inferior de nuestra página web.</span>
      </div>
        </div>
      </div>


<div class="contenedor_product contenedor_product_index">
<div class="div_titulo_product">
  <div class="triangulo_borde"></div>
  <div class="triangulo_borde_2"></div>
  <h2 class="h2_div_titulo_product h2_div_titulo_product_index">Explora y Conoce</h2>
</div>
</div>


<div class="div_fixed_info div_fixed_info_index">
  <div class="cuadro_info cuadro_info_2">
      <div class="h1_info">
        <h1 class="">Tablas, Trajes, Accesorios!!! <br>compra con nosotros</h1>
      </div>
      <div class="div_img_info">
        <img src="../img/goggles.png" alt="" class="img_info">
      </div>
  </div>
</div>



<?php
include '../php/piedepagina.inc';
 ?>


<!-- ........................Formualrio LOGin y SIGNin........................ -->
<div id="id01" class="modal">
      <form class="modal-content animate" action="php/phplogin.php" method="post">
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

 <div id="id02" class="modal">
				<form class="modal-content animate" action="php/phpsignin.php" method="post">
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
					  <input class="imput_login_signin" type="text" placeholder="Ingrese un nombre de usuario" name="usuario" required>

					  <label for="psw"><b>Contraseña</b></label>
					  <input class="imput_login_signin" type="password" placeholder="Ingrese la contraseña" name="contrasena" required>

					  <input type="submit" class="submit" value="Sign up">
					  <label>
						<input type="checkbox" checked="checked" name="remember"> Recordar Usuario y Contraseña
					  </label>
					</div>
				</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../JS/bootstrap-table-pagination.js"></script>
      <!-- menú fixed -->
      <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script> -->
      <!-- resposive menú -->
      <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> -->
      <!-- registrate aparecer -->
      <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
      <!-- slider imagenes descripcion -->
      <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

      <script src="../JS/index.js"></script>


  </body>
</html>
