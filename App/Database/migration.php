<?php
use Configuration\Config;
use SQL\RepositorioSQL;
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';

require_once Config::getRepositorioUsuariosJSON();
require_once Config::getRepositorioUsuariosSQL();
class Migration
{
  private $JsonDB;
  private $SqlDB;
  public function __construct(RepositorioUsuariosJSON $JsonDB, RepositorioUsuariosSQL $SqlDB) {
    $this->setJsonDB($JsonDB);
    $this->setSqlDB($SqlDB);
  }

  private function getJsonContent(){
    $decodedJSON = $JsonDB->fetchUsers();
  }
  private function validateJsonContent(){}
  private function submitJsonContent(){}
}
