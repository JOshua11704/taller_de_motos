<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $con=$db->conectar();
?>

<?php

// Consulta para obtener las facturas de ventas y sus detalles de productos, servicios y documentos
$consultabills = $con->prepare("
SELECT
    fact.id_venta, fact.placa, fact.fecha, fact.fecha_duracion_soat, fact.fecha_duracion_tecno, fact.documento, fact.total, seg.id_soat,
    -- Detalles de Productos
    prod.nom_repuestos,
    dv.cantidad AS cantidad_producto,
    prod.precio AS subtotal_producto,

    -- Detalles de Servicios
    serv.servicio,
    can.cantidad AS cantidad_servicio,
    can.subtotal AS subtotal_servicio,

    -- Detalles de Documentos
    docs.documentos,
    docu.subtotal AS subtotal_documento

FROM bill_venta fact
LEFT JOIN detalle_venta dv ON fact.id_venta = dv.id_venta
LEFT JOIN repuestos prod ON dv.id_repuestos = prod.id_repuestos
LEFT JOIN detalle_vservi can ON fact.id_venta = can.id_venta
LEFT JOIN servicio serv ON can.id_servicio = serv.id_servicio
LEFT JOIN detalle_vdocu docu ON fact.id_venta = docu.id_venta
LEFT JOIN documentos docs ON docu.id_documentos = docs.id_documentos
LEFT JOIN soat seg ON fact.id_soat = seg.id_soat;


");

$consultabills->execute();
$facturas = $consultabills->fetchAll(PDO::FETCH_ASSOC);
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

    <title>Ventas</title>

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
            
            <!-- <div class="encabezado_a3">
                <img src="../../../../imagenes/useredit.png" alt="perfil">
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
                <img src="../../../../imagenes/agregar_usuario.png" alt="Cerrar">
            </div>
            <ul class="navbar-nav ms-auto">

                <li class="nav-item p-5">
                    <a class="nav-link" href="../../index.php">INICIO</a>
                </li>

                <li class="nav-item dropdown p-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">MOTOS</a>
                    <ul class="dropdown-menu">

                    <li><a class="dropdown-item" href="./motos.php">Motos</a></li>

                    <li><a class="dropdown-item" href="./cilindraje.php">Cilindraje</a></li>

                    <li><a class="dropdown-item" href="./combustible.php">Combustible</a></li>

                    <li><a class="dropdown-item" href="./estado.php">Estado</a></li>

                    <li><a class="dropdown-item" href="./linea.php">Linea</a></li>

                    <li><a class="dropdown-item" href="./modelo.php">Modelo</a></li>

                    <li><a class="dropdown-item" href="./marca.php">Marca</a></li>

                    <li><a class="dropdown-item" href="./tip_veh.php">Tipo de vehiculo</a></li>

                    <li><a class="dropdown-item" href="./tip_carrose.php">Tipo de Carrocería</a></li>
                    </ul>
                </li>
              
                
                <li class="nav-item dropdown p-5">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">TABLAS</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="../productos.php">Productos</a></li>
                        <li><a class="dropdown-item" href="../usuarios.php">Usuarios</a></li>
                        <li><a class="dropdown-item" href="../servicio.php">Servicios</a></li>
                        <li><a class="dropdown-item" href="../documentos.php">Documentación</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown p-5">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">VENTAS</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="./carrito_compras.php">General</a></li>
                        <li><a class="dropdown-item" href="#">de Productos</a></li>
                        <li><a class="dropdown-item" href="#">de Servicios</a></li>
                        <li><a class="dropdown-item" href="#">de Documentación</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Facturas de Ventas</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                      
                        <th>Placa del Vehículo</th>
                        <th>Fecha de Venta</th>
                        <th>Fecha de Vigencia SOAT</th>
                        <th>Fecha de Vigencia Tecnomecánica</th>
                        <th>Aseguradora</th>
                        <th>Documento</th>
                        <th>Total</th>
                        <th>Productos</th>
                        <th>Servicios</th>
                        <th>Documentos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($facturas as $factura) { ?>
                        <tr>
                            
                            <td><?php echo $factura["placa"]; ?></td>
                            <td><?php echo $factura["fecha"]; ?></td>
                            <td><?php echo $factura["fecha_duracion_soat"]; ?></td>
                            <td><?php echo $factura["fecha_duracion_tecno"]; ?></td>
                            <td><?php echo $factura["aseguradora"]; ?></td>
                            <td><?php echo $factura["documento"]; ?></td>
                            <td><?php echo $factura["total"]; ?></td>
                            <td>
                                <?php
                                if ($factura["cantidad_producto"] !== null) {
                                    echo "<strong>Nombre:</strong> " . $factura["nom_repuestos"] . "<br><strong>Cantidad:</strong> " . $factura["cantidad_producto"] . "<br><strong>Subtotal:</strong> " . $factura["subtotal_producto"];
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($factura["cantidad_servicio"] !== null) {
                                    echo "<strong>Servicio:</strong> " . $factura["servicio"] . "<br><strong>Cantidad:</strong> " . $factura["cantidad_servicio"] . "<br><strong>Subtotal:</strong> " . $factura["subtotal_servicio"];
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($factura["subtotal_documento"] !== null) {
                                    echo "<strong>Documento:</strong> " . $factura["documentos"] . "<br><strong>Subtotal:</strong> " . $factura["subtotal_documento"];
                                }
                                ?>
                            </td>
                            <td>
                                <a href="imprimir.php?id=<?php echo $factura['id_venta']; ?>" class="btn btn-primary">
                                    <i class="fas fa-print me-2"></i>Imprimir
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <button class="btn btn-primary" onclick="window.print()">
                <i class="fas fa-print me-2"></i>Imprimir Facturas
            </button>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>