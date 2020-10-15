<?php

//require_once('F:\OSPanel\domains\projekt\Management\UserManagement/User.php');

require_once('User.php');

class UserMapper
{

    /**
     * @var Database
     */
    private $_database;


    function __construct(Database $db)
    {
        $this->_database = $db;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getByName($name)
    {
        $select = ['userId', 'password', 'name'];
        $where = [
            ['name', '=', "'$name'"]
        ];

        $resultUser = $this->_database->fetch($select, 'users', $where);

        $users = [];

        foreach ($resultUser as $userData) {
            $users [] = new User($userData['userId'], $userData['name'], $userData['password']);
        }

        return $users[0];

    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getById($userId)
    {
        $select = ['userId', 'password', 'name'];
        $where = [
            ['userId', '=', "'$userId'"]];

        $resultUser = $this->_database->fetch($select, 'users', $where);

        $users = [];

        foreach ($resultUser as $userData)
        {
            $users [] = new User($userData['userId'], $userData['name'], $userData['password']);
        }

        return $users[0];

    }

}