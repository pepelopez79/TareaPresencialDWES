<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tableStyle.css">
    <title>Datos del Formulario</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los datos del formulario
    $expediente = isset($_POST["expediente"]) ? $_POST["expediente"] : "--- :(";
    $nif = isset($_POST["nif"]) ? $_POST["nif"] : "--- :(";
    $apellidos = isset($_POST["apellidos"]) ? $_POST["apellidos"] : "--- :(";
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "--- :(";
    $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : "--- :(";
    $email = isset($_POST["email"]) ? $_POST["email"] : "--- :(";
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "--- :(";
    $imagen = isset($_FILES["imagen"]["name"]) ? $_FILES["imagen"]["name"] : "--- :(";
    $beca = isset($_POST["beca"]) ? "Sí" : "No";

    $datos = array(
        "Número de Expediente" => $expediente,
        "NIF" => $nif,
        "Apellidos" => $apellidos,
        "Nombre" => $nombre,
        "Sexo" => $sexo,
        "Correo Electrónico" => $email,
        "Teléfono Móvil" => $telefono,
        "Imagen" => $imagen,
        "Solicitar Beca" => $beca
    );
    
    // Tabla
    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr><th>Campo</th><th>Valor</th></tr>';
    
    foreach ($datos as $campo => $valor) {
        echo "<tr><td>$campo</td><td>$valor</td></tr>";
    }
    
    echo '</table>';
}
?>

</body>
</html>
