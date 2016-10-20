<?php

  interface RepositorioUsuarios
  {
      public function submitUser(Usuario $usuario);
      public function getUsers();
  }
