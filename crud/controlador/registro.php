<?php

if(!empty($_POST["btn_registrar"])){
    if(!empty($_POST["nombre"]) and !empty($_POST["precio"]) and !empty($_POST["tipo"]) and !empty($_POST["cantidad"])){
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $tipo = $_POST["tipo"];
        $cantidad = $_POST["cantidad"];

        $sql = $conexion -> query("INSERT INTO empanadas(nombre, tipo, precio, cantidad) VALUES ('$nombre','$tipo','$precio',$cantidad)");

        if($sql == 1){
            echo '<div class="alert alert-success">Empanada Registrado correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Error al Registrado</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Algun Campo Esta Vacio</div>';
    }
}

?>
