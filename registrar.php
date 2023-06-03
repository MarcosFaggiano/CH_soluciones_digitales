<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtDNI"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"])
     || empty($_POST["txtSexo"]) ||empty($_POST["txtnumero_de_telefono"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $dni = $_POST["txtDNI"];
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $sexo = $_POST["txtSexo"];
    $numero_de_telefono = $_POST["txtnumero_de_telefono"];
    
    $sentencia = $bd->prepare("INSERT INTO clientes(dni,nombre,apellido,sexo,numero_de_telefono) VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$dni,$nombre,$apellido,$sexo,$numero_de_telefono]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>