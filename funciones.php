<?php
session_start();

function validarInformacion($informacion){
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

  if(strlen($informacion["e-mail"]) == 0){
    $arrayErrores["e-mail"] = "Campo email vacío";
  }else if (filter_var($informacion["e-mail"], FILTER_VALIDATE_EMAIL) == false) {
    $arrayErrores["e-mail"] = "email no valido";
  }

  if($informacion["e-mail"] != $informacion["re-mail"]){
    $arrayErrores["e-mail"] = "El e-mail no verifica";

}
  if(strlen($informacion["password"]) < 6){
    $arrayErrores["password"] = "La contraseña debe tener al menos 6 caracteres";
  }else if ($informacion["password"] != $informacion["cpassword"]) {
    $arrayErrores["password"] = "La contraseña no verifica";
  }

  return $arrayErrores;
}
function armarUsuario($informacion) {
  return [
    "nombre" => $informacion["nombre"],
    "apellido" => $informacion["apellido"],
    "e-mail" => $informacion["e-mail"],
    "re-mail" => $informacion["re-mail"],
    "password" => password_hash($informacion["password"], PASSWORD_DEFAULT),
    "genero" => $informacion["genero"]
  ];
}

function guardarUsuario($usuario) {
  $usuarioJSON = json_encode($usuario);
  file_put_contents("usuario.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
}

 ?>
