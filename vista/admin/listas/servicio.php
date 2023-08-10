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
    <link rel="icon" type="image/x-icon" href="../../../imagenes/moto.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <title>Servicio</title>
</head>
<body>


<div class="contenedor">
    <header>
        <div class="encabezado">

            <div class="encabezado_a1">
              <a href="../index.php" class="active"><img src="../../../imagenes/logo.JPG" alt="logo de inventario sena"></a>
            </div>
            
            <div class="encabezado_a2">
                <h1>TALLER <br>DE MOTOS</h1>
            </div>
            
            <!-- <div class="encabezado_a3">
                <img src="../../../imagenes/useredit.png" alt="perfil">
                <h4>Mi Perfil</h4>
            </div> -->

        </div>    
    </header>



<!-- barra de navegacion -->
<nav class="navbar navbar-expand-md">
    <div class="barra_nav container-fluid navbar-nav">



        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="menu_m1 nav-item">
                <form method="POST">
                    <input type="submit" value="Cerrar sesión" name="cerrar"/>
                </form>
                <img src="../../../imagenes/agregar_usuario.png" alt="Cerrar">
            </div>
            <ul class="navbar-nav ms-auto">

                <li class="nav-item p-5">
                    <a class="nav-link" href="./index.php">INICIO</a>
                </li>

                <li class="nav-item dropdown p-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">MOTOS</a>
                    <ul class="dropdown-menu">

                    <li><a class="dropdown-item" href="./motos/motos.php">Motos</a></li>

                    <li><a class="dropdown-item" href="./motos/cilindraje.php">Cilindraje</a></li>

                    <li><a class="dropdown-item" href="./motos/combustible.php">Combustible</a></li>

                    <li><a class="dropdown-item" href="./motos/estado.php">Estado</a></li>

                    <li><a class="dropdown-item" href="./motos/linea.php">Linea</a></li>

                    <li><a class="dropdown-item" href="./motos/modelo.php">Modelo</a></li>

                    <li><a class="dropdown-item" href="./motos/marca.php">Marca</a></li>

                    <li><a class="dropdown-item" href="./motos/tip_veh.php">Tipo de vehiculo</a></li>

                    <li><a class="dropdown-item" href="./motos/tip_carrose.php">Tipo de Carrocería</a></li>
                    </ul>
                </li>
              
                
                <li class="nav-item dropdown p-5">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">TABLAS</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="./productos.php">Productos</a></li>
                        <li><a class="dropdown-item" href="./usuarios.php">Usuarios</a></li>
                        <li><a class="dropdown-item" href="./servicio.php">Servicios</a></li>
                        <li><a class="dropdown-item" href="./documentos.php">Documentación</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown p-5">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">VENTAS</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">General</a></li>
                        <li><a class="dropdown-item" href="#">de Productos</a></li>
                        <li><a class="dropdown-item" href="#">de Servicios</a></li>
                        <li><a class="dropdown-item" href="#">de Documentación</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class=" d-flex justify-content-center align-items-center ">
    <div class="main-container rounded-5 text-secondary" style="width: 70rem">

        <H2 class="text-center text-dark fs-1 fw-bold" style="margin-right: 25%;"> SERVICIOS</H2>
        <br>
        <br>
        
        <div class="row">
            <div class="col-lg-6">
                <form action="../libreria/formatoexel/exe_servi.php">
                    <div ><button type="submit" class="btn btn-outline-dark m-1" >Descargar EXCEL</button></div> 
                </form>
               
            </div>


            


            <br>
        <br>
        <div class="row">
        <div class="col-lg-6">
                <form action="../index.php">
                    <div ><button type="submit" class="btn btn-dark m-1 shadow-sm" >VOLVER</button></div> 
                </form>
            </div>
                
            <div class="col-lg-6">
                <form method="get" action="agregar_serv.php">
                    <input type="hidden" name="agre" value="<?=$user["id_servicio"]?>">
                    <button type="submit" class="btn btn-dark m-1 shadow-sm" name="actubo" >AGREGAR SERVICIO</button>
                </form>
            </div>
            
        </div>
        <br>
        <br>
        <br>
        <table style="border:#000 solid 1px">
            <tr>
                <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nombre de Servicio</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center" colspan="2" style="text-align: center;">Act/Eli</th>
                </thead>
            </tr>
        
            <?php
            foreach ($sql as $user){
            ?>
            <tr>
                <tbody>
                    <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$user ["id_servicio"] ?></td>
                    <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$user["servicio"]?></td>
                    <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$user["descripcion"]?></td>
                    <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$user["precio"]?></td>
                    <td class="text-dark text-center" style="background-color: #DCD6D6;">
                    
                        <form method="get" action="eliminarserv.php">
                            <input type="hidden" name="eli" value="<?=$user["id_servicio"]?>">
                            <button type="submit" class="btn btn-dark text-white w-60 mt-4 fw-semibold shadow-sm"  onclick="return confirm ('¿Desea eliminar este producto?');">ELIMINAR</button>
                        </form>
                    </td>
                    <td style="background-color: #DCD6D6;">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div> 
</body>
</html>
