<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
}
$nombre=$_SESSION['Nombre'];

$id_usuario = $_GET['id']; // Obtener el ID del usuario a editar

// Consulta para obtener los datos del usuario a editar
$sql="SELECT usuarios.*, cargo.descripcion FROM usuarios INNER JOIN cargo ON usuarios.id_cargo=cargo.id_cargo WHERE usuarios.id=$id_usuario";
$resultado=$conecta->query($sql);

$row = $resultado->fetch_assoc(); // Obtener los datos del usuario a editar
?>

<!-- Tu código HTML -->

<form action="actualizar.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Nombre:</label>
    <input type="text" name="Nombre" value="<?php echo $row['Nombre']; ?>">
    <!-- Agrega los demás campos aquí -->
    <input type="submit" value="Actualizar">
</form>

<!-- Tu código HTML -->