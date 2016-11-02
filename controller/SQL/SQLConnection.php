<?php

class SQLConnection extends PDO
{
    public function __construct($driver, $host, $user, $password, $dbname, $port = 3306)
    {
        parent::__construct($driver.':host='.$host.';dbname='.$dbname.';charset=utf8mb4;port:'.$port, $user, $password);
    }
}
//
// $sql = new SQLConnection('mysql', 'localhost', 'root', 'as time goes by', 'test');
// $queryGen = $sql->prepare('SELECT * FROM pelicula');
// $queryGen->execute();
// $e = $queryGen->fetchAll(PDO::FETCH_ASSOC);
// print_r($e);
