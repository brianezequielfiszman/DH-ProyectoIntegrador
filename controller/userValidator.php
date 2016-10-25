<?php
$config = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
include $config['controller']['URL']['validationConfig'];
include $config['controller']['URL']['validator'];


  class UserValidator extends Validator
  {
      protected $validationConfig;
      protected $isUserValid;
      protected $isPasswordValid;

      public function __construct($validationConfig) { $this->validationConfig = $validationConfig; }

      protected function validate($usuario) {
        $this->setUserValid($this->validationConfig['users']['rules']['isUserValid']($usuario->getNombre()));
        $this->setPasswordValid($this->validationConfig['users']['rules']['isPasswordValid']($usuario->getPassword()));
      }

      public function isUserValid(){ return $this->isUserValid; }
      public function isPasswordValid(){ return $this->isPasswordValid; }

      public function setUserValid($isUserValid){ $this->isUserValid = $isUserValid; }
      public function setPasswordValid($isPasswordValid){ $this->isPasswordValid = $isPasswordValid; }
  }
