<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        <h1>Postea tu viaje</h1>
        <form class="col-md-5" action="/agregar" method="post">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('lugar') ? ' has-error' : '' }}">
                <label for="lugar">Lugar</label>
                <input type="text" name="lugar" id="lugar" value="{{old('lugar')}}" class="form-control">
                @if ($errors->has('lugar'))
                  <strong>{{$errors->first('lugar')}}</strong>
                @endif
            </div>
            <div class="form-group{{ $errors->has('transporte') ? ' has-error' : '' }}">
                <label for="transporte">Trasporte</label>{{old('transporte')}}
                <input type="text" name="transporte" id="transporte" value="{{old('transporte')}}" class="form-control">
                @if ($errors->has('transporte'))
                  <strong>{{$errors->first('transporte')}}</strong>
                @endif
            </div>
            <div class="form-group{{ $errors->has('duracion') ? ' has-error' : '' }}">
                <label for="duracion">Duracion del viaje</label>
                <input type="text" name="duracion" id="duracion" value="{{old('duracion')}}" class="form-control">
                @if ($errors->has('duracion'))
                  <strong>{{$errors->first('duracion')}}</strong>
                @endif
            </div>
            <div class="form-group{{ $errors->has('presupuesto') ? ' has-error' : '' }}">
                <label for="presupuesto">Presupuesto diario</label>
                <input type="text" name="presupuesto" id="presupuesto" value={{old('presupuesto')}}"" class="form-control">
                @if ($errors->has('presupuesto'))
                  <strong>{{$errors->first('presupuesto')}}</strong>
                @endif
            </div>
            <div class="form-group{{ $errors->has('comentarios') ? ' has-error' : '' }}">
              <label for="comentarios">Comentarios</label>
              <input type="textarea" name="comentarios">
              @if ($errors->has('comentarios'))
                <strong>{{$errors->first('comentarios')}}</strong>
              @endif
            </div>
            <div class="form-group">
                <button type="submit" name="button" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>
