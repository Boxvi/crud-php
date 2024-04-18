<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud php mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <script>
        function eliminar(){
            var respuesta=confirm("Estas seguro que quieres eliminarlo?")
        }
    </script>




    <h1 class="text-center">hola mundo</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar.php"
    ?>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <div class="mb-3">
                <h5 class="text-center alert alert-success">CREAR EMPADADAS</h5>
            </div>
            <?php
            include "controlador/registro.php";
            ?>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" placeholder="Precio">
            </div>
            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>

                <select class="form-select" id="tipo" name="tipo">
                    <option selected>Seleccione su Tipo</option>
                    <option value="Carne Roja">Carne Roja</option>
                    <option value="Carne Blanca">Carne Blanca</option>
                    <option value="Queso">Queso</option>
                </select>

            </div>
            <div class="mb-3">
                <label for="Cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
            </div>
            <button type="submit" class="btn btn-success" name="btn_registrar" value="ok">Enviar</button>
        </form>


        <div class="col-8 p-4">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">TIPO</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">TOTAL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";

                    $sql = $conexion->query("select * from empanadas");

                    while ($datos = $sql->fetch_object()) {
                        $total = $datos->precio * $datos->cantidad;

                    ?>
                        <tr>
                            <th scope="row"><?= $datos->id ?></th>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->tipo ?></td>
                            <td><?= $datos->precio ?></td>
                            <td><?= $datos->cantidad ?></td>
                            <td><?= $total ?></td>
                            <td>
                                <a href="modificar.php?id=<?= $datos->id ?>" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                                <a onclick="return eliminar()"  href="index.php?id=<?= $datos->id ?>" class="btn btn-danger"><i class="bi bi-archive"></i></a>
                            </td>
                        </tr>

                    <?php }
                    ?>
                </tbody>
            </table>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>