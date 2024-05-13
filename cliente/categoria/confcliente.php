<?php
session_start();
require_once realpath(__DIR__ . '/../../conexion.php');

if(!isset($_SESSION['id'])){
    header("Location: ../../InicioSesión/IndexSesion.php");
    exit;
}
$nombre=$_SESSION['Nombre'];
$apellidos = $_SESSION['Apellidos'];

$id=$_SESSION['id'];
$id_cargo=$_SESSION['id_cargo'];

// Consulta para obtener los datos del usuario a editar
$sql="SELECT usuarios.*, cargo.descripcion FROM usuarios INNER JOIN cargo ON usuarios.id_cargo=cargo.id_cargo WHERE usuarios.id=$id";
$resultado=$conecta->query($sql);

$row = $resultado->fetch_assoc(); // Obtener los datos del usuario a editar

// Comprueba si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['Nombre'];
    $apellidos = $_POST['Apellidos'];
    $correo = $_POST['Correo'];
    $contraseña = $_POST['Contraseña']; 
    $telefono = $_POST['Telefono'];

    // Consulta SQL para actualizar los datos
    $sql = "UPDATE usuarios SET Nombre='$nombre', Apellidos='$apellidos', Correo='$correo', Contraseña='$contraseña', Telefono='$telefono' WHERE id=$id";
    $resultado=$conecta->query($sql);

    if ($resultado === TRUE) {
        header("Location: ../index.php"); // Redirigir a la primera página
    } else {
        echo "Error: " . $sql . "<br>" . $conecta->error;
    }
    $conecta->close();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tico's Burger</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index.php">Tico's Burger</a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nombre . ' ' . $apellidos . ' '; ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="confcliente.php">Configuración</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../../administrador2/logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Volver a:</div>
                            <!-- Cambiar link-->
                            <a class="nav-link" href="../index.php">
                                <!-- icono de Dashboard-->
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Inicio
                            </a>

                            <div class="sb-sidenav-menu-heading">Ir a menu de:</div>
                            <a class="nav-link" href="burger.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hamburger"></i></div>
                                Hamburguesas
                            </a>

                            <a class="nav-link" href="tacos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hamburger"></i></div>
                                Tacos
                            </a>

                            <a class="nav-link" href="quesadillas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-hamburger"></i></div>
                                Quesadillas
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        <?php echo $_SESSION['descripcion_cargo']; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
            <style>
            /* Agrega este bloque de estilo */
            table {
                border-collapse: separate;
                border-spacing: 0 1em;
            }
            </style>
                <main>
                    <div class="container-fluid px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="mt-4">Editar información</h1>
                        <a href="../index.php" onclick="history.back();" class="btn btn-danger"> X </a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Datos:</li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-footer d-flex align-items-start justify-content-between">
                                        <div class="d-flex ">
                                            <div>
                                            <img src="../assets/img/credencial2.png" alt="imagenUsuario" style="width: 100%; height: auto;">
                                            </div>
                                            
                                            <div>
                                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                                    <table border="0.5">
                                                        <tr>
                                                            <td>Nombre:</td>
                                                            <td>
                                                                <input type="text" name="Nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras, letras con acentos, ñ y espacios" value="<?php echo $row['Nombre']; ?>" required /><br/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Apellidos:</td>
                                                            <td>
                                                                <input type="text" name="Apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras, letras con acentos, ñ y espacios" value="<?php echo $row['Apellidos']; ?>" required /><br/>
                                                            </td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>Correo:</td>
                                                            <td>
                                                                <input type="email" name="Correo" value="<?php echo $row['Correo']; ?>" required /><br/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Contraseña:</td>
                                                            <td>
                                                                <input type="text" name="Contraseña" value="<?php echo $row['Contraseña']; ?>" required /><br/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Telefono:</td>
                                                            <td>
                                                                <input type="tel" name="Telefono" pattern="[0-9]{10}" title="Debe ingresar exactamente 10 números" value="<?php echo $row['Telefono']; ?>" required /><br/>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                    <input type="submit" value="Guardar" class="btn btn-primary">                   
                                                </form>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Tico's Burger 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>