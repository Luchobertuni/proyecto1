<?php
 include_once("db.php");
 include_once("usuario.php");

 class dbMySQL extends db {

   Private $db;

   public function __contruct()
   {
     $dsn = 'mysql:host=localhost;charset=utfmb4;port=3306;database=instaviajes';
     $user = "root";
     $pass = "";

     try {
       $this->db = new PDO($dsn, $user, $pass);
     } catch (Exception $e) {
       echo $e->getMessage();
     }
   }
public function guardarUsuario($usuario) {
  global $db;
  $sql = "Insert into usuarios values (default, :email, :firstname, :lastname, :gender, :password)";
  $query = $db->prepare($sql);

  $query->bindValue(":email", $usuario["email"]);
  $query->bindValue(":firstname", $usuario["firstname"]);
  $query->bindValue(":lastname", $usuario["lastname"]);
  $query->bindValue(":gender", $usuario["gender"]);
  $query->bindValue(":password", $usuario["password"]);

  $query->execute();

  $usuario["id"] = $db->lastInsertId();

  return $usuario;

}
public function traerTodos() {

  $sql = "Select * from user ";
  $query = $this->db->prepare($sql);
  $query->execute();
  $final = $query->fetchAll(PDO::FETCH_ASSOC);
}
public function traerPorEmail($email) {

  $sql = "Select * from user where email = :email";

  $query = $this->db->prepare($sql);

  $query->bindValue(":email", $email);

  $query->execute();

  $usuario = $query->fetch(PDO::FETCH_ASSOC);

  return $usuario;
}

 }




 ?>
