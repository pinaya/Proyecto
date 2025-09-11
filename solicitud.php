<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masterpacker</title>

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/723405b65b.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include_once("panel_superior.php");
    ?>
    <?php
    include_once("header.php");
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
    <div class="container-fluid row d-flex justify-content-center align-items-center">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text secondary">Complete los campos</h3>
            <?PHP
            include("controlador/registro_pedido.php");
            $descripcion = isset($_GET['descripcion']) ? $_GET['descripcion'] : '';
            $precioUnitario = isset($_GET['precio']) ? $_GET['precio'] : '';
            ?>
            <div class="mb-3">
                <input type="text" class="redond form-control mt-2" name="nombre" placeholder="Nombre"
                    aria-label="default input example">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="producto" value="<?php echo $descripcion ?>" readonly>
            </div>
            <div class="mb-3">
                <input id="cantidad" type="number" class="redond form-control mt-2" name="cantidad" placeholder="Cantidad"
                    aria-label="default input example">
            </div>
            <div class="mb-3">
                <input id="precio" type="number" step="any" class="form-control" name="precio" readonly>
            </div>
            <div class="mb-3">
                <input type="text" class="redond form-control mt-2" name="telefono" placeholder="Telefono"
                    aria-label="default input example">
            </div>
            <div class="mb-3">
                <input type="text" class="redond form-control mt-2" name="direccion" placeholder="Direccion de entrega"
                    aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de entrega</label>
                <input type="date" class="form-control" name="fecha_entrega" value="2025-01-01" readonly>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="btningresar" value="ok">Solicitar Pedido</button>
            </div>
        </form>
        <script>
            // Precio unitario recibido desde PHP
            const precioUnitario = <?php echo $precioUnitario; ?>;

            const cantidadInput = document.getElementById("cantidad");
            const precioInput = document.getElementById("precio");

            // Escuchar cambios en el input cantidad
            cantidadInput.addEventListener("input", function () {
                let cantidad = parseFloat(cantidadInput.value) || 0;
                let precioTotal = precioUnitario * cantidad;
                precioInput.value = precioTotal.toFixed(2);
            });
        </script>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>

    <?php
    include_once("footer.php");
    ?>
</body>

</html>