<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" href="../../CSS/style.css">
  </head>
  <body>
<?php
include '../../php/cabecera.inc';
include '../../php/connect.inc';
?>
<?php

    $user_name= $_SESSION['userlogin'];

    if ( (empty($_SESSION['userlogin'])) && (empty($_SESSION['passwd'])) && (empty($_SESSION['fax'])) ) {
      header("location: ../../php/redireccion.php");
    }
    else {
      $sql2= "select usuario, fax from clientes where usuario = '".$user_name."';";
      $resultado2= mysqli_query($connect,$sql2);

      while ($fila3 = mysqli_fetch_array($resultado2)) {
        if ($user_name = $fila3['usuario'] && $fila3['fax'] == 'reg') {
          header("location: ../../php/redireccion.php");
        }
      }
    }
 ?>
 <header class="header">
   <img src="../../img/adgita.jpg" class="header_img header_img_detalles">
   <div class="cuadro_titulo">
   <p class="titulo_pri titulo_ges">Gestión</p>
   </div>
 </header>

<nav class="cssmenu nav nav_fixed">
  <a href="../index.php"><div class="logo"></div></a>
  <div id="head-mobile"></div>
  <div class="button"></div>
  <ul>
      <li class='li'><a href='../index.php'>INICIO</a></li>
      <li><a href='../tiendaAdmin.php'>TIENDA</a></li>
      <li class="active"><a href="#">GESTIÓN</a></li>
      <li class="has-sub" id="user_nav"><a><img src="../../img/user_color.png" alt="" class="user_img"><b class="user_nav_a"><?php echo $_SESSION['userlogin'];?></b></a>
        <ul class="li">
            <li class="has-sub"><a>Gestión</a></li>
            <li class="has-sub"><a href="../../php/session_destroy.php">Cerrar Sesión</a></li>
        </ul>
      </li>
  </ul>
</nav>


<div class="contenedor_product contenedor_product_descrip">
    <div class="div_titulo_product">
        <div class="div_titulo_h2btn">
            <h2 class="h2_div_titulo_product">Gestionar Productos</h2>
        </div>
        <div class="div_titulo_h2btn">
          <a onclick="document.getElementById('edit_producto').style.display='block'; document.getElementById('modificar_producto').style.display='none';"><span class="boton_edit_delet boton_nuevo_producto">Nuevo Producto</span></a>
        </div>
        <div class="div_titulo_h2btn" id="boton_mostar_prodct" style="display:none;">
          <a onclick="document.getElementById('modificar_producto').style.display='block'; document.getElementById('edit_producto').style.display='none';"><span class="boton_edit_delet boton_nuevo_producto boton_modificar_producto">Mostrar Producto seleccionado</span></a>
        </div>
        <div class="div_titulo_h2btn" id="boton_mostar_cli" style="display:none;">
          <a onclick="document.getElementById('modificar_cliente').style.display='block'; document.getElementById('edit_producto').style.display='none';"><span class="boton_edit_delet boton_nuevo_producto boton_modificar_producto">Mostrar Cliente seleccionado</span></a>
        </div>
        <hr class="hr">
    </div>

    <div id="edit_producto" class="modal_edit_producto">
          <form class="" action="insertaproducto.php" method="post" enctype="multipart/form-data">
          <div class="div_todo_insertar">
            <div class="imgcontainer">
              <span onclick="document.getElementById('edit_producto').style.display='none'" class="close close_product" title="Close Modal">&times;</span>
            </div>
                <fieldset class="fieldset_formulario">
                        <legend class="form_legend"><strong>Insertar Productos</strong></legend>

                      <div class="mat-div">
                        <label for="first-name" class="mat-label">Nombre:<b>*</b></label><br>
                        <input type="text" name="nombre" class="input_insert" required>
                      </div>
                      <div class="mat-div">
                        <label for="first-name" class="mat-label">Precio:<b>*</b></label><br>
                        <input type="number" min="0" name="precio" class="input_insert" pattern="[0-9]" required>
                      </div>
                      <div class="mat-div">
                        <label for="first-name" class="mat-label">Peso:<b>*</b></label><br>
                        <input type="number" min="0" name="peso" class="input_insert" pattern="[0-9]" required>
                      </div>
                      <div class="mat-div">
                        <label for="first-name" class="mat-label">Tamaño:</label><br>
                        <input type="number" min="1" name="tamano" class="input_insert" pattern="[0-9]">
                      </div><br>
                      <div class="mat-div">
                        <label for="first-name" class="mat-label">Talla:</label><br>
                        <input type="text" min="0" name="talla" class="input_insert" pattern="[A-Za-z]" maxlength="1">
                      </div>
                      <div class="mat-div">
                        <label for="first-name" class="mat-label">Existencias:<b>*</b></label><br>
                        <input type="number" value="1" min="0" name="existencias" class="input_insert" pattern="[0-9]" required>
                      </div>
                      <div class="mat-div">
                        <label for="first-name" class="mat-label">Activado:<b>*</b></label><br>
                        <input type="number" min="0" max="1" name="activado" value="1" class="input_insert input-act" pattern="[0-9]" required>
                      </div><br>
                      <div class="mat-div mat-descrip">
                        <label for="first-name" class="mat-label">Descripción Muestra:<b>*</b></label><br>
                        <p>(Se mostrará en el cuadro del producto)</p>
                        <textarea name="muestra_descripcion" rows="4" cols="30" required></textarea>
                      </div>
                      <div class="mat-div mat-descrip">
                        <label for="first-name" class="mat-label">Descripción:<b>*</b></label><br>
                        <p>(Se mostrará en la descripción del producto)</p>
                        <textarea name="descripcion" rows="8" cols="60" required></textarea>
                      </div>
                      <div class="mat-div">
                        <label for="first-name" class="mat-label">Imagen:<b>*</b></label><br>
                        <input type="file" multiple name="imagen[]" value="" class="input_insert input-img" required>
                      </div><br><br>


                      <div class="div_env">
                        <input type="submit" hidden class="buttom_enviar_borrar" id="inpenv" name=""><label for="inpenv" class="boton_edit_delet boton_borrar_insert boton_insertadmin">Insertar</label></input>
                      </div>

                      <div class="div_env">
                         <input type="reset" hidden class="buttom_enviar_borrar" id="inpbor" name=""><label for="inpbor" class="boton_edit_delet boton_borrar_insert boton_borraradmin">Borrar</label></input>
                      </div>
                </fieldset>
          </div>
          <br><br>
    <hr class="hr">
          <br><br>
            </form>
    </div>

    <?php
    //$idactu ='';
    $idactu = $_POST['actuid'];
    if (empty($idactu)) {
      echo "";
    }
    else {
    ?>
<div id="modificar_producto" class="modal_edit_producto" style="display:block;">
      <div class="imgcontainer">
        <span onclick="document.getElementById('modificar_producto').style.display='none'; document.getElementById('boton_mostar_prodct').style.display='inline-block';" class="close close_product" title="Close Modal"> <img src="../../img/ocultar.png" alt=""> </span>
      </div>
      <form class="" action="actualizarproducto.php" method="post">
        <fieldset class="fieldset_formulario">
            <legend class="form_legend"><strong>Modificar Productos</strong></legend>
    <?php
    $infoimg = " select imagenesproductos.id as idimg, imagen from imagenesproductos inner join productos
                on productos.id = imagenesproductos.idproducto
                and productos.activado = '1' and existencias > 0 and productos.id = $idactu ;";
    $resultado2 = mysqli_query($connect, $infoimg);

    $peticion = "select * from productos where id=".$idactu."";
    $resultado = mysqli_query($connect,$peticion);
    while ($fila = mysqli_fetch_array($resultado)) {
      ?>
          <input type="number" hidden name="id" class="mat-input mat-menor tabla_actualizar" value="<?php echo $fila['id']?>">
        <div class="mat-div">
          <label for="first-name" class="mat-label">Nombre:<b>*</b></label><br>
          <input type="text" name="nombre" class="input_insert" value="<?php echo $fila['nombre'] ?>" required>
        </div>
        <div class="mat-div">
          <label for="first-name" class="mat-label">Precio:<b>*</b></label><br>
          <input type="number" min="0" name="precio" class="input_insert" value="<?php echo $fila['precio'] ?>" pattern="[0-9]" required>
        </div>
        <div class="mat-div">
          <label for="first-name" class="mat-label">Peso:<b>*</b></label><br>
          <input type="number" min="0" name="peso" class="input_insert" value="<?php echo $fila['peso'] ?>" pattern="[0-9]" required>
        </div>
        <div class="mat-div">
          <label for="first-name" class="mat-label">Tamaño:</label><br>
          <input type="number" name="tamano" class="input_insert" value="<?php echo $fila['tamano'] ?>" pattern="[0-9]">
        </div><br>
        <div class="mat-div">
          <label for="first-name" class="mat-label">Talla:</label><br>
          <input type="text" min="0" name="talla" class="input_insert" value="<?php echo $fila['talla'] ?>" pattern="[A-Za-z]" maxlength="1">
        </div>
        <div class="mat-div">
          <label for="first-name" class="mat-label">Existencias:<b>*</b></label><br>
          <input type="number" min="0" name="existencias" value="<?php echo $fila['existencias'] ?>" class="input_insert" pattern="[0-9]" required>
        </div>
        <div class="mat-div">
          <label for="first-name" class="mat-label">Activado:<b>*</b></label><br>
          <input type="number" min="0" max="1" name="activado" value="<?php echo $fila['activado'] ?>" class="input_insert input-act" pattern="[0-9]" required>
        </div><br>
        <div class="mat-div mat-descrip">
          <label for="first-name" class="mat-label">Descripción Muestra:<b>*</b></label><br>
          <p>(Se mostrará en el cuadro del producto)</p>
          <textarea name="muestra_descripcion" rows="4" cols="30" required><?php echo $fila['muestra_descripcion'] ?></textarea>
        </div>
        <div class="mat-div mat-descrip">
          <label for="first-name" class="mat-label">Descripción:<b>*</b></label><br>
          <p>(Se mostrará en la descripción del producto)</p>
          <textarea name="descripcion" rows="8" cols="60" required><?php echo $fila['descripcion'] ?></textarea>
        </div><br>
      <div class="mat-div mat-div_act">
          <label for="first-name" class="mat-label">Imagen:<b>*</b></label><br>
          <?php
          while ($fil = mysqli_fetch_array($resultado2)) {
            echo "<div class='div_img_act'>";
            echo "<img class='img_actualizar' src=\"../../photo/".$fil['imagen']."\">";
            echo "<div class='imgcontainer_actu'>";
            ?>
            <form class="" action="actualizarproducto.php" method="post">
                  <label for="<?php // echo $fil['idimg'] ?>"><span class="close_actu" title="Eliminar imagen">&times;</span></label>
                  <input id="<?php // echo $fil['idimg'] ?>" type="submit" hidden name="actidimg" value="<?php // echo $fil['idimg'] ?>">
            </form>
            <?php
            echo "</div>";
            echo "</div>";
          }
          ?>
      </div><br><br>

        <div class="div_env">
          <input type="submit" hidden class="buttom_enviar_borrar" id="<?php echo $fila['id']?>" name=""><label for="<?php echo $fila['id']?>" class="boton_edit_delet boton_borrar_insert boton_insertadmin">Actualizar</label></input>
        </div>

        <div class="div_env">
           <input type="reset" hidden class="buttom_enviar_borrar" id="<?php echo $fila['id']?>f" name=""><label for="<?php echo $fila['id']?>f" class="boton_edit_delet boton_borrar_insert boton_borraradmin">Borrar</label></input>
        </div>
      <?php
      }
    echo "</fieldset>";
    echo "</form>";
echo "</div>";
    }
      ?>




      <?php
      //$idactu ='';
      $idcli = $_POST['actuidcl'];
      if (empty($idcli)) {
        echo "";
      }
      else {
      ?>
  <div id="modificar_cliente" class="modal_edit_producto" style="display:block;">
        <div class="imgcontainer">
          <span onclick="document.getElementById('modificar_cliente').style.display='none'; document.getElementById('boton_mostar_cli').style.display='inline-block';" class="close close_product" title="Close Modal"> <img src="../../img/ocultar.png" alt=""> </span>
        </div>
        <form class="" action="actborrusuario.php" method="post">
          <fieldset class="fieldset_formulario">
              <legend class="form_legend"><strong>Modificar Clientes</strong></legend>
      <?php
      $selectcliente = "select * from clientes where id=".$idcli."";
      $cliente = mysqli_query($connect,$selectcliente);
      while ($fia = mysqli_fetch_array($cliente)) {
        ?>
            <input type="number" hidden name="idcl" value="<?php echo $fia['id']?>">
            <input type="number" hidden name="ctbr" value="1">
          <div class="mat-div">
            <label for="first-name" class="mat-label">Nombre:</label><br>
            <input type="text" name="nombre" class="input_insert" value="<?php echo $fia['nombre'] ?>" required>
          </div>
          <div class="mat-div">
            <label for="first-name" class="mat-label">email:</label><br>
            <input type="email" min="0" name="email" class="input_insert" value="<?php echo $fia['email'] ?>">
          </div>
          <div class="mat-div">
            <label for="first-name" class="mat-label">Nombre de usuario:</label><br>
            <input type="text" min="0" name="usuario" class="input_insert" value="<?php echo $fia['usuario'] ?>" required>
          </div>
          <div class="mat-div">
            <label for="first-name" class="mat-label">Tipo de usuario:</label><br>
            <input type="text" min="0" name="fax" class="input_insert" value="<?php echo $fia['fax'] ?>" required>
          </div>

          <div class="div_env">
            <input type="submit" hidden class="buttom_enviar_borrar" id="<?php echo $fia['id']?>" name=""><label for="<?php echo $fia['id']?>" class="boton_edit_delet boton_borrar_insert boton_insertadmin">Actualizar</label></input>
          </div>

          <div class="div_env">
             <input type="reset" hidden class="buttom_enviar_borrar" id="<?php echo $fia['id']?>r" name=""><label for="<?php echo $fia['id']?>r" class="boton_edit_delet boton_borrar_insert boton_borraradmin">Borrar</label></input>
          </div>
        <?php
        }
      echo "</fieldset>";
      echo "</form>";
  echo "</div>";
      }
        ?>






        <!-- ............................clientes tabla............................. -->


        <div class="div_table_pro">
        <?php
        echo "<table id='myTableCL' class='table-fill table table-hover'>
        <thead>
              <tr class='tr_fav'>
                <th class='th_fav th_fav_admin text-center' style='display:none;'>ID</th>
                <th class='th_fav th_fav_admin text-center'>Nombre</th>
                <th class='th_fav th_fav_admin text-center'>Email</th>
                <th class='th_fav th_fav_admin text-center'>Usuario</th>
                <th class='th_fav th_fav_admin text-center'>Tipo</th>
                <th colspan='3' class='th_fav th_fav_admin text-center'>Opciones</th>
              </tr>
        </thead>";
          echo "<tbody>";

        $peticion = "select * from clientes";
        $resultado = mysqli_query($connect,$peticion);
        while ($fila = mysqli_fetch_array($resultado)) {
          echo "<tr class='tr_fav'>";
                echo  "<td class='td_fav text-center'>".$fila['nombre']."</td>";
                echo  "<td class='td_fav text-center'>".$fila['email']."</td>";
                echo  "<td class='td_fav text-center'>".$fila['usuario']."</td>";
                echo  "<td class='td_fav text-center'>".$fila['fax']."</td>";
                echo "<td class='td_fav text-center'>";
        echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='post'>";
                  echo "<input type='number' hidden name='actuidcl' class='mat-input mat-menor tabla_actualizar' value='".$fila['id']."'>";
                  echo "<input class='td_fav_submit_edit' type='submit' name='' value='Editar' class='buttom_enviar_borrar button_actu'>";
        echo "</form>";
                echo "</td>";
              echo "<form class='' action='actborrusuario.php' method='post'>";
                echo "<td class='td_fav text-center'>";
                  echo "<input type='text' hidden name='ctbr' value='2'>";
                  echo "<input type='number' hidden name='idcl' class='mat-input mat-menor tabla_actualizar' value='".$fila['id']."'>";
                  echo "<input class='td_fav_submit_edit' type='submit' name='' value='Borrar' class='buttom_enviar_borrar button_actu'>";
                echo "</td>";
              echo "</form>";

              echo  "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
         ?>
        </div>
        <ul class="pagination pagination-lg pager" id="myPagerCL"></ul>

<hr class="hr">
        <div class="search">
             <input type="text" id="search" class="searchinput" placeholder="Buscar Producto por Nombre">
             <input type="submit" class="searchButton" value="">
             <img class="searchimg" src="../../img/buscar.png" alt="">
        </div>




<div class="div_table_pro">
<?php
echo "<table id='result' id='myTable' class='table-fill table table-hover'>
<thead>
      <tr class='tr_fav'>
        <th class='th_fav th_fav_admin text-center' style='display:none;'>ID</th>
        <th class='th_fav th_fav_admin text-center'>Nombre</th>
        <th class='th_fav th_fav_admin text-center'>Precio</th>
        <th class='th_fav th_fav_admin text-center'>Peso</th>
        <th class='th_fav th_fav_admin text-center'>Tamaño</th>
        <th class='th_fav th_fav_admin text-center'>Talla</th>
        <th class='th_fav th_fav_admin text-center'>Existencias</th>
        <th class='th_fav th_fav_admin text-center'>Activado</th>
        <th class='th_fav th_fav_admin text-center'>M_descripción</th>
        <th class='th_fav th_fav_admin text-center resp_td'>Descripción</th>
        <th colspan='3' class='th_fav th_fav_admin text-center'>Opciones</th>
      </tr>
</thead>";
  echo "<tbody>";

$peticion = "select * from productos order by id desc";
$resultado = mysqli_query($connect,$peticion);
while ($fila = mysqli_fetch_array($resultado)) {
  echo "<tr class='tr_fav'>";
        echo  "<td class='td_fav text-center'>".$fila['nombre']."</td>";
        echo  "<td class='td_fav text-center'>".$fila['precio']."</td>";
        echo  "<td class='td_fav text-center'>".$fila['peso']."</td>";
        echo  "<td class='td_fav text-center'>".$fila['tamano']."</td>";
        echo  "<td class='td_fav text-center'>".$fila['talla']."</td>";
        echo  "<td class='td_fav text-center'>".$fila['existencias']."</td>";
        echo  "<td class='td_fav text-center'>".$fila['activado']."</td>";
        echo  "<td class='td_fav text-center'>".$fila['muestra_descripcion']."</td>";
        echo  "<td class='td_fav text-center resp_td'>".$fila['descripcion']."</td>";
        echo "<td class='td_fav text-center'>";
echo "<form action='".htmlspecialchars($_SERVER['PHP_SELF'])."' method='post'>";
          echo "<input type='number' hidden name='actuid' class='mat-input mat-menor tabla_actualizar' value='".$fila['id']."'>";
          echo "<input class='td_fav_submit_edit' type='submit' name='' value='Editar' class='buttom_enviar_borrar button_actu'>";
echo "</form>";
        echo "</td>";
      echo "<form class='' action='borrarproducto.php' method='post'>";
        echo "<td class='td_fav text-center'>";
          echo "<input type='text' hidden name='ruta_destino' value='adminProduct'>";
          echo "<input type='number' hidden name='idse' class='mat-input mat-menor tabla_actualizar' value='".$fila['id']."'>";
          echo "<input class='td_fav_submit_edit' type='submit' name='' value='Borrar' class='buttom_enviar_borrar button_actu'>";
        echo "</td>";
      echo "</form>";

      echo  "</tr>";
}
echo "</tbody>";
echo "</table>";
 ?>
</div>
<ul class="pagination pagination-lg pager" id="myPager"></ul>

<br>



</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../../JS/bootstrap-table-pagination.js"></script>
<!-- Menú fixed -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script> -->
<!-- Resposive menú -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script> -->
<script src="../../JS/index.js"></script>
<script src="js/index.js"></script>
<?php
include '../../php/piedepagina.inc';
 ?>

</body>
</html>
