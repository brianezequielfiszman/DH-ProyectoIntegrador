<?php
namespace SQL;
use Configuration\Config;
use SQL\SQLServer;
use SQL\RepositorioUsuariosSQL;
use Repositorio;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';

require_once Config::getRepositorio();
require_once Config::getRepositorioUsuariosSQL();
require_once Config::getSQLServer();

class RepositorioSQL extends Repositorio
{
    private $server;
    public function __construct() {
      $this->setServer(new SQLServer());
      $this->setRepositorioUsuarios(new RepositorioUsuariosSQL($this->getServer(), Config::getSQLUsersTableName(), Config::getSQLUsersTableProperties()));
    }

    public  function getRepositorioUsuarios(){ return $this->repositorioUsuarios; }
    private function setRepositorioUsuarios($repositorioUsuarios){ $this->repositorioUsuarios = $repositorioUsuarios; }
    private function getServer(){ return $this->server; }
    private function setServer($server){ $this->server = $server; }
}
