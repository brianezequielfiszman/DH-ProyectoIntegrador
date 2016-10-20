<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['model']['URL']['usuario'];
include $config['controller']['URL']['repositorioJSON'];

$jsonDB = new RepositorioJSON($config);

$id = $jsonDB->repositorioUsuarios->getUsersCount() + 1;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

$usuario = new Usuario($id, $nombre, null, $email, null, $password);

$jsonDB->repositorioUsuarios->submitUser($usuario);

header('location: ' . $config['view']['URI']['index']);
