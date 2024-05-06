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