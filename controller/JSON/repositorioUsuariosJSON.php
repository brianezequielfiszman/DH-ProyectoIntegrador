<?php
use Configuration\Config;

require_once Config::getRepositorioUsuarios();
require_once Config::getRepositorioGenericoJSON();

class RepositorioUsuariosJSON extends RepositorioGenericoJSON implements RepositorioUsuarios {

    public function __construct($filePath, $offset) {
        parent::__construct($filePath, $offset);
    }

    public function submitUser(Usuario $usuario) { return parent::submitObject($usuario);       }
    public function fetchUsers()                 { return parent::fetchObject()[$this->offset]; }
    public function getUsersCount()              { return count($this->fetchUsers());           }

    public function fetchUserByEmail($email) {
        foreach ($this->fetchUsers() as $user)
            if ($user['email'] === $email)
                return $user;
        return false;
    }

    public function fetchUserByName($name){
      foreach ($this->fetchUsers() as $user)
          if($user['nombre'] === $name)
            return $user;
      return false;
    }
}
