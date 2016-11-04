<?php
namespace SQL;
use Configuration\Config;
use RepositorioGenerico;
use SQL\SQLServer;

require_once $_SERVER['DOCUMENT_ROOT'].'/controller/Configuration/Config.php';
require_once Config::getRepositorioGenerico();

class RepositorioGenericoSQL extends RepositorioGenerico
{
    protected $database;
    protected $table;
    protected $tableProperties;
    protected $fields;

    public function __construct(SQLServer $database, $table, $tableProperties)
    {
        $this->database        = $database;
        $this->table           = $table;
        $this->tableProperties = $tableProperties;

        $this->database->isTableCreated($this->table) ?: $this->database->createTable($this->table, $this->tableProperties);
        $this->fields = $this->database->getFields($this->table);
    }

    protected function submitObject($arrObj){
        $this->database->insert($this->table, $this->fields, $arrObj);
    }

    protected function fetchObject(){
    }
}
