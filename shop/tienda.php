<!doctype html>

<?php
    $titulo = "Tienda de Adrián";
    $activo = "Inicio";
    include_once "templates/header.php";
?>

<main>

  <section class="text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1>Artículos de la tienda de Adrián</h1>
        <p class="lead text-body-secondary">Cualquier producto deportivo a tu alcance</p>
      </div>
    </div>
  </section>

  <div class="album bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
            include "crud/conexion.php";
            $consulta_sql="SELECT * FROM productos";
            $resultado=$conexion->query($consulta_sql);
            while($fila = $resultado->fetch_object()){
            ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="row">                          
                          <img src="img/<?php echo $fila->imagen?>" class="card-img-top mx-auto" style="max-width: 10vw;">                          
                        </div>
                        <div class="card-body">
                        <h3> <?php echo $fila->nombre;?></h3>
                        <p class="card-text"><?php echo $fila->descripcion ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-group">
                            <a href="detalle.php?id=<?php echo $fila->id ?>"><button type="button" class="btn btn-outline-dark btn-sm">Ver detalles</button></a>
                            <a href="carrito.php?id=<?php echo $fila->id ?>"><button type="button" class="btn btn-outline-success btn-sm" onclick="return alert('<?php echo $fila->nombre?> añadido a tu carrito')">Al carrito</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
      </div>
    </div>
  </div>

</main>


<?php include_once "templates/footer.php"; ?>

