<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $config = include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
    require_once $config['controller']['URL']['support'];

    $repoUsuarios = $repositorio->getRepositorioUsuarios();
    $usuarioLogueado = $auth->getLoggedUser($repoUsuarios);

    const HOME = 'home';
    const FAQS = 'faqs';
    const LOGIN = 'login';
    const SIGNUP = 'signup';
    const LOGOUT = 'logout';

    if (!isset($_GET['id'])) {
        $_GET['id'] = HOME;
    }

    include $config['view']['URL']['head'];

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
      case LOGOUT:
        $auth->logout();
        header('location: index.php');
      default:
        include $config['view']['URL']['home'];
        break;
    endswitch;
    include $config['view']['URL']['footer'];

    ?>
  </body>
</html>
