<?php 
  $titulo = "Registro de usuario";
  include "crud/conexion.php";
  if (isset($_POST['submit'])) {

    $nombre=escapar($_POST["nombre"]);
    $contrasenia=escapar($_POST["contrasenia"]);
    $consultausuario="SELECT * from usuarios where nombre = '$nombre'";
    $resultado=$conexion->query($consultausuario);
    $usuario = $resultado->fetch_object();
    if ($usuario->nombre != $nombre) {
      $consulta=$conexion->query("INSERT INTO usuarios (nombre, contrasenia) VALUES
      ('$nombre', '$contrasenia')");
      header("location: login.php");
    }else{
      echo "<p>Error, usuario ya existente</p>";
    }
    
  }
?>

<!doctype html>
<html lang="en">

<head>
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
      <h2 class="mt-4">Regístrate en la tienda de Adrián</h2>
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nombre">Usuario</label>
          <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="descripcion">Contraseña</label>
          <input type="password" name="contrasenia" id="contrasenia" class="form-control" required>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-outline-success" value="Registrar usuario">
          <a href="login.php"><input type="button" name="sesion" class="btn btn-outline-dark" value="Iniciar sesión"></a>
        </div>
      </form>
    </div>
  </div>
  
</div>

<?php include_once "templates/footer.php"; ?>

