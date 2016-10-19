<?php

include './libs/usuario.php';
include './db/DB_JSON.php';
include './config/config.php';

$nombre   = $_POST['nombre'];
$email    = $_POST['email'];
$password = $_POST['password'];

$jsonFile = $config['db']['json']['file_path'];
$offset   = $config['db']['json']['offset'];

$usuario  = new Usuario($nombre, null, $email, null, $password);
$jsonDB   = new DB_JSON($jsonFile, $offset);

$jsonDB->submitObject($usuario);

header('Location: index.php');
