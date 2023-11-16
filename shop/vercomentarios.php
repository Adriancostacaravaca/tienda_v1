<?php
  $titulo="Comentarios";
  $activo="Comentarios";
  include_once "templates/header.php";
  ?>

  <main>
    <div class="container">
    <?php
          require_once "crud/conexion.php";
          $consulta_sql="SELECT * FROM comentarios";
          $resultado=$conexion->query($consulta_sql);          
            echo "<table class='table table-striped'>";
            echo "<tr><th>ID</th><th>Usuario</th><th>Producto</th><th>Comentario</th></tr>";
            while($fila = $resultado->fetch_object()){                    

                //Muestro los datos en el navegador
                echo "<tr><td>" . $fila->id . "</td>";
                echo "<td>" . $fila->nombre . "</td>";
                echo "<td>" . $fila->nombre_producto . "</td>";
                echo "<td>" . $fila->comentario . "</td></tr>";
            }
            echo "</table>";
        ?>
    </div>
  </main>

  <?php
  include_once "templates/header.php";
?>