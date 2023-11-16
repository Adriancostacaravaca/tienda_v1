<?php
    if(empty($_GET["id"])){
        echo "No has pasado id de artículo";
    }else{
        require_once "crud/conexion.php";
        $id=$_GET["id"];
        $textoSQL="SELECT * FROM PRODUCTOS WHERE id=$id";
        $resultado=$conexion->query($textoSQL);
        $producto=$resultado->fetch_object();
    }

    $titulo="Detalles del artículo " . $producto->nombre;
    $activo = "";
    include_once "templates/header.php";
?>

    <main>
        <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <?php
                    if(empty($_GET["id"])){
                        echo "No has pasado id de artículo";
                    }else{
                        require_once "crud/conexion.php";
                        $id=$_GET["id"];
                        $textoSQL="SELECT * FROM PRODUCTOS WHERE id=$id";
                        $resultado=$conexion->query($textoSQL);
                        $producto=$resultado->fetch_object();
                    ?>               
            </div>
        </div>
        <section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="card" style="border-radius: 15px;">
          <div class="bg-image hover-overlay ripple ripple-surface ripple-surface-light"
            data-mdb-ripple-color="light">
            <img src="img/<?php echo $producto->imagen ?>"
              style="border-top-left-radius: 15px; border-top-right-radius: 15px;" class="img-fluid card-img-top"
              />
  
          </div>
          <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
              <div>
                <p><?php echo "Producto: " . $producto->nombre ?></p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
              <div>
                <p><?php echo "Descripción: " . $producto->descripcion ?></p>
              </div>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body pb-0">
            <div class="d-flex justify-content-between">
              <div>
                <p><?php echo "Precio: " . round($producto->precio,2) . "€" ?></p>
              </div>
            </div>
          </div>            
          <hr class="my-0" />
          <div class="card-body pb-0">
            <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
              <div class="form-group"><a href="tienda.php"><button type="button" class="btn btn-outline-dark btn-sm">Regresar</button></a>
              <a href="comentarios.php?id=<?php echo $producto->id ?>"><button type="button" class="btn btn-outline-dark btn-sm">Comentar</button></a>
            </div>
              <a href="carrito.php?id=<?php echo $producto->id ?>"><button type="button" class="btn btn-outline-success" onclick="return alert('Producto añadido a tu carrito')">Añadir al carrito</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        <?php
            }
        ?>
        </div>
    </main>

    <?php include_once "templates/footer.php"; ?>