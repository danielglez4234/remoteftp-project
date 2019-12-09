<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../CSS/style.css">
  </head>
  <body>
    <?php session_start(); ?>
    <?php include '../php/cabecera.inc'?>
    <?php include '../php/connect.inc'?>
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
            if ($user_name = $fila3['usuario'] && $fila3['fax'] == 'reg') {
              header("location: php/redireccion.php");
            }
          }
        }
     ?>
     <header class="header">
       <img src="../img/surf3.jpg" class="header_img header_img_detalles">
       <div class="cuadro_titulo">
       <p class="titulo_pri titulo_ges">Descubre más</p>
       </div>
     </header>

      <nav class="cssmenu nav nav_fixed">
          <a href="index.php"><div class="logo"></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='li'><a href='index.php'>INICIO</a></li>
              <li class='active'><a href='tiendaAdmin.php'>TIENDA</a></li>
              <li><a href="productos/adminproductos.php">GESTIÓN</a></li>
              <li class="has-sub" id="user_nav"><a><img src="../img/user_color.png" alt="" class="user_img"><b class="user_nav_a"><?php echo $_SESSION['userlogin'];?></b></a>
                <ul class="li">
                    <li class="has-sub"><a href="productos/adminproductos.php">Gestión</a></li>
                    <li class="has-sub"><a href="../php/session_destroy.php">Cerrar Sesión</a></li>
                </ul>
              </li>
          </ul>
      </nav>

<div class="contenedor_product contenedor_product_descrip">
    <div class="div_titulo_product">
      <h2 class="h2_div_titulo_product">Detalles</h2>
      <hr class="hr">
    </div>
<!-- ................................descipcion producto...................................... -->
<?php
header('Content-type: text/html;charset=UTF-8');

$idproduct = $_GET['id'];

$infoimg = " select * from imagenesproductos inner join productos
            on productos.id = imagenesproductos.idproducto
            and productos.activado = '1' and existencias > 0 and productos.id = $idproduct ;";
$infoimg2 = "select * from productos where id = $idproduct;";

$resultado = mysqli_query($connect, $infoimg);
$resultado2 = mysqli_query($connect, $infoimg2);


      echo "<div class='contenedor_descrip'>";
      echo "<div id='slider'>";
        echo "<a class='control_next'>></a>";
        echo "<a class='control_prev'><</a>";
        echo "<ul>";
        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<li><img class='img_slider' src=\"../photo/".$fila['imagen']."\"></li>";
        }
        echo "</ul>";
      echo "</div>";

      echo "<div class='product-info'>";
        echo "<div class='product-text'>";
        while ($fila2 = mysqli_fetch_array($resultado2)) {
          echo "<p class='p_price'><span class='span_descrip'>".$fila2['precio']."</span>€</p>";
          echo "<h1>".$fila2['nombre']."</h1>";
          if ($fila2['tamano'] == 0) {
            echo "<h3>Talla</h3>";
            echo "<hr class='hr_descrip'>";
            echo "<p class='p_descrip'>".$fila2['talla']."</p>";
          }else{
            echo "<h3>Tamaños</h3>";
            echo "<hr class='hr_descrip'>";
            echo "<p class='p_descrip'>".$fila2['tamano']." cm</p>";
          }
          echo "<h3>Peso</h3>";
          echo "<hr class='hr_descrip'>";
          echo "<p class='p_descrip'>".$fila2['peso']." kg</p>";
          echo "<h3>Descripcion</h3>";
          echo "<hr class='hr_descrip'>";
          echo "<p class='p_descrip'>".$fila2['descripcion']."</p>";
        }
        echo "</div>";
      echo "</div>";
    echo "</div>";

  echo "</div>";

  ?>


  <?php
  include '../php/piedepagina.inc';
   ?>



      <!-- menú fixed -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
      <!-- resposive menú -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
      <!-- registrate aparecer -->
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <!-- slider imagenes descripcion -->
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="../JS/index.js"></script>


  </body>
</html>
