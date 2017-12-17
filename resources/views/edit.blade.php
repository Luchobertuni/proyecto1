<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$post->lugar}}</title>
    <link rel="stylesheet" href="css/styleproyecto.css">
    <link rel="icon" type="image/x-icon" href="imagenes/favicon.ico">
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
</head>
<body>
    <div class="container">
      <header>
          <h1><a href="/"><img src="imagenes/logo.jpg" alt="logo del sitio"></a></h1>
          <div class="titulo">
              <h2>Insta-Viaje</h2>
          </div>
      </header>
        <h3>Editando:{{$post->lugar}}</h3>
        <form class="col-md-5" action="/post/{{$post->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('patch')}}
            <div class="form-group{{ $errors->has('lugar') ? ' has-error' : '' }}">
                <label for="lugar">Lugar</label>
                <input type="text" name="lugar" id="lugar" value="{{$post->lugar}}" class="form-control">
                @if ($errors->has('lugar'))
                  <strong>{{$errors->first('lugar')}}</strong>
                @endif
            </div>
            <br>
                <div class="form-group{{ $errors->has('transporte') ? ' has-error' : '' }}">
                <label for="transporte">Trasporte</label>{{old('transporte')}}
                <input type="text" name="transporte" id="transporte" value="{{$post->transporte}}" class="form-control">
                @if ($errors->has('transporte'))
                  <strong>{{$errors->first('transporte')}}</strong>
                @endif
            </div>
            <br>
                <div class="form-group{{ $errors->has('duracion') ? ' has-error' : '' }}">
                <label for="duracion">Duracion del viaje</label>
                <input type="text" name="duracion" id="duracion" value="{{$post->duracion}}" class="form-control">
                @if ($errors->has('duracion'))
                  <strong>{{$errors->first('duracion')}}</strong>
                @endif
            </div>
            <br>
                <div class="form-group{{ $errors->has('presupuesto') ? ' has-error' : '' }}">
                <label for="presupuesto">Presupuesto diario</label>
                <input type="text" name="presupuesto" id="presupuesto" value="{{$post->presupuesto}}" class="form-control">
                @if ($errors->has('presupuesto'))
                  <strong>{{$errors->first('presupuesto')}}</strong>
                @endif
            </div>
          <br>
            <div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
              <label for="comentarios">Comentarios</label>
              <input type="textarea" name="comentarios" value="{{$post->comentarios}}">
              @if ($errors->has('comentarios'))
                <strong>{{$errors->first('comentarios')}}</strong>
              @endif
            </div>
          <br>
            <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
    <a href="/post/{{$post->id}}">Volver a mi post</a>
    <a href="/perfil">Volver a mi perfil</a>
</body>
</html>
