<?php
session_start();
require_once realpath(__DIR__ . '/../../conexion.php');

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
    exit;
}
try {
    // Consulta SQL
    $sql = "SELECT id_productos, NombreProducto, Precio FROM pedidos WHERE activo = 1";
    
    // Ejecutar consulta
    $result = $conecta->query($sql);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Iterar sobre los resultados y mostrarlos
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id_productos"]. " - Nombre: " . $row["NombreProducto"]. " - Precio: $" . $row["Precio"]. "<br>";
        }
    } else {
        echo "0 resultados";
    }
} catch (Exception $e) {
    // Manejar cualquier excepción que pueda ocurrir
    echo "Error en la consulta: " . $e->getMessage();
}   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="estilo.css">
    <script src="app.js" async></script>
    <title>Hamburguesa</title>
</head>
<body>
    <header>
        <h1><img src="img/Logo.png" alt=""></h1>
        <nav class="nav">                        
            <ul class="nav_items">
                <li class="nav_item">
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
                <span class="titulo-item">Hamburguesa Normal</span>
                <img src="img/1/HmburgesaNormal.jpg" alt="" class="img-item">
                <span class="precio-item">$80.00</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa Hawaiana</span>
                <img src="img/1/HamburguesaHawaiana.jpeg" alt="" class="img-item">
                <span class="precio-item">$25.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa Dos Quesos</span>
                <img src="img/1/HamburguesaDosQuesos.png" alt="" class="img-item">
                <span class="precio-item">$35.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa C</span>
                <img src="img/1/hamgurgesa doble carne.jpg" alt="" class="img-item">
                <span class="precio-item">$18.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa Triple Queso</span>
                <img src="img/1/Hamburguesa Triple Queso.png" alt="" class="img-item">
                <span class="precio-item">$32.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa Especial</span>
                <img src="img/1/HamburguesaEspecial.jpg" alt="" class="img-item">
                <span class="precio-item">$18.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Torta de Hamburguesa</span>
                <img src="img/1/HamburguesaTorta.jpg" alt="" class="img-item">
                <span class="precio-item">$54.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa Mixto</span>
                <img src="img/1/HamburguesasMixto.jpg" alt="" class="img-item">
                <span class="precio-item">$32.000</span>
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
                        $120.000,00
                    </span> 
                </div> <!--uil-shopping-trolley uil-plus -->
                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
            </div>
        </div>
    </section>
</body>
</html>