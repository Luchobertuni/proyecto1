<?php
//include_once("db.php");
//require_once("clases/dbmysql.php");
require_once('clases/usuario.php');


class Validator {

public function validarInformacion($informacion){
  $arrayErrores = [];

  foreach ($informacion as $key => $value) {
    $informacion[$key] = trim($value);
  }
  if(strlen($informacion["first_name"])< 3 || strlen($informacion["first_name"]) > 20){
    $arrayErrores["first_name"] = "Nombre requiere + de 3 caracteres y - de 20";
  }
  if(strlen($informacion["last_name"]) < 0){
    $arrayErrores["last_name"] = "Campo vacío";
  }
  if(strlen($informacion["email"]) == 0){
    $arrayErrores["email"] = "Campo email vacío";
  }else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
    $arrayErrores["email"] = "email no valido";
  }
  if($informacion["email"] != $informacion["remail"]){
    $arrayErrores["email"] = "El email no verifica";
}
  if(strlen($informacion["password"]) < 6){
    $arrayErrores["password"] = "La contraseña debe tener al menos 6 caracteres";
  }else if ($informacion["password"] != $informacion["cpassword"]) {
    $arrayErrores["password"] = "La contraseña no verifica";
  }
}
 public function armarUsuario($informacion) {
    return [
      "email" => $informacion["email"],
    "first_name" => $informacion["first_name"],
    "last_name" => $informacion["last_name"],
    "remail" => $informacion["remail"],
    "password" => password_hash($informacion["password"], PASSWORD_DEFAULT)
  ];
}
public function validarLogin($info,  $db){

  $errores = [];

  if (strlen($info["email"]) == 0) {
    $errores["email"] = "No hay mail";
  }
  else if(filter_var($info["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "Pusiste un mail que no era valido";
  }
  else if ($db->traerPorEmail($info["email"]) == NULL) {
    $errores["email"] = "El usuario no existe";
  } else {
    //Validar la contraseña
    $usuario = $db->traerPorEmail($info["email"] );
    if (password_verify($info["password"], $usuario["password"]) == false) {
      $errores["password"] = "La contraseña no verifica";
    }
  }

  return $errores;
}
public function guardarUsuario(Usuario $usuario) {
  if($usuario->getId() == null){
   $sql = "INSERT into user ( id,email, first_name, last_name, password) values ( default,:email, :first_name, :last_name, :password)";
//$sql = "Insert into user ( email, first_name, last_name, password) values ( 'diego@gmail.com', 'diego', 'Taras', '123456')";
}
  $query = $this->db->prepare($sql);

  $query->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
  $query->bindValue(":first_name", $usuario->getFirst_name(), PDO::PARAM_STR);
  $query->bindValue(":last_name", $usuario->getLast_name(), PDO::PARAM_STR);
  $query->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);

  // $query->bindValue(':email', $usuario['email'], PDO::PARAM_STR);
  // $query->bindValue(':first_name', $usuario['first_name'], PDO::PARAM_STR);
  // $query->bindValue(':last_name', $usuario['last_name'], PDO::PARAM_STR);
  // $query->bindValue(':password', $usuario['password'], PDO::PARAM_STR);


  if($usuario->getId() !=null){
    $query->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
}
  $query->execute();
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
public function estaLogueado() {
 return (isset($_SESSION["usuarioLogueado"]));}

public function guardarCookie(Usuario $usuario) {
    setcookie("usuarioLogueado", $usuario->getEmail(), time() + 3600 * 24);
}

public function usuarioLogueado() {

  if ($this->estaLogueado()) {
    return $db->traerPorEmail($_SESSION["usuarioLogueado"]);
  }
  else {
    return NULL;
  }
}

  public function loguear(Usuario $usuario) {
    $_SESSION["usuarioLogueado"] = $usuario->getEmail();
 }
public function estaEnFormulario($campo) {
      return isset($_POST[$campo]);
  }


}






 ?>
