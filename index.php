<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if (!isset($_GET['id'])):
      $_GET['id'] = 0;
    endif;
    include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
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
      default:
        include $config['view']['URL']['home'];
        break;
    endswitch;
    include $config['view']['URL']['footer'];
    ?>
  </body>
</html>
