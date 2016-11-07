<?php
namespace Validation;
use Configuration\Config;
use Configuration\ValidationConfig;
use Validation\UserValidator;
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/ValidationConfig.php';
require_once Config::getUserValidator();

  class LoginValidator extends UserValidator
  {
      public function validate($usuario, $userDatabase) {
          $this->setUserValid(ValidationConfig::getUserNotRegisteredRule($userDatabase, $usuario->getNombre()));
          $this->setPasswordValid(ValidationConfig::getWrongPasswordRule($userDatabase, $usuario, $usuario->getPassword()));
      }
  }
