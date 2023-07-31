<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
?>


<?php
    $sql=$con->prepare("SELECT * FROM `moto` INNER JOIN marca INNER JOIN usuario INNER JOIN linea INNER JOIN modelo INNER JOIN cilindraje INNER JOIN color INNER JOIN tipo_vehiculo INNER JOIN tipo_carroceria INNER JOIN combustible ON moto.documento = usuario.documento WHERE moto.id_marca = marca.id_marca AND moto.id_linea = linea.id_linea AND moto.id_modelo = modelo.id_modelo AND moto.id_cilindraje = cilindraje.id_cilindraje AND moto.id_color = color.id_color AND moto.id_clase = tipo_vehiculo.id_clase AND moto.id_carroseria = tipo_carroceria.id_carroseria AND moto.id_combustible = combustible.id_combustible ORDER BY moto.placa ASC");
    $sql->execute();
?>
