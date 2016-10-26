<?php
  $config = include($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
  include $config['controller']['URL']['userValidator'];
  /**
   *
   */
  class LoginValidator extends UserValidator
  {
    public function __construct($validationConfig) { parent::__construct($validationConfig); }

    public function validate($usuario, $userDatabase) {
      $this->setUserValid($this->validationConfig['users']['rules']['userNotRegistered']($userDatabase, $usuario->getNombre()));
      $this->setPasswordValid($this->validationConfig['users']['rules']['wrongPassword']($userDatabase, $usuario, $usuario->getPassword()));
    }
  }
