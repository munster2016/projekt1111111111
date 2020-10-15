<?php

//require_once('F:\OSPanel\domains\projekt\Management\UserManagement/UserMapper.php');

require_once('UserMapper.php');



class UserRepository
{
    /**
     * @var UserMapper
     */
    private $_mapper;

    public function __construct(UserMapper $mapper)
    {
        $this->_mapper =  $mapper;
    }

    /**
     * @param $email
     * @return User|null
     */
    public function getByName($name): ?User
    {

        $user = $this->_mapper->getByName($name);

        if (empty($user)) {
            return null;
        }

        return $user;
    }

    /**
     * @param $userId
     * @return User|null
     */
    public function getById($userId): ?User
    {

        $user = $this->_mapper->getById($userId);

        if (empty($user)) {
            return null;
        }

        return $user;
    }
}