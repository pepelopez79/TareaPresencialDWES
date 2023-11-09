<?php
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
    return '<div class="alert alert-success" style="margin-top:5px;">El usuario se registró correctamente :)</div>';
  }
}

function novalido($errors) {
  return '<div class="alert alert-danger" style="margin-top:5px;">Debe corregir los errores para poder registrar el usuario!! :(  </div>';
}

if (isset($_POST["submit"])) {
  // Número de expediente
  if (!empty($_POST["expediente"]) && preg_match("/^[A-Za-z]{2,5}-\d{4}-\d{4}\/[HM]$/", $_POST["expediente"])) {
    $expediente = trim($_POST["expediente"]);
  } else {
    $errors["expediente"] = "Formato de N.º de expediente incorrecto / El año debe ser anterior o igual al actual";
  }

  // NIF
  if (!empty($_POST["nif"]) && preg_match("/^\d{8}[A-Za-z]$/", $_POST["nif"])) {
    $nif = trim($_POST["nif"]);
  } else {
    $errors["nif"] = "El valor introducido no cumple el formato de lo NIF";
  }

  // Apellidos
  if (!empty($_POST["apellidos"]) && preg_match("/^[A-Za-z_\- ]{1,20}$/", $_POST["apellidos"])) {
    $apellidos = trim($_POST["apellidos"]);
  } else {
    $errors["apellidos"] = "No puede tener más de 20 caracteres / No puede contener números";
  }

  // Nombre
  if (!empty($_POST["nombre"]) && preg_match("/^[A-Za-z_\- ]{1,10}$/", $_POST["nombre"])) {
    $nombre = trim($_POST["nombre"]);
  } else {
    $errors["nombre"] = "No puede tener mas de 10 caracteres / No puede contener números";
  }

  // Sexo
  if (!empty($_POST["sexo"]) && ($_POST["sexo"] == "H" || $_POST["sexo"] == "M")) {
    $sexo = $_POST["sexo"];
  } else {
    $errors["sexo"] = "Seleccione un sexo";
  }

  // Email
  if (!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $email = $_POST["email"];
  } else {
    $errors["email"] = "El valor introducido no cumple el formato de los emails";
  }

  // Teléfono móvil
  if (!empty($_POST["telefono"]) && preg_match("/^\d{9}$/", $_POST["telefono"])) {
    $telefono = trim($_POST["telefono"]);
  } else {
    $errors["telefono"] = "El valor introducido no cumple el formato de los teléfonos móviles";
  }

  // Imagen 
  if (isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["tmp_name"])) {
    $imagen = $_FILES["imagen"]["name"];
  } else {
    $errors["imagen"] = "Seleccione una imagen válida";
  }

  // Beca
  $beca = isset($_POST["beca"]) ? "on" : "off";
}

?>
