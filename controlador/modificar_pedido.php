<?php
if (!empty($_POST["btnmodificar"])){

    if (!empty($_POST["nombre"]) and !empty($_POST["producto"]) and !empty($_POST["cantidad"]) and !empty($_POST["precio"]) and !empty($_POST["telefono"]) and !empty($_POST["direccion"]) and !empty($_POST["fecha_entrega"])) {

        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $producto = $_POST["producto"];
        $cantidad = $_POST["cantidad"];
        $precio = $_POST["precio"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $fecha_entrega = $_POST["fecha_entrega"];

        $sql = $conexion->query("update pedido set nombre='$nombre', producto='$producto', cantidad= $cantidad, precio= $precio,
        telefono= '$telefono', direccion='$direccion', fecha_entrega='$fecha_entrega' where id=$id ");

        if ($sql == 1) {
            header("location:sistema.php");
        } else {
            echo '<div class="alert alert-danger">Error al modificar el pedido</div>';
        }

    } else {
        echo '<div class="alert alert-warning">Algunos campos estan vacios</div>';
    }

}
?>