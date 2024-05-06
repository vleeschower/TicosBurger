<?php
session_start();
session_destroy();
header("Location: ../InicioSesión/IndexSesion.php")
?>