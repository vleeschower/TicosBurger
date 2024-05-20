<?php
session_start();
require_once realpath(__DIR__ . '/../../conexion.php');

if(!isset($_SESSION['id'])){
    header("Location: ../../InicioSesión/IndexSesion.php");
    exit;
} 
$nombre = $_SESSION['Nombre'];
$apellidos = $_SESSION['Apellidos'];

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre2 = $_POST['name'];
    $correo = $_POST['email'];
    $comentario = $_POST['comment'];
    
     // Obtener la fecha actual
     $fecha = date("Y-m-d H:i:s");

    // Preparar la consulta SQL
    $sql = "INSERT INTO empreconnect.opiniones (Nombre, Correo, Comentario, Fecha) VALUES ('$nombre2', '$correo', '$comentario','$fecha')";
    
    // Ejecutar la consulta y verificar si se ejecutó correctamente
    if ($conecta->query($sql) === TRUE) {
        echo "<script>mostrarMensaje();</script>";
    } else {
        echo "Error al enviar el comentario: " . $conecta->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="estilos_opinion.css">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="../css/styles.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<title>Formulario de Comentarios</title>
</head>
<body>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="../index.php">Tico's Burger</a>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nombre . ' ' . $apellidos . ' '; ?><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="confcliente.php">Configuración</a></li>
                <li><a class="dropdown-item" href="../index.php">Inicio</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="../../administrador2/logout.php">Salir</a></li>                
            </ul>
        </li>
    </ul>    
</nav>
<div class="container">
    <h2>Deja un comentario</h2>
    <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>
        <label for="comment">Comentario:</label>
        <textarea id="comment" name="comment" required></textarea>
        <input type="submit" value="Enviar comentario">
    </form>
</div>
<div id="mensaje" class="mensaje-oculto">
    <span class="cerrar" onclick="cerrarMensaje()">×</span>
    ¡Comentario enviado correctamente!
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>
</html>

