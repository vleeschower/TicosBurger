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

$sql="SELECT usuarios.*, cargo.descripcion FROM usuarios INNER JOIN cargo ON usuarios.id_cargo=cargo.id_cargo";
$resultado=$conecta->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrar Usuarios</title>
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
                        <li><a class="dropdown-item" href="configuracion.php">Configuracion</a></li>
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
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Usuarios
                            </a>

                            <div class="sb-sidenav-menu-heading">Servicio</div>

                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pedidos
                            </a>

                            <a class="nav-link" href="opinion.php">
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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Administrar usuarios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Panel general</a></li>
                            <li class="breadcrumb-item active">Usuarios</li>
                        </ol>
                        <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fas fa-table me-1"></i>
                                Usuarios
                            </div>
                            <?php
                            // Solo muestra el botón de "Añadir Empleado / Administrador" si el id_cargo del usuario es 1
                            if($id_cargo == 1){
                                ?>
                                <a href="añadir.php" class="btn btn-primary">Añadir Empleado / Administrador</a>
                                <?php
                            }
                            ?>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Contraseña</th>
                                            <th>Telefono</th>
                                            <th>id_cargo</th>
                                            <th>Descripción del cargo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Correo</th>
                                            <th>Contraseña</th>
                                            <th>Telefono</th>
                                            <th>id_cargo</th>
                                            <th>Descripción del cargo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($row=$resultado->fetch_assoc()) {?>
                                            <?php
                                            // Si el id del usuario es 1, muestra la información de todos los usuarios y permite editar y eliminar a todos
                                            if($id_cargo == 1){
                                                ?>
                                                <tr>
                                                    <td><?php echo$row['id'];?></td>
                                                    <td><?php echo$row['Nombre'];?></td>
                                                    <td><?php echo$row['Apellidos'];?></td>
                                                    <td><?php echo$row['Correo'];?></td>
                                                    <td><?php echo$row['Contraseña'];?></td>
                                                    <td><?php echo$row['Telefono'];?></td>
                                                    <td><?php echo$row['id_cargo'];?></td>
                                                    <td><?php echo$row['descripcion'];?></td>

                                                    <td><a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-success" style="margin-right: 10px;">Editar</a><a href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')" class="btn btn-danger" >Eliminar</a> </td>

                                                </tr>
                                            <?php
                                            }else if($id_cargo == 3 && $row['id_cargo'] == 2) {
                                                ?>
                                                <tr>
                                                    <td><?php echo$row['id'];?></td>
                                                    <td><?php echo$row['Nombre'];?></td>
                                                    <td><?php echo$row['Apellidos'];?></td>
                                                    <td><?php echo$row['Correo'];?></td>
                                                    <td><?php echo$row['Contraseña'];?></td>
                                                    <td><?php echo$row['Telefono'];?></td>
                                                    <td><?php echo$row['id_cargo'];?></td>
                                                    <td><?php echo$row['descripcion'];?></td>

                                                    <td><a href="editar.php?id=<?php echo $row['id']; ?>" class="btn btn-success" style="margin-right: 10px;">Editar</a><a href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')" class="btn btn-danger" >Eliminar</a> </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        <?php }?>
                                    </tbody>
                                </table>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>