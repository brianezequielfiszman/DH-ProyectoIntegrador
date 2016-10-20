<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['model']['URL']['usuario'];
include $config['controller']['URL']['repositorioUsuariosJSON'];

$jsonFile = $config['db']['json']['file_path'];
$offset = $config['db']['json']['offset'];

$jsonDB = new RepositorioUsuariosJSON($jsonFile, $offset);

$id = $jsonDB->getUsersCount() + 1;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

$usuario = new Usuario($id, $nombre, null, $email, null, $password);

$jsonDB->submitUser($usuario);
