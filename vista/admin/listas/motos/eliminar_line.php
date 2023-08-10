<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
    $cilin= $_GET["borrar"];



    // se trae la variable recibida por $ GET desede productos.php

    $sql = $con -> prepare("DELETE FROM linea WHERE id_linea= '".$_GET["borrar"]."'");
    $sql-> execute();
    echo '<script>alert ("Se elimino el linea con Exito");</script>';
    echo '<script>window.location="linea.php"</script>';
    exit();
?>
