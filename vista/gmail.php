<?php
 //coneccion
 session_start();
 require ("../controlador/conexion.php");
 include ("../../controlador/validarsesion.php");
 $db = new Database();
 $conectar = $db -> conectar();

?>

