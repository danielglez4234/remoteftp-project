<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
      <?php include 'php/cabecera.inc'?>
      <?php include 'php/connect.inc'?>
      <?php
  //---------------------Comprobar usuario-------------------
          $user_name= $_SESSION['userlogin'];

          if ( (empty($_SESSION['userlogin'])) && (empty($_SESSION['passwd'])) && (empty($_SESSION['fax'])) ) {
            header("location: php/redireccion.php");
          }
          else {
            $sql2= "select usuario, fax from clientes where usuario = '".$user_name."';";
            $resultado2= mysqli_query($connect,$sql2);

            while ($fila3 = mysqli_fetch_array($resultado2)) {
              if ($user_name = $fila3['usuario'] && $fila3['fax'] == 'admin') {
                header("location: php/redireccion.php");
              }
            }
          }
       ?>
      <header class="header">
        <img src="img/mar3.jpg" class="header_img">
        <div class="cuadro_titulo">
        <p class="titulo_pri">Obten artículos de la mayor calidad</p>
        <img class="img_pri" src="img/iconosurf.png" alt="">
        </div>
      </header>


      <nav class="cssmenu nav nav_fixed">
          <a href="indexRegistrado.php"><div class="logo"></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='active li'><a href='#'>INICIO</a></li>
              <li><a href='tiendaRegistrado.php'>TIENDA</a></li>
              <li><a href='favoritos.php'>FAVORITOS</a></li>
              <li><a href='contactoRegistrado.php'>CONTACTO</a></li>
              <li class="has-sub" id="user_nav"><a><img src="img/user_b.png" alt="" class="user_img"><b class="user_nav_a"><?php echo $_SESSION['userlogin'];?></b></a>
                <ul class="li">
                    <li class="has-sub"><a href='favoritos.php'>Favoritos</a></li>
                    <li class="has-sub"><a href='carrito.php'>Carrito de compras</a></li>
                    <li class="has-sub"><a href='historial.php'>Historial de compras</a></li>
                    <li class="has-sub"><a href="php/session_destroy.php">Cerrar Sesión</a></li>
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

      <div class="div_fixed_info">
        <div class="cuadro_info ">
            <div class="h1_info">
              <h1 class="">Encuentra la mayor calidad <br>y los mejores precios✮</h1>
            </div>
            <div class="div_img_info">
              <img src="img/tabla5.png" alt="" class="img_info">
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
        <img src="img/goggles.png" alt="" class="img_info">
      </div>
  </div>
</div>


<?php include 'php/piedepagina2.inc'?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="JS/bootstrap-table-pagination.js"></script>
      <!-- menú fixed -->
      <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script> -->
      <!-- resposive menú -->
      <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> -->
      <!-- registrate aparecer -->
      <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
      <!-- slider imagenes descripcion -->
      <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

      <script src="JS/index.js"></script>


  </body>
</html>
