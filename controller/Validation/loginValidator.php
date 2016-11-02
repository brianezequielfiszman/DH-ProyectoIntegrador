<?php
use Configuration\Config;
use Configuration\ValidationConfig;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/ValidationConfig.php';
require_once Config::$controller['URL']['userValidator'];

  class LoginValidator extends UserValidator
  {
      public function validate($usuario, $userDatabase) {
          $this->setUserValid(ValidationConfig::$rules['userNotRegistered']($userDatabase, $usuario->getNombre()));
          $this->setPasswordValid(ValidationConfig::$rules['wrongPassword']($userDatabase, $usuario, $usuario->getPassword()));
      }
  }
