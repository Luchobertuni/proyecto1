<?php
session_start();
include("clases/db.php");
include("clases/validator.php");
require_once("clases/dbmysql.php");
require_once("clases/usuario.php");
$db = new dbMySQL;

  $validador = new Validator;

if ($validador->estaLogueado()) {
  header("Location: index.php");
}
  $errores=[];
  if ($_POST){//si viaja por post validar
    //Primero que valide si hay algun error


    $errores= $validador->validarLogin($_POST, $db);
    // var_dump($errores);exit;

    if(empty($errores))
    {
      // if (empty($errores))
  		// {
//$usuario = $repo->getRepositorioUsuarios()->traerUsuarioPorEmail($_POST["email"]);
  		// 	$auth->loguear($usuario);
    //  $usuarios = $db->traerPorEmail($_POST["email"]);
        // var_dump($usuarios);exit;
$usuario = new Usuario($_POST["email"],$_POST["password"]);
      $validador->loguear($usuario);
        // var_dump($validador);exit;
    // if(isset($_POST["recordame"]))
    // {
    // recordarUsuario($_POST["email"]);
    // }
    if ($validador->estaEnFormulario("recordame"))
    {
      $validador->guardarCookie($usuario);
    }
    header("Location: index.php");exit;
    }
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insta-Viaje - Login</title>
    <link rel="stylesheet" href="css/styleproyectologin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
  </head>
  <body>

    <header>
        <h1><a href="index.php"><img src="imagenes/logo.jpg" alt="logo del sitio"></a></h1>
        <div class="titulo">
            <h2>Insta-Viaje</h2>
        </div>
    </header>
      <h3>Login</h3>
    <form class="formulario" action="login.php" method="post">

      <?php if(count($errores) > 0) :?>
        <ul style="color:red">
        <?php foreach ($errores as $error): ?>
        <li><?=$error?></li>
      <?php endforeach ?>
      </ul>
      <?php endif; ?>
      <div class="form1">

        <label for="email">email</label>
        <input id="email"type="email" name="email"><br><br>

        <label for="password">Contraseña</label>
        <input id="password"type="password" name="password"><br><br>

      </div>
      <div class="form2">

        <input id="recordarme" type="checkbox" name="recordarme" value="">
        <label class="recordar"for="recordarme">Recordarme</label>
        <a class="olvidar"href="formulario.php">Olvide mi contraseña</a><br>
      </div>
        <br>
        <div class="form3">

        <label for="enviar"></label>
        <input type="submit" class="enviar"name="enviar" value="Ingresar">
      </div>

    </form>

    </form>
  </body>
</html>
