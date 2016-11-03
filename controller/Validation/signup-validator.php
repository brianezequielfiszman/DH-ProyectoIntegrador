<?php
use Configuration\Config;
use Configuration\ValidationConfig;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/ValidationConfig.php';
require_once Config::getUserValidator();

class SignUpValidator extends UserValidator
{
  private $isEmailValid;
  private $isPasswordConfirmValid;

  public function validate($usuario, $userDatabase){
    parent::validate($usuario, $userDatabase);
    if(parent::isUserValid() === ValidationConfig::NO_ERROR)
    $this->setUserValid(ValidationConfig::IsUserAlreadyRegisteredRule()($userDatabase, $usuario->getNombre()));
    $this->setEmailValid(ValidationConfig::IsEmailValidRule()($usuario->getEmail()));
    if($this->isEmailValid() === ValidationConfig::NO_ERROR)
    $this->setEmailValid(ValidationConfig::IsEmailAlreadyRegisteredRule()($userDatabase, $usuario->getEmail()));
    $this->setPasswordConfirmValid(ValidationConfig::IsPasswordConfirmValidRule()($usuario->getPassword(), $usuario->getPasswordConfirm()));
  }

  public function isEmailValid(){ return $this->isEmailValid; }
  public function isPasswordConfirmValid(){ return $this->isPasswordConfirmValid; }

  public function setEmailValid($isEmailValid){ $this->isEmailValid = $isEmailValid; }
  private function setPasswordConfirmValid($isPasswordConfirmValid) { $this->isPasswordConfirmValid = $isPasswordConfirmValid; }
}
