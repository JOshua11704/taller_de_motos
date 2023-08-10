<?php
 //coneccion
 session_start();
 require ("../../controlador/conexion.php");
 include ("../../controlador/validarsesion.php");
 $db = new Database();
 $conectar = $db -> conectar();

?>

<?php

    if(isset($_POST['cerrar']))
    {
        session_destroy();
        header('location: ../../index.html');
    }

?>

<!-- estructura HTML de la página -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="icon" type="image/jpg" href="../../imagenes/image 39.svg">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel = "stylesheet" href="../../css/styles.css">

</head>

  
<body>

    
<div class="contenedor">    
    <header>
        <div class="encabezado">

            <div class="encabezado_a1">
              <a href="./index.php" class="active"><img src="../../imagenes/logo.JPG" alt="logo de inventario sena"></a>
            </div>
            
            <div class="encabezado_a2">
                <h1>TALLER <br>DE MOTOS</h1>
            </div>
            
            <!-- <div class="encabezado_a3">
                <img src="../../imagenes/useredit.png" alt="perfil">
                <h4>Mi Perfil</h4>
            </div> -->

        </div>    

        
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
                <img src="../../imagenes/agregar_usuario.png" alt="Cerrar">
            </div>
            <ul class="navbar-nav ms-auto">

                <li class="nav-item p-5">
                    <a class="nav-link" href="./index.php">INICIO</a>
                </li>

                <li class="nav-item dropdown p-5">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">MOTOS</a>
                    <ul class="dropdown-menu">

                    <li><a class="dropdown-item" href="./listas/motos/motos.php">Motos</a></li>

                    <li><a class="dropdown-item" href="./listas/motos/cilindraje.php">Cilindraje</a></li>

                    <li><a class="dropdown-item" href="./listas/motos/combustible.php">Combustible</a></li>

                    <li><a class="dropdown-item" href="./listas/motos/estado.php">Estado</a></li>

                    <li><a class="dropdown-item" href="./listas/motos/linea.php">Linea</a></li>

                    <li><a class="dropdown-item" href="./listas/motos/modelo.php">Modelo</a></li>

                    <li><a class="dropdown-item" href="./listas/motos/marca.php">Marca</a></li>

                    <li><a class="dropdown-item" href="./listas/motos/tip_veh.php">Tipo de vehiculo</a></li>

                    <li><a class="dropdown-item" href="./listas/motos/tip_carrose.php">Tipo de Carrocería</a></li>
                    </ul>
                </li>
              
                
                <li class="nav-item dropdown p-5">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" role="button">TABLAS</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="./listas/productos.php">Productos</a></li>
                        <li><a class="dropdown-item" href="./listas/usuarios.php">Usuarios</a></li>
                        <li><a class="dropdown-item" href="./listas/servicio.php">Servicios</a></li>
                        <li><a class="dropdown-item" href="./listas/documentos.php">Documentación</a></li>
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

  <!-- El  "mx-auto d-block" de las clases se encarga de centrar las cosas dentro de un div -->
  <!-- gap-2 -->

    <div class ="conten container-lg m-auto">
      <h2>Funciones</h2>
        <div class="row text-center gap-0 row-gap-5">

           <div class="col-lg-4 col-sm-6 text-center">
           
              <div class="contenido_n1 mx-auto d-block">

                  <img src="../../imagenes/caracteristicas.png" alt="Revisión">
                  <!-- <a href="listas/productos.php" class="col-">Productos</a> -->
              </div>
              <div class="op_one"><a href="listas/productos.php" class="">Productos</a></div>
            </div>


            <div class="col-lg-4 col-sm-6">
              <div class="contenido_n2 mx-auto d-block">
                      
                  <img src="../../imagenes/chequeo.png" alt="Reparación">
                  <!-- <a href="listas/servicio.php" class="col-">Servicios</a> -->
              </div>
              <div class="op_two"><a href="listas/servicio.php" class="">Servicios</a></div>
            </div>


            <div class="col-lg-4 col-sm-6">
              <div class="contenido_n3 mx-auto d-block">
                      
                  <img src="../../imagenes/cliente.png" alt="Mantenimiento">
                  <!-- <a href="listas/usuarios.php" class="col-">Usuarios</a> -->
              </div>
              <div class="op_three"><a href="listas/usuarios.php" class="">Usuarios</a></div>
            </div>


            <div class="col-lg-4 col-sm-6">
                <div class="contenido_n3 mx-auto d-block">
                    
                    <img src="../../imagenes/reporte.png "alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Ventas</a>    -->
                </div>
                <div class="op_four"><a href="#" class="">Ventas</a></div>
            </div>    

            <div class="col-lg-4 col-sm-6">
                <div class="contenido_n3 mx-auto d-block">
                    
                    <img src="../../imagenes/documentacion.png"alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Documentacion</a>    -->
                </div>
                <div class="op_three"><a href="listas/documentos.php" class="">Documentacion</a></div>

            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="contenido_n3 mx-auto d-block">
                    
                    <img src="../../imagenes/analitica.png"alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Reportes</a> -->
                </div>
                <div class="op_four"><a href="#" class="">Reportes</a></div>
            </div>    

            <div class="col-lg-4 col-sm-6">
                <div class="contenido_n3 mx-auto d-block">
                    
                    <img src="../../imagenes/motos.png"alt="Motos">
                    <!-- <a href="#" class="col-">Reportes</a> -->
                </div>
                <div class="op_four"><a href="./listas/motos/motos.php" class="">Vehículos</a></div>
            </div>  


            <div class="col-lg-4 col-sm-6">
                <div class="contenido_n3 mx-auto d-block">
                    
                    <img src="../../imagenes/tipo_veh.svg"alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Reportes</a> -->
                </div>
                <div class="op_four"><a href="./listas/motos/modelo.php" class="">Modelos</a></div>
            </div>  


            <div class="col-lg-4 col-sm-6">
                <div class="contenido_n3 mx-auto d-block">
                    
                    <img src="../../imagenes/usuario.png"alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Reportes</a> -->
                </div>
                <div class="op_four"><a href="./listas/motos/estado.php" class="">Estados</a></div>
            </div>  
            
        </div>    
        


          
          <!-- column-gap-1 -->

     
  </div>



  <div class="container-fluid text-center">
        <div class="pie row">
        
            <div class="foot_1 col-12"><h5>¿Necesitas mas información?</h5></div>
            <div class="foot_2 col-6"><h5>Ibagué: 3104868742</h5></div>
            <div class="foot_4 col-6"> <h5>Horario de atención: Lunes a viernes 7am hasta las 7pm</h5></div>
            <div class="foot_3 col-6"> <h5>Resto del País:  018000910270</h5></div>
            <div class="foot_5 col-6"><h5>Sábados de 8 am hasta la 1 pm</h5></div>
            

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div>    
</body>
</html>             