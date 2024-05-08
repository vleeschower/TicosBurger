<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
}
$nombre=$_SESSION['Nombre'];

$id_usuario = $_GET['id']; // Obtener el ID del usuario a eliminar

// Consulta para eliminar al usuario
$sql="DELETE FROM usuarios WHERE id=$id_usuario";
$resultado=$conecta->query($sql);

header("Location: adminUsuarios.php"); // Redirigir a la primera página 54
?>