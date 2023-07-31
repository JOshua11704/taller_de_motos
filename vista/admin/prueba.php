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

    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel = "stylesheet" href="../../css/styles.css">

</head>

  
<body>

    
<div class="contenedor">    
    <header>
        <div class="encabezado container-fluid">

            <div class="encabezado_a1">
              <a href="./index.php" class="active"><img src="../../imagenes/logo.JPG" alt="logo de inventario sena"></a>
            </div>
            
            <div class="encabezado_a2">
                <h1>TALLER <br>DE MOTOS</h1>
            </div>
            
            <div class="encabezado_a3 p-5">
                <img src="../../imagenes/useredit.png" alt="perfil">
                <p><a href="#" class="link-underline-none">Mi Perfil</a></p>
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
              <img src="../../imagenes/agregar_usuario.png" alt="Cerrar">
          </div>

          <!-- el ms-auto nos configura todo lo de la nav var a la derecha  -->
            <ul class="navbar-nav ms-auto">

              <li class="nav-item p-4">
                <a class="nav-link " href="#">Contactanos</a>
              </li>

              <li class="nav-item p-4">
                <a class="nav-link" href="#">Nosotros</a>
              </li>

              <li class="nav-item dropdown text-align-right -8 p-4">
                <a class="nav-link dropdown-toggle text-align-right justify-content-end" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ventas
                </a>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">General</a></li>

                  <li><a class="dropdown-item" href="#">Servicios</a></li>

                  <li><a class="dropdown-item" href="#">Productos</a></li>

                  <li><a class="dropdown-item" href="#">Documentacion</a></li>
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
                <div class="op_three"><a href="listas/usuarios.php" class="">Documentacion</a></div>

            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="contenido_n3 mx-auto d-block">
                    
                    <img src="../../imagenes/analitica.png"alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Reportes</a> -->
                </div>
                <div class="op_four"><a href="#" class="">Reportes</a></div>
            </div>    
            
        </div>    
        


          
          <!-- column-gap-1 -->

     
  </div>



    <div class="pie row">
        <footer>
            <div class="foot_1 col-2 col-sm"><h5>¿Necesitas mas información?</h5></div>
            <div class="foot_2 col-2 col-sm"><h5>Bogota: 3430111</h5></div>
            <div class="foot_3 col-2 col-sm"> <h5>Resto del País:  018000910270</h5></div>
            <div class="foot_4 col-2 col-sm"> <h5>Horario de atención: Lunes a viernes 7am hasta las 7pm</h5></div>
            <div class="foot_5 col-2 col-sm"><h5>Sábados de 8 am hasta la 1 pm</h5></div>
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</div>    
</body>
</html>             