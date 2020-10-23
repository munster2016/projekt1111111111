<?php

use PHPUnit\Framework\TestCase;

require_once "../Classes/Database.php";

class DatabaseTest extends TestCase
{
    private $_db;

    protected function setUp():void
    {
        $this->_db = new Database();
    }

    protected function tearDown()
    {

    }


    public function fetchProvider()
    {
        return [
            'andrii' => [
            ['name', 'password'],
            [['userId', '=', '1']],
            [['name' => 'admin', 'password' => '11']]

                        ]
            ];
    }

    /**
     * @dataProvider fetchProvider
     * @param $valueArray
     * @param $whereArray
     * @param $exp
     */
    public function testFetch($select, $whereArray, $exp)
    {
        $result = $this->_db->fetch($select, 'users', $whereArray);
        $this->assertEquals($exp, $result);
    }

    public function updateProvider()
    {
        return [
            'andrii2' => [
                'name' => 'admin', 'password' => '11'
            ],
            [
                'userId' => '1'
            ],
            [
                ['name', '=', 'admin']
            ]
        ];
    }

    /**
     * @dataProvider updateProvider
     * @param $valueArray
     * @param $whereArray
     * @param $exp
     */
    public function testUpdate($valueArray, $whereArray, $exp)
    {
        $this->_db->update('users', $whereArray, $exp);
        $result = $this->_db->fetch(array_keys($valueArray), 'users', $exp);
        $this->assertEquals(array($valueArray), $exp);
    }
}
