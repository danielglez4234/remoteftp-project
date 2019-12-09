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
      <header class="header">
        <img src="img/surf3.jpg" class="header_img header_img_detalles">
        <div class="cuadro_titulo">
        <p class="titulo_pri titulo_ges">Descubre más</p>
        </div>
      </header>

      <nav class="cssmenu nav nav_fixed">
          <a href="indexRegistrado.php"><div class="logo"></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='li'><a href='indexRegistrado.php'>INICIO</a></li>
              <li><a href='tiendaRegistrado.php'>TIENDA</a></li>
              <li class='active'><a href='favoritos.php'>FAVORITOS</a></li>
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

<div class="contenedor_product contenedor_product_descrip">
<!-- ................................descipcion producto...................................... -->
<?php
header('Content-type: text/html;charset=UTF-8');

$username = $_SESSION['userlogin'];

$vacio = "select favoritos.id from favoritos inner join clientes
          on clientes.id = favoritos.idcliente and clientes.nombre = '$username';";


$idfav =  "call favprueba('$username')";

$result1 = mysqli_query($connect, $vacio);
$resultado = mysqli_query($connect, $idfav);

   while ($fila1 = mysqli_fetch_array($result1)) {
     $cuenta = $fila1['id'];
   }

if (!empty($cuenta)) {
  echo "<table class='table-fill'>";
  echo "<thead>";
  echo "<tr class='tr_fav'>";
  echo "<th colspan='6' class='th_fav text-center'>Favoritos</th>";
  echo "</tr>";
  echo "<tr class='tr_fav'>";
  echo "<th class='th_fav text-center responsive_img'>Imagen</th>";
  echo "<th class='th_fav text-center'>Nombre</th>";
  echo "<th class='th_fav text-center'>Precio</th>";
  echo "<th class='th_fav text-center'>Comprar Ahora</th>";
  echo "<th class='th_fav text-center'>Eliminar de Favoritos</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody class='table-hover'>";
  while ($fila = mysqli_fetch_array($resultado)) {
      echo "<tr class='tr_fav'>";
      echo "<td class='td_fav text-center responsive_img'><img class='img_fav' src=\"photo/".$fila['imagen']."\"></td>";
      echo "<td class='td_fav text-center'>".$fila['nombre']."</td>";
      echo "<td class='td_fav text-center'><span class='span_descrip'>".$fila['precio']."</span>€</td>";
      echo "<td class='td_fav text-center'>
      <form class='' action='carrito.php' method='get'>
      <input type='number' hidden name='id' value='".$fila['id']."'>
      <input type='submit' class='btn_fav btn_fav_com' value='Comprar'>
      </form>
      </td>";
      echo "<td class='td_fav text-center'>
      <form class='' action='php/insertarFavoritos.php' method='post'>
      <input type='number' name='nub_index' hidden value='3'>
      <input type='number' name='id_producto' hidden value='".$fila['id']."'>
      <input type='submit' class='btn_fav btn_fav_eli' name='elim_fav' value='Eliminar'>
      </form>
      </td>";
      echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
}
else {
  echo "<h2 class='fav_nada_h2'>No tienes ningún producto marcado como favorito!</h2>";
  echo "<img src='img/surfpersona.png' class='fav_nada_img' alt=''>";
  echo "<p class='fav_nada_p'>Vuelve a la <a href='tiendaRegistrado.php'>Tienda</a> y descubre todas las novedades que te podemos ofrecer!.</p>";
}
?>

</div>



<?php include 'php/piedepagina2.inc'?>



      <!-- menú fixed -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
      <!-- resposive menú -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
      <!-- registrate aparecer -->
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <!-- slider imagenes descripcion -->
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="JS/index.js"></script>


  </body>
</html>
