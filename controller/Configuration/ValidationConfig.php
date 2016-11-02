<?php
namespace Configuration;

  class ValidationConfig
  {
      private static $instance = null;
      private static $file;
      public static $users;
      public static $errors;
      public static $inputs;
      public static $regExp;
      public static $rules;

      const NO_ERROR = '';

      private function __construct()
      {
          self::$file   = include $_SERVER['DOCUMENT_ROOT'].'/config/validation_config.php';
          self::$users  = self::$file['users'];
          self::$errors = self::$users['errors'];
          self::$inputs = self::$users['inputs'];
          self::$regExp = self::$users['regExp'];
          self::$rules  = self::$users['rules'];
      }

      public function getInstance()
      {
          if (self::$instance == null):
            self::$instance = new self();
          endif;

          return self::$instance;
      }
  }
ValidationConfig::getInstance();
