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
    <link rel = "stylesheet" href="../../css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>
<body>

    
<div class="contenedor">    
    <header>
        <div class="encabezado">

            <div class="encabezado_a1">
                <img src="../../imagenes/logo.JPG" alt="logo de inventario sena">
            </div>
            
            <div class="encabezado_a2">
                <h1>TALLER <br>DE MOTOS</h1>
            </div>
            
            <div class="encabezado_a3">
                <img src="../../imagenes/useredit.png" alt="perfil">
                <h3>Mi Perfil</h3>
            </div>

        </div>    
    </header>


         <nav>
            <div class="barra_nav">
                    
                <div class="menu_m1">
                    <!-- boton de cerrar session -->
                    <form method="POST">
                        <input type="submit" value="Cerrar sesion" name="cerrar"/>
                    </form>   
                    <img src="../../imagenes/agregar_usuario.png" alt="Cerrar">
                </div>
                <div class="menu_m2">
                    <a href="#">Contactanos</a>
                </div>
                        
                <div class="menu_m3">
                    <a href="#">Nosotros</a>
                </div>
                        
                <div class="menu_m4">
                    <a href="#">Categorías</a>
                </div>
                        
                    
            </div>    
        </nav>
   

    <main class ="conten container-fluid">
        <!-- <div > -->
            <h2>Funciones</h2>
           
                <div class="contenido_n1">

                    <img src="../../imagenes/caracteristicas.png" alt="Revisión">
                </div>
                <div class="contenido_n2">
                    
                    <img src="../../imagenes/chequeo.png" alt="Reparación">
                </div>
                
                <div class="contenido_n3">
                    
                    <img src="../../imagenes/cliente.png" alt="Mantenimiento">
                </div>
                
                <div class="contenido_n4">
                    
                    <img src="../../imagenes/reporte.png "alt="Venta de Repuestos">
                    
                </div>
        <!-- </div>         -->
    
    </main>
    
    <div class="opciones">

        <div class="op_one"><a href="listas/productos.php">Productos</a></div>

        <div class="op_two"><a href="listas/servicio.php">Servicios</a></div>

        <div class="op_three"><a href="listas/usuarios.php">Usuarios</a></div>

        <div class="op_four"><a href="#">Ventas</a></div>
            
    </div>


    <div class="pie">
        <footer>
            <div class="foot_1"><h5>¿Necesitas mas información?</h5></div>
            <div class="foot_2"><h5>Bogota: 3430111</h5></div>
            <div class="foot_3"> <h5>Resto del País:  018000910270</h5></div>
            <div class="foot_4"> <h5>Horario de atención: Lunes a viernes 7am hasta las 7pm</h5></div>
            <div class="foot_5"><h5>Sábados de 8 am hasta la 1 pm</h5></div>
        </footer>
    </div>

</div>    
</body>
</html>             