<?php


class Supplier
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $opentime;

    /**
     * @var string
     */
    private $isActive;

    /**
     * Supplier constructor.
     * @param string $name
     * @param string $address
     * @param string $phone
     * @param mixed $email
     * @param string $opentime
     */
    public function __construct(int $id, string $name, string $address, string $phone, string $email, string $opentime, string $isActive)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->opentime = $opentime;
        $this->isActive = $isActive;
    }
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getOpentime(): string
    {
        return $this->opentime;
    }

    /**
     * @return string
     */
    public function getIsActive(): string
    {
        return $this->isActive;
    }

}