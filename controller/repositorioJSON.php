<?php

$config = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

include $config['controller']['URL']['repositorio'];
include $config['controller']['URL']['repositorioUsuariosJSON'];

class RepositorioJSON extends Repositorio
{

    public function __construct($filePath, $offset)
    {
      $this->setRepositorioUsuarios(new RepositorioUsuariosJSON($filePath, $offset));
    }

    public function getRepositorioUsuarios(){ return $this->repositorioUsuarios; }
    private function setRepositorioUsuarios($repositorioUsuarios){ $this->repositorioUsuarios = $repositorioUsuarios; }
}
