<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

include $config['model']['URL']['usuario'];
include $config['controller']['URL']['repositorioJSON'];
include $config['controller']['URL']['signUpValidator'];

const NO_ERROR = '';

$jsonDB = new RepositorioJSON();

$id = $jsonDB->getRepositorioUsuarios()->getUsersCount() + 1;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

$usuario = new Usuario($id, $nombre, null, $email, null, $password, $passwordConfirm);
$validator = new SignUpValidator();
$validator->validate($usuario, $jsonDB->getRepositorioUsuarios());
    if($validator->isUserValid() === NO_ERROR)
      if($validator->isEmailValid() === NO_ERROR)
        if($validator->isPasswordValid() === NO_ERROR)
          if($validator->isPasswordConfirmValid() === NO_ERROR){
              $usuario->setPassword(password_hash($password, PASSWORD_DEFAULT));
              $jsonDB->getRepositorioUsuarios()->submitUser($usuario);
          }
header('location: ' . $config['view']['URI']['index'] . "?id=signup&nameError=" . $validator->isUserValid() . "&emailError=".$validator->isEmailValid() . "&passError=".$validator->isPasswordValid() ."&passConfirmError=".$validator->isPasswordConfirmValid());
