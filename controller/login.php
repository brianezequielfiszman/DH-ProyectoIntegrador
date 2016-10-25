<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['model']['URL']['usuario'];
include $config['controller']['URL']['repositorioJSON'];
include $config['controller']['URL']['userValidator'];

$logeado = false;

$filePath = $config['db']['json']['file_path'];
$offset = $config['db']['json']['offset'];

$jsonDB = new RepositorioJSON($filePath, $offset);

$id = $jsonDB->getRepositorioUsuarios()->getUsersCount() + 1;
$nombre = $_POST['nombre'];
$password = $_POST['password'];

$usuario = new Usuario(null, $nombre, null, null, null, $password, null);
$validator = new UserValidator($validationConfig);
$validator->validate($usuario);

if($jsonDB->getRepositorioUsuarios()->fetchUserByEmail($email))
  $validator->setEmailValid('Este correo ya esta registrado');

  if($jsonDB->getRepositorioUsuarios()->fetchUserByName($nombre))
    $validator->setUserValid('Este usuario ya esta registrado');

    if($validator->isUserValid() === '' && $validator->isEmailValid() === '' && $validator->isPasswordValid() === '' &&  $validator->isPasswordConfirmValid() === ''){
      $usuario->setPassword(password_hash($password, PASSWORD_DEFAULT));
      $jsonDB->getRepositorioUsuarios()->submitUser($usuario);
    }



header('location: ' . $config['view']['URI']['index'] . "?id=signup&nameError=" . $validator->isUserValid() . "&emailError=".$validator->isEmailValid() . "&passError=".$validator->isPasswordValid() ."&passConfirmError=".$validator->isPasswordConfirmValid());
