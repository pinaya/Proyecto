<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query("delete from pedido where id=$id");
    if ($sql==1) {
        echo'<div class="alert alert-success">Pedido Eliminado</div>';
    } else {
        echo'<div class="alert alert-danger">Error al eliminar el pedido</div>';;
        
    }
    
}
?>