<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="CSS/style.css">
  </head>
  <body>
      <?php session_start(); ?>
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
         <img src="img/surf3.jpg" class="header_img header_img_detalles">
         <div class="cuadro_titulo">
         <p class="titulo_pri titulo_ges">Tienda</p>
         </div>
       </header>


      <nav class="cssmenu nav nav_fixed">
          <a href="indexRegistrado.php"><div class="logo"></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='li'><a href='indexRegistrado.php'>INICIO</a></li>
              <li class='active'><a href='#'>TIENDA</a></li>
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

<div id="tabl" class="contenedor_product">
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

   $username = $_SESSION['userlogin'];

   $fav3 = "select id from favoritos inner join clientes
           on clientes.id=favoritos.idcliente
           and clientes.nombre = ".$username.";";
   $result2 = mysqli_query($connect, $fav3);



echo "<div class='product'>";


echo "<table id='myTablePrR' class='table_producto_pag'>";
  echo "<tbody class='tbody_product'>";

   while ($fila = mysqli_fetch_array($resultado)) {
  echo "<tr class='table_producto_tr'>";
        echo  "<td>";


      echo "<a href='productoRegistrado.php?id=".$fila['id']."'>";
     echo "<div class='contenedor'>";
         echo "<img class='img' src=\"photo/".$fila['imagen']."\"max-width=\"100px\" \"height=\"100px\">";
         echo "<div class='contenedor2'>";
            echo "<h3 align='center'><strong>".$fila['nombre']."</strong></h3>";
            echo "<p align='center'>".$fila['muestra_descripcion']."</p>";
                 echo "<div class='price'>";
                     echo "<p class='precio' align='center'>".$fila['precio']." €</p>";
                 echo "</div>";
         echo "</div></a>";

         $ifp = $fila['id'];
         $fav3 = "select * from favoritos inner join clientes
                 on clientes.id=favoritos.idcliente
                 and clientes.nombre = ".$username."
                 and idproducto= ".$ifp.";";
         $result2 = mysqli_query($connect, $fav3);

         ?>
         <a  href="carrito.php?id=<?php echo $fila['id'];?>"><img src="img/carrito.png" class="icono_añadir"/></a>
         <form class="" action="php/insertarFavoritos.php" method="post">
           <input type="number" hidden name="id_producto" value="<?php echo $fila['id']; ?>">
           <input type="number" hidden name="nub_index" value="1">
           <?php
           if (empty($result2)) {
           echo "<a><input id='".$fila['id']."' hidden type='submit'><label for='".$fila['id']."'><img src='img/corazon.png' class='icono_añadir icono_añadir_favoritos'/></label></input></a>";
           }
           else {
           echo "<a style:backgound-color:red;><input id='".$fila['id']."' hidden type='submit'><label for='".$fila['id']."'><img src='img/corazon.png' class='icono_añadir icono_añadir_favoritos'/></label></input></a>";
           }
           ?>
         </form>
         <?php
     echo "</div>";

     echo "</td>";
  echo  "</tr>";
   }
   echo "</tbody>";
echo "</table>";
echo "</div>";
   ?>
   <ul class="pagination pagination-lg pager" id="myPagerPrR"></ul>
</div>

<div id="nov" class="div_fixed_info">
  <div class="cuadro_info ">
      <div class="h1_info">
        <h1 class="">Encuentra la mayor calidad <br>y los mejores precios✮</h1>
      </div>
      <div class="div_img_info">
        <img src="img/tabla5.png" alt="" class="img_info">
      </div>
  </div>
</div>

<div id="neop" class="contenedor_product">
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

echo "<table id='myTablePrTrR' class='table_producto_pag'>";
  echo "<tbody class='tbody_product'>";

   while ($fila = mysqli_fetch_array($resultado)) {
     echo "<tr class='table_producto_tr'>";
           echo  "<td>";

    echo "<a href='productoRegistrado.php?id=".$fila['id']."'>";
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
         <a  href="carrito.php?id=<?php echo $fila['id'];?>"><img src="img/carrito.png" class="icono_añadir"/></a>
         <form class="" action="php/insertarFavoritos.php" method="post">
           <input type="number" hidden name="id_producto" value="<?php echo $fila['id']; ?>">
           <input type="number" hidden name="nub_index" value="1">
           <?php
           echo "<a><input id='".$fila['id']."' hidden type='submit'><label for='".$fila['id']."'><img src='img/corazon.png' class='icono_añadir icono_añadir_favoritos'/></label></input></a>";
           ?>
         </form>
         <?php
     echo "</div>";

     echo "</td>";
  echo  "</tr>";
   }
 echo "</tbody>";
echo "</table>";
echo "</div>";
   ?>
 <ul class="pagination pagination-lg pager" id="myPagerPrTrR"></ul>
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
