<?php
include_once("db.php");
require_once("clases/dbmysql.php");

class Validator {

public function validarInformacion($informacion ){
  $arrayErrores = [];

  foreach ($informacion as $key => $value) {
    $informacion[$key] = trim($value);
  }
  if(strlen($informacion["nombre"])< 3 || strlen($informacion["nombre"]) > 20){
    $arrayErrores["nombre"] = "Nombre requiere + de 3 caracteres y - de 20";
  }
  if(strlen($informacion["apellido"]) < 0){
    $arrayErrores["apellido"] = "Campo vacío";
  }
  if(strlen($informacion["email"]) == 0){
    $arrayErrores["email"] = "Campo email vacío";
  }else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
    $arrayErrores["email"] = "email no valido";
  }
  if($informacion["email"] != $informacion["remail"]){
    $arrayErrores["email"] = "El email no verifica";
}
  if(strlen($informacion["password"]) < 6){
    $arrayErrores["password"] = "La contraseña debe tener al menos 6 caracteres";
  }else if ($informacion["password"] != $informacion["cpassword"]) {
    $arrayErrores["password"] = "La contraseña no verifica";
  }
}
 public function armarUsuario($informacion) {
    return [
      "email" => $informacion["email"],
    "nombre" => $informacion["nombre"],
    "apellido" => $informacion["apellido"],
    "remail" => $informacion["remail"],
    "password" => password_hash($informacion["password"], PASSWORD_DEFAULT)
  ];
}
public function validarLogin($info){
  $traerEmail = new dbmysql;
  $errores = [];

  if (strlen($info["email"]) == 0) {
    $errores["email"] = "No hay mail";
  }
  else if(filter_var($info["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "Pusiste un mail que no era valido";
  }
  else if ($traerEmail->traerPorEmail($info["email"]) == NULL) {
    $errores["email"] = "El usuario no existe";
  } else {
    //Validar la contraseña
    $usuario = $traerEmail->traerPorEmail($info["email"]);
    if (password_verify($info["password"], $usuario["password"]) == false) {
      $errores["password"] = "La contraseña no verifica";
    }
  }

  return $errores;
}
public function usuarioLogueado() {
  $traerEmail = new dbmysql;
  if ($traerEmail->estaLogueado()) {
    return $traerEmail->traerPorEmail($_SESSION["usuarioLogueado"]);
  }
  else {
    return NULL;
  }
}
 public function loguear($email) {
  $_SESSION["usuarioLogueado"] = $email;
}

 public function estaLogueado() {
  if (isset($_SESSION["usuarioLogueado"])) {
    return true;
  }
  else {
    return false;
  }
}
}






 ?>
