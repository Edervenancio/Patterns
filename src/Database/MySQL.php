<?php

namespace Source\Database;

use \PDO;
use \PDOException;

class MySQL implements DatabaseInterface {

    public function connect() {
        $dbHost = 'localhost';
        $dbUser = 'root';
        $dbName = 'patterns';
        $dbPass = '';
        $this->connection = null;

        if ($this->connection === null) {
            try {
                $this->connection = new PDO(
                    "mysql:host=" . $dbHost . ";dbname=" . $dbName . ";",
                    $dbUser,
                    $dbPass,
                );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connection;
            } catch (PDOException $e) {
                return $e;
            }
        } else {
            return $this->connection;
        }
    }
}
