<?php 
  $titulo = "Realizar pedido";
  $activo = "";
  include_once "templates/header.php"; 
  include "crud/conexion.php";
  if (isset($_POST['submit'])) {
    
    $nombre=escapar($_POST["nombre"]);
    $pais=escapar($_POST["pais"]);
    $ciudad=escapar($_POST["ciudad"]);
    $calle=escapar($_POST["calle"]);

    $consulta=$conexion->query("INSERT into pedidos (nombre, pais, ciudad, calle) VALUES ('$nombre','$pais','$ciudad','$calle')");
    session_start();
    $_SESSION["listaproductos"]=[];
    header("location: tienda.php");
  }
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Haz tu pedido</h2>
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="pais">País</label>
          <input type="text" name="pais" id="pais" class="form-control" required>
        </div>        
        <div class="form-group">
          <label for="ciudad">Ciudad</label>
          <input type="text" name="ciudad" id="ciudad" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="calle">Calle</label>
          <input type="text" name="calle" id="calle" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-outline-success" value="Realizar pedido">
          <a href="tienda.php"><button type="button" class="btn btn-outline-dark ">Regresar a la tienda</button></a>
        </div>
      </form>
    </div>
  </div>
  
</div>

<?php include_once "templates/footer.php"; ?>