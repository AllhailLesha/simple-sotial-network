<?php

namespace App\Application\Database;

use PDO;

interface ConnectionInterface
{
    public function connect(): PDO;
}
