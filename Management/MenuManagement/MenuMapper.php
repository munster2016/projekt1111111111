<?php

//require_once('F:\OSPanel\domains\projekt\Classes\Database.php');
//require_once('F:\OSPanel\domains\projekt\Management\FoodManagement\Food.php');
//require_once('F:\OSPanel\domains\projekt\Management\MenuManagement\Menu.php');

//require_once('../Classes/Database.php');
require_once('Food.php');
require_once('Menu.php');

class MenuMapper
{

    private $_database;


    /**
     * menuMapper constructor.
     * @param Database $db
     */
    function __construct(Database $db)
    {
        $this->_database = $db;
    }



    /**
     * @param $supplierId
     * return Menu
     */
    public function getMenuBySupplierId($supplierId) :Menu
    {
        $select = [
            'foodId',
            'name',
            'price',
            'supplierId'
        ];
        $where = [
            ['supplierId', '=', "'$supplierId'"]
        ];

        $menuResult = $this->_database->fetch($select, 'foods', $where);

        $menuArray = [];

        foreach ($menuResult as $menu)
        {
            $menuArray [] = new Food(
                $menu['supplierId'],
                $menu['foodId'],
                $menu['name'],
                $menu['price']
            );
        }
        $menuKarte = new Menu($menuArray, $supplierId);

        return $menuKarte;
    }
}