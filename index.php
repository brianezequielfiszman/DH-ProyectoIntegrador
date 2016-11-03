<?php
  use Configuration\Config;
  require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
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
    <?php require_once Config::getViewHead(); ?>
  <body>
    <?php
    require_once Config::getSupport();

    $repoUsuarios    = $repositorio->getRepositorioUsuarios();
    $usuarioLogueado = $auth->getLoggedUser($repoUsuarios);

if (!$auth->isLogged()):
    switch ($_GET['id']):
      case HOME:
        include Config::getViewHome();
        break;
      case FAQS:
        include Config::getViewFaqs();
        break;
      case LOGIN:
        include Config::getViewLogin();
        break;
      case SIGNUP:
        include Config::getViewRegistrar();
        break;
      default:
        include Config::getViewHome();
        break;
    endswitch;
  else:
    switch ($_GET['id']):
      case HOME:
        include Config::getViewHome();
        break;
      case FAQS:
        include Config::getViewFaqs();
        break;
      case LOGOUT:
        $auth->logout();
        header('location: index.php');
      case MENU:
        include Config::getViewMenu();
        break;
      default:
        include Config::getViewHome();
        break;
    endswitch;
  endif;

    include Config::getViewFooter();
    ?>
  </body>
</html>
