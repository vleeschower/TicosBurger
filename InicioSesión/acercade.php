<?php
    error_reporting(0);
    //solicitar el archivo de conexion a la base de datos
    require_once "../conexion.php";
    session_start();

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        // Eliminar el mensaje después de mostrarlo
        unset($_SESSION['message']);
    }

    if($_POST){
        $id=$_POST['id'];
        $email = $_POST['Correo'];
        $password = $_POST['Contraseña'];
        $nombre = $_POST['Nombre'];
    
        $sql = "SELECT * FROM usuarios WHERE Correo='$email'";
    
        $resultado = $conecta->query($sql);
        $num = $resultado->num_rows;
    
        if($num>0){
            $row = $resultado->fetch_assoc();
            $password_bd = $row['Contraseña'];
    
            if($password_bd == $password){
                $_SESSION['id'] = $row['id'];
                $_SESSION['Correo'] = $row['Correo'];
                $_SESSION['Nombre']=$row['Nombre'];
                $_SESSION['Apellidos']=$row['Apellidos'];
                $_SESSION['id_cargo'] = $row['id_cargo'];
                $id_cargo=$_SESSION['id_cargo'];

                if($id_cargo==1){
                    header("Location: ../administrador2/index.php");
                }                
                else if($id_cargo==2){
                    header("Location: ../cliente/index.php");
                }
                else if($id_cargo==3){
                    header("Location: ../administrador2/index.php");
                }
    
            }else{
                echo "La contraseña no coincide";
            }
    
        }else{
            echo"No existe el usuario";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="style.css">    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Tico's Burger</title>
</head>
<body>
    <header class="header">        
        <nav class="nav">
            <a href="IndexSesion.php"><img src="imgSesión/Logo.png" alt="Logotipo" style="width: 250px;"></a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="IndexSesion.php" class="nav_link">Inicio</a>
                    <a href="acercade.php" class="nav_link">Acerca de</a>
                    <a href="contactos.php" class="nav_link">Contactos</a>
                </li>                
            </ul>
           
            <button class="button" id="form-open">Iniciar Sesión</button>        
        </nav>
    </header>

    <!--Primer Cambio En Git 2-->    
    <section class="home">

        <div class="info-box-7">
            <h2 class="info-title-special-title">Tico's Burger: Sabores que conquistan</h2>
        </div>

        <!-- Contenedor del texto informativo -->
        <div class="info-box">
            <h2 class="info-title">Giro de la empresa</h2>
            <p>Tico's Burger se dedica a la venta de hamburguesas y otros productos relacionados, como quesadillas, tacos y bebidas, en un entorno de comida rápida.</p>
        </div>

        <!-- Segundo contenedor del texto informativo -->
        <div class="info-box-2">
            <h2 class="info-title">Misión</h2>
            <p>Ofrecer hamburguesas, quesadillas y tacos deliciosos y de alta calidad, brindando una experiencia excepcional de servicio al cliente en un ambiente acogedor y limpio.</p>
        </div>

        <div class="info-box-3">
            <h2 class="info-title">Visión</h2>
            <p>Convertirse en la hamburguesería más querida y prestigiosa de la ciudad, reconocida por la calidad de sus productos y el excelente servicio al cliente.</p>
        </div>

        <div class="info-box-4">
            <h2 class="info-title">Objetivos</h2>
            <p>1. Mantener altos estándares de calidad en todos nuestros productos y servicios.</p>
            <p>2. Mejorar continuamente la experiencia del cliente.</p>
            <p>3. Expandir la presencia de la hamburgueseria abriendo nuevas ubicaciones.</p>
            <p>4. Desarrollar y mantener una página web atractiva y funcional que aumente nuestra visibilidad en línea y facilite el proceso de pedido que nuestros clientes desean.</p>
            <p>5. Ofrecer opciones de personalización en nuestros menús y un proceso de pedido en línea sencillo y eficiente.</p>
        </div>

        <div class="info-box-5">
            <h2 class="info-title">Fortalezas</h2>
            <p>1. Calidad de los productos: Tico's Burger se distingue por usar ingredientes frescos y de alta calidad, lo que asegura un sabor excepcional en cada producto.</p>
            <p>2. Variedad en el menú: Ofrecemos una amplia gama de opciones, incluyendo diferentes tipos de hamburguesas, tacos y quesadillas.</p>
            <p>3. Ubicación estratégica: Tico's Burger se encuentra situada en una zona con alto tráfico peatonal y vehicular.</p>
            <p>4. Innovación culinaria: Capacidad para crear nuevas recetas y adaptarse a las tendencias alimentarias, manteniendo el menú actualizado y atractivo.</p>
            <p>5. Presencia en línea: La iniciativa de desarrollar una página web completa y visualmente atractiva que facilita el proceso de pedidos y mejora la experiencia del cliente.</p>
        </div>

        <div class="info-box-6">
            <h2 class="info-title">Oportunidades</h2>
            <p>1. Entrega a domicilio: Ampliar el servicio de entrega a domicilio para llegar a más clientes.</p>
            <p>2. Expansión del mercado en línea: Al establecer una sólida presencia en línea, Tico's Burger puede llegar a una audiencia más amplia y captar a aquellos clientes que prefieren realizar pedidos desde la comodidad de sus hogares.</p>
            <p>3. Marketing digital: Utilizar estrategias de marketing digital, incluyendo redes sociales y publicidad en línea, para aumentar la visibilidad, atraer nuevos clientes y fidelizar a los existentes.</p>
            <p>4. Alianzas estratégicas: Formar alianzas con servicios de entrega a domicilio y aplicaciones de pedidos en línea para aumentar la accesibilidad y conveniencia para los clientes.</p>
            <p>5. Expansión geográfica: Considerar la apertura de nuevas sucursales en diferentes ubicaciones para atraer a más clientes y aumentar la presencia física de la marca.</p>
            <p>6. Promociones: Realizar promociones en línea y en la tienda física para atraer a nuevos clientes, así como para fidelizar a los clientes actuales.</p>
        </div>

        <div class="form_container">
            <i class="uil uil-times form_close"></i>   
            
            <!--LO0GIN-->
            <div class="form login_form">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h2>Iniciar Sesión</h2>
                        
                    <div class="input_box">
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="email" name="Correo" placeholder="Ingresa tu Email" required>
                        <i class="uil uil-envelope-alt email"></i><!-- Icono -->                        
                    </div>

                    <div class="input_box">
                        <!-- ingresar Contraseña y poner un Icono en el TextBox -->
                        <input type="password" name="Contraseña" placeholder="Ingresa tu Contraseña" required>
                        <i class="uil uil-lock password"></i><!-- Icono -->
                        <i class="uil uil-eye-slash pw_hide"></i><!-- Icono Para ocultar y ver Contraseña -->
                    </div>

                    <div class="option_field">
                        <span class="checkbox">                                                    
                        </span>
                    </div>
                    <button class="button">Ingresar</button>
                    <div class="login_signup">¿No tienes una cuenta? <a href="admin.html" id="signup">¡Registrate!</a></div>
                </form>
            </div>

            <!--REGISTROS-->
            <div class="form signup_form">
                <form method="POST" action="../registro.php">
                    <h2>Registro</h2>

                    <div class="input_box">                        
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="text" name="Nombre" placeholder="Ingresa tu Nombre" required>
                        <i class=" uil-user-circle nombre"></i><!-- Icono -->
                    </div>

                    <div class="input_box">                        
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="type" name="Apellidos" placeholder="Ingresa tus Apellidos" required>
                        <i class=" uil-user-circle appaterno"></i><!-- Icono -->
                    </div>                  

                    <div class="input_box">                        
                        <!-- ingresar Email y poner un Icono en el TextBox -->
                        <input type="email" name="Correo" placeholder="Ingresa tu Correo" required>
                        <i class="uil uil-envelope-alt email"></i><!-- Icono -->
                    </div>

                    <div class="input_box">
                        <!-- ingresar Contraseña y poner un Icono en el TextBox -->
                        <input type="text" name="Contraseña" placeholder="Ingresa tu Contraseña" required>
                        <i class="uil uil-lock password"></i><!-- Icono -->
                        <i class="uil uil-eye-slash pw_hide"></i><!-- Icono Para ocultar y ver Contraseña -->
                    </div>
                    
                    <button class="button">Registrarse</button>
                    <div class="login_signup">¿Tienes una Cuenta? <a href="#" id="login">Iniciar Sesión</a></div>
                </form>
            </div>
        </div>
    </section>
    <script src="app.js"></script>
</body>
</html>