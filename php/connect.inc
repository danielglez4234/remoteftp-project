<?php
    $server = "localhost";
    $user = "adminsurf";
    $passwd = "1234";
    $dbnombre ="tiendaSurf";

    // $server = "danielglez.departamentoinformaticajmpp.com";
    // $user = "u674705277_dang1";
    // $passwd = "rsah2jkbmzah3";
    // $dbnombre ="u674705277_dang1";

    // Conexión adminsurf ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    $connect = mysqli_connect($server,$user,$passwd,$dbnombre);

    if (!$connect){
      die("ERROR de conexión: ". mysqli_error($connect));
    }

?>
