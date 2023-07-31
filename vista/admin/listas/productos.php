<?php

//coneccion
 session_start();
 require ("../../../controlador/conexion.php");
 include ("../../../controlador/validarsesion.php");
 $db = new Database();
 $conectar = $db -> conectar();

?>


<?php
    $select = $conectar -> prepare ("SELECT id_repuestos, nom_repuestos, precio, cantidad FROM repuestos");
    $select -> execute();

?>


<!DOCTYPE html>
<html>
<head>
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="../../../css/tabla.css">
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../../../imagenes/moto.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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

    <div class=" d-flex justify-content-center align-items-center ">

        <div class="main-container rounded-5 text-secondary" style="width: 70rem">

                <h2 class="text-center text-dark fs-1 fw-bold" style="margin-right: 25%;">Listado de Productos</h2>
                <br>

                <div class="row">
                    <div class="col-lg-6">
                        <form action="../libreria/formatoexel/exelproduc.php">
                            <div ><button type="submit" class="btn btn-outline-dark m-1" >Descargar EXCEL</button></div> 
                        </form>
                
                </div>

                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <form action="../index.php">
                            <div ><button type="submit" class="btn btn-dark m-1 shadow-sm" >VOLVER</button></div> 
                        </form>
                    </div>

                    <div class="col-lg-6">
                        <form action="agregarprod.php">
                            <button type="submit" class="btn btn-dark m-1 shadow-sm">CREAR PRODUCTO</button>
                        </form>
                    </div>
                </div>
    
                <br><br><br>

                <table style="border:#000 solid 1px">
                    <tr>
                        <thead>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center" colspan= "2" style="text-align: center;"> Accion</th>
                        </thead>
                    
                    <tbody>
                        <?php
                            foreach($select as $producto){

                        ?>
                            <tr>
                                <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$producto['id_repuestos']?></td>
                                <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$producto['nom_repuestos']?></td>
                                <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$producto['precio']?></td>
                                <td class="text-dark text-center" style="background-color: #DCD6D6;"><?=$producto['cantidad']?></td>

                                <td class="text-center" style="text-align: center;background-color: #DCD6D6;">
                                    <form action= "edit_product.php" method="get">
                                        <input type="hidden" name="producto" value= "<?=$producto['id_repuestos']?>">
                                        <button type= "submit" class="d-flex justify-content-center align-items-center btn btn-dark text-white w-50 mt-4 fw-semibold shadow-sm" name = "actualizar">Editar</button>
                                    </form>

                                </td>
                                <td class="text-center" style="text-align: center; background-color: #DCD6D6;">
                                    <form action= "./eliminar_produc.php" method="get">
                                        <input type="hidden" name="eliminar" value= "<?=$producto['id_repuestos']?>">
                                        <button type="submit" class="text-center btn btn-dark text-white w-55 mt-4 fw-semibold shadow-sm"  onclick="return confirm ('¿Desea eliminar este producto?');">Eliminar</button>
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

