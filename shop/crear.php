<?php 
  $titulo = "Crear producto";
  $activo = "Crear";
  include_once "templates/header.php"; 
  include "crud/conexion.php";
  if (isset($_POST['submit'])) {
    if(isset($_FILES['imagen'])) {
      $nombreFichero = date("Y-m-d - H-i-s")."-".$_FILES['imagen']['name'];
      //Leo la ubicación temporal del archivo para después dejarlo en la carpeta deseada
      $file_loc = $_FILES['imagen']['tmp_name'];        
      //movemos el archivo a la carpeta deseada
      move_uploaded_file($file_loc, "img/".$nombreFichero); 
  
    }else{
      $nombreFichero="imagen.jpg";
    }

    $nombre=escapar($_POST["nombre"]);
    $descripcion=escapar($_POST["descripcion"]);
    $precio=$_POST["precio"];    
    $imagen=$nombreFichero;
    $consulta=$conexion->query("INSERT INTO productos (nombre, descripcion, imagen, precio) VALUES
      ('$nombre', '$descripcion', '$imagen', $precio)");

    header("location: tienda.php");
  }
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Crea un producto</h2>
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="descripcion">Descripción</label>
          <textarea class="form-control" name="descripcion">
          </textarea>
        </div>
        <div class="form-group">
          <label for="precio">Precio (€)</label>
          <input type="number" step="any" name="precio" id="precio" class="form-control">
        </div>        
        <div class="form-group">
          <label for="imagen">Imagen</label>
          <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
        </div>
        <hr>
        <div class="form-group">
          <a href="tienda.php"><button type="button" class="btn btn-outline-dark ">Regresar a la tienda</button></a>
          <input type="submit" name="submit" class="btn btn-outline-success" value="Crear producto">
        </div>
      </form>
    </div>
  </div>
  
</div>

<?php include_once "templates/footer.php"; ?>