<?php
  use Configuration\Config;
  use SQL\RepositorioUsuariosSQL;
  use SQL\RepositorioSQL;
  require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
  require_once Config::getModelUsuario();

  class Auth
  {
      public static $instance;

      private function __construct() {}

      public function login(Usuario $usuario)       { $_SESSION['usuarioLogueado'] = $usuario->getEmail() ?? $usuario['email']; }
      public function isLogged()                    { return isset($_SESSION['usuarioLogueado']);                               }
      public function storeCookie(Usuario $usuario) { setcookie('usuarioLogeado', $usuario->getEmail(), time() + 3600 * 24);    }
      public function unsetCookie($cookieName)      { setcookie($cookieName, '', -1);                                           }

      public static function getInstance(RepositorioUsuarios $repositorio)
      {
        if (self::$instance == null):
          self::$instance = new self();
          self::$instance->autoLogin($repositorio);
        endif;

        return self::$instance;
      }

    public function logout()
    {
      session_destroy();
      $this->unsetCookie('usuarioLogueado');
    }

    public function getLoggedUser($repositorio)
    {
      if (!$this->isLogged())
        return null;

      $loggedEmail = $_SESSION['usuarioLogueado'];
      return $repositorio->fetchUserByEmail($loggedEmail);
    }

    public function autoLogin(RepositorioUsuarios $repositorio)
    {
      session_start();
      $this->unsetCookie('usuarioLogueado');
      if (!$this->isLogged())
        if (isset($_COOKIE['usuarioLogueado'])):
          $usuario = $repositorio->fetchUserByEmail($_COOKIE['usuarioLogueado']);
          $this->login($usuario);
        endif;

  }
}
