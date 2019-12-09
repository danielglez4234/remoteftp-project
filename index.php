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
    <?php include 'php/phplogin.inc'?>
    <?php include 'php/phpsignin.inc'?>

      <header class="header">
        <img src="img/mar3.jpg" class="header_img">
        <div class="cuadro_titulo">
        <p class="titulo_pri">Obten artículos de la mayor calidad</p>
        <img class="img_pri" src="img/iconosurf.png" alt="">
        </div>
      </header>


      <nav class="cssmenu nav nav_fixed">
          <a href="index.php"><div class="logo" ></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='active li'><a href='#'>INICIO</a></li>
              <li><a href='tienda.php'>TIENDA</a></li>
              <li><a href='contacto.php'>CONTACTO</a></li>
              <button class="boton_nav" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Crear una cuenta</button>
              <?php
              $error = $_GET['idr'];
            if ($error == 1) {
              ?>
              <button style="border-color:red;color:red;" class="boton_nav" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Iniciar Sesión</button>
              <?php
            }
            else {
               ?>
               <button class="boton_nav" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Iniciar Sesión</button>
              <?php
            }
              ?>
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
              <img src="img/surficon.png" alt="" class="img_info">
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



<?php include 'php/piedepagina1.inc'?>



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
