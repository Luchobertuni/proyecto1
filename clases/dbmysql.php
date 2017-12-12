<?php
 include_once("db.php");
//include_once("usuario.php");

 class dbMySQL extends Db {

   Public $db;

   public function __construct()
   {
     $dsn = 'mysql:host=localhost;charset=utf8mb4;port=3306;dbname=instaviaje';
     $user = "root";
     $pass = "root";

     try {
       $this->db = new PDO($dsn, $user, $pass);
     } catch (Exception $e) {
       echo $e->getMessage();
     }
   }
public function guardarUsuario(Usuario $usuario) {
  if($usuario->getId() == null){
   $sql = "INSERT INTO user (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)";
//$sql = "Insert INTO user ( email, first_name, last_name, password) VALUES  ( 'diego@gmail.com', 'diego', 'Taras', '123456')";
} else {
  $sql = "INSERT INTO user (id, email, first_name, last_name, password) VALUES (:id, :email, :first_name, :last_name, :password)";

}
  $query = $this->db->prepare($sql);


  $query->bindValue(":email", $usuario->getEmail());
  $query->bindValue(":first_name", $usuario->getFirst_name());
  $query->bindValue(":last_name", $usuario->getLast_name());
  $query->bindValue(":password", $usuario->getPassword());

  // $query->bindValue(':email', $usuario['email'], PDO::PARAM_STR);
  // $query->bindValue(':first_name', $usuario['first_name'], PDO::PARAM_STR);
  // $query->bindValue(':last_name', $usuario['last_name'], PDO::PARAM_STR);
  // $query->bindValue(':password', $usuario['password'], PDO::PARAM_STR);


  if($usuario->getId() != NULL){
    $query->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
}

  $query->execute();



  // echo "<pre>";
  // var_dump($query, $usuario);exit;
 //var_dump($usuario);exit;
 if ($usuario->getId() == null) {
   $usuario->setId($this->db->lastInsertId());
 }

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
