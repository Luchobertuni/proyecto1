<?php

include_once("db.php");
include_once("usuario.php");

class dbJson extends db {
  public function traerTodos(){
    $archivo =file_get_contents("usuario.json");
    $array =explode(PHP_EOL, $archivo);
    array_pop($array);

    $ultimoArray=[];
    foreach ($array as $usuario )
  {
      $ultimoArray[] = json_decode($usuario, true);
    }
    return $ultimoArray;
  }
  public function guardarUsuario($usuario) {
    $usuarioJSON = json_encode($usuario);
    file_put_contents("usuario.json", $usuarioJSON . PHP_EOL, FILE_APPEND);
  }
  public function traerPorEmail($email)
  {
    $todos=traerTodos();
    foreach ($todos as $usuario )
    {
      if($usuario["email"]==$email)
      {
        return $usuario;
      } else
      {
        return null;
      }
    }
  }
}



 ?>
