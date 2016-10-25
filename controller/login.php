<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['model']['URL']['usuario'];
include $config['controller']['URL']['repositorioJSON'];
include $config['controller']['URL']['userValidator'];


$filePath = $config['db']['json']['file_path'];
$offset = $config['db']['json']['offset'];

$jsonDB = new RepositorioJSON($filePath, $offset);

$id = $jsonDB->getRepositorioUsuarios()->getUsersCount() + 1;
$nombre = $_POST['nombre'];
$password = $_POST['password'];

$usuario = new Usuario(null, $nombre, null, null, null, $password, null);
$validator = new UserValidator($validationConfig);
$validator->validate($usuario);

    if($validator->isUserValid() === '' && $validator->isPasswordValid() === ''){
      $usuario->setPassword(password_hash($password, PASSWORD_DEFAULT));

    }



  header('location: ' . $config['view']['URI']['index'] . "?id=login&nameError=" . $validator->isUserValid() . "&passError=".$validator->isPasswordValid());
