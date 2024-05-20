<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_pedido = $_POST['id_pedido'];
    $estatus = $_POST['Estatus'];

    // Actualizar el estatus del pedido
    $sql = "UPDATE pedidos SET Estatus=? WHERE id_pedido=?";
    $stmt = $conecta->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conecta->error);
    }

    $stmt->bind_param("si", $estatus, $id_pedido);

    if ($stmt->execute()) {
        echo "Estatus actualizado correctamente.";
        header("Location: pedidos.php"); // Redirigir a la página de pedidos
        exit;
    } else {
        echo "Error al actualizar el estatus: " . $stmt->error;
    }

    $stmt->close();
    $conecta->close();
}
?>