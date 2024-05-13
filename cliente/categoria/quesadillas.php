<?php
session_start();
require_once realpath(__DIR__ . '/../../conexion.php');

if(!isset($_SESSION['id'])){
    header("Location: ../../InicioSesión/IndexSesion.php");
    exit;
}
try {
    // Consulta SQL
    $sql = "SELECT id_producto, NombreProducto, Precio FROM pedidos WHERE activo = 1";
    
    // Ejecutar consulta
    $result = $conecta->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Iterar sobre los resultados y mostrarlos
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id_producto"]. " - Nombre: " . $row["NombreProducto"]. " - Precio: $" . $row["Precio"]. "<br>";
        }
    } 
    
    /*else {
        echo "0 resultados";
    }*/
} catch (Exception $e) {
    // Manejar cualquier excepción que pueda ocurrir
    echo "Error en la consulta: " . $e->getMessage();
}   
$nombre=$_SESSION['Nombre'];
$apellidos = $_SESSION['Apellidos'];
$id=$_SESSION['id'];
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
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <title>Quesadillas</title>
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
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="../../administrador2/logout.php">Salir</a></li>
            </ul>
        </li>
    </ul>    
</nav>
    <header>
        <h1><img src="../img/logogris2.png" alt=""></h1>
        <nav class="nav">                        
            <ul class="nav_items">
                <li class="nav_items">
                    <a href="../index.php" class="nav_link">Inicio</a>
                    <a href="burger.php" class="nav_link">Hamburguesa</a>
                    <a href="tacos.php" class="nav_link">Tacos</a>
                    <a href="quesadillas.php" class="nav_link">Quesadillas</a>
                </li>                
            </ul>            
        </nav>
    </header>
    <section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">            
            <div class="item"> <!--PRUEBAS-->
                <span class="titulo-item">Campechana</span>
                <img src="img/3/campechana.png" alt="" class="img-item">
                <span class="precio-item">$45,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Bistec</span>
                <img src="img/3/bistec.png" alt="" class="img-item">
                <span class="precio-item">$45,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">pastor</span>
                <img src="img/3/pastor.png" alt="" class="img-item">
                <span class="precio-item">$45,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">adobada</span>
                <img src="img/3/adobada.jpg" alt="" class="img-item">
                <span class="precio-item">$45,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">quesillo y jamón</span>
                <img src="img/3/queso.jpg" alt="" class="img-item">
                <span class="precio-item">$45,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">chorizo</span>
                <img src="img/3/chorizo.png" alt="" class="img-item">
                <span class="precio-item">$45,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
        </div>
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">
                <!-- 
                <div class="carrito-item">
                    <img src="img/boxengasse.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Box Engasse</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="1" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$15.000,00</span>
                    </div>
                   <span class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </span>
                </div>
                <div class="carrito-item">
                    <img src="img/skinglam.png" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">Skin Glam</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="3" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$18.000,00</span>
                    </div>
                   <button class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                   </button>
                </div>
                 -->
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                        $0.00
                    </span> 
                </div> <!--uil-shopping-trolley uil-plus -->
                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
</body>
</html>