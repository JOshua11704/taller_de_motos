<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
    $cilin= $_GET["borrar"];



    // se trae la variable recibida por $ GET desede productos.php

    $sql = $con -> prepare("DELETE FROM combustible WHERE id_combustible= '".$_GET["borrar"]."'");
    $sql-> execute();
    echo '<script>alert ("Se elimino el combustible con Exito");</script>';
    echo '<script>window.location="combustible.php"</script>';
    exit();
?>
