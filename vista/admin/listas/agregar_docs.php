<?php
    session_start();
    require ("../../../controlador/conexion.php");
    include ("../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();

    $sql=$con->prepare("SELECT * FROM documentos");
    $sql->execute();
    $recorre= $sql -> fetch();
?>


<?php
    date_default_timezone_set("America/Bogota");
    $fecha_hora= date('Y-m-d H:i:s');

    if((isset($_GET["enviar"]))&& ($_GET["enviar"]== "enviar"))
    {
        $name = $_GET["nombre"];
        $descripción = $_GET["descrip"];
        $value = $_GET["valor"];
        $datetime = $_GET["fecha"];


        $validar=$con->prepare( "SELECT * FROM documentos where documentos='$name'");
        $validar-> execute();
        $compro= $validar->fetch();


        if($compro)
        {
            echo '<script>alert("TIPO DE DOCUMENTO EXISTENTE");</script>';
            echo '<script>windows.location="agregar_docs.php"</script>';
        }
        else if ($_GET['nombre'] == "" || $_GET['valor'] == "" || $_GET['descrip'] == "" || $_GET["fecha"] == "" )
        {
            echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
            echo '<script>windows.location="agregar_docs.php"</script>';
        }
        else{
            $crear=$con->prepare("INSERT INTO documentos(documentos,precio,descripcion,fecha)VALUES('$name','$value','$descripción','$datetime')");
            $crear->execute();
            echo '<script>alert ("Fue agregado con exitoso,Gracias");</script>';
            echo "<script>window.location='documentos.php';</script>";

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

    <div class="container-fluid bg-white p-5 rounded-5 text-secondary shadow" style="width: 40rem">


        

            <form method="get" name="formreg" autocomplete="off">

            <div style="height: 5rem; margin-bottom: 2rem;"><h2 class="text-center text-dark fs-1 fw-bold"> CREAR PRODUCTO </h2> </div>
                
                <label for="">Nombre del Documento</label>
                <input type="text" class="form-control bg-light" name="nombre" placeholder="Nombre del Documento">
                <br><br>


                <label for="">Precio</label>
                <input type="number" class="form-control bg-light" name="valor" placeholder="Precio del Documento">
                <br><br>


                <label for="">Descripcion</label>
                <input type="text" class="form-control bg-light" name="descrip" placeholder="Descripcion del Documento">
                <br><br>


                <label for="">Fecha</label>
                <input type="datetime-local" readonly class="form-control bg-light" name="fecha" value="<?php echo $fecha_hora; ?>">

                <br><br>


                <div class="input-group mt-4" style="gap: 50%;">
                    <a href="documentos.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text">VOLVER</a>

                    <input type="hidden" name="enviar" value="enviar">
                    <button class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm"  type="submit">CREAR</button></td>
                </div>


            </form>
            
    </div>
</body>
</html>