<?php
if (!empty($_POST["btn_modificar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["precio"]) and !empty($_POST["tipo"]) and !empty($_POST["cantidad"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $tipo = $_POST["tipo"];
        $cantidad = $_POST["cantidad"];

        $sql = $conexion -> query ("UPDATE empanadas SET nombre='$nombre',tipo='$tipo',precio='$precio',cantidad=$cantidad WHERE id = $id");

        if($sql == 1){
            echo "<script>window.location.href='index.php';</script>";
            exit;
        }else{
            echo '<div class="alert alert-danger">Error al modificar</div>';
        }
    }
}else{
    echo '<div class="alert alert-warning">Algun Campo Esta Vacio</div>';
}
?>