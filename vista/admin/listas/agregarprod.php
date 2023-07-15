<?php

//coneccion
 session_start();
 require ("../../../controlador/conexion.php");
 include ("../../../controlador/validarsesion.php");
 $db = new Database();
 $conectar = $db -> conectar();
?>
<?php
    $consul= $conectar->prepare("SELECT * FROM repuestos");
    $consul->execute();
    $fila=$consul->fetch(PDO::FETCH_ASSOC);


    $sql=$conectar->prepare("SELECT * from estado");
    $sql->execute();


    if((isset($_GET["Listo"]))&&($_GET["Listo"]=="confir"))
    {
        $name = $_GET['nom_prod'];
        $descript = $_GET['desc'];
        $many = $_GET['Cant'];
        $money = $_GET['preci'];
        $est = '1';

        $validar= $conectar->prepare( "SELECT * FROM repuestos where nom_repuestos='$name'");
        $validar-> execute();
        $fila1= $validar->fetch();

        if ($fila1) {
            echo '<script>alert("El producto ya existe");</script>';
            echo '<script>windows.location="productos.php"</script>';
        }
        else if ($name == "" || $descript == "" || $many == "" || $money == "" || $est == "" )
        {
            echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
            echo '<script>windows.location="productos.php"</script>';
        }
        else 
        {
            $insertsql= $conectar->prepare("INSERT INTO repuestos (nom_repuestos, descripcion, cantidad, precio, id_estado) VALUES ('$name','$descript','$many','$money', '$est')");

            $insertsql->execute();

            echo '<script>alert ("El producto fue agregado con exitoso,Gracias");</script>';
            echo "<script>windows.location='productos.php';</script>";

        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../../imagenes/moto.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />


    <title>Registro</title>
</head>
<body class=" bg-dark d-flex justify-content-center align-items-center vh-100">

    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 40rem">


            <form class="form1" method="GET" name="form1" id="form1" autocomplete="off">

                <!--logo-->
                <div class="imagen d-flex justify-content-center" ><img src="../../../imagenes/Repuestos.png" style="height: 8rem; border-radius: 20%; margin-bottom: 2rem;" alt="Editar producto"></div>
        
                <h1 class="text-center text-dark fs-1 fw-bold">Registrar<br> Producto </h1>
                <!--Inserta titulo-->


                <!--crea formularios-->
    

                <div>
                    <label for="docu" class="text-center text-dark"> Nombre </label>
                    <input type="text" class="form-control bg-light" name="nom_prod" placeholder="Ingrese Nombre del producto">
                </div>
                
                <div>
                    <label for="desc" class="text-center text-dark"> Descripción </label>
                    <textarea type="text" class="form-control bg-light" name="desc" placeholder="Descripcion "></textarea>
                </div> 
                

                <div>
                    <label for="Cant" class="text-center text-dark">Cantidad</label>
                    <input type="number" class="form-control bg-light" name="Cant" id="doc" placeholder="Digite Cantidad de Productos">
                </div>


                <div>
                    <label for="preci" class="text-center text-dark"> Precio </label>
                    <input type="number" class="form-control bg-light" name="preci" placeholder="Precio del Producto">
                </div>


                <div class="input-group mt-4" style="gap: 50%;"> 
                    
                    <a href="productos.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text"> Volver </a>
    
                    <button class="b1 btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm" type="submit">CREAR PRODUCTO</button>
                    <input type="hidden" name="Listo" value="confir">
                
                </div>
                
                
                
               

           
            </form>
        

    </div>
</body>
</html>
