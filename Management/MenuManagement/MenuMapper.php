<?php

require_once('F:\OSPanel\domains\projekt\Classes\Database.php');
require_once('F:\OSPanel\domains\projekt\Management\FoodManagement\Food.php');
require_once('F:\OSPanel\domains\projekt\Management\MenuManagement\Menu.php');

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
            'preis',
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
                $menu['preis'],
            );
        }
        $menuKarte = new Menu($menuArray, $supplierId);

        return $menuKarte;
    }
}