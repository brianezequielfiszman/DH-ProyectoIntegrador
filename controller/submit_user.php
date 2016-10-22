<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
$validationConfig = include $config['controller']['URL']['validationConfig'];
include $config['model']['URL']['usuario'];
include $config['controller']['URL']['repositorioJSON'];
include $config['controller']['URL']['userValidator'];

$filePath = $config['db']['json']['file_path'];
$offset = $config['db']['json']['offset'];

$jsonDB = new RepositorioJSON($filePath, $offset);

$id = $jsonDB->getRepositorioUsuarios()->getUsersCount() + 1;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

$usuario = new Usuario($id, $nombre, null, $email, null, $password, $passwordConfirm);
$validator = new UserValidator($validationConfig);
$validator->validateUserExistance($jsonDB->getRepositorioUsuarios(), $usuario);
$jsonDB->getRepositorioUsuarios()->submitUser($usuario);

// header('location: ' . $config['view']['URI']['index']);
