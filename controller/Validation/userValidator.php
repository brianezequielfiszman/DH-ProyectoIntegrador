<?php
use Configuration\Config;
use Configuration\ValidationConfig;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/ValidationConfig.php';

require_once Config::$controller['URL']['validationConfig'];
require_once Config::$controller['URL']['validator'];


  class UserValidator extends Validator
  {
      protected $validationConfig;
      protected $isUserValid;
      protected $isPasswordValid;


      public function validate($usuario, $userDatabase) {
        $this->setUserValid(ValidationConfig::$rules['isUserValid']($usuario->getNombre()));
        $this->setPasswordValid(ValidationConfig::$rules['isPasswordValid']($usuario->getPassword()));
      }

      public function isUserValid(){ return $this->isUserValid; }
      public function isPasswordValid(){ return $this->isPasswordValid; }

      public function setUserValid($isUserValid){ $this->isUserValid = $isUserValid; }
      public function setPasswordValid($isPasswordValid){ $this->isPasswordValid = $isPasswordValid; }
  }
