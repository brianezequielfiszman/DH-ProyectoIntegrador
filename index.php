<!DOCTYPE html>
<html>
  <body>
    <?php
    $config = require_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
    require_once $config['controller']['URL']['support'];

    $repoUsuarios    = $repositorio->getRepositorioUsuarios();
    $usuarioLogueado = $auth->getLoggedUser($repoUsuarios);

    const HOME   = 'home';
    const FAQS   = 'faqs';
    const LOGIN  = 'login';
    const SIGNUP = 'signup';
    const LOGOUT = 'logout';
    const MENU   = 'menu';

    if (!isset($_GET['id'])) { $_GET['id'] = HOME; }

    include $config['view']['URL']['head'];

if (!$auth->isLogged()):
    switch ($_GET['id']):
      case HOME:
        include $config['view']['URL']['home'];
        break;
      case FAQS:
        include $config['view']['URL']['faqs'];
        break;
      case LOGIN:
        include $config['view']['URL']['login'];
        break;
      case SIGNUP:
        include $config['view']['URL']['registrar'];
        break;
      default:
        include $config['view']['URL']['home'];
        break;
    endswitch;
  else:
    switch ($_GET['id']):
      case HOME:
        include $config['view']['URL']['home'];
        break;
      case FAQS:
        include $config['view']['URL']['faqs'];
        break;
      case LOGOUT:
        $auth->logout();
        header('location: index.php');
      case MENU:
        include $config['view']['URL']['menu'];
        break;
      default:
        include $config['view']['URL']['home'];
        break;
    endswitch;
  endif;
    include $config['view']['URL']['footer'];

    ?>
  </body>
</html>
