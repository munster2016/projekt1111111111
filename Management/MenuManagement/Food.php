<?php


class Food
{

    /**
     * @var string
     */
    private $foodId;
    /**
     * @var string
     */
    private $lieferId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    // private $menuId;

    /**
     * Food constructor.
     * @param string $lieferId
     * @param string $name
     * @param float $price
     * @param string $foodId
     * @param string menuId
     */
    public function __construct(string $lieferId, string $foodId, string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
        $this->lieferId = $lieferId;
        $this->foodId = $foodId;
    }

    /**
     * @return string
     */
    public function getFoodId(): string
    {
        return $this->foodId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

}