<?php
session_start();
require ("../../../controlador/conexion.php");
include ("../../../controlador/validarsesion.php");
$db = new Database();
$con=$db->conectar();
?>

<?php
    $sql=$con->prepare("SELECT * FROM servicio ");
    $sql->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/tabla.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <title>Servicio</title>
</head>
<body class=" d-flex justify-content-center align-items-center vh-100" style="background-color: #9e9a9a;">

    <div class="main-container rounded-5 text-secondary" style="width: 70rem">

        <H2 class="text-center text-dark fs-1 fw-bold" style="margin-right: 25%;"> SERVICIOS</H2>
        <br>
        <br>
        <div>
            <form method="get" action="agregar_serv.php">
                <input type="hidden" name="agre" value="<?=$user["id_servicio"]?>">
                <button type="submit" class="btn btn-dark m-1 shadow-sm" name="actubo" >AGREGAR SERVICIO</button>
            </form>
            <form action="../index.php">
                <div ><button type="submit" class="btn btn-dark m-1 shadow-sm" >VOLVER</button></div> 
            </form>
        </div>

        <br>
        <br>
        <table>
            <tr>
                <thead>
                    <th>ID</th>
                    <th>Nombre de Servicio</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th colspan="2" style="text-align: center;">Act/Eli</th>
                </thead>
            </tr>
        
            <?php
            foreach ($sql as $user){
            ?>
            <tr>
                <tbody>
                    <td style="text-align: center;"><?=$user ["id_servicio"] ?></td>
                    <td style="text-align: center;"><?=$user["servicio"]?></td>
                    <td><?=$user["descripcion"]?></td>
                    <td><?=$user["precio"]?></td>
                    <td style="text-align: center;">
                    
                        <form method="get" action="eliminarserv.php">
                            <input type="hidden" name="eli" value="<?=$user["id_servicio"]?>">
                            <button type="submit" class="btn btn-dark text-white w-60 mt-4 fw-semibold shadow-sm"  onclick="return confirm ('¿Desea eliminar este producto?');">ELIMINAR</button>
                        </form>
                    </td>
                    <td style="text-align: center;">
                        <form method="get" action="edit_ser.php">
                            <input type="hidden" name="actu" value="<?=$user["id_servicio"]?>">
                            <button type="submit" class="btn btn-dark text-white w-60 mt-4 fw-semibold shadow-sm"  name = "actubo" >ACTUALIZAR</button>
                        </form>
                    </td>
                </tbody>
            </tr>
        <?php
            }
        ?>

        </table>
   
    </div>    

</body>
</html>