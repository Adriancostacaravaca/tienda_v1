<?php
  $titulo="Comentarios";
  $activo="";
  include_once "templates/header.php";
  include_once "crud/conexion.php";

  if (isset($_POST['submit'])) {

    // COJO LA ID DEL PRODUCTO EN EL QUE VOY A COMENTAR
    $id=$_GET["id"];

    // CON LA ID, LO BUSCO EN LA BASE DE DATOS Y SACO SU NOMBRE
    $textoSQL="SELECT * FROM PRODUCTOS WHERE id=$id";
    $resultado=$conexion->query($textoSQL);
    $producto=$resultado->fetch_object();
    $nombreproducto=$producto->nombre;

    $nombre=escapar($_POST["nombre"]);
    $comentario=escapar($_POST["comentario"]);
    $consulta=$conexion->query("INSERT INTO comentarios (nombre, nombre_producto, comentario) VALUES
      ('$nombre', '$nombreproducto', '$comentario')");

    header("location: vercomentarios.php");

  }



  ?>

  <main>

  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Haz un comentario</h2>
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="descripcion">Comentario</label>
          <textarea class="form-control" name="comentario" required>
          </textarea>
        </div>
        <hr>
        <div class="form-group">
        <a href="tienda.php"><button type="button" class="btn btn-outline-dark ">Regresar a la tienda</button></a>
          <input type="submit" name="submit" class="btn btn-outline-success" value="Publicar comentario">
        </div>
      </form>
    </div>
  </div>
  
</div>

  </main>

  <?php
  include_once "templates/header.php";
?>