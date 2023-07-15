<?php
    session_start();
    require ("../../../controlador/conexion.php");
    include ("../../../controlador/validarsesion.php"); 
    $db = new Database();
    $con = $db->conectar();
    $consul= $con->prepare("SELECT * FROM servicio");
    $consul->execute();
    $fila=$consul->fetch();

?>
<?php
    if((isset($_GET["agre"]))&&($_GET["agre"]=="tipu"))
    {
        $nombreser= $_GET['nombre'];
        $valorser= $_GET['valor'];
        $deser= $_GET['descrip'];

        $validar=$con->prepare( "SELECT * FROM servicio where servicio='$nombreser'");
        $validar-> execute();
        $fila1= $validar->fetch();

        if ($fila1) {
            echo '<script>alert("TIPO DE SERVICIO EXISTENTE");</script>';
            echo '<script>windows.location="agregar.php"</script>';
        }
        else if ($_GET['nombre'] == "" || $_GET['valor'] == "" || $_GET['descrip'] == ""  )
        {
            echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
            echo '<script>windows.location="agregar.php"</script>';
        }
        else 
        {
            $insertsql=$con->prepare("INSERT INTO servicio(servicio,precio,descripcion) VALUES ('$nombreser','$valorser','$deser')");
            $insertsql->execute();
            echo '<script>alert ("Fue agregado con exitoso,Gracias");</script>';
            echo "<script>window.location='servicio.php';</script>";

        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR SERVI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>
<body class="bg-#C4C4C4 d-flex justify-content-center align-items-center vh-100" style="background-color: #C4C4C4;">

    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 40rem">


        

            <form method="get" name="formreg" autocomplete="off">

            <div style="height: 5rem; margin-bottom: 2rem;"><h2 class="text-center text-dark fs-1 fw-bold"> CREAR SERVICIO </h2> </div>
                
                <label for="">Nombre del servicio</label>
                <input type="text" class="form-control bg-light" name="nombre" placeholder=" Nombre del Servicio">

                <label for="">precio</label>
                <input type="number" class="form-control bg-light" name="valor" placeholder="Precio del Servicio">

                <label for="">descripcion</label>
                <input type="text" class="form-control bg-light" name="descrip" placeholder="Descripcion del Servicio">



                <div class="input-group mt-4" style="gap: 50%;">
                    <a href="servicio.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text">VOLVER</a>

                    <input type="hidden" name="agre" value="tipu">
                    <button class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm"  type="submit">CREAR SERVICIO</button></td>
                </div>


            </form>
            
    </div>
</body>
</html>