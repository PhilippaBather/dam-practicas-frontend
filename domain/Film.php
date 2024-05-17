<?php

class Film
{

    private string $title;
    private string $genre;
    private int $revenue;
    private string $release;

    private bool $family_friendly;

    /**
     * @param string $title
     * @param string $genre
     * @param int $revenue
     * @param string $release
     * @param bool $family_friendly
     */
    public function __construct(string $title, string $genre, int $revenue, string $release, bool $family_friendly)
    {
        $this->title = $title;
        $this->genre = $genre;
        $this->revenue = $revenue;
        $this->release = $release;
        $this->family_friendly = $family_friendly;
    }

    // getters and setters

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getRevenue(): int
    {
        return $this->revenue;
    }

    public function setRevenue(int $revenue): void
    {
        $this->revenue = $revenue;
    }

    public function getRelease(): string
    {
        return $this->release;
    }

    public function setRelease(string $release): void
    {
        $this->release = $release;
    }

    public function isFamilyFriendly(): bool
    {
        return $this->family_friendly;
    }

    public function setFamilyFriendly(bool $family_friendly): void
    {
        $this->family_friendly = $family_friendly;
    }

}