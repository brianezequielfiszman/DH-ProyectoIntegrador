<?php
namespace SQL;
use SQL\SQLServer;
use Configuration\Config;
use RepositorioUsuarios;
use Usuario;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once Config::getRepositorioGenericoSQL();
require_once Config::getRepositorioUsuarios();

class RepositorioUsuariosSQL extends RepositorioGenericoSQL implements RepositorioUsuarios
{
    public function __construct(SQLServer $database, $table, $tableProperties) {
        parent::__construct($database, $table, $tableProperties);
    }

    public function submitUser(Usuario $usuario){
        $userArray = json_decode(json_encode($usuario), true);

        parent::submitObject($userArray);
    }

    public function fetchUsers(){
        return $this->database->select("SELECT * FROM usuarios", []);
    }

    public function getUsersCount(){
        $query = $this->database->query("SELECT * FROM usuarios");
        $total = count($query->fetchAll(\PDO::FETCH_ASSOC));
        return $total;
    }

    public function fetchUserByEmail($email){
        $query = $this->database->prepare("SELECT * FROM usuarios WHERE email = :email");
        $query->bindValue(":email", $email, \PDO::PARAM_STR);
        $query->execute();
        $usuario = $query->fetch();
        return $usuario;
    }
    public function fetchUserByName($name){
      $query = $this->database->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
      $query->bindValue(":nombre", $name, \PDO::PARAM_STR);
      $query->execute();
      $usuario = $query->fetch();
      return $usuario;
    }
}
