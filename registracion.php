<?php
include("clases/validator.php");
//include("clases/usuario.php");
require_once("clases/dbmysql.php");

$arrayErrores = [];
if ($_POST){
  $validador = new Validator;
  $arrayErrores = $validador->validarInformacion($_POST);
  if (count($arrayErrores) == 0){
    $usuario = $validador->armarUsuario($_POST);
       //var_dump($usuario);exit;
    $usuario_final = new Usuario($usuario["email"],$usuario["password"],$usuario["first_name"],$usuario["last_name"],$usuario["remail"]);
//VAR_DUMP($usuario_final);exit;
  //$usuario_arrary =  tos($usuario_final);
  //$usuario_array = $usuario_final;
    //echo "hola"; //$usuario_final->toArray();
  //  var_dump(json_decode($usuario_final ));exit;

  //$array= json_decode(json_encode($usuario_final), TRUE);
  // var_dump($array);
  // exit;
   $objeto = new dbmysql;
  //
  // var_dump($usuario_final);
  // //exit;
  //   echo "<br><br>";
  $objeto->guardarUsuario($usuario_final);
  //var_dump($usuario);exit;

      header("location:index.php");exit;
  }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insta-Viaje - Registro</title>
    <link rel="stylesheet" href="css/styleproyecto.css">
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
      <h3>Regístrate</h3>
    <form class="formulario" action="registracion.php" method="POST" enctype="multipart/form-data">

      <?php if(count($arrayErrores) > 0) :?>
        <ul style="color:red">
        <?php foreach ($arrayErrores as $error): ?>
        <li><?=$error?></li>
      <?php endforeach ?>
    </ul>
  <?php endif; ?>
      <div class="form1">


        <label for="nombre">Nombre</label>
        <input id="first_name"type="text" name="first_name" value= "<?php if(isset($_POST["nombre"])){ echo $_POST["nombre"];}?>"required><br><br>

        <label for="apellido">Apellido</label>
        <input id="last_name"type="text" name="last_name" value="<?php if(isset($_POST["apellido"])){ echo $_POST["apellido"];}?>"required><br><br>

        <label for="email">email</label>
        <input id="email"type="email" name="email" value="<?php if(isset($_POST["email"])){ echo $_POST["email"];}?>" required><br><br>

        <label for="remail">Confirmar email</label>
        <input id="email"type="email" name="remail"><br><br>

        <label for="password">Contraseña</label>
        <input id="password"type="password" name="password" required><br><br>

        <label for="cpassword">Confirmar Contraseña</label>
        <input id="cpassword"type="password" name="cpassword"><br><br>

        <label for="avatar"><p>Foto de Perfil</p></label>
        <input type="file" name="avatar" id="avatar" value="">


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
