<?php
 //coneccion
 session_start();
 require ("../controlador/conexion.php");
 include ("../../controlador/validarsesion.php");
 $db = new Database();
 $conectar = $db -> conectar();


$correo ="jortiz336@misena.edu.co";
$title ="Prueba";
$cuerpo ="Vamos a probar si sirve tu correo";
$myemail = "From: joshuaortizgaitan2004@gmail.com";

if(mail($correo, $title, $cuerpo, $myemail))
{
    echo "Enviado con Éxito";
}else{
    echo "Error al enviar el mensaje";
}


?>

