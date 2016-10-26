<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['controller']['URL']['repositorioJSON'];
include $config['controller']['URL']['loginValidator'];
include $config['controller']['URL']['auth'];

class Login
{
  private $usuario;
  private $repositorio;
  private $validator;
  private $config;

  public function __construct($nombre, $password, RepositorioUsuarios $repositorio, LoginValidator $validator, $config)
  {
    $this->usuario = Usuario::loginConstruct($nombre, $password);
    $this->repositorio = $repositorio;
    $this->validator = $validator;
    $this->config = $config;
  }

  public function getUsuario(){ return $this->usuario; }
  public function setUsuario(Usuario $usuario) { $this->usuario = $usuario; }

  private function validateLogin(){
    $this->validator->validate($this->usuario, $this->repositorio);
    return (($this->validator->isUserValid() === '' || !$this->validator->isUserValid()) && ($this->validator->isPasswordValid() === '' ||
    !$this->validator->isPasswordValid()));
  }

  public function loginUser($recordame = ''){
    if ($this->validateLogin()) {
      $usuario = $this->repositorio->fetchUserByName($this->usuario->getNombre());
      $this->usuario->setEmail($usuario['email']);
      $auth = Auth::getInstance($this->repositorio);
      $auth->login($this->usuario);
      if (isset($recordame))
        $auth->storeCookie($this->usuario);
      header('location: ' . $this->config['view']['URI']['index'] . "?id=home");
    } else {
      header('location: ' . $this->config['view']['URI']['index'] . "?id=login&nameError=" . $this->validator->isUserValid() .  "&passError=".$this->validator->isPasswordValid());
    }
  }
}

$login = new Login($_POST['nombre'], $_POST['password'], (new RepositorioJSON($config))->getRepositorioUsuarios(), new LoginValidator($validationConfig), $config);
if(isset($_POST['recordame']))
  $login->loginUser($_POST['recordame']);
else
  $login->loginUser();
