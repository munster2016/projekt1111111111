<?php


class FullOrder
{
    /**
     * @var string
     */
    private $_fullOrderId;


    /**
     * @var string
     */
    private $_date;

    /**
     * @var SingleOrder[]
     */
    private $_singleOrders;


    public function __construct(string $fullOrderId, string $date, array $singleOrders)
    {
        $this->_fullOrderId = $fullOrderId;
        $this->_date = $date;
        $this->_singleOrders = $singleOrders;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->_date;
    }

    /**
     * @return SingleOrder[]
     */
    public function getSingleOrders(): array
    {
        return $this->_singleOrders;
    }

}