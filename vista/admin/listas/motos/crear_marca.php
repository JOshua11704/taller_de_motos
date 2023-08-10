<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
?>


<?php


    $select = $con -> prepare("SELECT MAX(id_marca) + 1 AS id FROM marca"); 
    $select-> execute();
    $row = $select->fetch(PDO::FETCH_ASSOC);

    if((isset($_GET["agre"]))&&($_GET["agre"]=="tipu"))
    {
        $marca= $_GET['marca'];


        // validar si la moto ya existe 

        $num_mot= $con->prepare("SELECT * FROM marca WHERE marca = '$marca'");
        $num_mot-> execute();
        $motor_num= $num_mot-> fetch();
    
        if ($marca=="")
        {
            echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
            echo '<script>window.location="crear_marca.php"</script>';
        }
        elseif ($motor_num){
            echo '<script>alert("El marca ya existe //CAMBIELO//");</script>';
            echo '<script>windows.location="crear_mot.php"</script>';
        }else
        {
            $registro = $con->prepare("INSERT INTO `marca` (`id_marca`, `marca`) VALUES (?, ?)");
    
            $registro->execute([NULL, $marca]);

            echo '<script>alert ("REGISTRO EXITOSO");</script>';
            echo '<script>window.location="marca.php"</script>';
        
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

            <div style="height: 5rem; margin-bottom: 2rem;"><h2 class="text-center text-dark fs-1 fw-bold"> CREAR COLOR </h2> </div>
                
                <label for="">ID del marca</label>
                <input type="text" class="form-control bg-light" name="id" placeholder="<?php echo $row['id']?>" readonly><br>

                <label for="">marca</label>
                <input type="text" class="form-control bg-light" name="marca" pattern="[A-Za-z]{1,15}" maxlength="15" placeholder="Nombre del marca"><br>

    



                <div class="input-group mt-4" style="gap: 50%;">
                    <a href="marca.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text">VOLVER</a>

                    <input type="hidden" name="agre" value="tipu">
                    <button class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm" style="border-radius: 7%;"  type="submit">CREAR</button></td>
                </div>


            </form>
            
    </div>
</body>
</html>