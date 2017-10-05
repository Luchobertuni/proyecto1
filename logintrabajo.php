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
    <?php
      require_once("funcion.php");
      if (estaLogueado()) {
        header("Location: trabajo.php");
      }
      $errores=[];
      if ($_POST){//si viaja por post validar
        //Primero que valide si hay algun error
        $errores= validarLogin($_POST);
        if(count($errores)==0)
        {
          loguear($_POST["e-mail"]);
        if(isset($_POST["recordame"]))
        {
        recordarUsuario($_POST["e-mail"]);
        }
        header("Location: logintrabajo.php");exit;
        }
      }


    ?>
    <header>
        <h1><a href="trabajo.php"><img src="imagenes/logo.jpg" alt="logo del sitio"></a></h1>
        <div class="titulo">
            <h2>Insta-Viaje</h2>
        </div>
    </header>
      <h3>Login</h3>
    <form class="formulario" action="logintrabajo.php" method="post">

      <?php if(count($errores) > 0) :?>
        <ul style="color:red">
        <?php foreach ($errores as $error): ?>
        <li><?=$error?></li>
      <?php endforeach ?>
      </ul>
      <?php endif; ?>
      <div class="form1">

        <label for="e-mail">e-mail</label>
        <input id="e-mail"type="email" name="e-mail"><br><br>

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
