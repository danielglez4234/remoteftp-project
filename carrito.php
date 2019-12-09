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
       <p class="titulo_pri titulo_ges">Descubre más</p>
       </div>
     </header>


    <nav class="cssmenu nav nav_fixed">
        <a href="indexRegistrado.php"><div class="logo"></div></a>
        <div id="head-mobile"></div>
        <div class="button"></div>
        <ul>
            <li class='li'><a href='indexRegistrado.php'>INICIO</a></li>
            <li class='active'><a href='tiendaRegistrado.php'>TIENDA</a></li>
            <li><a href='favoritos.php'>FAVORITOS</a></li>
            <li><a href='contactoRegistrado.php'>CONTACTO</a></li>
            <li class="has-sub" id="user_nav"><a><img src="img/user_b.png" alt="" class="user_img"><b class="user_nav_a"><?php echo $_SESSION['userlogin'];?></b></a>
              <ul class="li">
                  <li class="has-sub"><a href='favoritos.php'>Favoritos</a></li>
                  <li class="has-sub"><a href='#'>Carrito de compras</a></li>
                  <li class="has-sub"><a href='historial.php'>Historial de compras</a></li>
                  <li class="has-sub"><a href="php/session_destroy.php">Cerrar Sesión</a></li>
              </ul>
            </li>
        </ul>
    </nav>
<div id="contenedor_carrito" class="contenedor_product contenedor_product_descrip">
    <?php
    // Carrito --------------------------------------------------------------------------------------
                  if (isset($_SESSION['carrito'])) {
                    if (isset($_GET['id'])) {
                        $arreglo=$_SESSION['carrito'];
                        $encontro=false;
                        $numero=0;
                          for ($i=0; $i < count($arreglo); $i++) {
                            if ($arreglo[$i]['Id']==$_GET['id']) {
                              $encontro=true;
                              $numero=$i;
                            }
                          }
                          // Si ya existe el producto sumarle 1 a la cantidad.
                          if ($encontro==true) {
                            $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
                            $_SESSION['carrito']=$arreglo;
                          }
                          // si no existe guardarlo en el array.
                          else {
                            $nombre="";
                            $precio=0;
                            $existencias=0;
                            $selectid="select * from productos where id=".$_GET['id'].";";
                            $resultadoid=mysqli_query($connect,$selectid);
                              while ($fila4=mysqli_fetch_array($resultadoid)) {
                                $nombre=$fila4['nombre'];
                                $precio=$fila4['precio'];
                                $existencias=$fila4['existencias'];
                              }
                              $datosNuevos=array('Id'=>$_GET['id'],
                                               'Nombre'=>$nombre,
                                               'Precio'=>$precio,
                                               'Existencias'=>$existencias,
                                               'Cantidad'=>1);

                              array_push($arreglo, $datosNuevos);
                              $_SESSION['carrito']=$arreglo;
                        }
                     }
                  }
                  else {
                    // Si el id llega por primera vez meterlo en una array y luego en la variable de sesión para luego mostrarlo.
                    if (isset($_GET['id'])) {
                      $nombre="";
                      $precio=0;
                      $existencias=0;
                      $selectid="select * from productos
                                 where id=".$_GET['id'].";";
                      $resultadoid=mysqli_query($connect,$selectid);
                        while ($fila4=mysqli_fetch_array($resultadoid)) {
                          $nombre=$fila4['nombre'];
                          $precio=$fila4['precio'];
                          $existencias=$fila4['existencias'];
                        }
                        $arreglo[]=array('Id'=>$_GET['id'],
                                         'Nombre'=>$nombre,
                                         'Precio'=>$precio,
                                         'Existencias'=>$existencias,
                                         'Cantidad'=>1);

                        $_SESSION['carrito']=$arreglo;
                    }
                  }


                  // Mostrar el producto.
                  if (isset($_SESSION['carrito'])) {
                    $datos=$_SESSION['carrito'];
                    $total=0;
                    echo "<table class='table-fill'>";
                    echo "<thead>";
                    echo "<tr class='tr_fav'>";
                    echo "<th colspan='6' class='th_fav text-center'>Carrito de la Compra</th>";
                    echo "</tr>";
                    echo "<tr class='tr_fav'>";
                    echo "<th class='th_fav text-center'>Nombre</th>";
                    echo "<th class='th_fav text-center'>Precio</th>";
                    echo "<th class='th_fav text-center'>Subtotal</th>";
                      echo "<th class='th_fav text-center'>Cantidad</th>";
                    echo "<th class='th_fav text-center'>Comprar Ahora</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody class='table-hover'>";
                      for ($i=0; $i < count($datos); $i++) {
                        echo "<tr class='tr_fav'>";
                        echo "<td class='td_fav text-center'>".$datos[$i]['Nombre']."</td>";
                        echo "<td class='td_fav text-center'><span class='span_descrip'>".$datos[$i]['Precio']."</span>€</td>";
                        echo "<td class='td_fav text-center'><span class='span_descrip'>".$datos[$i]['Precio']*$datos[$i]['Cantidad']."</span>€</td>";
                        echo "<form class='' action='php/comprar.php' method='get'>
                        <td class='td_fav text-center'>
                          <span class='span_descrip'>
                            <input style='border:none;' min='0' max='".$datos[$i]['Cantidad']."' name='cantidad' type='number' value='".$datos[$i]['Cantidad']."'>
                          </span>
                        </td>
                        <td class='td_fav text-center'>
                          <input type='number' name='id_producto' hidden value='".$datos[$i]['Id']."'>
                          <input type='submit' class='btn_fav btn_fav_com' value='Comprar'>
                        </td>
                        </form>";
                        echo "</tr>";


                        $total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
                      }
                    echo "</tbody>";
                    echo "</table>";
                  }
                  else {
                    echo "<h2 class='fav_nada_h2'>No tienes ningún producto en el Carrito!</h2>";
                    echo "<img src='img/carritovacio.png' class='fav_nada_img' alt=''>";
                    echo "<p class='fav_nada_p'>Vuelve a la <a href='tiendaRegistrado.php'>Tienda</a> y descubre todas las novedades que te podemos ofrecer!.</p>";
                  }

                  if ($total==0) {
                    echo "";
                  }
                  else {
                    echo "<table class='table-fill'>";
                    echo "<tr class='tr_fav'>";
                    echo "<th colspan='6' class='th_fav text-center' id='total'>Total: ".$total." €
                    </th>";
                    echo "</tr>";
                    echo "</table>";
                  }
    // FIN Carrito
                ?>
        </div>

<?php include 'php/piedepagina2.inc'?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="JS/index.js"></script>
  </body>
</html>
