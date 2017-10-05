<?php
require_once("funciones.php");
$arrayErrores = [];
if ($_POST){
  $arrayErrores = validarInformacion($_POST);
  if (count($arrayErrores) == 0){
    $usuario = armarUsuario($_POST);

    guardarUsuario($usuario);

    header("location:trabajo.php");exit;
  }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insta-Viaje - <Registro></Registro></title>
    <link rel="stylesheet" href="css/styleproyecto.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
  </head>
  <body>
    <header>
        <h1><a href="trabajo.php"><img src="imagenes/logo.jpg" alt="logo del sitio"></a></h1>
        <div class="titulo">
            <h2>Insta-Viaje</h2>
        </div>
    </header>
      <h3>Regístrate</h3>
    <form class="formulario" action="formulariotrabajo.php" method="POST">

      <?php if(count($arrayErrores) > 0) :?>
        <ul style="color:red">
        <?php foreach ($arrayErrores as $error): ?>
        <li><?=$error?></li>
      <?php endforeach ?>
    </ul>
  <?php endif; ?>
      <div class="form1">


        <label for="nombre">Nombre</label>
        <input id="nombre"type="text" name="nombre" value= "<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];}?>"required><br><br>

        <label for="apellido">Apellido</label>
        <input id="username"type="text" name="apellido" value="<?php if(isset($_POST["apellido"])){ echo $_POST["apellido"];}?>"required><br><br>

        <label for="e-mail">e-mail</label>
        <input id="e-mail"type="email" name="e-mail" value="<?php if(isset($_POST["e-mail"])){ echo $_POST["e-mail"];}?>" required><br><br>

        <label for="re-e-mail">Confirmar e-mail</label>
        <input id="e-mail"type="e-mail" name="re-mail"><br><br>

        <label for="password">Contraseña</label>
        <input id="password"type="password" name="password" required><br><br>

        <label for="cpassword">Confirmar Contraseña</label>
        <input id="cpassword"type="password" name="cpassword"><br><br>

        <label for="g1">Masculino</label>
        <input id="g1"type="radio" name="genero" value="masculino" required>
        <label for="g2">Femenino</label>
        <input id="g2"type="radio" name="genero" value="femenino"><br><br>

      </div>

        <br>
        <div class="form3">

        <label for="enviar"></label>
        <input type="submit" class="enviar"name="enviar" value="Registrar">
      </div>

    </form>

    </form>



  </body>
</html>
