<?php
    session_start();
    if(empty($_GET["id"])){
 
    }else{
        // Leo el id que me pasan como parámetro
        $id=$_GET["id"];
        // Recupero el carrito de la variable session
        $lista=unserialize($_SESSION["listaproductos"]);
        // Uso un contador para saber en la posición del array en la que me encuentro
        $contador=0;
        var_dump($lista);
        // Recorro la lista con los productos del carrito
        foreach($lista as $idLista){ // lo hemos llamado idLista porque no podemos repetir la variable id.
            // Si el id del producto coincide con el de la línea, lo elimino
            if($id==$idLista){
                array_splice($lista, $contador,1);
                // array_slice permite borrar varios elementos
            }
            $contador++;
        }
        // Guardo la lista modificada en la variable de sesión
        $_SESSION["listaproductos"]=serialize($lista);
    }
    // Redirijo
    header("location: ../vercarrito.php");