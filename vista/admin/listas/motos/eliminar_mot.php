<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();

    $plate= $_GET['actu'];
    $machine= $_GET['motor'];



    $delete = $con->prepare("DELETE FROM moto WHERE placa = ? AND moto.numero_motor = ?");
    $delete->execute([$plate, $machine]);

    echo '<script>alert ("Se elimino el usuario con Exito");</script>';
    echo '<script>window.location="motos.php"</script>';
    exit();

?>