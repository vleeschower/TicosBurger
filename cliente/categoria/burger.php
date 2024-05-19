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
    <title>Hamburguesa</title>
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
        <h1><img src="../img/fondoham.png" alt="" width="1365px" height: auto;></h1>
        <nav class="nav">                        
            <ul class="nav_items">
                <li class="nav_items">
                    <a href="../index.php" class="nav_link">Inicio</a>
                    <a href="burger.php" class="nav_link">Hamburguesa</a>
                    <a href="tacos.php" class="nav_link">Tacos</a>
                    <a href="quesadillas.php" class="nav_link">Quesadillas</a>
                    <a href="opinion.php" class="nav_link">Añadir comentario</a>
                </li>                
            </ul>            
        </nav>
    </header>
    <section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">            
            <div class="item"> <!--PRUEBAS-->        
                <span class="titulo-item">Hamburguesa Normal</span>
                <img src="img/1/HmburgesaNormal.jpg" alt="" class="img-item">
                <span class="precio-item">$60,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa suprema</span>
                <img src="img/1/HamburguesaHawaiana.jpeg" alt="" class="img-item">
                <span class="precio-item">$90,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa tropical</span>
                <img src="img/1/HamburguesaDosQuesos.png" alt="" class="img-item">
                <span class="precio-item">$50,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa doble carne</span>
                <img src="img/1/hamgurgesa doble carne.jpg" alt="" class="img-item">
                <span class="precio-item">$60,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa 3 quesos</span>
                <img src="img/1/Hamburguesa Triple Queso.png" alt="" class="img-item">
                <span class="precio-item">$60,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa extra Especial</span>
                <img src="img/1/HamburguesaEspecial.jpg" alt="" class="img-item">
                <span class="precio-item">$70,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">torta de hamburguesa</span>
                <img src="img/1/HamburguesaTorta.jpg" alt="" class="img-item">
                <span class="precio-item">$50,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa Especial</span>
                <img src="img/1/HamburguesasMixto.jpg" alt="" class="img-item">
                <span class="precio-item">$70,00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>  
        </div>
    
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">                            
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
</body>
</html>