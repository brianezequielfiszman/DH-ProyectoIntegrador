<?php

$config = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

include $config['controller']['URL']['repositorio'];
include $config['controller']['URL']['repositorioUsuariosSQL'];

class RepositorioSQL extends Repositorio
{
    public function __construct($config)
    {
      $this->setRepositorioUsuarios(new RepositorioUsuariosSQL(new PDO($config['db']['sql']['driver'].':host='.$config['db']['sql']['host'].';dbname='.$config['db']['sql']['dbname'].';charset=utf8mb4;port:3306', $config['db']['sql']['username'], $config['db']['sql']['password']), $table));
    }

    public function getRepositorioUsuarios(){ return $this->repositorioUsuarios; }
    private function setRepositorioUsuarios($repositorioUsuarios){ $this->repositorioUsuarios = $repositorioUsuarios; }
}
