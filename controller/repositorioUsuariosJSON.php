<?php

$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['controller']['URL']['repositorioUsuarios'];
include $config['controller']['URL']['repositorioGenericoJSON'];

class RepositorioUsuariosJSON extends RepositorioGenericoJSON implements repositorioUsuarios
{
    public function __construct($config)
    {
        parent::__construct($config);
    }

    public function submitUser(Usuario $usuario) { return parent::submitObject($usuario); }
    public function getUsersCount(){ return count($this->getUsers()); }
    public function getUsers(){ return $this->arrObj[$this->offset]; }
}
