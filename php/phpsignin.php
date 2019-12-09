<?php
include 'connect.inc';
 ?>
<?php

$insert = "insert into clientes(nombre,email,usuario,contrasena,fax)
           values('".$_POST['nombre']."','".$_POST['email']."','".$_POST['usuario']."',
           '".$_POST['contrasena']."','reg')";

if(mysqli_query($connect,$insert)){
  echo "<br>insertado con éxito.";
}
else{
  echo ("<br>ERROR jodeeeeeer: ".mysqli_error($connect));
}
 header("location: ../index.php");

 ?>
