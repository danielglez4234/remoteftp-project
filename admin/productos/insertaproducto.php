<?php include '../../php/connect.inc' ?>
<?php

function limpiar($data){
  $data=trim($data);
  $data=htmlentities($data);
  $data=htmlspecialchars($data);
  $data=stripslashes($data);

  return $data;
}

// Insertar productos
$insertproduct = "insert into productos values
                  (NULL,'".limpiar($_POST['nombre'])."','".limpiar($_POST['descripcion'])."',
                  '".limpiar($_POST['muestra_descripcion'])."','".limpiar($_POST['precio'])."',
                  '".limpiar($_POST['peso'])."','".limpiar($_POST['tamano'])."','".limpiar($_POST['talla'])."',
                  '".limpiar($_POST['existencias'])."','".limpiar($_POST['activado'])."');";

$resultprosuct = mysqli_query($connect,$insertproduct);


// obtener el ultimo id
$lastIDimg = "select * from productos order by id desc limit 1";

$resultID = mysqli_query($connect,$lastIDimg);

while ($img = mysqli_fetch_array($resultID)) {
  $newid = $img['id'];
}


// ----------------------------------------------------------
//contar las imagenes que entran
$sumaimg = count($_FILES['imagen']['name']);

//comprobar el tipo de imagen y subirla

  for ($i=0; $i < $sumaimg; $i++) {
    //subir la imagen a un carpeta temporal para luego enviarla a la carpeta PHOTO
    $rutatemporal = $_FILES['imagen']['tmp_name'][$i];
    $nombreimg = $_FILES['imagen']['name'][$i];
    $rutadestino = "../../photo/".$nombreimg;
    move_uploaded_file($rutatemporal, $rutadestino);

    // insertar imagen en la tabla
    $insertimg = "insert into imagenesproductos values(NULL,'$newid','$nombreimg',NULL)";

    $resultimg = mysqli_query($connect,$insertimg);
  }


  header("location: adminproductos.php");
 ?>
