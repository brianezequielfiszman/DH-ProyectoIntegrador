<?php

use Configuration\Config;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
include Config::getAuth();
include Config::getRepositorioJSON();

$tipoRepositorio = 'json';

switch ($tipoRepositorio) {
    case 'json':
        $repositorio = new RepositorioJSON();
        break;
}

$auth = Auth::getInstance($repositorio->getRepositorioUsuarios());
