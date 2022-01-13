<?php

namespace CRUD\Helper;

use mysql_xdevapi\Exception;
use mysqli_result;

class DBConnector
{
    private $dbname;
    private $server;
    private $password;
    private $username;
    /** @var \mysqli $connection */
    private $connection;

    /**
     * @param $dbname
     * @param $server
     * @param $password
     * @param $username
     */
    public function __construct($dbname, $server, $username, $password)
    {
        $this->dbname   = $dbname;
        $this->server   = $server;
        $this->password = $password;
        $this->username = $username;
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {
        $this->connection = mysqli_connect($this->server, $this->username, $this->password, $this->dbname);
        if (!$this->connection) {
            throw new Exception(mysqli_connect_error());
        }
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function disconnet() : void
    {
        $this->connection->close();
    }

    /**
     * @param string $query
     * @return bool|mysqli_result
     */
    public function execQuery(string $query)
    {
        try {
            return $this->connection->query($query);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {

    }
}