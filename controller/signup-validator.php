<?php
$config = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
include $config['controller']['URL']['userValidator'];
class SignUpValidator extends UserValidator
{
  private $isEmailValid;
  private $isPasswordConfirmValid;

  public function __construct($validationConfig)
  {
    parent::__construct($validationConfig);
  }

  public function validate($usuario, $userDatabase){
    parent::validate($usuario, $userDatabase);
    if(!parent::isUserValid())
    $this->setUserValid($this->validationConfig['users']['rules']['isUserAlreadyRegistered']($userDatabase, $usuario->getNombre()));
    $this->setEmailValid($this->validationConfig['users']['rules']['isEmailValid']($usuario->getEmail()));
    if(!$this->isEmailValid())
    $this->setEmailValid($this->validationConfig['users']['rules']['isEmailAlreadyRegistered']($userDatabase, $usuario->getEmail()));
    $this->setPasswordConfirmValid($this->validationConfig['users']['rules']['isPasswordConfirmValid']($usuario->getPassword(), $usuario->getPasswordConfirm()));
  }

  public function isEmailValid(){ return $this->isEmailValid; }
  public function isPasswordConfirmValid(){ return $this->isPasswordConfirmValid; }

  public function setEmailValid($isEmailValid){ $this->isEmailValid = $isEmailValid; }
  private function setPasswordConfirmValid($isPasswordConfirmValid) { $this->isPasswordConfirmValid = $isPasswordConfirmValid; }
}
