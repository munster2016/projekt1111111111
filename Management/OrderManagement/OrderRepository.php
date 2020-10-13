<?php

require_once('F:\OSPanel\domains\projekt\Management\OrderManagement/OrderMapper.php');
require_once('F:\OSPanel\domains\projekt\Management\OrderManagement/SingleOrder.php');


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
        $storeOrder = $this->_mapper->storeOrder($order);

        return $storeOrder;

    }

    public function getFullOrder():FullOrder
    {
        $fullOrder = $this->_mapper->getFullOrder();

        return $fullOrder;
    }
}