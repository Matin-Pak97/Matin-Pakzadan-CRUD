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
        $this->connection = new DBConnector("web_person", "127.0.0.1", "admin", "MaT_PaK1997");
    }

    /**
     * @param Person $person
     */
    public function insert($person)
    {
        $firstname = $person->getFirstName();
        $lastname = $person->getLastName();
        $username = $person->getUsername();
        $sql = "INSERT INTO person (first_name, last_name, user_name) VALUES ('$firstname', '$lastname', '$username')";
        $this->connection->connect();
        if($this->connection->execQuery($sql)) {
            echo "Person created successfully.";
        } else {
            echo "Something went wrong!!!!";
        }
        $this->connection->disconnet();
    }

    public function fetch(int $id)
    {
        $sql = "SELECT * FROM person WHERE id = " . $id;
        $this->connection->connect();
        $data = $this->connection->execQuery($sql);
        if(!$data && is_null($data)) {
            echo "There is no record by this " . $id;
        } else {
            echo json_encode($data->fetch_assoc());
        }
        $this->connection->disconnet();
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM person";
        $this->connection->connect();
        $data = $this->connection->execQuery($sql);
        if(!$data && is_null($data)) {
            echo "There is no record.";
        } else {
            echo json_encode($data->fetch_assoc());
        }
        $this->connection->disconnet();
    }

    public function update($person)
    {
        $firstname = $person->getFirstName();
        $lastname = $person->getLastName();
        $username = $person->getUsername();
        $sql = "UPDATE person SET first_name = '$firstname', last_name = '$lastname' WHERE user_name = '$username'";
        $this->connection->connect();
        if($this->connection->execQuery($sql)) {
            echo "Person updated successfully.";
        } else {
            echo "Something went wrong!!!!";
        }
        $this->connection->disconnet();
    }

    public function delete(?String $username)
    {
        $sql = "DELETE FROM person WHERE user_name = '$username'";
        $this->connection->connect();
        if($this->connection->execQuery($sql)) {
            echo "Person deleted successfully";
        } else {
            echo "Something went wrong!!!!";
        }
        $this->connection->disconnet();
    }

}