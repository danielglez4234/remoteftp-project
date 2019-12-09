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
        <p class="titulo_pri titulo_ges">Historial</p>
        </div>
      </header>

      <nav class="cssmenu nav nav_fixed">
          <a href="indexRegistrado.php"><div class="logo"></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='li'><a href='indexRegistrado.php'>INICIO</a></li>
              <li><a href='tiendaRegistrado.php'>TIENDA</a></li>
              <li><a href='favoritos.php'>FAVORITOS</a></li>
              <li><a href='contactoRegistrado.php'>CONTACTO</a></li>
              <li class="has-sub" id="user_nav"><a><img src="img/user_b.png" alt="" class="user_img"><b class="user_nav_a"><?php echo $_SESSION['userlogin'];?></b></a>
                <ul class="li">
                    <li class="has-sub"><a href='favoritos.php'>Favoritos</a></li>
                    <li class="has-sub"><a href='carrito.php'>Carrito de compras</a></li>
                    <li class="has-sub"><a href='#'>Historial de compras</a></li>
                    <li class="has-sub"><a href="php/session_destroy.php">Cerrar Sesión</a></li>
                </ul>
              </li>
          </ul>
      </nav>

<div class="contenedor_product contenedor_product_descrip">
  <div class="div_titulo_product">
    <h2 class="h2_div_titulo_product">Historial de compras</h2>
    <hr class="hr">
  </div>
<!-- ................................descipcion producto...................................... -->
<?php
header('Content-type: text/html;charset=UTF-8');

$username = $_SESSION['userlogin'];

$hiscom = "select * from pedidos inner join lineaspedido inner join clientes inner join productos inner join imagenesproductos
          on pedidos.id = lineaspedido.idpedido and clientes.id=pedidos.idcliente and productos.id=lineaspedido.idproducto
          and productos.id=imagenesproductos.idproducto
          and clientes.nombre = '$username' group by productos.nombre order by fecha;";

$existe = "select *, pedidos.id as idped from pedidos inner join lineaspedido inner join clientes inner join productos
          on pedidos.id = lineaspedido.idpedido and clientes.id=pedidos.idcliente
          and productos.id=lineaspedido.idproducto
          and clientes.nombre = '$username';";
$result = mysqli_query($connect, $hiscom);
$resultexiste = mysqli_query($connect, $existe);

   while ($fila1 = mysqli_fetch_array($resultexiste)) {
     $cuenta = $fila1['idped'];
   }
if (!empty($cuenta)) {
  echo "<table class='table-fill'>";
  echo "<thead>";
  echo "<tr class='tr_fav'>";
  echo "<th class='th_fav text-center responsive_img th_fav_historial'>Imagen</th>";
  echo "<th class='th_fav text-center th_fav_historial'>Nombre</th>";
  echo "<th class='th_fav text-center th_fav_historial'>Precio</th>";
  echo "<th class='th_fav text-center th_fav_historial'>Comprar Ahora</th>";
  echo "<th class='th_fav text-center th_fav_historial'>Fecha</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody class='table-hover'>";
  while ($fila = mysqli_fetch_array($result)) {
      echo "<tr class='tr_fav'>";
      echo "<td class='td_fav text-center responsive_img'><img class='img_fav' src=\"photo/".$fila['imagen']."\"></td>";
      echo "<td class='td_fav text-center'>".$fila['nombre']."</td>";
      echo "<td class='td_fav text-center'><span class='span_descrip'>".$fila['precio']."</span>€</td>";
      echo "<td class='td_fav text-center'>".$fila['muestra_descripcion']."</td>";
      echo "<td class='td_fav text-center'>".$fila['fecha']."</td>";
      echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
}
else {
  echo "<h2 class='fav_nada_h2'>No haz realizado ninguna compra!</h2>";
  echo "<img src='img/compra.png' class='fav_nada_img' alt=''>";
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
