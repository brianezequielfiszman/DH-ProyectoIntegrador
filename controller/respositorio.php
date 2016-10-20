<?php

abstract class Repositorio
{
    protected $repositorioUsuarios;

    public function __construct($repositorioUsuarios)
    {
        $this->repositorioUsuarios = $repositorioUsuarios;
    }
}
