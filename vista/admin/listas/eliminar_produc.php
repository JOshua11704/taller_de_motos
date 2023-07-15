<?php

//coneccion
session_start();
require ("../../../controlador/conexion.php");
include ("../../../controlador/validarsesion.php");
$db = new Database();
$conectar = $db -> conectar();
$delete= $_GET['eliminar'];


    

 
        // se trae la variable recibida por $ GET desede productos.php
    $sql =$conectar -> prepare("DELETE FROM repuestos WHERE id_repuestos='".$_GET['eliminar']."'");
    $sql-> execute();
    echo '<script>alert ("Se elimino el producto con Exito");</script>';
    echo '<script>window.location="productos.php"</script>';
    exit();


?>
