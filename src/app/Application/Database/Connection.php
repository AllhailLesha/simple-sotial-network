<?php

namespace App\Application\Database;

use App\Application\Config\Config;
use PDO;

class Connection implements ConnectionInterface
{
    private string $driver;

    private string $host;

    private int $port;

    private string $dbName;

    private string $user;

    private string $password;

    public function __construct()
    {
        $this->driver = Config::get('database.driver');
        $this->host = Config::get('database.host');
        $this->port = Config::get('database.port');
        $this->dbName = Config::get('database.dbName');
        $this->user = Config::get('database.user');
        $this->password = Config::get('database.password');
    }

    public function connect(): PDO
    {
        return new PDO(
            "{$this->driver}:host={$this->host};port={$this->port};dbname={$this->dbName}",
            $this->user,
            $this->password
        );
    }
}
