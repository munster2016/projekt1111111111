<?php

//require_once('F:\OSPanel\domains\projekt\Management\UserManagement/UserRepository.php');
//require_once('F:\OSPanel\domains\projekt\Management\UserManagement/UserMapper.php');
//require_once('F:\OSPanel\domains\projekt\Management\SupplierManagement/SupplierRepository.php');
//require_once('F:\OSPanel\domains\projekt\Management\SupplierManagement/SupplierMapper.php');
//require_once('F:\OSPanel\domains\projekt\Management\OrderManagement/OrderMapper.php');
//require_once('F:\OSPanel\domains\projekt\Management\OrderManagement/OrderRepository.php');
//require_once('F:\OSPanel\domains\projekt\Classes\Database.php');
//require_once('F:\OSPanel\domains\projekt\Management\MenuManagement\MenuRepository.php');
//require_once('F:\OSPanel\domains\projekt\Management\MenuManagement\MenuMapper.php');
//require_once('F:\OSPanel\domains\projekt\Management\MenuManagement\FoodRepository.php');
//require_once('F:\OSPanel\domains\projekt\Management\MenuManagement\FoodMapper.php');


require_once('../Management/UserManagement/UserRepository.php');
require_once('../Management/UserManagement/UserMapper.php');
require_once('../Management/SupplierManagement/SupplierRepository.php');
require_once('../Management/SupplierManagement/SupplierMapper.php');
require_once('../Management/OrderManagement/OrderMapper.php');
require_once('../Management/OrderManagement/OrderRepository.php');
require_once('../Classes/Database.php');
require_once('../Management/MenuManagement/MenuRepository.php');
require_once('../Management/MenuManagement/MenuMapper.php');
require_once('../Management/MenuManagement/FoodRepository.php');
require_once('../Management/MenuManagement/FoodMapper.php');


class Factory
{
    /**
     * @return UserRepository
     */
    public function createUserRepository(): UserRepository
    {
        return new UserRepository(new UserMapper(new Database()));
    }

    /**
     * @return SupplierRepository
     */
    public function createSupplierRepository() :SupplierRepository
    {
        return new SupplierRepository(new SupplierMapper(new Database()));
    }

    /**
     * @return OrderRepository
     */
    public function createOrderRepository() :OrderRepository
    {
        return new OrderRepository(new OrderMapper(new Database()));
    }

    /**
     * @return menuRepository
     */
    public function createMenuRepository(): MenuRepository
    {
        return new menuRepository(new menuMapper(new Database()));
    }

    /**
     * @return foodRepository
     */
    public function createFoodRepository(): FoodRepository
    {
        return new FoodRepository(new FoodMapper(new Database()));
    }
}