<?php
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
                }else if($id_cargo==2){
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
                    <a href="#" class="nav_link">Inicio</a>
                    <a href="#" class="nav_link">Productos</a>
                    <a href="#" class="nav_link">Servicios</a>
                    <a href="#" class="nav_link">Contactos</a>
                </li>                
            </ul>

            <button class="button" id="form-open">Iniciar Sesión</button>        
        </nav>
    </header>
    <!--Primer Cambio En Git 2-->    
    <section class="home">
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
                            <input type="checkbox" id="check">
                            <label for="check">Recordar usuario</label><br>
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