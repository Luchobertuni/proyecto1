<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1">
      <link rel="stylesheet" href="css/style.css">
      <link rel="icon" type="image/x-icon" href="imagenes/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <title>Tus posts</title>
  </head>
  <body>
    <header>
        <h1><a href="/"><img src="imagenes/logo.jpg" alt=""></a></h1>
        <div class="titulo">
            <h2>Insta-Viaje</h2>
        </div>
    </header>


<br><br>
  <p>Tus posts!</p>
    <div class="">

      <ul>
        @foreach ($posts as $post)
        <a href="/post/{{$post->id}}"><li><p>Mi viaje a {{$post->lugar}}</p></li></a>
        <li>Viaje en {{$post->transporte}}</li>
        <li>{{$post->duracion}}</li>
        
        @endforeach
      </ul>

  </form>
    </div>
  </div>
  </body>
</html>
