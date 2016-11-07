<?php
use Configuration\Config;
use SQL\RepositorioSQL;
use Validation\SignUpValidator;
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';

require_once Config::getRepositorioJSON();
require_once Config::getRepositorioSQL();
require_once Config::getSignUpValidator();
require_once Config::getModelUsuario();
class Migration
{
  private $jsonDB;
  private $sqlDB;
  private $validator;
  const NO_ERROR = '';
  public function __construct(\RepositorioUsuariosJSON $jsonDB, SQL\RepositorioUsuariosSQL $sqlDB, SignUpValidator $validator){
    $this->setJsonDB($jsonDB);
    $this->setSQLDB($sqlDB);
    $this->setValidator($validator);

  }

  public function startMigration(){
    $this->validateJsonContent($this->getJsonContent());
  }

  private function getJsonContent(){
    return $this->jsonDB->fetchUsers();
  }
  private function validateJsonContent($decodedJSON){
    foreach ($decodedJSON as $index => $user) {
      $usuario = Usuario::SignUpConstruct($user['name'], $user['email'], $user['password'], null);
      $this->validator->validate($usuario, $this->getSQLDB());
      if($this->validator->IsEmailValid() == self::NO_ERROR && $this->validator->IsUserValid() == self::NO_ERROR)
        $this->submitJsonContent($usuario);
    }
  }
  private function submitJsonContent(Usuario $usuario){
    $this->getSQLDB()->submitUser($usuario);
  }
  private function setJsonDB($jsonDB){ $this->jsonDB = $jsonDB; }
  private function setSQLDB($sqlDB){ $this->sqlDB = $sqlDB; }
  private function getJsonDB(){ return $this->jsonDB; }
  private function getSQLDB(){ return $this->sqlDB; }
  private function setValidator($validator){ $this->validator = $validator; }
}
