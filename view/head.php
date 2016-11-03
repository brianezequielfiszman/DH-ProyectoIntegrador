<?php use Configuration\Config; ?>
<head>
    <link rel="stylesheet" href=<?=Config::getViewStyle(Config::URI)?> media="screen" title="no title" charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php if ($_GET['id'] == LOGIN || $_GET['id'] == SIGNUP): ?>
        <script type="text/javascript" src=<?=Config::getViewValidation(Config::URI); ?>></script>
      <?php elseif ($_GET['id'] == FAQS): ?>
        <script type="text/javascript" src=<?=Config::getViewFaqsScript(Config::URI); ?>></script>
      <?php endif ?>
</head>
