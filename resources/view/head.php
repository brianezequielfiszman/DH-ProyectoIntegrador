<?php use Configuration\Config; ?>
<?php use Configuration\Route; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Route.php'; ?>

<head>
    <link rel="stylesheet" href=<?=Route::getStyle()?> media="screen" title="no title" charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php if ($_GET['id'] == LOGIN || $_GET['id'] == SIGNUP): ?>
        <script type="text/javascript" src=<?=Route::getValidation(); ?>></script>
      <?php elseif ($_GET['id'] == FAQS): ?>
        <script type="text/javascript" src=<?=Route::getFaqsScript(); ?>></script>
      <?php endif ?>
</head>
