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
        <img src="img/surf3.jpg" class="header_img header_img_detalles">
        <div class="cuadro_titulo">
        <p class="titulo_pri titulo_ges">Tienda</p>
        </div>
      </header>


      <nav class="cssmenu nav nav_fixed">
          <a href="index.php"><div class="logo" ></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='li'><a href='index.php'>INICIO</a></li>
              <li class='active'><a href='#'>TIENDA</a></li>
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


<div id='tabl' class="contenedor_product">
<div class="div_titulo_product">
  <h2 class="h2_div_titulo_product">Tablas</h2>
  <hr class="hr">
</div>

  <?php
   header('Content-type: text/html;charset=UTF-8');

   $nombimg = " select * from imagenesproductos inner join productos
               on productos.id = imagenesproductos.idproducto
               and talla = ''
               and productos.activado = '1' and existencias > 0 group BY productos.id DESC;";

   $resultado = mysqli_query($connect, $nombimg);

echo "<div class='product'>";

echo "<table id='myTablePr' class='table_producto_pag'>";
  echo "<tbody class='tbody_product'>";

   while ($fila = mysqli_fetch_array($resultado)) {
     echo "<tr class='table_producto_tr'>";
           echo  "<td>";

      echo "<a href='producto.php?id=".$fila['id']."'>";
     echo "<div class='contenedor'>";
         echo "<img title='producto' class='img' src=\"photo/".$fila['imagen']."\"max-width=\"100px\" \"height=\"100px\">";
         echo "<div class='contenedor2'>";
            echo "<h3 align='center'><strong>".$fila['nombre']."</strong></h3>";
            echo "<p align='center'>".$fila['muestra_descripcion']."</p>";
                 echo "<div class='price'>";
                     echo "<p class='precio' align='center'>".$fila['precio']." €</p>";
                 echo "</div>";
         echo "</div></a>";
         ?>
         <a  onclick="document.getElementById('id01').style.display='block'"><img src="img/carrito.png" class="icono_añadir"/></a>
         <a  onclick="document.getElementById('id01').style.display='block'"><img src="img/corazon.png" class="icono_añadir icono_añadir_favoritos"/></a>
         <?php
     echo "</div>";

     echo "</td>";
  echo  "</tr>";
   }
 echo "</tbody>";
echo "</table>";
echo "</div>";
   ?>
 <ul class="pagination pagination-lg pager" id="myPagerPr"></ul>
</div>







<div id='nov' class="div_fixed_info">
  <div class="cuadro_info">
      <div class="h1_info">
        <h1 class="">Inicia Sesión y ve las <br> mejores ofertas✮</h1>
      </div>
      <div class="div_img_info">
        <img src="img/surficon.png" alt="" class="img_info">
      </div>
  </div>
</div>






<div id='neop' class="contenedor_product">
<div class="div_titulo_product">
  <h2 class="h2_div_titulo_product">Neoprenos</h2>
  <hr class="hr">
</div>

  <?php
   header('Content-type: text/html;charset=UTF-8');

   $nombimg = " select * from imagenesproductos inner join productos
               on productos.id = imagenesproductos.idproducto
               and length(talla) = 1
               and productos.activado = '1' and existencias > 0 group BY productos.id DESC;";

   $resultado = mysqli_query($connect, $nombimg);

echo "<div class='product'>";

echo "<table id='myTablePrTr' class='table_producto_pag'>";
  echo "<tbody class='tbody_product'>";

   while ($fila = mysqli_fetch_array($resultado)) {
  echo "<tr class='table_producto_tr'>";
      echo  "<td>";

    echo "<a href='producto.php?id=".$fila['id']."'>";
     echo "<div class='contenedor'>";
         echo "<img class='img' src=\"photo/".$fila['imagen']."\"max-width=\"100px\" \"height=\"100px\">";
         echo "<div class='contenedor2'>";
            echo "<h3 align='center'><strong>".$fila['nombre']."</strong></h3>";
            echo "<p align='center'>".$fila['muestra_descripcion']."</p>";
                 echo "<div class='price'>";
                     echo "<p class='precio' align='center'>".$fila['precio']." €</p>";
                 echo "</div>";
         echo "</div></a>";
         ?>
         <a  onclick="document.getElementById('id01').style.display='block'"><img src="img/carrito.png" class="icono_añadir"/></a>
         <a  onclick="document.getElementById('id01').style.display='block'"><img src="img/corazon.png" class="icono_añadir icono_añadir_favoritos"/></a>
         <?php
     echo "</div>";

     echo "</td>";
  echo  "</tr>";
   }
echo "</tbody>";
echo "</table>";
echo "</div>";
   ?>
<ul class="pagination pagination-lg pager" id="myPagerPrTr"></ul>
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
