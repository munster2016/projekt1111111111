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
    public function getFullOrderId(): string
    {
        return $this->_fullOrderId;
    }

    /**
     * @param string $fullOrderId
     */
    public function setFullOrderId(string $fullOrderId): void
    {
        $this->_fullOrderId = $fullOrderId;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->_date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->_date = $date;
    }

    /**
     * @return SingleOrder[]
     */
    public function getSingleOrders(): array
    {
        return $this->_singleOrders;
    }

    /**
     * @param SingleOrder[] $singleOrders
     */
    public function setSingleOrders(array $singleOrders): void
    {
        $this->_singleOrders = $singleOrders;
    }



}