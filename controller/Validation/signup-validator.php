<?php
use Configuration\Config;
use Configuration\ValidationConfig;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/ValidationConfig.php';
require_once Config::$controller['URL']['userValidator'];
class SignUpValidator extends UserValidator
{
  private $isEmailValid;
  private $isPasswordConfirmValid;

  public function validate($usuario, $userDatabase){
    parent::validate($usuario, $userDatabase);
    if(!parent::isUserValid())
    $this->setUserValid(ValidationConfig::$rules['isUserAlreadyRegistered']($userDatabase, $usuario->getNombre()));
    $this->setEmailValid(ValidationConfig::$rules['isEmailValid']($usuario->getEmail()));
    if(!$this->isEmailValid())
    $this->setEmailValid(ValidationConfig::$rules['isEmailAlreadyRegistered']($userDatabase, $usuario->getEmail()));
    $this->setPasswordConfirmValid(ValidationConfig::$rules['isPasswordConfirmValid']($usuario->getPassword(), $usuario->getPasswordConfirm()));
  }

  public function isEmailValid(){ return $this->isEmailValid; }
  public function isPasswordConfirmValid(){ return $this->isPasswordConfirmValid; }

  public function setEmailValid($isEmailValid){ $this->isEmailValid = $isEmailValid; }
  private function setPasswordConfirmValid($isPasswordConfirmValid) { $this->isPasswordConfirmValid = $isPasswordConfirmValid; }
}
