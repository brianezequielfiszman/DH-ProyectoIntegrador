<?php
  use Configuration\Config;
  use Configuration\View;

  require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/View.php';
  require_once Config::getSupport();
  $repoUsuarios    = $repositorio->getRepositorioUsuarios();
  $usuarioLogueado = $auth->getLoggedUser($repoUsuarios);

  const HOME   = 'home';
  const FAQS   = 'faqs';
  const LOGIN  = 'login';
  const SIGNUP = 'signup';
  const LOGOUT = 'logout';
  const MENU   = 'menu';

  if (!isset($_GET['id'])) { $_GET['id'] = HOME; }
?>

<!DOCTYPE html>
<html>
    <?php require_once View::getHead(); ?>
  <body>
    <?php

if (!$auth->isLogged()):
    switch ($_GET['id']):
      case HOME:
        include View::getHome();
        break;
      case FAQS:
        include View::getFaqs();
        break;
      case LOGIN:
        include View::getLogin();
        break;
      case SIGNUP:
        include View::getRegistrar();
        break;
      default:
        include View::getHome();
        break;
    endswitch;

  else:
    switch ($_GET['id']):
      case HOME:
        include View::getHome();
        break;
      case FAQS:
        include View::getFaqs();
        break;
      case LOGOUT:
        $auth->logout();
        header('location: index.php');
      case MENU:
        include View::getMenu();
        break;
      default:
        include View::getHome();
        break;
    endswitch;
  endif;

    include View::getFooter();
    ?>
  </body>
</html>
