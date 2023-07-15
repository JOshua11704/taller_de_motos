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

<! DOCTIPO  html >
< html  idioma = "es" >
< cabeza >
    < juego de caracteres meta  = "UTF-8" >
    < meta  http-equiv = "X-UA-Compatible"  content = "IE=edge" >
    < meta  name = "viewport"  content = "width=device-width, initial-scale=1.0" >
    < título > Administrador </ título >
    < enlace  rel = "icono"  tipo = "imagen/jpg"  href = "../../imagenes/imagen 39.svg" >

    < enlace  href = " https://cdn.jsdelivr. net/npm/bootstrap@5.3.0/dist/ css/bootstrap.min.css "  rel = "hoja de estilo"  integridad = "sha384- 9ndCyUaIbzAi2FUVXJi0CjmCapSmO7 SnpJef0486qhLnuZ2cdeRhO02iuK6F UUVM "  origen cruzado = " anonimo" >

    < enlace  href = "   https://cdn.jsdelivr.net/npm/ bootstrap@5.3.0/dist/js/ bootstrap.bundle.min.js "  rel = "hoja de estilo"  integridad = "sha384- 9ndCyUaIbzAi2FUVXJi0CjmCapSmO7 SnpJef0486qhLnuZ2cdeRhO02iuK6F UUVM"  origen cruzado = "anonimo" >
    < enlace  rel = "hoja de estilo"  href = "../../css/styles.css" >

</ cabeza >

  
< cuerpo >

    
< div  class = "contenedor" >    
    < encabezado >
        <div class="encabezado">

            <div class="encabezado_a1">
              < a  href = "./index.php"  class = "activo" >< img  src = "../../imagenes/logo.JPG"  alt = "logo de inventario sena" ></ a >
            </div> _ _
            
            < div  class = "encabezado_a2" >
                <h1>TALLER <br>DE MOTOS</h1>
            </div> _ _
            
            <div class="encabezado_a3">
                < img  src = "../../imagenes/useredit.png "  alt = "perfil" >
                < h4 > Mi Perfil </ h4 >
            </div> _ _

        </div> _ _    
    </ encabezado >

    <!-- Botón de navegación -->
  < clase de navegación  = "navbar navbar-expand-md" >

      < div  clase = "barra_nav container-fluid navbar-nav" >
      
        <!-- botón para colapsar -->
        < button  class = "navbar-toggler"  type = "button"  data-bs-toggle = "collapse"  data-bs-target = "# navbarNavDropdown"  aria-controls = "navbarScroll"  aria-expanded = "false"  aria-label = "Alternar navegación" >< abarcan  clase = "navbar-toggler-icon" ></ abarcan ></ botón >
        
        < div  class = "collapse navbar-collapse"  id = "navbarNavDropdown" >
          <!-- clase para lo que va a colapsar en el boton -->

          < div  class = "menu_m1 elemento de navegación" >
          <!-- boton de cerrar session  -->
                < método de formulario  = "POST" >
                  < tipo de entrada  = "enviar" valor = "Cerrar sesión" nombre = "cerrar" />  
                </ formulario >   
              < img  src = "../../images/add_user.png "  alt = "Cerrar" >
          </div> _ _

          <!-- el ms-auto nos configura todo lo de la nav var a la derecha  -->
            < ul  clase = "navbar-nav ms-auto" >

              < li  clase = "elemento de navegación p-4" >
                < a  class = "nav-link"  href = "#" > Contactanos </ a >
              </li> _ _

              < li  clase = "elemento de navegación p-4" >
                < a  class = "nav-link"  href = "#" > Nosotros </ a >
              </li> _ _

              < li  class = "texto desplegable del elemento de navegación-alinear-derecha -8 p-4" >
                < a  class = "nav-link desplegable-alternar texto-alinear-derecha justificar-contenido-fin"  href = "#"  rol = "botón"  data-bs-toggle = "desplegable"  aria-expanded = "false" >
                  ventas
                </ a >

                < ul  clase = "menú desplegable" >
                  < li >< una  clase = "elemento desplegable"  href = "#" > General </ a ></ li >

                  < li >< a  class = "elemento desplegable"  href = "#" > Servicios </ a ></ li >

                  < li >< a  class = "elemento desplegable"  href = "#" > Productos </ a ></ li >

                  < li >< a  class = "dropdown-item"  href = "#" > Documentación </ a ></ li >
                </ ul >
                
              </li> _ _

            </ ul >
          
      </div> _ _

    </div> _ _
  </nav> _ _


   

    < clase principal  = "contenedor de contenido m-auto" >
    <h2>Funciones</h2>
        < div  clase = "fila fila-cols-3 m-auto p-4"  estilo = " borde: sólido 2px #000;" >
           
            < div  class = "col-xl-4 p-4 contenido_n1" style = " border: solid 2px #000;" >

                <img src="../../imagenes/caracteristicas.png" alt="Revisión">
                <!-- <a href="listas/productos.php" class="col-">Productos</a> -->
            </div> _ _
            < div  class = "col-xl-4 p-4 contenido_n2" style = " border: solid 2px #000;" >
                    
                <img src="../../imagenes/chequeo.png" alt="Reparación">
                <!-- <a href="listas/servicio.php" class="col-">Servicios</a> -->
            </div> _ _
                
            < div  class = "col-xl-4 p-4 contenido_n3" style = " border: solid 2px #000;" >
                    
                <img src="../../imagenes/cliente.png" alt="Mantenimiento">
                <!-- <a href="listas/usuarios.php" class="col-">Usuarios</a> -->
            </div> _ _
        </div> _ _    
        
        < div  class = "container text-center opciones m-auto" >
            < div  clase = "fila fila-columnas-3 m-auto" >

              < div  class = "col-xl-4 op_one" >< a  href = "listas/productos.php"  class = "" > Productos </ a ></ div >

              < div  class = "col-xl-4 op_two" >< a  href = "listas/servicio.php"  class = "" > Servicios </ a ></ div >

              < div  class = "col-xl-4 op_tres" >< a  href = "listas/usuarios.php"  class = "" > Usuarios </ a ></ div >

            </div> _ _
          </div> _ _

          < div  class = "container text-center opciones m-auto" >
            < div  clase = "fila fila-columnas-3 m-auto" >

                < div  class = "col- contenido_n3" >
                    
                    <img src="../../imagenes/reporte.png "alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Ventas</a> -->
                </div> _ _

                < div  class = "col- contenido_n3" >
                    
                    <img src="../../imagenes/permiso.png"alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Documentación</a> -->
                </div> _ _

                < div  class = "col- contenido_n3" >
                    
                    <img src="../../imagenes/reporte-de-negocios.png"alt="Venta de Repuestos">
                    <!-- <a href="#" class="col-">Reportes</a> -->
                </div> _ _
            </div> _ _
          </div> _ _


                <!-- texto -->

          < div  class = "container text-center opciones m-auto" >
            < div  clase = "fila fila-columnas-3 m-auto" >
                
              < div  class = "col-xl-2 op_four" >< a  href = "#"  class = "" > Ventas </ a ></ div >

              < div  class = "col-xl-2 op_tres" >< a  href = "listas/usuarios.php"  class = "" > Usuarios </ a ></ div >

              < div  class = "col-xl-2 op_four" >< a  href = "#"  class = "" > Ventas </ a ></ div >
    
            </div> _ _
          </div> _ _    
          <!-- espacio-columna-1 -->

     
    </ principal >



    < div  clase = "fila circular" >
        < pie de página >
            < div  class = "foot_1 col-2 col-sm" >< h5 > ¿Necesitas más información? </ h5 ></ div >
            < div  class = "foot_2 col-2 col-sm" >< h5 > Bogotá: 3430111 </ h5 ></ div >
            < div  class = "foot_3 col-2 col-sm" >  < h5 > Resto del País: 018000910270 </ h5 ></ div >
            <div class="foot_4 col-2 col-sm"> <h5>Horario de atención: Lunes a viernes 7am hasta las 7pm</h5></div>
            < div  class = "foot_5 col-2 col-sm" >< h5 > Sábados de 8 am hasta la 1 pm </ h5 ></ div >
        </ pie de página >

    </div>
    < script  src = " https://cdn.jsdelivr.net/ npm/bootstrap@5.3.0/dist/js/ bootstrap.bundle.min.js "  integridad = "sha384- gewf76rcwltnz8qwwowpqngul3rmw 3te4bkz  " Crossorigin = " anónimo" >< / guión >
</div>   

</html>             