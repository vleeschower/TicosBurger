<?php
    session_start();
    //solicitar el archivo de conexion a la base de datosss
    require_once "conexion.php";

    if($_POST){
        $nombre = $_POST['Nombre'];
        $apellidos = $_POST['Apellidos'];
        $email = $_POST['Correo'];
        $password = $_POST['Contraseña'];
        $id_cargo=2;

        $sql = "INSERT INTO usuarios (Nombre, Apellidos, Correo, Contraseña, id_cargo) VALUES ('$nombre', '$apellidos', '$email', '$password', '$id_cargo')";

        if ($conecta->query($sql) === TRUE) {
            $_SESSION['message'] = "<div class='success-message'>Te has registrado exitosamente</div>";
            header("Location: InicioSesión/IndexSesion.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conecta->error;
        }
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
    <title>Tienda de Hamburguesas</title>
</head>
<body>
    <header>
        <h1><img src="img/Logo.png" alt=""></h1>
        <nav class="nav">                        
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="#Inicio" class="nav_link">Inicio</a>
                    <a href="/categoria/burger.html" class="nav_link">Hamburguesa</a>
                    <a href="/categoria/tacos.html" class="nav_link">Tacos</a>
                    <a href="/categoria/quesadillas.html" class="nav_link">Quesadillas</a>
                </li>                
            </ul>            
        </nav>        
    </header> 
    <!--usuario-->
    <div class="usuario">
        <img src="img/image-usuario.png" alt="">
        <div class="info-usuario">
            <div class="nombre-email">
                <span class="nombre">rperez</span>
                <span class="email">rperez@gmail.com</span>
            </div>
            <i class="uil-ellipsis-v"></i>
        </div>
    </div>
</body>
</html>