<?php
namespace Configuration;

  class Config
  {
      private static $instance = null;
      private static $file;
      private static $db;
      private static $tables;
      private static $usuarios;
      private static $model;
      private static $view;
      private static $controller;

      const URL  = 'URL';
      const URI  = 'URI';

      const SQL  = 'SQL';
      const JSON = 'JSON';

      private function __construct()
      {
          self::$file       = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
          self::$db         = self::$file['db'];
          self::$tables     = self::$db[self::SQL]['tables'];
          self::$usuarios   = self::$tables['usuarios'];
          self::$model      = self::$file['model'];
          self::$view       = self::$file['view'];
          self::$controller = self::$file['controller'];
          self::destruct();
      }

      private function destruct(){ self::$file = null; }

      public function getInstance()
      {
          if (self::$instance == null):
            self::$instance = new self();
          endif;

          return self::$instance;
      }

    /**
     * Receives an environment and collection of Path
     * and returns the array with the selected $ENV as a key.
     *
     *
     * @param $ENV can only be Config::URL or Config::URI
     * @param $PATH is a collection of routes
     * @return {[Array]} $PATH[$ENV]
     */
      private static function getPath($ENV = self::URL, $PATH){
        $ENV = ($ENV === self::URL) ? self::URL : self::URI;
        return $PATH[$ENV];
      }

      /**
      * Receives an database type and collection of metadata
      * and returns the array with the selected $DBType as a key.
      *
      *
      * @param $DBType can only be Config::SQL or Config::JSON
      * @param $metaDataArr is a collection of metadata
      * @return {[Array]} $metaData[$DBType]
      */
      private static function getDBMetaData($DBType = self::SQL, $metaDataArr){
        $DBType = ($DBType === self::SQL) ? self::SQL : self::JSON;
        return $metaDataArr[$DBType];
      }
      // JSON
      public static function getJSONFilePath() { return self::getDBMetaData(self::JSON, self::$db)['file_path']; }
      public static function getJSONOffset()   { return self::getDBMetaData(self::JSON, self::$db)['offset'];    }
      // SQL
      public static function getSQLDriver()    { return self::getDBMetaData(self::SQL, self::$db)['driver'];           }
      public static function getSQLDataBase()  { return self::getDBMetaData(self::SQL, self::$db)['dbname'];           }
      public static function getSQLHost()      { return self::getDBMetaData(self::SQL, self::$db)['host'];             }
      public static function getSQLPort()      { return self::getDBMetaData(self::SQL, self::$db)['port'];             }
      public static function getSQLUserName()  { return self::getDBMetaData(self::SQL, self::$db)['username'];         }
      public static function getSQLPassword()  { return self::getDBMetaData(self::SQL, self::$db)['password'];         }

      public static function getSQLUsersTableName()      { return self::$usuarios['nombre'];     }
      public static function getSQLUsersTableProperties(){ return self::$usuarios['properties']; }


      //PATH
      public static function getModelUsuario($ENV = self::URL)            { return self::getPath($ENV, self::$model)['usuario'];                      }
      public static function getViewIndex($ENV = self::URL)               { return self::getPath($ENV, self::$view)['index'];                         }
      public static function getViewHome($ENV = self::URL)                { return self::getPath($ENV, self::$view)['home'];                          }
      public static function getViewHead($ENV = self::URL)                { return self::getPath($ENV, self::$view)['head'];                          }
      public static function getViewFaqs($ENV = self::URL)                { return self::getPath($ENV, self::$view)['faqs'];                          }
      public static function getViewLogin($ENV = self::URL)               { return self::getPath($ENV, self::$view)['login'];                         }
      public static function getViewRegistrar($ENV = self::URL)           { return self::getPath($ENV, self::$view)['registrar'];                     }
      public static function getViewMenu($ENV = self::URL)                { return self::getPath($ENV, self::$view)['menu'];                          }
      public static function getViewLogout($ENV = self::URL)              { return self::getPath($ENV, self::$view)['logout'];                        }
      public static function getViewAJAX($ENV = self::URL)                { return self::getPath($ENV, self::$view)['ajax'];                          }
      public static function getViewFooter($ENV = self::URL)              { return self::getPath($ENV, self::$view)['footer'];                        }
      public static function getViewStyle($ENV = self::URL)               { return self::getPath($ENV, self::$view)['style'];                         }
      public static function getViewValidation($ENV = self::URL)          { return self::getPath($ENV, self::$view)['validacion'];                    }
      public static function getViewFaqsScript($ENV = self::URL)          { return self::getPath($ENV, self::$view)['faqs_script'];                   }
      public static function getAuth($ENV = self::URL)                    { return self::getPath($ENV, self::$controller)['auth'];                    }
      public static function getLogin($ENV = self::URL)                   { return self::getPath($ENV, self::$controller)['login'];                   }
      public static function getRegistrar($ENV = self::URL)               { return self::getPath($ENV, self::$controller)['submit_user'];             }
      public static function getSupport($ENV = self::URL)                 { return self::getPath($ENV, self::$controller)['support'];                 }
      public static function getRepositorio($ENV = self::URL)             { return self::getPath($ENV, self::$controller)['repositorio'];             }
      public static function getRepositorioUsuarios($ENV = self::URL)     { return self::getPath($ENV, self::$controller)['repositorioUsuarios'];     }
      public static function getRepositorioGenerico($ENV = self::URL)     { return self::getPath($ENV, self::$controller)['repositorioGenerico'];     }
      public static function getSQLServer($ENV = self::URL)               { return self::getPath($ENV, self::$controller)['SQLServer'];               }
      public static function getRepositorioGenericoSQL($ENV = self::URL)  { return self::getPath($ENV, self::$controller)['repositorioGenericoSQL'];  }
      public static function getRepositorioSQL($ENV = self::URL)          { return self::getPath($ENV, self::$controller)['repositorioSQL'];          }
      public static function getRepositorioUsuariosSQL($ENV = self::URL)  { return self::getPath($ENV, self::$controller)['repositorioUsuariosSQL'];  }
      public static function getRepositorioGenericoJSON($ENV = self::URL) { return self::getPath($ENV, self::$controller)['repositorioGenericoJSON']; }
      public static function getRepositorioJSON($ENV = self::URL)         { return self::getPath($ENV, self::$controller)['repositorioJSON'];         }
      public static function getRepositorioUsuariosJSON($ENV = self::URL) { return self::getPath($ENV, self::$controller)['repositorioUsuariosJSON']; }
      public static function getValidator($ENV = self::URL)               { return self::getPath($ENV, self::$controller)['validator'];               }
      public static function getLoginValidator($ENV = self::URL)          { return self::getPath($ENV, self::$controller)['loginValidator'];          }
      public static function getUserValidator($ENV = self::URL)           { return self::getPath($ENV, self::$controller)['userValidator'];           }
  }
Config::getInstance();
