<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
}
$nombre=$_SESSION['Nombre'];
$apellidos = $_SESSION['Apellidos'];

$id=$_SESSION['id'];
$id_cargo=$_SESSION['id_cargo'];

// Consulta para obtener la descripción del cargo
$sql_cargo = "SELECT descripcion FROM cargo WHERE id_cargo=$id_cargo";
$resultado_cargo = $conecta->query($sql_cargo);

if ($resultado_cargo->num_rows > 0) {
    // Almacenar la descripción del cargo en una variable de sesión
    while($row = $resultado_cargo->fetch_assoc()) {
      $_SESSION['descripcion_cargo'] = $row["descripcion"];
    }
  } else {
    echo "0 resultados";
  }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="estilo.css">
    <script src="app.js" async></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Tienda de Hamburguesas</title>    
</head>
<body>
    <header>
        <h1><img src="img/Logo.png" alt=""></h1>
        <nav class="nav">                        
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="index.php" class="nav_link">Inicio</a>
                    <a href="../cliente/categoria/burger.html" class="nav_link">Hamburguesa</a>
                    <a href="../cliente/categoria/tacos.html" class="nav_link">Tacos</a>
                    <a href="../cliente/categoria/quesadillas.html" class="nav_link">Quesadillas</a>
                </li>                
            </ul>            
        </nav>                  
    </header> 
    <!--usuario
    <div class="usuario">
        <img src="img/image-usuario.png" alt="">
        <div class="info-usuario">
            <div class="nombre-email">
                <span class="nombre">rperez</span>
                <span class="email">rperez@gmail.com</span>
            </div>
            <i class="uil-ellipsis-v"></i>
        </div>
    </div>-->
    <!-- Navbar-->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nombre . ' ' . $apellidos . ' '; ?><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/categoria/confcliente.php">Configuración</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="../administrador2/logout.php">Salir</a></li>
            </ul>
            </li>
    </ul>    
    </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
</body>
</html>