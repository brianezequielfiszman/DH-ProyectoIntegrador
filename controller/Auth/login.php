<?php
use Configuration\Config;
use Configuration\Route;
use Validation\LoginValidator;
use SQL\RepositorioSQL;
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Route.php';
require_once Config::getRepositorioJSON();
require_once Config::getRepositorioSQL();
require_once Config::getLoginValidator();
require_once Config::getAuth();

class Login
{
    private $usuario;
    private $repositorio;
    private $validator;
    const NO_ERROR = '';
    public function __construct($nombre, $password, RepositorioUsuarios $repositorio, LoginValidator $validator)
    {
        $this->usuario     = Usuario::loginConstruct($nombre, $password);
        $this->repositorio = $repositorio;
        $this->validator   = $validator;
    }

    public function getUsuario()                 { return $this->usuario;     }
    public function setUsuario(Usuario $usuario) { $this->usuario = $usuario; }

    private function validateLogin()
    {
        $this->validator->validate($this->usuario, $this->repositorio);

        return ($this->validator->isUserValid() === self::NO_ERROR) && ($this->validator->isPasswordValid() === self::NO_ERROR);
    }

    public function loginUser($recordame = '')
    {
        if ($this->validateLogin()) {
            $usuario = $this->repositorio->fetchUserByName($this->usuario->getNombre());
            $this->usuario->setEmail($usuario['email']);
            $auth = Auth::getInstance($this->repositorio);
            $auth->login($this->usuario);
            if (isset($recordame)) $auth->storeCookie($this->usuario);
            header('location: '.Route::getIndex().'?id=home');
        }
         else
            header('location: '.Route::getIndex().'?id=login&nameError='.$this->validator->isUserValid().'&passError='.$this->validator->isPasswordValid());
    }
}

$login = new Login($_POST['nombre'], $_POST['password'], (new RepositorioSQL())->getRepositorioUsuarios(), new LoginValidator());
if (isset($_POST['recordame'])) {
    $login->loginUser($_POST['recordame']);
} else {
    $login->loginUser();
}
