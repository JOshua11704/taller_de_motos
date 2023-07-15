<?php
    require ("controlador/conexion.php");
    $db = new Database();
    $conectar = $db -> conectar();
    session_start();

    // Si recibe algo del formulario del index
?>

<?php
    if($_GET["started"]){
        
    // datos recibidos del index

        $docu= $_GET["documento"];
        $user= $_GET["usu"];
        $password= $_GET["contra"];
        


            ///hacer consulta de documento - usuario - contraseña - estado. recibidos del index
            
            
            $consultar = $conectar -> prepare("SELECT * FROM usuario WHERE usuario = '$user' AND documento = '$docu' AND id_estado = 1");
            $consultar -> execute();
            $consultado = $consultar -> fetch();

            
        

        if ($consultado && password_verify($password, $consultado['clave'])){   
                    
            // preparar la forma de ejecutar la fecha y hora actual de la región que que escoja 

                date_default_timezone_set("America/Bogota");
                $fecha = date('Y-m-d');
                $hora = date('H:i:s');

                    ///si el usuario y la clave son correctas, creamos variables globales

                $_SESSION ['doc_type'] = $consultado ['documento'];
                $_SESSION ['name'] = $consultado ['nombre'];
                $_SESSION ['rol'] = $consultado ['id_rol'];
                $_SESSION ['user'] = $consultado ['usuario'];
                $_SESSION ['estado']= $consultado ['id_estado'];


                $fecha= $conectar ->prepare("INSERT INTO fecha (fecha, hora, document)VALUES('$fecha','$hora','$docu')");
                $fecha -> execute();

                    

             ///dependiendo del tipo de usuario lo redireccionamos

                    //administrador

            if($_SESSION['rol'] == 1){
                header ("Location: vista/admin/index.php");
            exit();
            }


                    //instructor
            else if ($_SESSION['rol'] == 2){
                header ("Location: vista/cliente/index.php");
            exit();
            }


                    //aprendiz
            else if ($_SESSION ['rol'] == 3) {
                header ('Location: vista/trabajador/index.php');
            exit();
            }    

        }else 
            {
               ///si el usuario y la clave son incorrectas lo lleva a la pagina
                echo"<script> alert ('Los datos recibidos son erroneos o su usuario está bloqueado');</script>"; 
                echo '<script>window.location="index.html"</script>';
            exit();
            }

                
        }

    
?>

