<?php
session_start();
require ("../../../controlador/conexion.php");
include ("../../../controlador/validarsesion.php"); 
$db = new Database();
$con = $db-> conectar();
$servi= $_GET["eli"];



    // se trae la variable recibida por $ GET desede productos.php

    $sql = $con -> prepare("DELETE FROM servicio WHERE id_servicio= '".$_GET["eli"]."'");
    $sql-> execute();
    echo '<script>alert ("Se elimino el Servicio con Exito");</script>';
    echo '<script>window.location="servicio.php"</script>';
    exit();
            
?>
