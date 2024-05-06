<?php 
session_start();

if(!isset($_SESSION['id'])){
    header("Location: InicioSesión/IndexSesion.php");

}

$email=$_SESSION['Correo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Boton para Menu-->
    <div class="menu">
        <i class="uil-bars"></i> 
        <i class=" uil-times"></i>       
    </div>
    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <i id="cloud" class=" uil-cloud"></i>
                <span>Roger</span>
            </div>
            <button class="boton">
                <i id="plus" class="uil-plus"></i>
                <span>Create New</span>
            </button>
        </div>

        <nav class="navegacion">
            <ul>
                <li>
                    <a id="inbox" href="#"><!--con esto es donde se redirige la pag-->
                       <i class="uil-envelopes"></i>
                       <span>Inbox</span>
                    </a>
                </li>
                <li>
                    <a href="#"><!--con esto es donde se redirige la pag-->
                       <i class="uil-star"></i>
                       <span>Starred</span>
                    </a>
                </li>
                <li>
                    <a href="#"><!--con esto es donde se redirige la pag-->
                       <i class="uil-navigator"></i>
                       <span>Sent</span>
                    </a>
                </li>
                <li>
                    <a href="#"><!--con esto es donde se redirige la pag-->
                       <i class="uil-document"></i>
                       <span>Drafts</span>
                    </a>
                </li>
                <li>
                    <a href="#"><!--con esto es donde se redirige la pag-->
                       <i class="uil-bookmark"></i>
                       <span>Important</span>
                    </a>
                </li>
                <li>
                    <a href="#"><!--con esto es donde se redirige la pag-->
                       <i class="uil-exclamation-circle"></i>
                       <span>Spam</span>
                    </a>
                </li>
                <li>
                    <a href="#"><!--con esto es donde se redirige la pag-->
                       <i class="uil-trash"></i>
                       <span>Trashs</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
            <div class="linea"></div>

        <!--modo oscuro-->
        <div class="modo-oscuro">
            <div class="info">
                <i class="uil-moon"></i>
                <span>Crak Mode</span>                
            </div>
            <!--aca adentro estará la palanca o boton para hacer el cambio-->
            <div class="switch">
                <div class="base">
                    <div class="circulo"></div>
                </div>
            </div>
        </div>

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
        </div>
        
    </div>

    <!--Crear contenido de la pagina (eliminar)-->    
    <main>
        <h1>contenidos</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, assumenda dolor ut atque perferendis accusamus laboriosam consectetur cum quidem voluptatibus libero voluptas non? Non vero enim praesentium minus? Nisi, minima.</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat dicta quisquam fugiat sequi earum asperiores sed reiciendis exercitationem voluptates maxime omnis error, fugit tempore et! Enim exercitationem voluptate quo sed!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque corrupti, dolor eos sit aliquid minima voluptatibus earum ex sunt dolore a explicabo omnis at impedit rerum reiciendis officia facilis aperiam.</p>

    </main>

    <script src="script.js"></script>
</body>
</html>