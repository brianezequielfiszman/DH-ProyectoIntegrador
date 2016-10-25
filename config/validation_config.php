<?php

$validationConfig = array(
    'users' => array(
        'errors' => array(
            'userFieldEmpty'   => 'El campo de usuario esta vacio.',
            'mailFieldEmpty'   => 'El campo de correo esta vacio.',
            'passFieldEmpty'   => 'El campo de clave esta vacio.',
            'invalidMail'      => 'El formato de correo ingresado no es valido.',
            'shortPassword'    => 'El password debe ser de minimo 8 caracteres.',
            'unequalPassword'  => 'Los campos de password no coinciden.',
            'userExists'       => 'El usuario ingresado ya existe.',
            'userFieldTooLong' => 'El valor de usuario es demasiado largo.',
            'passFieldTooLong' => 'La clave ingresada es demasiado larga.',
        ),
        'inputs' => array(
            'name'             => 'name',
            'email'            => 'email',
            'password'         => 'password',
            'passwordConfirm'  => 'passwordConfirm',
            'main-form'        => 'main-form',
            'submit'           => 'submit-button',
        ),
        'regExp' => array(
            'mailRegExp'       => '/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i',
        ),
        'rules' => array(
          'isUserValid' => function($user){
            global $validationConfig;
            return (strlen($user) > 0) ?
            ((strlen($user) < 50) ?
                '' :
                $validationConfig['users']['errors']['userFieldTooLong']) :
            ($validationConfig['users']['errors']['userFieldEmpty']);
            },
            'isEmailValid' => function($email){
              global $validationConfig;
              return (strlen($email) > 0) ?
              ((preg_match($validationConfig['users']['regExp']['mailRegExp'], $email)) ?
                  '' :
                  $validationConfig['users']['errors']['invalidMail']) :
              $validationConfig['users']['errors']['mailFieldEmpty'];
            },
            'isPasswordValid' => function($pass){
              global $validationConfig;
              return (strlen($pass) > 0) ?
              ((strlen($pass) >= 8) ?
                  ((strlen($pass) < 50) ?
                      '' :
                      $validationConfig['users']['errors']['passFieldTooLong']) :
                  ($validationConfig['users']['errors']['shortPassword'])) :
              ($validationConfig['users']['errors']['passFieldEmpty']);
            },
            'isPasswordConfirmValid' => function($pass, $passConfirm){
              global $validationConfig;
              return ($pass === $passConfirm) ?
            ((strlen($pass) > 0) ?
                ((strlen($pass) >= 8) ?
                    ((strlen($pass) < 50) ?
                        '' :
                        $validationConfig['users']['errors']['passFieldTooLong']) :
                    ($validationConfig['users']['errors']['shortPassword'])) :
                ($validationConfig['users']['errors']['passFieldEmpty'])) :
            ($validationConfig['users']['errors']['unequalPassword']);
            }
        ),
    ),
);
