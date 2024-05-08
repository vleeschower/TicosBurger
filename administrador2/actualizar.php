<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
}
$nombre=$_SESSION['Nombre'];

$id_usuario = $_POST['id']; // Obtener el ID del usuario a actualizar
$nombre_usuario = $_POST['Nombre']; // Obtener el nuevo nombre del usuario
$apellido_usuario=$_POST['Apellidos'];
$correo_usuario=$_POST['Correo'];
$contraseña_usuario=$_POST['Contraseña'];
$telefono_usuario=$_POST['Telefono'];
$id_cargo=$_POST['id_cargo'];

// Consulta para actualizar los datos del usuario
$sql = "UPDATE usuarios SET Nombre='$nombre_usuario', Apellidos='$apellido_usuario', Correo='$correo_usuario', Contraseña='$contraseña_usuario', Telefono='$telefono_usuario', id_cargo='$id_cargo' WHERE id=$id_usuario";
$resultado=$conecta->query($sql);

header("Location: adminUsuarios.php"); // Redirigir a la primera página
?>