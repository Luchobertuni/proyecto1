<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width= device-width, initial-scale=1">
    <link href="./css/style.css" rel="stylesheet"
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <title>Perfil usuario</title>
  </head>
  <body>
    <?php
    require_once("funcion.php");
    ?>
    <header>
    <h1><a href="index.php"><img src="./imagenes/logo.jpg" height="200px" width="200px" class="logo"></a></h1>
    <div class="titulo">
    <h2> Instaviaje </h2>
    </div>
      <div class="menu-usuario">
      <nav>
        <ul class="menu2">
 <?php
   require_once("funcion.php");
   if (isset($_SESSION["usuarioLogueado"])) {
    echo"<li><a href='logout.php'>Cerrar sesión </a> </li>";
   } else{
    echo "<li><a href='login.php'> Iniciar sesión</a></li>";

 }
?>
          <form action="">
          <li>  <img src="./imagenes/lupa.png" width="20px" height="20px"> <input type="search" name="Buscador" class="buscar" value="buscar">  </li>
          </form>

      </ul>
      </nav>
    </div>
      <div class="menu-principal">
      <nav >
        <ul class="menu">
          <li> <a href="index.php"> Home </a> </li>
          <li> <a href=""> Contacto </a> </li>
          <li> <a href="faqs.php"> FaQs </a> </li>
      </ul>
      </nav>
    </div>

    </header>
  </body>
</html>
