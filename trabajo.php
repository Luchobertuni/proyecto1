<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet"
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <title> Travels </title>
  </head>
<body>
  <div class="contenedor">
    <header>
      <h1><img src="./imagenes/logo.jpg" height="200px" width="200px" class="logo"> </h1>
    <div class="titulo">
    <h2> Instaviaje </h2>
    </div>
      <div class="menu-usuario">
      <nav>
        <ul class="menu2">
<!-- Agregar mas adelante perfil/ cuando inicia sesion -->
 <?php
   require_once("funcion.php");
   //var_dump($_SESSION);
   //exit;

   if (isset($_SESSION["usuarioLogueado"])) {
$usuario = traerPorEmail($_SESSION["usuarioLogueado"]);
     ?> <li><a href='perfil.php'> Perfil: <?=$usuario["nombre"]?> </a></li>
        <li><a href='logout.php'>Cerrar sesión </a> </li>
<?php
   } else{
    echo "<li><a href='logintrabajo.php'> Iniciar sesión</a></li>";

 }
?>
          <li> <a href="formulariotrabajo.php"> Registrarse </a> </li>
          <form action="">
          <li>  <img src="./imagenes/lupa.png" width="20px" height="20px"> <input type="search" name="Buscador" class="buscar" value="buscar">  </li>
          </form>

      </ul>
      </nav>
    </div>
      <div class="menu-principal">
      <nav >
        <ul class="menu">
          <li> <a href="trabajo.php"> Home </a> </li>
          <li> <a href=""> Contacto </a> </li>
          <li> <a href="faqs.php"> FaQs </a> </li>
      </ul>
      </nav>
    </div>

    </header>
    <br><br><br><br><br><br>
    <div class="cajas">
<!-- caja 1 Viajes programados-->
      <!-- <div class="programados"> -->

      <!-- </div> -->
      <!-- caja 2 Arma tu viaje -->
      <div class="arma">
        <p class="frase" id="armalo">Arma tu viaje como mas te guste!!</p>
        <a href="armalo.php" class="ver-mas"> <p> Ver mas </p> </a>
      </div>
      <!--caja 3 Recomendaciones  -->
      <div class="recomendacion">
        <p class="frase" id="recomendacion">Recomendacion acerca de los viajes realizados</p>
<a href="recomendaciones.php" class="ver-mas"><p>Ver mas sobre recomendaciones</p></a>
      </div>
      <!--rutas  -->
      <div class="rutas">
        <p class="frase" id="rutas">Rutas y caminos por los que viajar</p>
  <img src="./imagenes/mapa-bicisenda-bs.jpg" class="rut">
  <a href="rutas.php" class="ver-mas">  <p> Ver más sobre rutas y caminos </p> </a>
      </div>
      <!--Fotos  -->
      <div class="fotos">
        <p class="frase-fotos">Fotos</p>
        <ul>
      <li>  <img src="./imagenes/bici-bs.jpg" height="250px" width="350px" class="imagen1">
                <div>
                <button class="button" type="button">
                  <a href="fotos.php">
                  <p> Ver más fotos </p> </a>
                </button>
                </div>
    </li>
      <li>  <img src="./imagenes/bici-euro.jpg" height="250px" width="350px" class="imagen2">
        <div>
        <button class="button" type="button">
          <a href="fotos.php">
          <p> Ver más fotos </p> </a>
        </button>
        </div>
 </li>
      <li>  <img src="./imagenes/bicis-bs.jpg" height="250px" width="350x" class="imagen3">
        <div>
        <button class="button" type="button">
          <a href="fotos.php">
          <p> Ver más fotos </p> </a>
        </button>
        </div>
 </li>
</ul>
      </div>
<!-- Proximamente donde hospedarse -->
    </div>
    <footer>
    <div class="menu-footer">
      <nav>
      <ul>
        <li> <a href="trabajo.php">  Home </a> </li>
        <li> <a href="malito:instaviaje@gmail.com">  Contactanos! </a> </li>
        <li> <a href="#"> Redes </a> </li>
        <div>
        <li> <img src="./imagenes/face.png" width="50px" height="50px" class="face"> </li>
        <li> <img src="./imagenes/tw.png" width="50px" height="50px" class="tw"> </li>
      </div>
    </ul>
  </nav>

  </body>
</html>
