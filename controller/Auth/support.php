<?php

use Configuration\Config;
use SQL\RepositorioSQL;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
include Config::getAuth();
include Config::getRepositorioJSON();
include Config::getRepositorioSQL();

$tipoRepositorio = Config::SQL;

switch ($tipoRepositorio) {
    case Config::JSON:
        $repositorio = new RepositorioJSON();
        break;
    case Config::SQL:
        $repositorio = new RepositorioSQL();
        break;
}

$auth = Auth::getInstance($repositorio->getRepositorioUsuarios());
