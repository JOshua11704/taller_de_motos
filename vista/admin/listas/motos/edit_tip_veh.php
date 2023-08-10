<?php
session_start();
require("../../../../controlador/conexion.php");
include("../../../../controlador/validarsesion.php");

$db = new Database();
$con = $db->conectar();

$cil = $_GET['actu'];

$select = $con->prepare("SELECT * FROM tipo_carroceria WHERE id_carroseria = :carroseria");
$select->execute([':carroseria' => $_GET["actu"]]);
$fila = $select->fetch(PDO::FETCH_ASSOC);
?>

<?php
if (isset($_GET["agre"]) && $_GET["agre"] == "tipu") {
    $id = $_GET['id'];
    $carroseria = $_GET['carroseria'];
    

    $num_mot = $con->prepare("SELECT * FROM tipo_carroceria WHERE carroseria = :carroseria");
    $num_mot->execute([':carroseria' => $carroseria]);
    $motor_num = $num_mot->fetch();

    if (empty($carroseria)) {
        echo '<script>alert("EXISTEN CAMPOS VACIOS");</script>';
        echo '<script>window.location="carroseria.php"</script>';
    } elseif ($motor_num) {
        echo '<script>alert("El tipo de vehiculo ya existe //CAMBIELO//");</script>';
        echo '<script>window.location="tip_veh.php"</script>';
    } else {
        $actualiz = $con->prepare("UPDATE tipo_carroceria SET carroseria = :carroseria WHERE id_carroseria = :id_carroseria");
        $actualiz->execute([
            ':carroseria' => $carroseria,
            ':id_carroseria' => $id
        ]);

        echo "<script>alert('Actualizacion con Exito');</script>";
        echo "<script>window.location='tip_veh.php';</script>";
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
    <title>EDITAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100" style="background-color: #C4C4C4;">

<div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 40rem">
    <form method="get" name="formreg" autocomplete="off">
        <div style="height: 5rem; margin-bottom: 2rem;">
            <h2 class="text-center text-dark fs-1 fw-bold">EDITAR TIPOS DE VEHÍCULOS</h2>
        </div>
        
        <label for="">ID del Tipo</label>
        <input type="text" class="form-control bg-light" name="id" value="<?php echo $fila['id_carroseria']; ?>" readonly><br>

        <label for="">Tipo de Vehículo</label>
        <input type="text" class="form-control bg-light" name="carroseria"  pattern="[A-Za-z]{1,15}" maxlength="15" value="<?php echo $fila['carroseria']; ?>" placeholder="Cantidad de carroseria"><br>

        <div class="input-group mt-4" style="gap: 50%;">
            <a href="tip_veh.php" class="text-decoration-none text-dark fw-semibold fst-italic input-group-text">VOLVER</a>

            <input type="hidden" name="agre" value="tipu">
            <button class="btn btn-danger text-white w-60 mt-4 fw-semibold shadow-sm" style="border-radius: 7%;" type="submit">EDITAR</button>
        </div>
    </form>
</div>
</body>
</html>
