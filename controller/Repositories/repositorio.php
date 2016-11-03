<?php
use Configuration\Config;

include Config::getRepositorioGenerico();

abstract class Repositorio
{
    protected $repositorioUsuarios;
}
