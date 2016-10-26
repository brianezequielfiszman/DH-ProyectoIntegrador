<?php

  interface RepositorioUsuarios
  {
      public function submitUser(Usuario $usuario);
      public function fetchUsers();

      public function fetchUserByEmail($email);
      public function fetchUserByName($name);
  }
