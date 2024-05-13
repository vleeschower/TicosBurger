<?php
session_start();
require_once "../conexion.php";

if(!isset($_SESSION['id'])){
    header("Location: ../InicioSesión/IndexSesion.php");
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="sytle.css">
    <script src="app.js" async></script>    
    <title>Tico's Burger</title>    
</head>
<body>
    <header>
        <h1><img src="img/Logo.png" alt=""></h1>
        <nav class="nav">                        
            <ul class="nav_items">
                <li class="nav_items">
                    <a href="index.php" class="nav_link">Inicio</a>
                    <a href="../cliente/categoria/burger.php" class="nav_link">Hamburguesa</a>
                    <a href="../cliente/categoria/tacos.php" class="nav_link">Tacos</a>
                    <a href="../cliente/categoria/quesadillas.php" class="nav_link">Quesadillas</a>
                    <a href="../cliente/categoria/opinion.php" class="nav_link">Comentario</a>
                </li>                
            </ul>            
        </nav>                  
    </header>    
</body>
</html>