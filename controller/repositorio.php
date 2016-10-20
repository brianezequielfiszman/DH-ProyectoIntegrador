<?php

$config = include $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
include $config['controller']['URL']['repositorioGenerico'];

abstract class Repositorio
{
    protected $repositorioUsuarios;
}
