<?php

namespace App\Application\Database;

use App\Application\Config\Config;

class Connection implements ConnectionInterface
{

    private string $host;
    private string $dbName;
    private string $userName;
    private string $password;

    public function __construct()
    {
        $this->setHost(Config::get('database.host'));
        $this->setDbName(Config::get('database.dbName'));;
        $this->setUserName(Config::get('database.userName'));
        $this->setPassword(Config::get('database.password'));
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @param string $dbName
     */
    public function setDbName(string $dbName): void
    {
        $this->dbName = $dbName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function connect(): \PDO
    {
        return new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->userName, $this->password);
    }
}