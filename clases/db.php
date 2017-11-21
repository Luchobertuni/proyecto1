<?php

//include_once("usuario.php");
//include("dbmysql.php");

abstract class Db {
  public abstract function traerTodos();
  public abstract function traerPorEmail($email);
  public abstract function guardarUsuario(Usuario $usuario);
}
 ?>
