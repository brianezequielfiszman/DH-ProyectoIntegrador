<?php

return array(
    'db' => array(
        'sql' => array(
            'dbname' => 'usuarios',
            'username' => 'root',
            'password' => '',
            'host' => 'localhost',
        ),
        'json' => array(
            'offset' => 'usuarios',
            'file_path' => $_SERVER['DOCUMENT_ROOT'].'/usuarios.json',
        ),
    ),
    'model' => array(
        'URL' => array(
            'usuario' => $_SERVER['DOCUMENT_ROOT'].'/model/usuario.php',
            'validable' => $_SERVER['DOCUMENT_ROOT'].'/model/validable.php',
        ),
        'URI' => array(
          'usuario' => '/model/usuario.php',
          'validable' => '/model/validable.php',
        ),
    ),
    'view' => array(
        'URL' => array(
            'index' => $_SERVER['DOCUMENT_ROOT'].'/index.php',
            'home' => $_SERVER['DOCUMENT_ROOT'].'/view/home.php',
            'faqs' => $_SERVER['DOCUMENT_ROOT'].'/view/faqs.php',
            'login' => $_SERVER['DOCUMENT_ROOT'].'/view/login.php',
            'registrar' => $_SERVER['DOCUMENT_ROOT'].'/view/registrar.php',
            'footer' => $_SERVER['DOCUMENT_ROOT'].'/view/footer.php',
            'head' => $_SERVER['DOCUMENT_ROOT'].'/view/head.php',
            'style' => $_SERVER['DOCUMENT_ROOT'].'/css/style.css',
            'ajax' => $_SERVER['DOCUMENT_ROOT'].'/js/ajax.js',
            'faqs_script' => $_SERVER['DOCUMENT_ROOT'].'/js/faqs.js',
            'validacion' => $_SERVER['DOCUMENT_ROOT'].'/js/validacion.php',
        ),
        'URI' => array(
            'index' => '/index.php',
            'home' => '/view/home.php',
            'faqs' => '/view/faqs.php',
            'login' => '/view/login.php',
            'registrar' => '/view/registrar.php',
            'footer' => '/view/footer.php',
            'head' => '/view/head.php',
            'style' => '/css/style.css',
            'ajax' => '/js/ajax.js',
            'faqs_script' => '/js/faqs.js',
            'validacion' => '/js/validacion.php',
        ),
    ),
    'controller' => array(
        'URL' => array(
            'submit_user' => $_SERVER['DOCUMENT_ROOT'].'/controller/submit_user.php',
            'repositorio' => $_SERVER['DOCUMENT_ROOT'].'/controller/repositorio.php',
            'repositorioJSON' => $_SERVER['DOCUMENT_ROOT'].'/controller/repositorioJSON.php',
            'repositorioUsuarios' => $_SERVER['DOCUMENT_ROOT'].'/controller/repositorioUsuarios.php',
            'repositorioGenericoJSON' => $_SERVER['DOCUMENT_ROOT'].'/controller/repositorioGenericoJSON.php',
            'repositorioUsuariosJSON' => $_SERVER['DOCUMENT_ROOT'].'/controller/repositorioUsuariosJSON.php',
        ),
        'URI' => array(
            'submit_user' => '/controller/submit_user.php',
            'repositorio' => '/controller/repositorio.php',
            'repositorioJSON' => '/controller/repositorioJSON.php',
            'repositorioUsuarios' => '/controller/repositorioUsuarios.php',
            'repositorioGenericoJSON' => '/controller/repositorioGenericoJSON.php',
            'repositorioUsuariosJSON' => '/controller/repositorioUsuariosJSON.php',
        ),
    ),
);
