
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Insta-Viaje - Login</title>
    <link rel="stylesheet" href="css/styleproyectologin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
  </head>
  <body>

    <header>
        <h1><a href="/"><img src="imagenes/logo.jpg" alt="logo del sitio"></a></h1>
        <div class="titulo">
            <h2>Insta-Viaje</h2>
        </div>
    </header>
      <h3>Login</h3>
    <form class="formulario" action="login" method="post">
      {{ csrf_field() }}

<div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <label for="email">email</label>
        <div>
        <input id="email" type="email" name="email"><br><br>
        @if ($errors->has('email'))
          <strong>{{$errors->first('email')}}</strong>
        @endif
      </div>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="password">Contraseña</label>
      <div>
        <input id="password"type="password" name="password" required><br><br>
        @if ($errors->has('password'))
          <strong> {{$errors->first('password')}} </strong>
        @endif
</div>
</div>
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
      <script src="js/main.js"></script>
  </body>
</html>
