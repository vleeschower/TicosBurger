<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
}
$nombre=$_SESSION['Nombre'];

$id_opinion = $_GET['id_opinion']; // Obtener el ID del usuario a eliminar

// Consulta para eliminar al usuario
$sql="DELETE FROM opiniones WHERE id_opinion=$id_opinion";
$resultado=$conecta->query($sql);

// Consulta para actualizar los identificadores
$sql_actualizar = "SET @num := 0;
                   UPDATE usuarios SET id = @num := (@num+1);
                   ALTER TABLE usuarios AUTO_INCREMENT = 1;";

if ($conecta->multi_query($sql_actualizar) === TRUE) {
    echo "Identificadores actualizados correctamente.";
} else {
    echo "Error al actualizar los identificadores: " . $conecta->error;
}

header("Location: adminUsuarios.php"); // Redirigir a la primera página 54
?>