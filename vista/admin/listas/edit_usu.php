<?php
session_start();
require_once("../../../controlador/conexion.php");
include ("../../../controlador/validarsesion.php");
$db = new Database();
$con = $db->conectar();
?>



<?php

$recibir= $_GET['update'];


$select = $con -> prepare("SELECT * FROM usuario, rol WHERE usuario.id_rol = rol.id_rol AND usuario.documento = '".$_GET['update']."'"); 
$select-> execute();
$fila= $select-> fetch(PDO::FETCH_ASSOC);


$sql =$con -> prepare ("SELECT * FROM rol");
$sql-> execute();
$roles= $sql-> fetch();



$error= []; 

?>





<?php

if((isset($_GET["actu"]))&&($_GET["escond"]=="ido")){

    $id_person = $_GET['doc'];  
    $name = $_GET['nom'];
    $user = $_GET['user'];
    $pass = $_GET['pass'];
    $cell = $_GET['tel'];
    $mail = $_GET['gmail'];
    $rol = $_GET['nombre_rol'];

    if ($name=="" || $user=="" || $pass=="" || $cell=="" || $mail==""){
        echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
        echo '<script>window.location="usuarios.php"</script>';
    }

    else{
      $actu = $con -> prepare("UPDATE usuario SET nombre= '$name', usuario = '$user', telefono = '$cell' , gmail = '$mail' , id_rol = '$rol' Where documento = '$id_person'");
      $actu -> execute();
      echo '<script>alert ("Actualizacion Exitosa");</script>';
      echo '<script>window.location="usuarios.php"</script>';
      }
  }


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="imagenes/moto.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo_regjosh.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <title>Registro</title>
</head>
<body class=" bg-dark d-flex justify-content-center align-items-center vh-80">
  <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 45rem; margin-top: 10rem; margin-bottom: 5rem;">

            
          <form class="form1" method="GET" name="form1" id="form1" autocomplete="off">

            <!--logo-->
            <div class="imagen d-flex justify-content-center ">
                <img src="../../../imagenes/cliente.png" class="logo" style="height: 9rem; border-radius: 20%; margin-bottom: 2rem; " alt="Avatar Image">
            </div>

            <h1 class="text-center text-dark fs-1 fw-bold">Edición De <br> Usuarios</h1>
            <!--Inserta titulo-->


                <!--crea formularios-->
    
    
                <input type="hidden" name="doc" id="doc" value="<?php echo $fila['documento'] ?>" placeholder="Digite Numero de Documento">
                
                <label for="docu"> Nombre </label>
                <input class="form-control bg-light" type="text" name="nom" value="<?php echo $fila['nombre'] ?>" placeholder="Ingrese Nombre completo"><br>

                <label for="docu"> Usuario </label>
                <input class="form-control bg-light" type="text" name="user" value="<?php echo $fila['usuario'] ?>" placeholder="Ingrese usuario"><br>


                <label for="docu"> Telefono </label>
                <input class="form-control bg-light" type="number" name="tel" value="<?php echo $fila['telefono'] ?>" placeholder="Ingrese telefono"><br>

                <label for="docu"> gmail </label>
                <input class="form-control bg-light" type="email" name="gmail" value="<?php echo $fila['gmail'] ?>" placeholder="Ingrese correo"><br>


            <label for="docu">ROL</label>
            <select class="form-control bg-light" style=" margin-bottom: 1rem; width: 20rem;" name="idusu">  
                 <option class="text-center" value="<?php echo $fila['id_rol'] ?>"><?php echo $fila['nombre_rol'] ?></option>
                    <?php
                     do {
                     ?>
                    <option value="<?php echo($roles ['id_rol'])?>"><?php echo($roles ['nombre_rol'])?>
                <?php
                     }while($roles = $sql-> fetch());
                ?>
            </select>

            <input type="hidden" name="escond" value="ido">

            <div class="d-flex gap-1 justify-content-center mt-1"><input class="btn btn-danger text-white mt-4 fw-semibold shadow-sm" style="width: 80%" type="submit" name="actu" value="ACTUALIZAR USUARIO"></div>

            <br><br>

            <a href="usuarios.php" class="text-decoration-none text-dark fw-semibold fst-italic" style="font-size: 0.9rem;">VOLVER</a>
           
          </form>
  </div>
</html>