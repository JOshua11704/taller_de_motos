<?php
 session_start();
 require ("controlador/conexion.php");
 $db = new Database();
 $conectar = $db -> conectar();


if ((isset($_POST["actucon"]))) {
    
    $contra = $_POST['cont'];

    $password = password_hash($contra, PASSWORD_BCRYPT, ["cost"=> 15]);

    
    if ($_POST['cont'] == "" || $_POST['conta'] == "") {
        echo "<script>alert('Este campo es obrigatórios.');</script>";
        echo "<script>window.location('../index.html');</script>";

    } 
    
    if($_POST["conta"] !==  $_POST ["cont"] ){  
        echo '<script>alert("las contraseñas no coinciden");</script>';
        echo '<script>window.location="rectificacion.html"</script>';

    }
    
    else {
        

        $docu = $_SESSION['ced'];
        $conteudo = $conectar ->prepare ("UPDATE usuario SET clave = '$password' WHERE documento = '$docu'");
        $conteudo -> execute();
        echo "<script>alert('su contraseña a sido cambiada!');</script>";
        echo "<script>window.location='index.html';</script>";
    }
}

?>

<?php
if($_GET["contranu"]){

    $documento= $_GET["documento"];
    $nombre= $_GET["nombre"];
    $usuario= $_GET["usuario"];

    $sql= $conectar->prepare("SELECT * from usuario where documento='$documento' and nombre='$nombre' and usuario='$usuario'");
    $sql->execute();
    $fila= $sql->fetch();

    if($fila)
    {
        $_SESSION['ced']=$fila['documento'];

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>nueva clave</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    </head>
    <body class=" bg-dark d-flex justify-content-center align-items-center vh-100">
        <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 30rem">

            <div class="imagen d-flex justify-content-center ">
                <img src="imagenes/logo.jpeg" class="logo" alt="Imagen" style="height: 7rem; border-radius: 20%; margin-bottom: 3rem; ">

                <form method="post" name="form1" autocomplete="off">
            </div>
                <h1 class="text-center text-dark fs-1 fw-bold"> NUEVA CONTRASEÑA</h1>
            
                <label for="cont" >NUEVA</label>
                <input class="form-control bg-light" type=password name="cont" placeholder="Digite la Nueva Contraseña">
            

                <label for="ususario">CONFIRMAR</label>
                <input class="form-control bg-light" type=password name="conta" placeholder="Confirme la Contraseña">

                <input class="btn btn-danger text-white w-100 mt-4 fw-semibold shadow-sm" type="submit" name="actucon" value="validar">
                
                <a href="index.html"class="text-decoration-none text-dark fw-semibold fst-italic"> volver a la pagina principal </a>

            </form>
        </div>
    </body>
    </html>
<?php 
    }
    else{   
        echo '<script>javascript:alert("No se ha podido encontrar los datos");</script>';
        echo '<script>window.location="index.html"</script>';
        }
}
?>