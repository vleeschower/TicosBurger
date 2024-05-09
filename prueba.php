<?php
session_start();

if(!isset($_SESSION['id_cargo'])){

    header("Location: InicioSesión/IndexSesion.php");
}

$email=$_SESSION['Correo'];
$id_cargo=$_SESSION['id_cargo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Hola cliente</h2>
    
</body>
</html>