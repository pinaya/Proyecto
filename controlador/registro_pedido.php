<?php

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["producto"]) and !empty($_POST["cantidad"]) and !empty($_POST["precio"]) and !empty($_POST["telefono"]) and !empty($_POST["direccion"]) and !empty($_POST["fecha_entrega"])) {

        $nombre = $_POST["nombre"];
        $producto = $_POST["producto"];
        $cantidad = $_POST["cantidad"];
        $precio = $_POST["precio"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $fecha_entrega = $_POST["fecha_entrega"];

        $sql = $conexion->query("insert into pedido(nombre,producto,cantidad,precio,telefono,direccion,fecha_entrega)
        values('$nombre','$producto',$cantidad,$precio,'$telefono','$direccion','$fecha_entrega')");
        if ($sql == 1) {
            echo '<div class="alert alert-success">Pedido ingresado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar el pedido</div>';
        }

    } else {
        echo '<div class="alert alert-warning"> Algunos campos estan vacios</div>';
    }


}

?>