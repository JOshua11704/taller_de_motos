<?php
    session_start();
    require ("../../../controlador/conexion.php");
    include ("../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
    $docs= $_GET["eli_doc"];



       // se trae la variable recibida por $ GET desde documentos.php

       $prep = $con -> prepare("DELETE FROM documentos WHERE id_documentos= '".$_GET["eli_doc"]."'");
       $prep-> execute();
       echo '<script>alert ("Se elimino el Producto con Exito");</script>';
       echo '<script>window.location="documentos.php"</script>';
       exit();
?>