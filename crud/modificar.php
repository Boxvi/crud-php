<?php

include "modelo/conexion.php";

$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM empanadas WHERE id = $id");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <form class="col-4 p-3 m-auto" method="POST">
        <div class="mb-3">
            <h5 class="text-center alert alert-warning">MODIFICAR EMPADADAS</h5>
            <input type="hidden" name="id" id="id" value="<?= $_GET["id"] ?>">
        </div>
        <?php
        include "controlador/modificar.php";

        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" value="<?= $datos->precio ?>">
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>

                <select class="form-select" id="tipo" name="tipo">
                    <option value="">Seleccione su Tipo</option>
                    <?php
                    $opciones = array("Carne Roja", "Carne Blanca", "Queso");
                    foreach ($opciones as $opcion) {
                        $selected = ($opcion == $datos->tipo) ? 'selected' : '';
                        echo "<option value='$opcion' $selected>$opcion</option>";
                    }
                    ?>
                </select>

            </div>
            <div class="mb-3">
                <label for="Cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value="<?= $datos->cantidad ?>">
            </div>
        <?php
        }
        ?>



        <button type="submit" class="btn btn-warning" name="btn_modificar" value="ok">Modificar Empanada</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>