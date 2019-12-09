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
      <?php include 'php/phplogin.inc'?>
      <?php include 'php/phpsignin.inc'?>

      <header class="header">
        <img src="img/tablas.jpg" class="header_img header_img_detalles">
        <div class="cuadro_titulo">
        <p class="titulo_pri titulo_ges">Contactanos</p>
        </div>
      </header>


      <nav class="cssmenu nav nav_fixed">
          <a href="index.php"><div class="logo" ></div></a>
          <div id="head-mobile"></div>
          <div class="button"></div>
          <ul>
              <li class='li'><a href='index.php'>INICIO</a></li>
              <li><a href='tienda.php'>TIENDA</a></li>
              <li class="active"><a href='#'>CONTACTO</a></li>
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

<div class="contenedor_product contenedor_product_descrip contenedor_product_contact">
  <div class="cf_info">
    <div class="div_cf_info_dentro">
      <img class="cf_info_dentro" src="img/email.png" alt="">
      <p class="cf_info_dentro">correo@gmail.com</p>
    </div>
    <div class="div_cf_info_dentro">
      <img class="cf_info_dentro" src="img/movil.png" alt="">
      <p class="cf_info_dentro">(+34) 666 77 88 99</p>
    </div>
    <div class="div_cf_info_dentro">
      <img class="cf_info_dentro" src="img/ubicacion.png" alt="">
      <p class="cf_info_dentro" >España</p>
    </div>
  </div>


<div class="content_contact">
  <form class="cf" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="half_contact left_contatc cf">
      <input type="text" class="input_contact" id="input-name" name="nombre" placeholder="Nombre" required>
      <input type="email" class="input_contact" id="input-email" name="email" placeholder="Correo Electronico" required>
      <input type="text" class="input_contact" id="input-subject" name="subject" placeholder="Asunto">
      <input type="hidden" name="to" value="ggdani4234@gmail.com">
    </div>
    <div class="half_contact right_contact cf">
      <textarea type="text" class="textarea_contact" id="input-message" name="comentarios" placeholder="Mensaje" required></textarea>
    </div>
    <input type="submit" value="Enviar" name="submit" class="input_contact" id="input-submit_contact">
  </form>
  <?php

  // Si se ha cubierto y enviado el formulario lo procesamos
  if (!isset($_POST["submit"])){
    $accion = '';
  }else{
    $accion = $_POST["submit"];
  }
  if ($accion == 'Enviar'){
    // Dirección de correo electrónico a la que se remitirá el contenido del formulario
    $to = $_POST["to"];
    // Asunto del correo
    $subject = $_POST["subject"];
    // Contenido del mensaje. Ponemos delante el remitente
    $message = $_POST["nombre"]." (".$_POST["email"].")\n\n".$_POST["comentarios"].".";
    // Cabecera del mensaje. No se verá, pero es necesario para que nos funcione todo bien
    $headers = "From: ".$_POST["nombre"]."\nTo: Centro\nReply-To: ".$_POST["email"];
    // Envío del mensaje
    if (mail($to, $subject, $message, $headers)){
      // Ha funcionado
      echo "<b><p style='color:green;text-align:center;'>El mensaje se ha enviado correctamente</p></b>";
    }else{
      // No ha funcionado
      echo" <b><font color=\"#FF0000\">Ha ocurrido un error.</font></b>";
    }
  }

   ?>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14004.476216406372!2d-17.92432894926378!3d28.656153717908037!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc6bf3dcf156c781%3A0x895f548676f4a43e!2sAcueducto+de+Argual!5e0!3m2!1ses!2ses!4v1549824421513" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


</div>


<?php include 'php/piedepagina1.inc'?>



      <!-- menú fixed -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
      <!-- resposive menú -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
      <!-- registrate aparecer -->
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="JS/index.js"></script>


  </body>
</html>
