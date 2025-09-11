<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masterpacker</title>

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/723405b65b.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once("panel_superior.php");
    ?>

    <script>
        function eliminar() {
            var respuesta = confirm("Estas seguro que deseas eliminar?");
            return respuesta;
        }
    </script>
    <?php
    include("modelo/conexion.php");
    include "controlador/eliminar_pedido.php";
    ?>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text secondary">Gestion de Pedidos</h3>
            <?PHP
            include("controlador/registro_pedido.php");
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Producto</label>
                <input type="text" class="form-control" name="producto">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input type="number" step="any" class="form-control" name="precio">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de entrega</label>
                <input type="date" class="form-control" name="fecha_entrega">
            </div>

            <button type="submit" class="btn btn-primary" name="btningresar" value="ok">Ingresar Pedido</button>
        </form>

        <div class="col-8 p-4 bg-secondary">
            <h3 class="text-center text-light">Sistema MasterPacker</h3>
            <table class="table table-hover">
                <thead class="bg-primary">
                    <tr>
                        <th scope="col">Nro Pedido</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Fecha de entrega</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("select * from pedido");

                    while ($datos = $sql->fetch_object()) {
                        ?>
                        <tr>
                            <th scope="row"> <?= $datos->id ?> </th>
                            <td> <?= $datos->nombre ?> </td>
                            <td> <?= $datos->producto ?> </td>
                            <td> <?= $datos->cantidad ?> </td>
                            <td> <?= $datos->precio ?> </td>
                            <td> <?= $datos->telefono ?> </td>
                            <td> <?= $datos->direccion ?> </td>
                            <td> <?= $datos->fecha_entrega ?> </td>

                            <td>
                                <a href="modificar_pedido.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i
                                        class="fa-solid fa-pen"></i></a>
                                <a onclick="return eliminar()" href="sistema.php?id=<?= $datos->id ?>"
                                    class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>

    <?php
    include_once("footer.php");
    ?>
</body>

</html>