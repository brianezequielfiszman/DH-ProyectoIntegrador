<?php
return array(
    "db" => array(
        "sql" => array(
            "dbname"   => "usuarios",
            "username" => "root",
            "password" => "",
            "host"     => "localhost"
        ),
        "json" => array(
            "offset"    => "usuarios",
            "file_path" => '/usuarios.json'
        )
    ),
    "view" => array(
      "URL" => array(
          "index"       => $_SERVER['DOCUMENT_ROOT'] . "/view/index.php",
          "home"        => $_SERVER['DOCUMENT_ROOT'] . "/view/home.php",
          "faqs"        => $_SERVER['DOCUMENT_ROOT'] . "/view/faqs.php",
          "login"       => $_SERVER['DOCUMENT_ROOT'] . "/view/login.php",
          "registrar"   => $_SERVER['DOCUMENT_ROOT'] . "/view/registrar.php",
          "footer"      => $_SERVER['DOCUMENT_ROOT'] . "/view/footer.php",
          "head"        => $_SERVER['DOCUMENT_ROOT'] . "/view/head.php",
          "style"       => $_SERVER['DOCUMENT_ROOT'] . "/css/style.css",
          "ajax"        => $_SERVER['DOCUMENT_ROOT'] . "/js/ajax.js",
          "faqs_script" => $_SERVER['DOCUMENT_ROOT'] . "/js/faqs.js",
          "validacion"  => $_SERVER['DOCUMENT_ROOT'] . "/js/validacion.php",
        ),
      "URI" => array(
        "index"       => "/view/index.php",
        "home"        => "/view/home.php",
        "faqs"        => "/view/faqs.php",
        "login"       => "/view/login.php",
        "registrar"   => "/view/registrar.php",
        "footer"      => "/view/footer.php",
        "head"        => "/view/head.php",
        "style"       => "/css/style.css",
        "ajax"        => "/js/ajax.js",
        "faqs_script" => "/js/faqs.js",
        "validacion"  => "/js/validacion.php",
        ),
    ),
    "controller" => array(
      'URL' => array(
        "submit_user" => $_SERVER['DOCUMENT_ROOT'] . "/submit_user.php",
      ),
      'URI' => array(
        "submit_user" => "/submit_user.php",
      ),
    ),
);
?>
