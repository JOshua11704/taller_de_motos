<?php
session_start();
require ("../../../controlador/conexion.php");
include ("../../../controlador/validarsesion.php");
$db = new Database();
$con = $db->conectar();

?>


<?php


$_GET['actu'];

    $sql =$con -> prepare("SELECT * FROM servicio where id_servicio = '".$_GET['actu']."'");
    $sql-> execute();
    $ractu=$sql->fetch(PDO::FETCH_ASSOC);

?>



<?php
    
if(isset($_GET["acualizar"])){

    $id=$_GET['id'];
    $servi= $_GET['ser'];
    $desc= $_GET['des'];
    $pre= $_GET['prec'];

    if ($_GET['ser'] == "" || $_GET['des'] == "" || $_GET['prec'] == "" ){
        echo "<script>alert ('Campo obligatorio');</script>";
        echo "<script>window.location('servicio.php');</script>";
    }



    else{ 
        $sql =$con -> prepare("UPDATE servicio SET servicio= '$servi',descripcion='$desc',precio='$pre' WHERE id_servicio='$id'");
        $sql->execute();
        echo"<script>alert('Actualizacion con Exito');</script>";
        echo "<script>window.location='servicio.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>
<body class=" bg-dark d-flex justify-content-center align-items-center vh-100">

    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 40rem">
            <!-- creo un formulario -->
            <form method="GET" name="actu1" autocomplete="off">


                <div style="height: 5rem; margin-bottom: 2rem;"><h2 class="text-center text-dark fs-1 fw-bold"> EDITAR SERVICIO </h2> </div>

                <!-- nombramos el compo del formulario como documento-->
                <label for="actu">ID</label>
                <!--solo mostramos como lectura el documento-->
                <input type=text class="form-control bg-light" name="id" value="<?php echo $ractu['id_servicio'] ?>" readonly>

                <!-- nombramos el compo del formulario como nombre-->
                <label for="actu">Servicio</label>
                <!-- recibimos informacion para cambiar el nombre-->
                <input type=text class="form-control bg-light" name="ser" value="<?php echo $ractu['servicio']?>">

                <label for="actu">Descripcion</label>
                <!-- recibimos informacion para cambiar el nombre-->
                <input type=text class="form-control bg-light" name="des" value="<?php echo $ractu['descripcion'] ?>">

                <label for="actu">Precio</label>
                <!-- recibimos informacion para cambiar el nombre-->
                <input type=text class="form-control bg-light" name="prec" value="<?php echo $ractu['precio'] ?>">

                <div class="input-group mt-4" style="gap: 50%;">

                    <a href="servicio.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text">Volver</a>

                    <input type="submit" class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm" name="acualizar" value="actualizar">
                    <input type="hidden" name="MM_update" value="actualizar">
                </div>    

            </form>





    </div>

</body>

</html>