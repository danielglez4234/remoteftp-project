 <?php
 include '../../php/connect.inc';
  ?>
 <?php

 function limpiar($data){
   $data=trim($data);
   $data=htmlentities($data);
   $data=htmlspecialchars($data);
   $data=stripslashes($data);

   return $data;
 }

   $actulizar = "update productos set nombre = '".limpiar($_POST['nombre'])."', descripcion='".limpiar($_POST['descripcion'])."',
      muestra_descripcion='".limpiar($_POST['muestra_descripcion'])."', precio = ".limpiar($_POST['precio']).",
      peso=".limpiar($_POST['peso']).", tamano=".limpiar($_POST['tamano']).", talla='".limpiar($_POST['talla'])."',
      existencias=".limpiar($_POST['existencias']).", activado=".limpiar($_POST['activado'])."
      where id = ".limpiar($_POST['id']).";";

   //$select = "select * from productos";
   //$resultado = mysqli_query($connect, $select);
   $resultado = mysqli_query($connect, $actulizar);
  header("location: adminproductos.php");



  ?>
