<?php
use Configuration\Config;
use Configuration\ValidationConfig;
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/ValidationConfig.php';
require_once Config::$controller['URL']['repositorioJSON'];
require_once Config::$controller['URL']['loginValidator'];
require_once Config::$controller['URL']['auth'];

class Login
{
  private $usuario;
  private $repositorio;
  private $validator;

  public function __construct($nombre, $password, RepositorioUsuarios $repositorio, LoginValidator $validator)
  {
    $this->usuario = Usuario::loginConstruct($nombre, $password);
    $this->repositorio = $repositorio;
    $this->validator = $validator;
  }

  public function getUsuario(){ return $this->usuario; }
  public function setUsuario(Usuario $usuario) { $this->usuario = $usuario; }

  private function validateLogin(){
    $this->validator->validate($this->usuario, $this->repositorio);
    return (($this->validator->isUserValid() === NO_ERROR) && ($this->validator->isPasswordValid() === NO_ERROR));
  }

  public function loginUser($recordame = ''){
    if ($this->validateLogin()) {
      $usuario = $this->repositorio->fetchUserByName($this->usuario->getNombre());
      $this->usuario->setEmail($usuario['email']);
      $auth = Auth::getInstance($this->repositorio);
      $auth->login($this->usuario);
      if (isset($recordame))
        $auth->storeCookie($this->usuario);
      header('location: ' . Config::$view['URI']['index'] . "?id=home");
    } else {
      header('location: ' . Config::$view['URI']['index'] . "?id=login&nameError=" . $this->validator->isUserValid() .  "&passError=".$this->validator->isPasswordValid());
    }
  }
}

$login = new Login($_POST['nombre'], $_POST['password'], (new RepositorioJSON())->getRepositorioUsuarios(), new LoginValidator());
if(isset($_POST['recordame']))
  $login->loginUser($_POST['recordame']);
else
  $login->loginUser();
