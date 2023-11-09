<?php
// Definimos e inicializamos el array de errores y las variables asociadas a cada campo
$errors     = [];
$expediente = "";
$nif        = "";
$apellidos  = "";
$nombre     = "";
$sexo       = "";
$email      = "";
$telefono   = "";
$imagen     = "";
$beca       = "";

// Función que muestra el mensaje de error bajo el campo que no ha superado
// el proceso de validación
function mostrar_error($errors, $campo) {
  $alert = "";
  if (isset($errors[$campo]) && (!empty($campo))) {
    $alert = '<div class="alert alert-danger" style="margin-top:5px;">' . $errors[$campo] . '</div>';
  }
  return $alert;
}

// Verificamos si todos los campos han sido validados
function validez($errors) {
  if (isset($_POST["submit"]) && (count($errors) == 0)) {
    return '<div class="alert alert-success" style="margin-top:5px;">Formulario validado correctamente!!</div>';
  }
}

// Visualización de las variables obtenidas mediante el formulario
function valoresfrm() {
  global $expediente, $nif, $apellidos, $nombre, $sexo, $email, $telefono, $imagen, $beca;
  echo "<h4>Valores obtenidos mediante el formulario</h4><br/>";
  echo "<strong>Número de Expediente: </strong>" . $expediente . "<br/>";
  echo "<strong>NIF: </strong>" . $nif . "<br/>";
  echo "<strong>Apellidos: </strong>" . $apellidos . "<br/>";
  echo "<strong>Nombre: </strong>" . $nombre . "<br/>";
  echo "<strong>Sexo: </strong>" . $sexo . "<br/>";
  echo "<strong>Email: </strong>" . $email . "<br/>";
  echo "<strong>Teléfono Móvil: </strong>" . $telefono . "<br/>";
  echo "<strong>Imagen: </strong>" . $imagen . "<br/>";
  echo "<strong>Solicitar beca: </strong>" . ($beca == "on" ? "Sí" : "No") . "<br/>";
}

if (isset($_POST["submit"])) {
  // Validación del número de expediente
  if (!empty($_POST["expediente"]) && preg_match("/^[A-Za-z]{2,5}-\d{4}-\d{4}\/[HM]$/", $_POST["expediente"])) {
    $expediente = trim($_POST["expediente"]);
  } else {
    $errors["expediente"] = "El número de expediente introducido no es válido";
  }

  // Validación del NIF
  if (!empty($_POST["nif"]) && preg_match("/^\d{8}[A-Za-z]$/", $_POST["nif"])) {
    $nif = trim($_POST["nif"]);
  } else {
    $errors["nif"] = "El NIF introducido no es válido";
  }

  // Validación de apellidos
  if (!empty($_POST["apellidos"]) && preg_match("/^[A-Za-z_\- ]{1,20}$/", $_POST["apellidos"])) {
    $apellidos = trim($_POST["apellidos"]);
  } else {
    $errors["apellidos"] = "Los apellidos introducidos no son válidos";
  }

  // Validación de nombre
  if (!empty($_POST["nombre"]) && preg_match("/^[A-Za-z_\- ]{1,10}$/", $_POST["nombre"])) {
    $nombre = trim($_POST["nombre"]);
  } else {
    $errors["nombre"] = "El nombre introducido no es válido";
  }

  // Validación de sexo
  if (!empty($_POST["sexo"]) && ($_POST["sexo"] == "H" || $_POST["sexo"] == "M")) {
    $sexo = $_POST["sexo"];
  } else {
    $errors["sexo"] = "Seleccione un sexo";
  }

  // Validación de email
  if (!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST["email"];
  } else {
    $errors["email"] = "La dirección de correo electrónico introducida no es válida";
  }

  // Validación de teléfono móvil
  if (!empty($_POST["telefono"]) && preg_match("/^\d{9}$/", $_POST["telefono"])) {
    $telefono = trim($_POST["telefono"]);
  } else {
    $errors["telefono"] = "El teléfono móvil introducido no es válido";
  }

  // Validación de imagen (podría añadirse más lógica aquí, como comprobar el tipo de archivo)
  if (isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["tmp_name"])) {
    $imagen = $_FILES["imagen"]["name"];
  } else {
    $errors["imagen"] = "Seleccione una imagen válida";
  }

  // Validación de beca
  $beca = isset($_POST["beca"]) ? "on" : "off";
}

?>