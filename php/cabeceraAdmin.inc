<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
<link rel="manifest" href="../favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
  </head>
  <body>
<?php
error_reporting(0);
 $server = "localhost";
 $user = "root";
 $passwd = "";
 $dbnombre ="";
// $connect1 = mysqli_connect($server,$user,$passwd,$dbnombre);
 // Comprobación de que 'Tiendaonline2' esta creada para mostrar el boton o no----------------
  if (mysqli_connect($server,$user,$passwd,'tiendaSurf')) {
    echo "";
  }
  elseif (mysqli_connect($server,$user,$passwd,$dbnombre)) {
    echo "<div class='crear_base_de_datos'>";
           echo "<a class='a_lateral' href='db.tienda/tienda.php'>";
             echo "<div class='div_pimg_lateral'>";
                echo "<div class='img_lateral header_img_lateral'></div>";
                echo "<p class='p_lateral'>Crear base de datos</p>";
             echo "</div>";
           echo "</a>";
    echo "</div>";
  }
?>
<?php session_start();?>
</body>
</html>
