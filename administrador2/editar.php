<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
}
$nombre=$_SESSION['Nombre'];
$apellidos = $_SESSION['Apellidos'];

$id_usuario = $_GET['id']; // Obtener el ID del usuario a editar

// Consulta para obtener los datos del usuario a editar
$sql="SELECT usuarios.*, cargo.descripcion FROM usuarios INNER JOIN cargo ON usuarios.id_cargo=cargo.id_cargo WHERE usuarios.id=$id_usuario";
$resultado=$conecta->query($sql);

$row = $resultado->fetch_assoc(); // Obtener los datos del usuario a editar
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
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Tico's Burger</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nombre . ' ' . $apellidos . ' '; ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="configuracion.php">Configuración</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Administrar</div>
                            <!-- Cambiar link-->
                            <a class="nav-link" href="adminUsuarios.php">
                                <!-- icono de Dashboard-->
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Usuarios
                            </a>

                            <div class="sb-sidenav-menu-heading">Servicio</div>

                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pedidos
                            </a>

                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Opiniones
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Información</div>
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Tabla usuarios
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
                        <h1 class="mt-4">Editar usuario</h1>
                        <a href="adminUsuarios.php" onclick="history.back();" class="btn btn-danger"> X </a>
                    </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Modificar:</li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-footer d-flex align-items-start justify-content-between">
                                        <div class="d-flex ">
                                            <div>
                                            <img src="assets/img/imgusuario.png" alt="imagenUsuario" style="width: 100%; height: auto;">
                                            </div>
                                            
                                            <div>
                                                <form action="actualizar.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                                    <table border="0.5">
                                                        <tr>
                                                            <td>Nombre:</td>
                                                            <td>
                                                                <input type="text" name="Nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras, letras con acentos, ñ y espacios" value="<?php echo $row['Nombre']; ?>"required /><br/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Apellidos:</td>
                                                            <td>
                                                                <input type="text" name="Apellidos" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="Solo se permiten letras, letras con acentos, ñ y espacios"  value="<?php echo $row['Apellidos']; ?>"required /><br/>
                                                            </td>
                                                        </tr>
    
                                                        <tr>
                                                            <td>Correo:</td>
                                                            <td>
                                                                <input type="email" name="Correo" value="<?php echo $row['Correo']; ?>"required /><br/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Contraseña:</td>
                                                            <td>
                                                                <input type="text" name="Contraseña" value="<?php echo $row['Contraseña']; ?>"required /><br/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Telefono:</td>
                                                            <td>
                                                                <input type="tel" name="Telefono" pattern="[0-9]{10}" title="Debe ingresar exactamente 10 números" value="<?php echo $row['Telefono']; ?>"required /><br/>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Cargo:</td>
                                                            <td>
                                                                <?php
                                                                if($row['id_cargo'] == 3 || $row['id_cargo'] == 1){
                                                                    ?>
                                                                    <select name="id_cargo" required>
                                                                        <option value="1" <?php if ($row['id_cargo'] == 1) echo 'selected'; ?>>Administrador</option>
                                                                        <option value="3" <?php if ($row['id_cargo'] == 3) echo 'selected'; ?>>Empleado</option>
                                                                    </select>
                                                                    <?php
                                                                }else{
                                                                    // Si el id_cargo del usuario a editar es 2
                                                                    ?>
                                                                    <select name="id_cargo" required>
                                                                        <option value="2" <?php if ($row['id_cargo'] == 2) echo 'selected'; ?>>Cliente</option>
                                                                    </select>
                                                                    <?php
                                                                }
                                                                ?>
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