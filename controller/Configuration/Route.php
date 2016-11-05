<?php
namespace Configuration;
use Configuration\Config;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';

class Route
{
    private static $instance = null;
    private static $routes;

    private function __construct(){
      self::$routes = Config::getRoutes();
    }

    public function getInstance(){
      if (self::$instance == null):
        self::$instance = new self();
      endif;

      return self::$instance;
    }

    public static function getIndex()      { return self::$routes['index'];       }
    public static function getHome()       { return self::$routes['home'];        }
    public static function getHead()       { return self::$routes['head'];        }
    public static function getFaqs()       { return self::$routes['faqs'];        }
    public static function getLogin()      { return self::$routes['login'];       }
    public static function getRegistrar()  { return self::$routes['registrar'];   }
    public static function getMenu()       { return self::$routes['menu'];        }
    public static function getLogout()     { return self::$routes['logout'];      }
    public static function getAJAX()       { return self::$routes['ajax'];        }
    public static function getFooter()     { return self::$routes['footer'];      }
    public static function getStyle()      { return self::$routes['style'];       }
    public static function getValidation() { return self::$routes['validacion'];  }
    public static function getFaqsScript() { return self::$routes['faqs_script']; }
}
Route::getInstance();
