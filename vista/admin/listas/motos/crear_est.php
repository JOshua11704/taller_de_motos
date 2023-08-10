<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
?>


<?php


    $select = $con -> prepare("SELECT MAX(id_estado) + 1 AS id FROM estado"); 
    $select-> execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    if((isset($_GET["agre"]))&&($_GET["agre"]=="tipu"))
    {
        $estado= $_GET['estado'];


        // validar si la moto ya existe 

        $num_mot= $con->prepare("SELECT * FROM estado WHERE estado = '$estado'");
        $num_mot-> execute();
        $motor_num= $num_mot-> fetch();
    
        if ($estado=="")
        {
            echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
            echo '<script>window.location="crear_combus.php"</script>';
        }
        elseif ($motor_num){
            echo '<script>alert("El estado ya existe //CAMBIELO//");</script>';
            echo '<script>windows.location="crear_combus.php"</script>';
        }else
        {
            $registro = $con->prepare("INSERT INTO `estado` (`id_estado`, `estado`) VALUES (?, ?)");
    
            $registro->execute([NULL, $estado]);

            echo '<script>alert ("REGISTRO EXITOSO");</script>';
            echo '<script>window.location="estado.php"</script>';
        
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

            <div style="height: 5rem; margin-bottom: 2rem;"><h2 class="text-center text-dark fs-1 fw-bold"> CREAR ESTADO </h2> </div>
                
                <label for="">ID del estado</label>
                <input type="text" class="form-control bg-light" name="id" placeholder="<?php echo $row['id']?>" readonly><br>

                <label for="">estado</label>
                <input type="text" class="form-control bg-light" name="estado" pattern="[A-Za-z]{1,15}" maxlength="15" placeholder="Nombre del estado"><br>

    



                <div class="input-group mt-4" style="gap: 50%;">
                    <a href="estado.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text">VOLVER</a>

                    <input type="hidden" name="agre" value="tipu">
                    <button class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm" style="border-radius: 7%;"  type="submit">CREAR</button></td>
                </div>


            </form>
            
    </div>
</body>
</html>