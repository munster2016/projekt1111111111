<?php


class FoodRepository
{
    /**
     * @var
     */
    private $_mapper;

    /**
     * FoodRepository constructor.
     * @param $_mapper
     */
    public function __construct(FoodMapper $_mapper)
    {
        $this->_mapper = $_mapper;
    }

    /**
     * @param $id
     * @return Food
     */
    public function getFoodNameAndPriceById($id):Food
    {
        $food = $this->_mapper->getFoodNameAndPriceById($id);

        return $food;
    }
}