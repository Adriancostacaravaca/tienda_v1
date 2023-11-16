<?php
  $titulo="Carrito";
  $activo = "Carrito";
  include_once "templates/header.php";
?>

  <main>
    <div class="container">
        <?php
          require_once "crud/conexion.php";
            if(empty($_SESSION["listaproductos"])){
                echo "El carrito está vacío";
            }else{
                $lista=unserialize($_SESSION["listaproductos"]);            
                echo "<table class='table table-striped'>";
                echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Imagen</th><th>Borrar producto</th></tr>";
                foreach($lista as $id){                    
                    
                    //Leo de la base de datos el resto de campos del producto usando el id                    
                    $textoSQL="SELECT * FROM PRODUCTOS WHERE id=$id";
                    $resultado=$conexion->query($textoSQL);
                    $producto=$resultado->fetch_object();

                    //Muestro los datos en el navegador
                    echo "<tr><td>" . $producto->id . "</td>";
                    echo "<td>" . $producto->nombre . "</td>";
                    echo "<td>" . substr($producto->descripcion, 0, 15) . '...' . "</td>";
                    echo "<td>" . round($producto->precio,2) . '€' . "</td>";
                    echo "<td><img src='img/" . $producto->imagen . "' style='height: 100px'>";
                    echo "<td><a href='crud/borrarelemento.php?id=$id'><button type='button' class='btn btn-outline-dark btn-sm'>Borrar</button></a></td></tr>";
                }
                echo "</table>";
                
                //Enlace a la página para borrar carrito
                echo "<div class='form-group'>";
                echo "<a href='crud/borrarcarrito.php'><button type='button' class='btn btn-outline-dark'>Vaciar carrito</button></a>";
                echo "<a href='pedido.php'><button type='button' class='btn btn-outline-success'>Hacer pedido</button></a>";
                echo "</div>";
            }
        ?>
    </div>
  </main>

  <?php include_once "templates/footer.php"; ?>
