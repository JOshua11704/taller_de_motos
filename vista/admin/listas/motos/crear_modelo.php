<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
?>


<?php


    $select = $con -> prepare("SELECT MAX(id_modelo) + 1 AS id FROM modelo"); 
    $select-> execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    if((isset($_GET["agre"]))&&($_GET["agre"]=="tipu"))
    {
        $modelo= $_GET['modelo'];


        // validar si la moto ya existe 

        $num_mot= $con->prepare("SELECT * FROM modelo WHERE modelo = '$modelo'");
        $num_mot-> execute();
        $motor_num= $num_mot-> fetch();
    
        if ($modelo=="")
        {
            echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
            echo '<script>window.location="crear_line.php"</script>';
        }
        elseif ($motor_num){
            echo '<script>alert("El modelo ya existe //CAMBIELO//");</script>';
            echo '<script>windows.location="crear_line.php"</script>';
        }else
        {
            $registro = $con->prepare("INSERT INTO `modelo` (`id_modelo`, `modelo`) VALUES (?, ?)");
    
            $registro->execute([NULL, $modelo]);

            echo '<script>alert ("REGISTRO EXITOSO");</script>';
            echo '<script>window.location="modelo.php"</script>';
        
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../../../imagenes/moto.png"/>
    <title>CREAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100" style="background-color: #C4C4C4;">

    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 40rem">


        

            <form method="get" name="formreg" autocomplete="off">

            <div style="height: 5rem; margin-bottom: 2rem;"><h2 class="text-center text-dark fs-1 fw-bold"> CREAR modelo </h2> </div>
                
                <label for="">ID del Modelo</label>
                <input type="text" class="form-control bg-light" name="id" placeholder="<?php echo $row['id']?>" readonly><br>

                <label for="">Modelo</label>
                <input type="text" class="form-control bg-light" name="modelo"  min="0" pattern="\d{1,4}" placeholder="Cantidad del Modelo"><br>

    



                <div class="input-group mt-4" style="gap: 50%;">
                    <a href="modelo.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text">VOLVER</a>

                    <input type="hidden" name="agre" value="tipu">
                    <button class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm" style="border-radius: 7%;"  type="submit">CREAR</button></td>
                </div>


            </form>
            
    </div>
</body>
</html>