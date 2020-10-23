<?php

use PHPUnit\Framework\TestCase;


require_once "../Management/UserManagement/User.php";

class UserTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        $this->user = new User('', '', '');
        $this->user->setName('admin');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function userProvider()
    {
        return [
            //['adminedgrg'],
           // ['admin2erfgrg'],
            ['admin'],
        ];
    }

    /**
     * @dataProvider userProvider
     */
    public function testGetName($exp)
    {

        $result = $this->user->getName();
        $this->assertEquals($exp, $result);
    }
}