<?php

class ProductionCompany
{

    private string $name;
    private string $location;
    private int $revenue;
    private string $established;
    private bool $is_active;

    /**
     * @param string $name
     * @param string $location
     * @param int $revenue
     * @param string $established
     * @param bool $is_active
     */
    public function __construct(string $name, string $location, int $revenue, string $established, bool $is_active)
    {
        $this->name = $name;
        $this->location = $location;
        $this->revenue = $revenue;
        $this->established = $established;
        $this->is_active = $is_active;
    }


    // getters and setters

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getRevenue(): int
    {
        return $this->revenue;
    }

    public function setRevenue(int $revenue): void
    {
        $this->revenue = $revenue;
    }

    public function getEstablished(): string
    {
        return $this->established;
    }

    public function setEstablished(string $established): void
    {
        $this->established = $established;
    }

    public function isIsActive(): bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): void
    {
        $this->is_active = $is_active;
    }

}