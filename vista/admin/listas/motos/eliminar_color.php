<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
    $cilin= $_GET["borrar"];



    // se trae la variable recibida por $ GET desede productos.php

    $sql = $con -> prepare("DELETE FROM color WHERE id_color= '".$_GET["borrar"]."'");
    $sql-> execute();
    echo '<script>alert ("Se elimino el color con Exito");</script>';
    echo '<script>window.location="color.php"</script>';
    exit();
?>
