<?php
    session_start();
    require ("../../../../controlador/conexion.php");
    include ("../../../../controlador/validarsesion.php");
    $db = new Database();
    $conectar=$db->conectar();
?>

<?php




// Verificar si la solicitud es de tipo POST (cuando se envía el formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el código del elemento seleccionado
    $codigo = $_POST["codigo"];

    // Verificar si es un producto
    $consultaProducto = $conectar->prepare("SELECT * FROM repuestos WHERE id_repuestos = ?");
    $consultaProducto->execute([$codigo]);
    $producto = $consultaProducto->fetch(PDO::FETCH_ASSOC);

    if ($producto) {
        // ... (Se verifica y procesa la adición de productos al carrito)

    } else {
        // Verificar si es un servicio
        $consultaServicio = $conectar->prepare("SELECT * FROM servicio WHERE id_servicios = ?");
        $consultaServicio->execute([$codigo]);
        $servicio = $consultaServicio->fetch(PDO::FETCH_ASSOC);

        if ($servicio) {
            // ... (Se verifica y procesa la adición de servicios al carrito)

        } else {
            // Verificar si es un documento
            $consultaDocumento = $conectar->prepare("SELECT * FROM documentos WHERE id_documentos = ?");
            $consultaDocumento->execute([$codigo]);
            $documento = $consultaDocumento->fetch(PDO::FETCH_ASSOC);

            if ($documento) {
                // ... (Se verifica y procesa la adición de documentos al carrito)

            } else {
                // Si no es ni producto, ni servicio, ni documento, redirigir con el status 2 (no existe)
                header("Location: carrito_compras
            .php?status=2");
                exit();
            }
        }
    }
}

// Redirigir a la página de ventas
header("Location: carrito_compras.php");
exit();
?>
