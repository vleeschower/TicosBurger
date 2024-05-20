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

$sql="SELECT usuarios.*, cargo.descripcion FROM usuarios INNER JOIN cargo ON usuarios.id_cargo=cargo.id_cargo";
$resultado=$conecta->query($sql);

// Consulta para obtener los pedidos del usuario actual
$query = "
    SELECT
        p.id_pedido,
        p.id_usuario, 
        p.ref, 
        p.date, 
        p.monto_final, 
        p.Estatus, 
        u.Nombre
    FROM 
        pedidos p
    INNER JOIN 
        usuarios u ON p.id_usuario = u.id
    WHERE
        p.id_usuario = $id
    ORDER BY 
        p.date DESC
";

$result = $conecta->query($query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pedidos</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet"/>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index.php">Tico's Burger</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $nombre . ' ' . $apellidos . ' '; ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="confcliente.php">Configuracion</a></li>
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
                            <div class="sb-sidenav-menu-heading">Ir a:</div>
                            <!-- Cambiar link-->
                            <a class="nav-link" href="../index.php">
                                <!-- icono de Dashboard-->
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Inicio
                            </a>
                            <a class="nav-link" href="opinion.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Añadir Comentario
                            </a>
                            <a class="nav-link" href="pedidos.php">
                                <!-- icono de Dashboard-->
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ver pedidos
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
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Información de pedidos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">Tabla pedidos</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pedidos
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id usuario</th>
                                            <th>Mi nombre</th>
                                            <th>Referencia</th>
                                            <th>Fecha</th>
                                            <th>Monto final</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id usuario</th>
                                            <th>Mi nombre</th>
                                            <th>Referencia</th>
                                            <th>Fecha</th>
                                            <th>Monto final</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php while($row=$result->fetch_assoc()) {?>
                                            <tr>
                                                <td><?php echo$row['id_usuario'];?></td>
                                                <td><?php echo$row['Nombre'];?></td>
                                                <td><?php echo$row['ref'];?></td>
                                                <td><?php echo$row['date'];?></td>
                                                <td><?php echo$row['monto_final'];?></td>
                                                <td><?php echo$row['Estatus'];?></td>

                                                <td><a href="detalles.php?ref=<?php echo $row['ref']; ?>" class="btn btn-success" style="margin-right: 10px;">Ver detalles</a></td>
                                            </tr>
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
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>