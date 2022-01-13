<?php

namespace CRUD\Controller;

use CRUD\Helper\PersonHelper;
use CRUD\Model\Actions;
use CRUD\Model\Person;

class PersonController
{
    /** @var PersonHelper $helper */
    private $helper;

    /**
     * @param PersonHelper $helper
     */
    public function __construct()
    {
        $this->helper = new PersonHelper();
    }

    public function switcher($uri,$request)
    {
        switch ($uri)
        {
            case Actions::CREATE:
                $this->createAction($request);
                break;
            case Actions::UPDATE:
                $this->updateAction($request);
                break;
            case Actions::READ:
                $this->readAction($request);
                break;
            case Actions::READ_ALL:
                $this->readAllAction($request);
                break;
            case Actions::DELETE:
                $this->deleteAction($request);
                break;
            default:
                break;
        }
    }

    public function createAction($request)
    {
        $person = new Person();
        $person->setFirstName($request['firstName']);
        $person->setLastName($request['lastName']);
        $person->setUsername($request['username']);
        $this->helper->insert($person);
    }

    public function updateAction($request)
    {
        $person = new Person();
        $person->setFirstName($request['firstName']);
        $person->setLastName($request['lastName']);
        $person->setUsername($request['username']);
        $this->helper->update($person);
    }

    public function readAction($request)
    {
        $this->helper->fetch($request['id']);
    }
    public function readAllAction($request)
    {
        $this->helper->fetchAll();
    }

    public function deleteAction($request)
    {
        $this->helper->delete($request['username']);
    }

}