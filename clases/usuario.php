<?php

class Usuario {
  private $email;
  private $first_name;
  private $last_name;
//  private $gender;
  // private $birth_date;
  private $password;

  public function __construct($id = NULL, $email, $first_name, $last_name, $password) {
      $this->id = $id;
      $this->email = $email;
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      //$this->birth_date = $birth_date;
      $this->password = $password;
      //$this->gender = $gender;
  }

public function setFirst_name($first_name){
 $this->first_name = $first_name;
}
public function getFirst_name(){
 return $this->first_name;
}
public function setLast_name($last_name){
 $this->last_name = $last_name;
}
public function getLast_name(){
 return $this->last_name;
}
public function setEmail($email){
  $this->email = $email;
}
public function getEmail(){
  return $this->email;
}
// public function setBirth_date($birth_date){
//  $this->birth_date = $birth_date;
// }

// public function getBirth_date(){
//  return $this->birth_date;
// }

public function setPassword($password){
$this->password = $password;
}
public function getPassword(){
return $this->password;
}
// public function getGender($gender){
// return $this->gender;
// }
// public function setGender(){
// $this->gender = $gender;
// }
  public function guardarFoto(){
    $archivo = $_FILES["avatar"]["tmp_name"];
    $extension = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $nombreDeLaImagen = $_POST["email"] . "." . $extension;
    $destino = __DIR__ . "/imagenes/" . $nombreDeLaImagen;
    move_uploaded_file($origen, $destino);
  }
}

 ?>
