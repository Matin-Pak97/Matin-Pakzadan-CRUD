<?php

namespace CRUD\Helper;

use mysql_xdevapi\Exception;

class DBConnector
{
    /** @var mixed $db */
    private $db;
    private $server;
    private $password;
    private $username;

    /**
     * @param mixed $db
     * @param $server
     * @param $password
     * @param $username
     */
    public function __construct($db, $server, $username, $password)
    {
        $this->db = $db;
        $this->server = $server;
        $this->password = $password;
        $this->username = $username;
    }


    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {
        $connection = mysqli_connect($this->server, $this->username, $this->password, $this->db);
        if (!$connection) {
            throw new Exception(mysqli_connect_error());
        } else {
            echo "OK!";
        }
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query) : bool
    {
        return true;
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