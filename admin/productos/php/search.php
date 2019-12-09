<?php
if(!isset($_POST['search'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['search']);
  $query = "SELECT * FROM productos WHERE nombre LIKE '%$search%' ";
  $res = $mysqli->query($query);
  if (!isset($res)) {
    echo "No se encontro ningun resultado";
  }
  else {
  echo "<table id='myTable' class='table-fill table table-hover'>
  <thead>
        <tr class='tr_fav'>
          <th class='th_fav th_fav_admin text-left' style='display:none;'>ID</th>
          <th class='th_fav th_fav_admin text-left'>Nombre</th>
          <th class='th_fav th_fav_admin text-left'>Precio</th>
          <th class='th_fav th_fav_admin text-left'>Peso</th>
          <th class='th_fav th_fav_admin text-left'>Tamaño</th>
          <th class='th_fav th_fav_admin text-left'>Talla</th>
          <th class='th_fav th_fav_admin text-left'>Existencias</th>
          <th class='th_fav th_fav_admin text-left'>Activado</th>
          <th class='th_fav th_fav_admin text-left'>M_descripción</th>
          <th class='th_fav th_fav_admin text-left'>Descripción</th>
          <th colspan='3' class='th_fav th_fav_admin text-left'>Opciones</th>
        </tr>
  </thead>
    <tbody>";
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    echo "<tr class='tr_fav'>
          <td class='td_fav text-center'>".$row['nombre']."</td>
          <td class='td_fav text-center'>".$row['precio']."</td>
          <td class='td_fav text-center'>".$row['peso']."</td>
          <td class='td_fav text-center'>".$row['tamano']."</td>
          <td class='td_fav text-center'>".$row['talla']."</td>
          <td class='td_fav text-center'>".$row['existencias']."</td>
          <td class='td_fav text-center'>".$row['activado']."</td>
          <td class='td_fav text-center'>".$row['muestra_descripcion']."</td>
          <td class='td_fav text-center'>".$row['descripcion']."</td>
          <td class='td_fav text-center'>
  <form action='adminproductos.php' method='post'>
            <input type='number' hidden name='actuid' class='mat-input mat-menor tabla_actualizar' value='".$row['id']."'>
            <input class='td_fav_submit_edit' type='submit' name='' value='Editar' class='buttom_enviar_borrar button_actu'>
  </form>
          </td>
          <td class='td_fav text-center'>
          <form class='' action='borrarproducto.php' method='post'>
            <input type='text' hidden name='ruta_destino' value='adminProduct'>
            <input type='number' hidden name='idse' class='mat-input mat-menor tabla_actualizar' value='".$row['id']."'>
            <input class='td_fav_submit_edit' type='submit' name='' value='Borrar' class='buttom_enviar_borrar button_actu'>
          </form>
          </td>
        </tr>";
  }
  echo "</tbody>
            </table>";
  }
}

search();
