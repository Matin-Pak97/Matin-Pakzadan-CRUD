<?php

namespace CRUD\Helper;

use CRUD\Model\Person;
use http\Exception;

class PersonHelper
{
    /** @var DBConnector $connection */
    private $connection;

    public function __construct()
    {
        $this->connection = new DBConnector("Web_Person", "localhost", "root", "MaT_PaK1997");
    }

    /**
     * @param Person $person
     */
    public function insert($person)
    {
        $sql = "INSERT INTO person (first_name, last_name, user_name) VALUES (" . $person->getFirstName() . "," . $person->getLastName() . "," . $person->getUsername() . ")";
        $this->connection->connect();
        if($this->connection->execQuery($sql)) {
            echo "Query Done";
        } else {
            echo "Query Failed";
        }
    }

    public function fetch(int $id)
    {

    }

    public function fetchAll()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}