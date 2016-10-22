<?php

$config = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
$validationConfig = include $config['controller']['URL']['validationConfig'];
include $config['controller']['URL']['validator'];


  class UserValidator extends Validator
  {
      const VALID = true;

      public function __construct($errorOutput) { parent::__construct($errorOutput); }
      public function getErrorOutput() { return $this->errorOutput; }
      public function setErrorOutput($errorOutput) { $this->errorOutput = $errorOutput; }

      public function validate($usuario) {
          return array('userNameIsValid' => $this->validateUserName($usuario->getNombre()),
                   'emailIsValid' => $this->validateEmail($usuario->getMail()),
                   'passIsValid' => $this->validatePassword($usuario->getPassword()),
                   'passConfirmIsValid' => $this->validatePasswordConfirm($usuario->getPassword(), $usuario->getPasswordConfirm()),
                 );
      }

      private function validateUserName($user) {
          return (strlen($user) > 0) ?
          ((strlen($user) < 50) ?
          //((($this->validateUserExistance($jsonDB->getRepositorioUsuarios(), $usuario); FIJARSE SI EL USUARIO EXISTE
              self::VALID :
              $this->getErrorOutput()['users']['errors']['userFieldTooLong']) :
          ($this->getErrorOutput()['users']['errors']['userFieldEmpty']);
      }

      private function validateEmail($email) {
          return (strlen($email) > 0) ?
          ((preg_match($this->getErrorOutput()['users']['regExp']['mailRegExp'])) ?
              self::VALID :
              $this->getErrorOutput()['users']['errors']['invalidMail']) :
          $this->getErrorOutput()['users']['errors']['mailFieldEmpty'];
      }

      private function validatePassword($pass) {
          return (strlen($pass) > 0) ?
          ((strlen($pass) >= 8) ?
              ((strlen($pass) < 50) ?
                  self::VALID :
                  $this->getErrorOutput()['users']['errors']['passFieldTooLong']) :
              ($this->getErrorOutput()['users']['errors']['shortPassword'])) :
          ($this->getErrorOutput()['users']['errors']['passFieldEmpty']);
      }

      private function validatePasswordConfirm($pass, $passConfirm) {
          return ($pass === $passConfirm) ?
        ((strlen($pass) > 0) ?
            ((strlen($pass) >= 8) ?
                ((strlen($pass) < 50) ?
                    self::VALID :
                    $this->getErrorOutput()['users']['errors']['passFieldTooLong']) :
                ($this->getErrorOutput()['users']['errors']['shortPassword'])) :
            ($this->getErrorOutput()['users']['errors']['passFieldEmpty'])) :
        ($this->getErrorOutput()['users']['errors']['unequalPassword']);
      }
      public function validateUserExistance($repository, $user) {
        return $repository->fetchUserByName($user);
      }
  }
