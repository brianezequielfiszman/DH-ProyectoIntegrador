<?php
namespace SQL;
use PDO;
use Configuration\Config;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';


class SQLServer extends PDO
{
    private $dbName;
    public function __construct() {
        parent::__construct(Config::getSQLDriver().':host='.Config::getSQLHost().';charset=utf8mb4;port:'.Config::getSQLPort(), Config::getSQLUserName(), Config::getSQLPassword());
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setDBName(Config::getSQLDataBase());
        $this->initiateDatabase();
    }

    public  function getDBName()       { return $this->dbName;    }
    private function setDBName($dbName){ $this->dbName = $dbName; }

    private function initiateDatabase(){
      $this->isDatabaseCreated() ? $this->UseDatabase($this->getDBName()) : $this->createDatabase() & $this->UseDatabase($this->getDBName());
    }

    private function createDatabase(){
      $this->exec("CREATE DATABASE ".$this->getDBName().";");
    }

    private function UseDatabase($dbName){
      $this->exec("USE ".$this->getDBName().";");
    }

    private function isDatabaseCreated(){
      $databases = $this->query("SHOW DATABASES")->fetchAll();

      foreach ($databases as $database)
        if($database['Database'] === $this->getDBName())
          return true;

        return false;
    }

    public function isTableCreated($tableName){
      $tables = $this->query("SHOW TABLES")->fetchAll();

      foreach ($tables as $key => $table)
        if($table[0] === $tableName)
          return true;

      return false;
    }

    public function createTable($table, $tableProperties){
      $this->exec("CREATE TABLE ".$table.$tableProperties.";");
    }

    public function getFields($table){
      $query = $this->query("SHOW COLUMNS FROM ".$table.";")->fetchAll(PDO::FETCH_COLUMN);
      foreach ($query as $value)
        $key[] = $value;

      return $key;
    }

    public function insert($table, $fields, $params){
      foreach ($fields as $field)
        $key[] = ':'.$field;

      $sql = $this->prepare("INSERT INTO ".$table." (".implode(',', $fields).")"." "."VALUES(".implode(', ', $key).")".";");

      foreach ($params as  $value)
          $arr[] = $value;

      for ($i=0; $i < count($key) ; $i++)
        $sql->bindParam($key[$i], $arr[$i]);

      $sql->execute();
    }

    public function select($query, ...$params){
      $statement = $this->database->prepare($query);

      foreach ($params as $key => $param)
        $statement->bindValue($key + 1, $param);

      $statement->execute();
      return $statement;
    }
}
