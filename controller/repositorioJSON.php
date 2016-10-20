<?php

$config = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

include $config['controller']['URL']['repositorio'];
include $config['controller']['URL']['repositorioUsuariosJSON'];

class RepositorioJSON extends Repositorio
{
    private $usuariosFilePath;
    private $usuariosOffset;

    public function __construct($config)
    {
      $this->setUsersParameters($config['db']['json']['file_path'], $config['db']['json']['offset']);
      $this->repositorioUsuarios = new RepositorioUsuariosJSON($this->getUsersFilePath(), $this->getUsersOffset());
    }

    private function setUsersParameters($filePath, $offset){
      $this->usuariosFilePath = $filePath;
      $this->usuariosOffset   = $offset;
    }

    private function getUsersFilePath(){ return $this->usuariosFilePath; }
    private function getUsersOffset(){ return $this->usuariosOffset; }
}
