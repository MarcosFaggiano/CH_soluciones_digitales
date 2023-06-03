<?php 
    if(!isset($_GET['DNI'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $dni = $_GET['DNI'];

    $sentencia = $bd->prepare("DELETE FROM clientes where dni = ?;");
    $resultado = $sentencia->execute([$dni]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>