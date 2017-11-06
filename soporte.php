<?php

session_start();

include_once("clases/auth.php");
include_once("clases/db.php");
include_once("clases/dbjson.php");
include_once("clases/dbmysql.php");
include_once("clases/validator.php");

$auth = new Auth();

$validator = new Validator();

$db = new DbMySql();

 ?>
