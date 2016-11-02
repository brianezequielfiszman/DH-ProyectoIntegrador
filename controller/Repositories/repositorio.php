<?php
use Configuration\Config;

include Config::$controller['URL']['repositorioGenerico'];

abstract class Repositorio
{
    protected $repositorioUsuarios;
}
