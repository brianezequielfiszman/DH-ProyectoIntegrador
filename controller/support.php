<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
include($config['controller']['URL']['auth']);
include($config['controller']['URL']['repositorioJSON']);

$tipoRepositorio = "json";

switch($tipoRepositorio) {
	case "json":
		$repositorio = new RepositorioJSON($config);
		break;
}

$auth = Auth::getInstance($repositorio->getRepositorioUsuarios());
