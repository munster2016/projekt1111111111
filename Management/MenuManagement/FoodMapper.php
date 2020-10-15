<?php

//require_once('F:\OSPanel\domains\projekt\Management\MenuManagement\FoodMapper.php');

require_once 'Food.php';

class FoodMapper
{
    /**
     * @var
     */
    private $_db;

    /**
     * FoodRepository constructor.
     * @param $_mapper
     */
    public function __construct( Database $db)
    {
        $this->_db = $db;
    }

    /**
     * @param $id
     * @return Food
     */
    public function getFoodNameAndPriceById($id):Food
    {
        $foodResult = $this->_db->fetch(
            ['name', 'price', 'supplierId', 'foodId'],
            'foods',
            [['foodId', '=', $id]]
        );

        $food = [];

        foreach ($foodResult as $item)
        {
            $food[] = new Food($item['supplierId'], $item['foodId'], $item['name'], $item['price']);
        }


        return $food[0];
    }
}