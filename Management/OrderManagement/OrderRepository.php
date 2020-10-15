<?php

//require_once('F:\OSPanel\domains\projekt\Management\OrderManagement/OrderMapper.php');
//require_once('F:\OSPanel\domains\projekt\Management\OrderManagement/SingleOrder.php');

require_once('OrderMapper.php');
require_once('SingleOrder.php');

class OrderRepository
{
    /**
     * @var OrderMapper
     */
    private $_mapper;

    public function __construct(OrderMapper $mapper)
    {
        $this->_mapper = $mapper;
    }

    /**
     * store order from $_POST
     */
    public function storeOrder(SingleOrder $order)
    {
         $this->_mapper->storeOrder($order);



    }

    public function getFullOrder():FullOrder
    {
        $fullOrder = $this->_mapper->getFullOrder();

        return $fullOrder;
    }
}