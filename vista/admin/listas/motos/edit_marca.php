<?php
session_start();
require("../../../../controlador/conexion.php");
include("../../../../controlador/validarsesion.php");

$db = new Database();
$con = $db->conectar();

$cil = $_GET['actu'];

$select = $con->prepare("SELECT * FROM marca WHERE id_marca = :marca");
$select->execute([':marca' => $_GET["actu"]]);
$fila = $select->fetch(PDO::FETCH_ASSOC);
?>

<?php
if (isset($_GET["agre"]) && $_GET["agre"] == "tipu") {
    $id = $_GET['id'];
    $marca = $_GET['marca'];
    

    $num_mot = $con->prepare("SELECT * FROM marca WHERE marca = :marca");
    $num_mot->execute([':marca' => $marca]);
    $motor_num = $num_mot->fetch();

    if (empty($marca)) {
        echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
        echo '<script>window.location="marca.php"</script>';
    } elseif ($motor_num) {
        echo '<script>alert("El marca ya existe //CAMBIELO//");</script>';
        echo '<script>window.location="marca.php"</script>';
    } else {
        $actualiz = $con->prepare("UPDATE marca SET marca = :marca WHERE id_marca = :id_marca");
        $actualiz->execute([
            ':marca' => $marca,
            ':id_marca' => $id
        ]);

        echo "<script>alert('Actualizacion con Exito');</script>";
        echo "<script>window.location='marca.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../../../imagenes/moto.png"/>
    <title>EDITAR COLOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100" style="background-color: #C4C4C4;">

<div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 40rem">
    <form method="get" name="formreg" autocomplete="off">
        <div style="height: 5rem; margin-bottom: 2rem;">
            <h2 class="text-center text-dark fs-1 fw-bold">EDITAR COLOR</h2>
        </div>
        
        <label for="">ID del COLOR</label>
        <input type="text" class="form-control bg-light" name="id" value="<?php echo $fila['id_marca']; ?>" readonly><br>

        <label for="">marca</label>
        <input type="text" class="form-control bg-light" name="marca" pattern="[A-Za-z]{1,15}" maxlength="15" value="<?php echo $fila['marca']; ?>" placeholder="Cantidad de marca"><br>

        <div class="input-group mt-4" style="gap: 50%;">
            <a href="marca.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text">VOLVER</a>

            <input type="hidden" name="agre" value="tipu">
            <button class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm" style="border-radius: 7%;" type="submit">EDITAR</button>
        </div>
    </form>
</div>
</body>
</html>
