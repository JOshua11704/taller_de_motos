<?php
    session_start();
    require_once("../../../controlador/conexion.php");
    include ("../../../controlador/validarsesion.php");
    $db = new Database();
    $con = $db->conectar();
?>


<?php

    $_GET['producto'];
        
        $select = $con -> prepare("SELECT * FROM repuestos WHERE id_repuestos = '".$_GET['producto']."'"); 
        $select-> execute();
        $fila= $select-> fetch(PDO::FETCH_ASSOC);


?>

<?php

  
  
if(isset($_GET["edicion"])){


        $id_product = $_GET['id'];  
        $name = $_GET['nom_prod'];
        $descript = $_GET['desc'];
        $many = $_GET['Cant'];
        $money = $_GET['preci'];


        if ($name=="" || $descript=="" || $many=="" || $money=="")
        {
            echo '<script>alert ("EXISTEN DATOS VACIOS");</script>';
            echo '<script>window.location="productos.php"</script>';
        }

  
          // // datos correctos
          // // si el array de error está vacio entonces
  
          else{
              $actu = $con -> prepare("UPDATE repuestos SET nom_repuestos= '$name', descripcion = '$descript', cantidad = '$many', precio = '$money' Where id_repuestos = '$id_product'");
              $actu -> execute();
              echo '<script>alert ("Actualizacion Exitosa");</script>';
              echo '<script>window.location="productos.php"</script>';
              exit();
  
          }

    }
  
  
  
  ?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />


    <title>Edicion</title>
</head>
<body class=" bg-dark d-flex justify-content-center align-items-center vh-100">

    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 40rem">


            <form class="form1" method="GET" name="form1" id="form1" autocomplete="off">

                <!--logo-->
                <div class="imagen d-flex justify-content-center" ><img src="../../../imagenes/Repuestos.png" style="height: 8rem; border-radius: 20%; margin-bottom: 2rem;" alt="Editar producto"></div>
        
                <h1 class="text-center text-dark fs-1 fw-bold">Editar<br> Producto </h1>
                <!--Inserta titulo-->


                <!--crea formularios-->
                <input type="hidden" name="id" value="<?php echo $fila['id_repuestos'] ?>">

                <div>
                    <label for="docu"> Nombre </label>
                    <input type="text" class="form-control bg-light" name="nom_prod" placeholder="Ingrese Nombre del producto" value = "<?php echo $fila['nom_repuestos']?>" >
                </div>
                
                <div>
                    <label for="desc"> Descripción </label>
                    <textarea type="text" class="form-control bg-light" name="desc" placeholder="Descripcion "><?php echo $fila['descripcion']?></textarea>
                </div> 
                

                <div>
                    <label for="Cant">Cantidad</label>
                    <input type="number" class="form-control bg-light" name="Cant" id="doc" placeholder="Digite Cantidad de Productos" value = "<?php echo $fila['cantidad']?>">
                </div>


                <div>
                    <label for="preci"> Precio </label>
                    <input type="number" class="form-control bg-light" name="preci" placeholder="Precio del Producto" value = "<?php echo $fila['precio'] ?>" >
                </div>


                <div class="input-group mt-4" style="gap: 50%;"> 
                    
                    <a href="productos.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text"> Volver </a>
                
                    <input type="submit" class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm" name="edicion" value="Actualizar Registro">
                    <input type="hidden" name="Listo" value="<?php $fila['id_repuestos'] ?>">
                
                </div>
                
                

               

           
            </form>
        

    </div>
</body>
</html>

