<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1">

      <link rel="icon" type="image/x-icon" href="imagenes/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <title>{{$post->lugar}}</title>
      <link rel="stylesheet" href="css/styleproyecto.css">
  </head>
  <body>
    <header>
        <h1><a href="/"><img src="imagenes/logo.jpg" alt="logo del sitio"></a></h1>
        <div class="titulo">
            <h2>Insta-Viaje</h2>
        </div>
    </header>


<br><br>

    <div class="">
      <h3>Mi viaje a {{$post->lugar}}</h3>
      <ul>

        <li>Transporte: {{$post->transporte}}</li>
        <li>Duacion:{{$post->duracion}} dias</li>
        <form action="/post/{{$post->id}}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <button type="submit">Borrar</button>

      </ul>

  </form>
    </div>
  </div>
  </body>
</html>
