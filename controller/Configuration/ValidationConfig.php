<?php
namespace Configuration;

  class ValidationConfig
  {
      private static $instance = null;
      private static $file;

      private static $users;
      private static $errors;
      private static $inputs;
      private static $regExp;
      private static $rules;

      const NO_ERROR = '';

      private function __construct()
      {
          self::$file   = include $_SERVER['DOCUMENT_ROOT'].'/config/validation_config.php';
          self::$users  = self::$file['users'];
          self::$errors = self::$users['errors'];
          self::$inputs = self::$users['inputs'];
          self::$regExp = self::$users['regExp'];
          self::$rules  = self::$users['rules'];
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

      public static function   getMailRegExp() { return self::$regExp['mailRegExp'];   }

      public static function   getUserFieldEmptyError() { return self::$errors['userFieldEmpty'];   }
      public static function   getMailFieldEmptyError() { return self::$errors['mailFieldEmpty'];   }
      public static function   getPassFieldEmptyError() { return self::$errors['passFieldEmpty'];   }
      public static function      getInvalidMailError() { return self::$errors['invalidMail'];      }
      public static function  getUnequalPasswordError() { return self::$errors['unequalPassword'];  }
      public static function    getShortPasswordError() { return self::$errors['shortPassword'];    }
      public static function       getUserExistsError() { return self::$errors['userExists'];       }
      public static function getUserFieldTooLongError() { return self::$errors['userFieldTooLong']; }
      public static function getPassFieldTooLongError() { return self::$errors['passFieldTooLong']; }

      public static function            getNameInput() { return self::$inputs['name'];            }
      public static function           getEmailInput() { return self::$inputs['email'];           }
      public static function        getPasswordInput() { return self::$inputs['password'];        }
      public static function getPasswordConfirmInput() { return self::$inputs['passwordConfirm']; }
      public static function        getMainFormInput() { return self::$inputs['main-form'];       }
      public static function          getSubmitInput() { return self::$inputs['submit'];          }

      public static function     getUserNotRegisteredRule() { return self::$rules['userNotRegistered'];        }
      public static function         getWrongPasswordRule() { return self::$rules['wrongPassword'];            }
      public static function  IsUserAlreadyRegisteredRule() { return self::$rules['isUserAlreadyRegistered'];  }
      public static function             IsEmailValidRule() { return self::$rules['isEmailValid'];             }
      public static function IsEmailAlreadyRegisteredRule() { return self::$rules['isEmailAlreadyRegistered']; }
      public static function   IsPasswordConfirmValidRule() { return self::$rules['isPasswordConfirmValid'];   }
      public static function              IsUserValidRule() { return self::$rules['isUserValid'];              }
      public static function          IsPasswordValidRule() { return self::$rules['isPasswordValid'];          }
  }
ValidationConfig::getInstance();
