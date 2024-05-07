<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
}
$nombre=$_SESSION['Nombre'];

$id_usuario = $_POST['id']; // Obtener el ID del usuario a actualizar
$nombre_usuario = $_POST['Nombre']; // Obtener el nuevo nombre del usuario

// Agrega los demás campos aquí

// Consulta para actualizar los datos del usuario
$sql="UPDATE usuarios SET Nombre='$nombre_usuario' WHERE id=$id_usuario";
$resultado=$conecta->query($sql);

header("Location: adminUsuarios.php"); // Redirigir a la primera página
?>