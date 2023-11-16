<?php 
  $titulo = "Login de usuario";
  include "crud/conexion.php";
  if (isset($_POST['submit'])) {

    $nombre=escapar($_POST["nombre"]);
    $contrasenia=escapar($_POST["contrasenia"]);
    $consultausuario="SELECT * from usuarios where nombre='$nombre' and contrasenia='$contrasenia'";
    $resultado=$conexion->query($consultausuario);
    $usuario = $resultado->fetch_object();
    if ($usuario->nombre != $nombre) {
      echo "<p>Error, usuario y/o contraseña equivocado</p>";
    }else{
      header("location: tienda.php");
    }
  }
?>

<!doctype html>
<html lang="en">

<head>
  <title><?php echo $titulo?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Conéctate a tu cuenta</h2>
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Usuario</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="contrasenia">Contraseña</label>
          <input type="password" name="contrasenia" id="contrasenia" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-outline-success" value="Enviar">
          <a href="index.php"><button type="button" class="btn btn-outline-dark ">¿No tienes una cuenta creada?</button></a>
        </div>
      </form>
    </div>
  </div>
  
</div>

<?php include_once "templates/footer.php"; ?>



