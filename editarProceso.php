<?php
    print_r($_POST);
    if(!isset($_POST['DNI'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $DNI = $_POST["DNI"];
    $dni = $_POST["txtDNI"];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST["txtApellido"];
    $sexo = $_POST["txtSexo"];
    $numero_de_telefono = $_POST["txtnumero_de_telefono"];

    $sentencia = $bd->prepare("UPDATE clientes SET DNI = ?, Nombre = ?, Apellido = ?, Sexo = ?, numero_de_telefono = ?  
     where DNI = ?;");
    $resultado = $sentencia->execute([$dni, $nombre, $apellido, $sexo, $numero_de_telefono, $DNI ]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>