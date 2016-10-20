<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['model']['URL']['usuario'];
include $config['controller']['URL']['repositorioJSON'];

$jsonFile = $config['db']['json']['file_path'];
$offset = $config['db']['json']['offset'];

$jsonDB = new RepositorioJSON($config);

$id = $jsonDB->repositorioUsuarios->getUsersCount() + 1;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

$usuario = new Usuario($id, $nombre, null, $email, null, $password);

$jsonDB->repositorioUsuarios->submitUser($usuario);
