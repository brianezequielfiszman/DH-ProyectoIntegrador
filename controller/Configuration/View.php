<?php
namespace Configuration;
use Configuration\Config;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';

class View
{
    private static $instance = null;
    private static $view;

    private function __construct(){
      self::$view = Config::getViews();
    }

    public function getInstance(){
      if (self::$instance == null):
        self::$instance = new self();
      endif;

      return self::$instance;
    }

    public static function getIndex()      { return self::$view['index'];       }
    public static function getHome()       { return self::$view['home'];        }
    public static function getHead()       { return self::$view['head'];        }
    public static function getFaqs()       { return self::$view['faqs'];        }
    public static function getLogin()      { return self::$view['login'];       }
    public static function getRegistrar()  { return self::$view['registrar'];   }
    public static function getMenu()       { return self::$view['menu'];        }
    public static function getLogout()     { return self::$view['logout'];      }
    public static function getAJAX()       { return self::$view['ajax'];        }
    public static function getFooter()     { return self::$view['footer'];      }
    public static function getStyle()      { return self::$view['style'];       }
    public static function getValidation() { return self::$view['validacion'];  }
    public static function getFaqsScript() { return self::$view['faqs_script']; }
}
View::getInstance();
