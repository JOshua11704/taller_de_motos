<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
?>


<?php

    $owner = $con->prepare("SELECT documento,nombre FROM usuario");
    $owner -> execute();
    $dueño= $owner -> fetch();

    $gasoline = $con->prepare("SELECT * FROM combustible");
    $gasoline -> execute();
    $gasolina= $gasoline -> fetch();

    $bodywork = $con->prepare("SELECT * FROM tipo_carroceria");
    $bodywork -> execute();
    $carroceria= $bodywork -> fetch();

    $tip_veh = $con->prepare("SELECT * FROM tipo_vehiculo");
    $tip_veh -> execute();
    $veh= $tip_veh -> fetch();

    $skin = $con->prepare("SELECT * FROM color");
    $skin -> execute();
    $color= $skin -> fetch();

    $cylinder = $con->prepare("SELECT * FROM cilindraje");
    $cylinder -> execute();
    $cilindraje= $cylinder -> fetch();

    $model= $con->prepare("SELECT * FROM modelo");
    $model-> execute();
    $modelo= $model-> fetch();

    $line= $con->prepare("SELECT * FROM linea");
    $line-> execute();
    $linea= $line-> fetch();

    $marca= $con->prepare("SELECT * FROM marca");
    $marca-> execute();
    $sql= $marca-> fetch();

    $user= $con->prepare("SELECT documento, nombre FROM usuario");
    $user-> execute();
    $usuario= $user-> fetch();
?>

<?php

    if((isset($_GET["MM_insert"]))&&($_GET["MM_insert"]=="formreg"))
    {
        $placa= $_GET['placa'];
        $descripcion= $_GET['descrip'];
        $kil= $_GET['kilm'];
        $capcity= $_GET['capaciti'];
        $motor= $_GET['motor'];
        $vin= $_GET['vin'];
        $chasis= $_GET['chasis'];

        $mark= $_GET['marca'];
        $document= $_GET['docu'];
        $linea= $_GET['linea'];
        $model= $_GET['modelo'];
        $cilin= $_GET['cilindraje'];
        $color= $_GET['color'];
        $tip_veh= $_GET['tip_veh'];
        $carroceria= $_GET['latas'];
        $gaso= $_GET['gaso'];


        // validar si la moto ya existe 

        $num_mot= $con->prepare("SELECT * FROM moto WHERE placa = '$placa' or numero_motor = '$motor'");
        $num_mot-> execute();
        $motor_num= $num_mot-> fetch();
    
        if ($placa=="" || $descripcion=="" || $kil=="" || $capcity=="" || $motor=="" || $vin=="" || $chasis=="" || $mark=="" || $document=="" || $linea=="" || $model=="" || $cilin=="" || $color=="" || $tip_veh=="" || $carroceria=="" || $gaso=="")
        {
            echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
            echo '<script>window.location="crear_mot.php"</script>';
        }
        elseif ($motor_num){
            echo '<script>alert("LA PLACA YA EXISTE //CAMBIELOS//");</script>';
            echo '<script>windows.location="crear_mot.php"</script>';
        }else
        {
            $registro = $con->prepare("INSERT INTO `moto` (`placa`, `id_marca`, `descripcion`, `documento`, `km`, `id_linea`, `id_modelo`, `id_cilindraje`, `id_color`, `id_clase`, `id_carroseria`, `capacidad`, `id_combustible`, `numero_motor`, `vin`, `numero_chasis`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
            $registro->execute([$placa, $mark, $descripcion, $document, $kil, $linea, $model, $cilin, $color, $tip_veh, $carroceria, $capcity, $gaso, $motor, $vin, $chasis]);

            echo '<script>alert ("REGISTRO EXITOSO");</script>';
            echo '<script>window.location="motos.php"</script>';
        
        }
    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></script>

  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    

    <link rel="icon" type="image/x-icon" href="../../../../imagenes/moto.png"/>
    <title>Registro</title>
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">
    <div class=" bg-white p-5 rounded-5 text-secondary shadow" style="width: 45rem; margin-top: 65rem; ">

            
        <form class="form1" method="GET" name="form1" id="form1" autocomplete="off"style="height: 95rem; margin-top: 10px;  margin-bottom: -5rem;">
            <!--logo-->
            <div class="imagen d-flex justify-content-center ">
                <img src="../../../../imagenes/motos.png" class="logo" style="height: 9rem; border-radius: 20%; margin-bottom: 2rem; " alt="Avatar Image">
            </div>

            <h1 class="text-center text-dark fs-1 fw-bold">Registro De <br> Vehiculos</h1><br><br>
            <!--Inserta titulo-->


                <!--crea formularios-->
    
    
                <label for="doc">Placa</label>
                <input class="form-control bg-light" type="text" name="placa" id="Placa" required placeholder ="Digite la Placa"><br>
                
                <label for="docu">Descripción</label>
                <input class="form-control bg-light" type="text" name="descrip" required placeholder="Digite una Descripción"><br>

                <label for="docu">Kilometraje</label>
                <input class="form-control bg-light" type="number" name="kilm" placeholder="Digite el Kilometraje" required><br>

                <label for="docu">Motor</label>
                <input class="form-control bg-light" type="text" name="motor" placeholder="Digite el Numero del motor" required><br>

                <label for="docu">Vin</label>
                <input class="form-control bg-light" type="text" name="vin" placeholder="Digite el Vin" required><br>

                <label for="docu">Chasis</label>
                <input class="form-control bg-light" type="text" name="chasis" placeholder="Digite el Numero del Chasis" required>
                <br>

                <label for="docu">Capacidad</label>
                <input class="form-control bg-light" type="number" name="capaciti" placeholder="Digite la Capacidad" required>
                <br>


                <div class="container">
                    <div class="row gap-1">    

                                <select class="form-control bg-light col-lg-4" name="marca" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem; height: 3rem;" required>
                                
                                        <option value="1" class="text-center" selected disabled="">Marcas</option>
                                        
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($sql['id_marca'])?>"><?php echo($sql ['marca'])?></option>

                                        <?php
                                            }while($sql= $marca-> fetch());
                                        ?>

                                </select>

                                    
                                <select class="form-control bg-light col-lg-4" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem;" name="docu">

                                    <option value="1" class="text-center" selected disabled>Propietario</option>
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($usuario ['documento'])?>"><?php echo($usuario ['nombre'])?></option>
                                    <?php
                                        }while( $usuario= $user-> fetch());
                                    ?>
                                </select>


                                <select class="form-control bg-light col-lg-4" name="linea" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem;">

                                    <option value="1" class="text-center" selected disabled>Linea</option>
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($linea ['id_linea'])?>"><?php echo($linea ['linea'])?></option>
                                    <?php
                                        }while($linea= $line-> fetch());
                                    ?>
                                </select>
                                <br><br>

                                <select class="form-control bg-light col-lg-4" name="modelo" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem; height: 3rem;" required>
                                
                                        <option value="1" class="text-center" selected disabled="">Modelo</option>
                                        
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($modelo['id_modelo'])?>"><?php echo($modelo ['modelo'])?></option>

                                        <?php
                                            }while($modelo= $model-> fetch());
                                        ?>

                                </select>

                                    
                                <select class="form-control bg-light col-lg-4" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem;" name="cilindraje">

                                    <option value="1" class="text-center" selected disabled>Cilindraje</option>
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($cilindraje ['id_cilindraje'])?>"><?php echo($cilindraje ['cilindraje'])?></option>
                                    <?php
                                        }while($cilindraje= $cylinder -> fetch());
                                    ?>
                                </select>


                                <select class="form-control bg-light col-lg-4" name="color" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem;">

                                    <option value="1" class="text-center" selected disabled>Color</option>
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($color ['id_color'])?>"><?php echo($color ['color'])?></option>
                                    <?php
                                        }while($color= $skin -> fetch());
                                    ?>
                                </select>

                                <select class="form-control bg-light col-lg-4" name="tip_veh" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem; height: 3rem;" required>
                                
                                        <option value="1" class="text-center" selected disabled="">Tipo de Vehiculo</option>
                                        
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($veh['id_clase'])?>"><?php echo($veh ['tip_vehiculo'])?></option>

                                        <?php
                                            }while($veh= $tip_veh -> fetch());
                                        ?>

                                </select>

                                    
                                <select class="form-control bg-light col-lg-4" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem;" name="latas">

                                    <option value="1" class="text-center" selected disabled>Carroceria</option>
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($carroceria ['id_carroseria'])?>"><?php echo($carroceria ['carroseria'])?></option>
                                        <?php
                                            }while($carroceria= $bodywork -> fetch());
                                        ?>
                                </select>


                                <select class="form-control bg-light col-lg-4" name="gaso" style="margin-top: 2rem; margin-bottom: 1rem; width: 12rem;">

                                    <option value="1" class="text-center" selected disabled>Combustible</option>
                                        <?php
                                            do {

                                        ?>
                                        <option value="<?php echo ($gasolina ['id_combustible'])?>"><?php echo($gasolina ['combustible'])?></option>
                                    <?php
                                        }while($gasolina= $gasoline -> fetch());
                                    ?>
                                </select>
                            </div> 
                    </div>

                        <br><br><br><br><div class="col d-flex gap-1 justify-content-center "><input class="btn text-white fw-semibold shadow-sm" style="width: 60%; background-color: #49948F;" type="submit" name="validar" value="REGISTRAR VEHICULO"></div>

                        <input type="hidden" name="MM_insert" value="formreg">

                        <a href="./motos.php" class="col text-decoration-none text-dark fw-semibold fst-italic" style="font-size: 1rem;">VOLVER</a>   
                </div>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- script para la barra de autocompletado de busqueda -->
    <script type="text/javascript">
        $(document).ready(function(){
        $('#controlBuscador').select2(); 
        });
    </script>
    <!-- Poner el id id="controlBuscador" en un select para aplicar el select2 -->


</body>
</html>