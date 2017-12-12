
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
        <h1><a href="/"><img src="imagenes/logo.jpg" alt="logo del sitio"></a></h1>
        <div class="titulo">
            <h2>Insta-Viaje</h2>
        </div>
    </header>
      <h3>Regístrate</h3>
    <form class="formulario" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
{{csrf_field()}}
    <div>
      <div class="form-group{{ $errors->has('first_name') ? 'has-error' : ''}}">
        <label for="nombre">Nombre</label>

        <div>
        <input id="first_name"type="text" name="first_name" value= "{{old('first_name')}}" required autofocus><br><br>

          @if ($errors->has('first_name'))
          <strong> {{$errors->first('first_name')}} </strong>
          @endif

      </div>
    </div>
    <div class="form-group{{ $errors->has('last_name') ? 'has-error' : ''}}">
        <label for="apellido">Apellido</label>
        <div>
        <input id="last_name"type="text" name="last_name" value="{{old('last_name')}}"required autofocus><br><br>
        @if ($errors->has('last_name'))
        <strong> {{$errors->first('last_name')}} </strong>
        @endif
</div>
</div>

<div class="form-group{{ $errors->has('email') ? 'has-error' : ''}}">

        <label for="email">email</label>
        <div>
        <input id="email"type="email" name="email" value="{{old('email')}}" required><br><br>
        @if ($errors->has('email'))
        <strong> {{$errors->first('email')}} </strong>
        @endif
</div>
</div>

<div class="form-group{{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password">Contraseña</label>
        <div>
        <input id="password"type="password" name="password" ><br><br>
        @if ($errors->has('password'))
        <strong> {{ $errors->first('password') }} </strong>
        @endif
</div>
</div>

<div>
        <label for="password-confirm">Confirmar Contraseña</label>
        <div>
        <input id="password-confirm"type="password" name="password_confirmation" required><br><br>
</div>
</div>
<div>
        <label for="avatar"><p>Foto de Perfil</p></label>
        <div>
        <input type="file" name="avatar" id="avatar" value="">
</div>
</div>

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
