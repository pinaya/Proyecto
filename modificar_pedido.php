<?php
include("modelo/conexion.php");
$id = $_GET["id"];
$sql = $conexion->query("select * from pedido where id=$id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once("panel_superior.php");
    ?>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text secondary">Modificar Pedidos</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?PHP
        include "controlador/modificar_pedido.php";
        while ($datos = $sql->fetch_object()) { ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Producto</label>
                <input type="text" class="form-control" name="producto" value="<?= $datos->producto ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad" value="<?= $datos->cantidad ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input type="number" step="any" class="form-control" name="precio" value="<?= $datos->precio ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $datos->telefono ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" value="<?= $datos->direccion ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de entrega</label>
                <input type="date" class="form-control" name="fecha_entrega" value="<?= $datos->fecha_entrega ?>">
            </div>

        <?php }
        ?>


        <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar Pedido</button>
    </form>

    <?php
    include_once("footer.php");
    ?>
</body>

</html>