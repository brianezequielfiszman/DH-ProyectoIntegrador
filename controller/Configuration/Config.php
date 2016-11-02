<?php
namespace Configuration;

  class Config
  {
      private static $instance = null;
      private static $file;
      public static $db;
      public static $model;
      public static $view;
      public static $controller;

      private function __construct()
      {
          self::$file       = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
          self::$db         = self::$file['db'];
          self::$model      = self::$file['model'];
          self::$view       = self::$file['view'];
          self::$controller = self::$file['controller'];
      }

      public function getInstance()
      {
          if (self::$instance == null):
            self::$instance = new self();
          endif;

          return self::$instance;
      }
  }
Config::getInstance();
