<?php

class Film
{

    private string $title;
    private string $genre;
    private int $revenue;
    private string $release_date;

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
        $this->release_date = $release;
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

    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    public function setReleaseDate(string $release_date): void
    {
        $this->release_date = $release_date;
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