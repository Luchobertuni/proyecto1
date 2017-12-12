<?php

  $dsn = 'mysql:host=localhost;charset=utf8mb4;port=3306;';
  $user = "root";
  $pass = "root";

  try {
    $db = new PDO($dsn, $user, $pass);
  } catch (Exception $e) {
    echo $e->getMessage();
  }

try {
  $query = $db->exec('CREATE DATABASE IF NOT EXISTS instaviajes;');
  echo "La base de datos se creó exitosamente. <br>";
} catch (Exception $e) {
  echo "Error al crear la base de datos. <br>";
}

try {
  $db->exec('USE instaviajes;');
  echo "La base de datos se selecciono automáticamente. <br>";
} catch (Exception $e) {
  echo "Error al seleccionar base de datos. <br>";
}

$db->exec('CREATE TABLE IF NOT EXISTS user (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
gender VARCHAR(20),
password CHAR(60)
);');

echo "La tabla se creó con éxito. <br><br>";

$usuarios = file_get_contents('usuario.json');
$usuarios = explode(PHP_EOL, $usuarios);

foreach ($usuarios as $value) {
  echo "Se añadío el usuario: " . $value . "<br><br>";
  $usuario = json_decode($value, true);
  $query = $db->prepare('INSERT INTO user (email, firstname, lastname, gender, password) VALUES (:email, :firstname, :lastname, :gender, :password);');

  $query->bindValue(':email', $usuario["email"]);
  $query->bindValue(':firstname', $usuario["firstname"]);
  $query->bindValue(':lastname', $usuario["lastname"]);
  $query->bindValue(':gender', $usuario["gender"]);
  $query->bindValue(':password', $usuario["password"]);

  $query->execute();
}




 ?>
