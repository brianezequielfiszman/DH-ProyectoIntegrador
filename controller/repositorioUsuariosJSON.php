<?php

$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['controller']['URL']['repositorioUsuarios'];
include $config['controller']['URL']['repositorioGenericoJSON'];

class RepositorioUsuariosJSON extends RepositorioGenericoJSON implements RepositorioUsuarios {

    public function __construct($filePath, $offset) {
        parent::__construct($filePath, $offset);
    }

    public function submitUser(Usuario $usuario) { return parent::submitObject($usuario); }
    public function fetchUsers(){ return parent::fetchObject()[$this->offset]; }
    public function getUsersCount(){ return count($this->fetchUsers()); }

    public function fetchUserByEmail($email) {
        foreach ($this->fetchUsers() as $user)
            if ($user['email'] === $email)
                return $user;
        return false;
    }

    public function fetchUserByName($name){
      foreach ($this->fetchUsers() as $user)
          if($user['name'] === $name)
            return $user;
      return false;
    }
}
