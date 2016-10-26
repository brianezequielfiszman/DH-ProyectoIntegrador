<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
include($config['controller']['URL']['auth']);
include($config['controller']['URL']['repositorioJSON']);

$tipoRepositorio = "json";

$filePath = $config['db']['json']['file_path'];
$offset = $config['db']['json']['offset'];

switch($tipoRepositorio) {
	case "json":
		$repo = new RepositorioJSON($filePath, $offset);
		break;
}

$auth = Auth::getInstance($repo->getRepositorioUsuarios());
