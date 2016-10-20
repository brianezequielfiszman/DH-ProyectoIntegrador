<head>
    <link rel="stylesheet" href=<?=$config['view']['URI']['style']?> media="screen" title="no title" charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php if($_GET['id'] == LOGIN || $_GET['id'] == SIGNUP): ?>
        <script type="text/javascript" src=<?=$config['view']['URI']['validacion'];?>></script>
      <?php elseif ($_GET['id'] == FAQS): ?>
        <script type="text/javascript" src=<?=$config['view']['URI']['faqs_script'];?>></script>
      <?php endif ?>
</head>
