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
        <link rel="icon" type="image/x-icon" href="../../../imagenes/moto.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

    </head>
        <body class=" d-flex justify-content-center align-items-center vh-100" style="background-color: #9e9a9a;">
        <div class="main-container rounded-5 text-secondary" style="width: 70rem">

            <h2 class="text-center text-dark fs-1 fw-bold" style="margin-right: 25%;">Listado de Productos</h2>
            <br><br>

            <div class="row">
                <div class="col-sn-6">
                    <form action="../index.php">
                        <div ><button type="submit" class="btn btn-dark m-1 shadow-sm" >VOLVER</button></div> 
                    </form>
                </div>

                <div class="col-sn-6">
                    <form action="agregarprod.php">
                        <button type="submit" class="btn btn-dark m-1 shadow-sm">CREAR PRODUCTO</button>
                    </form>
                </div>
            </div>    
            <br><br>

            <table>
                <tr>
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th colspan= "2" style="text-align: center;"> Accion</th>
                    </thead>
                
                <tbody>
                    <?php
                        foreach($select as $producto){

                    ?>
                        <tr>
                            <td><?=$producto['id_repuestos']?></td>
                            <td><?=$producto['nom_repuestos']?></td>
                            <td><?=$producto['precio']?></td>
                            <td><?=$producto['cantidad']?></td>

                            <td style="text-align: center;">
                                <form action= "edit_product.php" method="get">
                                    <input type="hidden" name="producto" value= "<?=$producto['id_repuestos']?>">
                                    <button type= "submit" class="btn btn-dark text-white w-50 mt-4 fw-semibold shadow-sm" name = "actualizar">Editar</button>
                                </form>

                            </td>
                            <td style="text-align: center;">
                                <form action= "./eliminar_produc.php" method="get">
                                    <input type="hidden" name="eliminar" value= "<?=$producto['id_repuestos']?>">
                                    <button type="submit" class="btn btn-dark text-white w-50 mt-4 fw-semibold shadow-sm"  onclick="return confirm ('¿Desea eliminar este producto?');">Eliminar</button>
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
        <body>
    </html>

