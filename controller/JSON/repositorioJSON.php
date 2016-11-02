<?php

use Configuration\Config;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';

require_once Config::$controller['URL']['repositorio'];
require_once Config::$controller['URL']['repositorioUsuariosJSON'];

class RepositorioJSON extends Repositorio
{
    public function __construct()
    {
        $this->setRepositorioUsuarios(new RepositorioUsuariosJSON(Config::$db['json']['file_path'], Config::$db['json']['offset']));
    }

    public function getRepositorioUsuarios() { return $this->repositorioUsuarios; }
    private function setRepositorioUsuarios($repositorioUsuarios) { $this->repositorioUsuarios = $repositorioUsuarios; }
}
