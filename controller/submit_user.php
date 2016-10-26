<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['model']['URL']['usuario'];
include $config['controller']['URL']['repositorioJSON'];
include $config['controller']['URL']['signUpValidator'];


$filePath = $config['db']['json']['file_path'];
$offset = $config['db']['json']['offset'];

$jsonDB = new RepositorioJSON($filePath, $offset);

$id = $jsonDB->getRepositorioUsuarios()->getUsersCount() + 1;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

$usuario = new Usuario($id, $nombre, null, $email, null, $password, $passwordConfirm);
$validator = new SignUpValidator($validationConfig);
$validator->validate($usuario, $jsonDB->getRepositorioUsuarios());
    if($validator->isUserValid() === '' || !$validator->isUserValid())
      if($validator->isEmailValid() === '' || !$validator->isUserValid())
        if($validator->isPasswordValid() === '' || !$validator->isPasswordValid())
          if($validator->isPasswordConfirmValid() === '' || !$validator->isPasswordConfirmValid()){
              $usuario->setPassword(password_hash($password, PASSWORD_DEFAULT));
              $jsonDB->getRepositorioUsuarios()->submitUser($usuario);
          }

  header('location: ' . $config['view']['URI']['index'] . "?id=signup&nameError=" . $validator->isUserValid() . "&emailError=".$validator->isEmailValid() . "&passError=".$validator->isPasswordValid() ."&passConfirmError=".$validator->isPasswordConfirmValid());
