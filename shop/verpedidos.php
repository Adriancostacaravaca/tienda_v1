<?php
  $titulo="Pedidos";
  $activo = "Pedidos";
  include_once "templates/header.php";
?>

  <main>
    <div class="container">
        <?php
          require_once "crud/conexion.php";
              $consulta_sql="SELECT * FROM pedidos";
              $resultado=$conexion->query($consulta_sql);          
                echo "<table class='table table-striped'>";
                echo "<tr><th>ID</th><th>Nombre</th><th>País</th><th>Ciudad</th><th>Calle</th></tr>";
                while($fila = $resultado->fetch_object()){                    

                    //Muestro los datos en el navegador
                    echo "<tr><td>" . $fila->id . "</td>";
                    echo "<td>" . $fila->nombre . "</td>";
                    echo "<td>" . $fila->pais . "</td>";
                    echo "<td>" . $fila->ciudad . "</td>";
                    echo "<td>" . $fila->calle . "</td></tr>";
                }
                echo "</table>";
        ?>
    </div>
  </main>

  <?php include_once "templates/footer.php"; ?>
