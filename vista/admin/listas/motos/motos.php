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



<!DOCTYPE html>
<html>
<head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../../../../imagenes/moto.png"/>

    <link rel="stylesheet" href="../../../../css/tabla.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Listado de Vehículos</title>

</head>
<body>
<div class="contenedor">
    <header>
        <div class="encabezado">

            <div class="encabezado_a1">
              <a href="../../index.php" class="active"><img src="../../../../imagenes/logo.JPG" alt="logo de inventario sena"></a>
            </div>
            
            <div class="encabezado_a2">
                <h1>TALLER <br>DE MOTOS</h1>
            </div>
            
            <div class="encabezado_a3">
                <img src="../../../../imagenes/useredit.png" alt="perfil">
                <h4>Mi Perfil</h4>
            </div>

        </div>    
    </header>


<!-- Nav bottstrap -->
<nav class="navbar navbar-expand-md">

    <div class="barra_nav container-fluid navbar-nav">

    <!-- boton para el colapso -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- clase para lo que va a colapsar en el boton -->

            <div class="menu_m1 nav-item">
            <!-- boton de cerrar session  -->
                <form method="POST">
                    <input type="submit" value="Cerrar sesion" name="cerrar"/>
                </form>   
                <img src="../../../../imagenes/agregar_usuario.png" alt="Cerrar">
            </div>

            <!-- el ms-auto nos configura todo lo de la nav var a la derecha  -->
            <ul class="navbar-nav ms-auto">

            <li class="nav-item dropdown text-align-right -8 p-4 m-right-4">
                <a class="nav-link dropdown-toggle text-align-right justify-content-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Motos
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./cilindraje.php">Cilindraje</a></li>

                    <li><a class="dropdown-item" href="./">Color</a></li>

                    <li><a class="dropdown-item" href="./">Combustible</a></li>

                    <li><a class="dropdown-item" href="./">Estado</a></li>

                    <li><a class="dropdown-item" href="./">Linea</a></li>

                    <li><a class="dropdown-item" href="./">Bin</a></li>

                    <li><a class="dropdown-item" href="./">Modelo</a></li>

                    <li><a class="dropdown-item" href="./">Estado</a></li>

                    <li><a class="dropdown-item" href="./">Tipo de vehiculo</a></li>

                    <li><a class="dropdown-item" href="./">Tipo de Servicio</a></li>

                    <li><a class="dropdown-item" href="./">Tipo de Carrocería</a></li>
                </ul>

                </li>

                <li class="nav-item p-4">
                <a class="nav-link " href="../ventas/venta.php">Ventas</a>
                </li>

                <li class="nav-item p-4">
                <a class="nav-link" href="../productos.php">Productos</a>
                </li>

                <li class="nav-item p-4">
                <a class="nav-link" href="../servicio.php">Servicios</a>
                </li>

                <li class="nav-item p-4">
                <a class="nav-link" href="../documentos.php">Documentacion</a>
                </li>

                

            </ul>
            
        </div>

    </div>
</nav>

    <div class=" d-flex justify-content-center align-items-center ">
        <div class="main-container rounded-5 text-secondary" style="width: 70rem">

            <h2 class="text-center text-dark fs-1 fw-bold" style="margin-right: 25%;">Listado de Vehículos</h2>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <form action="../libreria/formatoexel/exel_usu.php">
                        <div ><button type="submit" class="btn btn-outline-dark m-1" >Descargar EXCEL</button></div> 
                    </form>
               
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-lg-6">
                    <form action="../index.php">
                        <button type="submit"  class="btn btn-dark m-1 shadow-sm" >VOLVER</button>
                    </form>
                </div>    
                <div class="col-lg-6">
                    <form action="./crear_mot.php">
                            <button type="submit" class="btn btn-dark m-1 shadow-sm">CREAR VEHICULO</button>
                    </form>
                </div>
            </div>
            <br><br><br>

            <table style="border:#000 solid 1px">
                <tr>
                    <thead>
                        <th class="text-center">Placa</th>
                        <th class="text-center">Dueño</th>
                        <th class="text-center">Kilometraje</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Color</th>
                        <th class="text-center">Cilindraje</th>
                        <th class="text-center">Tipo</th>
                
                        <!-- Accion editar - eliminar -->
                        <th colspan= "2" style="text-align: center;"> Accion</th>
                    </thead>
                </tr>

                
                <tbody>
                    <?php
                        foreach($sql as $sq){

                    ?>
                    
                        <tr>
                            <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$sq['placa']?></td>

                            <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$sq['nombre']?></td>

                            <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$sq['km']?></td>

                            <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$sq['marca']?></td>

                            <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$sq['color']?></td>

                            <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$sq
                            ['cilindraje']?></td>

                            <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$sq['tip_vehiculo']?></td>
                            

                            <td style="background-color: #DCD6D6">
                                <form action= "./edit_usu.php" method="get">
                                    <input type="hidden" name="update" value= "<?=$sq['documento']?>">
                                    <button type= "submit" class="btn btn-dark text-white w-70 mt-4 fw-semibold shadow-sm">Editar</button>
                                </form>

                            </td>
                            <td style="background-color: #DCD6D6">
                                <form action= "./eliminar_usu.php" method="get">
                                    <input type="hidden" name="eliminar" value= "<?=$sq['documento']?>">
                                    <button type="submit" class="btn btn-dark text-white w-70 mt-4 fw-semibold shadow-sm" onclick="return confirm ('¿Desea eliminar este usuario?');">Eliminar</button>
                                </form>
                            </td>
                        </tr>   
                        
                        

                    
                </tbody>
                <?php
                }

                ?>
            </table>    
            <br>

        </div>      
        
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<body>
</html>



    

