<?php
    session_start();
    require ("../../../controlador/conexion.php");
    include ("../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
?>


<?php
   $sql=$con->prepare("SELECT * FROM documentos");
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
    <title>Documentos</title>
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
            
            <div class="encabezado_a3">
                <img src="../../../imagenes/useredit.png" alt="perfil">
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
                <img src="../../../imagenes/agregar_usuario.png" alt="Cerrar">
            </div>

            <!-- el ms-auto nos configura todo lo de la nav var a la derecha  -->
            <ul class="navbar-nav ms-auto">

            <li class="nav-item dropdown text-align-right -8 p-4 m-right-4">
                <a class="nav-link dropdown-toggle text-align-right justify-content-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Motos
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="ventas/venta.php">Cilindraje</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_servi.php">Color</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_prod.php">Combustible</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_document.php">Estado</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_document.php">Linea</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_document.php">Bin</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_document.php">Modelo</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_document.php">Estado</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_document.php">Tipo de vehiculo</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_document.php">Tipo de Servicio</a></li>

                    <li><a class="dropdown-item" href="ventas/venta_document.php">Tipo de Carrocería</a></li>
                </ul>

                </li>

                <li class="nav-item p-4">
                <a class="nav-link " href="ventas/venta.php">Ventas</a>
                </li>

                <li class="nav-item p-4">
                <a class="nav-link" href="productos.php">Productos</a>
                </li>

                <li class="nav-item p-4">
                <a class="nav-link" href="servicio.php">Servicios</a>
                </li>

                <li class="nav-item p-4">
                <a class="nav-link" href="documentos.php">Documentacion</a>
                </li>

                

            </ul>
            
        </div>

    </div>
</nav>




    <div class="main-container rounded-5 text-secondary" style="width: 70rem">

        <H2 class="text-center text-dark fs-1 fw-bold" style="margin-right: 25%;">Documentación</H2>
        <br>
        <br>
        <div>
            <form method="get" action="agregar_docs.php">
                <input type="hidden" name="agre" value="<?=$docs["id_servicio"]?>">
                <button type="submit" class="btn btn-dark m-1 shadow-sm" name="actubo" >AGREGAR NUEVO</button>
            </form>
            <form action="../index.php">
                <div ><button type="submit" class="btn btn-dark m-1 shadow-sm" >VOLVER</button></div> 
            </form>
        </div>

        <br>
        <br>
        <table style="border:#000 solid 1px">
            <tr>
                <thead>
                    <th class="text-align-center">ID</th>
                    <th class="text-align-center">Nombre del Producto</th>
                    <th class="text-align-center">Precio</th>
                    <th class="text-align-center">Fecha</th>
                    <th colspan="2" style="text-align: center;">Act/Eli</th>
                </thead>
            </tr>
        
            <?php
            foreach ($sql as $docs){
            ?>
            <tr>
                <tbody>
                    <td class="text-align-center"><?=$docs ["id_documentos"] ?></td>
                    <td class="text-align-center"><?=$docs["documentos"]?></td>
                    <td class="text-align-center"><?=$docs["precio"]?></td>
                    <td class="text-align-center"><?=$docs["fecha"]?></td>
                    <td class="text-align-center">
                    
                        <form method="get" action="eliminar_docs.php">
                            <input type="hidden" name="eli_doc" value="<?=$docs["id_documentos"]?>">
                            <button type="submit" class="btn btn-dark text-white w-60 mt-4 fw-semibold shadow-sm"  onclick="return confirm ('¿Desea eliminar este producto?');">ELIMINAR</button>
                        </form>
                    </td>
                    <td style="text-align: center;">
                        <form method="get" action="edit_docs.php">
                            <input type="hidden" name="id" value="<?=$docs["id_documentos"]?>">
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
</body>
</html>