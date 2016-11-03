<?php

use Configuration\Config;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';

require_once Config::getRepositorio();
require_once Config::getRepositorioUsuariosJSON();

class RepositorioJSON extends Repositorio
{
    public function __construct()
    {
        $this->setRepositorioUsuarios(new RepositorioUsuariosJSON(Config::getJSONFilePath(), Config::getJSONOffset()));
    }

    public function getRepositorioUsuarios() { return $this->repositorioUsuarios; }
    private function setRepositorioUsuarios($repositorioUsuarios) { $this->repositorioUsuarios = $repositorioUsuarios; }
}
