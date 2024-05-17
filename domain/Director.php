<?php

class Director
{

    private string $name;
    private string $surname;
    private int $accolades;
    private string $birthdate;
    private string $has_oscar;

    /**
     * @param string $name
     * @param string $surname
     * @param int $accolades
     * @param string $birthdate
     * @param string $has_oscar
     */
    public function __construct(string $name, string $surname, int $accolades, string $birthdate, string $has_oscar)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->accolades = $accolades;
        $this->birthdate = $birthdate;
        $this->has_oscar = $has_oscar;
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

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getAccolades(): int
    {
        return $this->accolades;
    }

    public function setAccolades(int $accolades): void
    {
        $this->accolades = $accolades;
    }

    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function getHasOscar(): string
    {
        return $this->has_oscar;
    }

    public function setHasOscar(string $has_oscar): void
    {
        $this->has_oscar = $has_oscar;
    }

}