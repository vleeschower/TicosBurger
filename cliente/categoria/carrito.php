<?php
session_start();
require_once realpath(__DIR__ . '/../../conexion.php');

if(!isset($_SESSION['id'])){
    header("Location: ../../InicioSesión/IndexSesion.php");
    exit;
}
$id=$_SESSION['id'];

if ($_POST["dato"] == 'finalizar_pedido'){

    $referencia=uniqid();
    $montoTotal = $_POST['monto_total'];
    $userId = $_SESSION['id']; // Obtener el ID del usuario desde la sesión

    //insertar pedido
    $query = "INSERT INTO pedidos (id_usuario, ref, monto_final) VALUES ('$userId', '$referencia', '$montoTotal')";
    if ($conecta->query($query) == TRUE){
        $continue = '1';
    }else{
        $continue='0';
    }

    // Insertar los datos del pedido
    if ($continue == '1') {
        if (isset($_POST['items'])) {
            $items = json_decode($_POST['items'], true);
            foreach ($items as $item) {
                $titulo = $item['titulo'];
                $cantidad = $item['cantidad'];
                $precio = $item['precio'];

                $query = "INSERT INTO detalle_pedido (ref, cantidad, producto, precio) VALUES ('".$referencia."', '".$cantidad."', '".$titulo."', '".$precio."')";
                if ($conecta->query($query) != TRUE) {
                    $continue = '0';
                    break;
                }
            }
        }
    }
   
    if($continue == '1'){
        $response = array('success' => true, 'mensaje' => 'todo ok');
        echo json_encode($response);
    }else{
        $response = array('success' => false, 'mensaje' => $conecta->error);
        echo json_encode($response);

    }
}

?>