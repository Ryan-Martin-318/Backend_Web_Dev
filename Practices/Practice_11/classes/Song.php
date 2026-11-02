<?php

class Song
{
    public string $title;
    public string $artist;
    public bool $isFavorite;

    public function __construct(string $title, string $artist, bool $isFavorite)
    {
        $this->title = $title;
        $this->artist = $artist;
        $this->isFavorite = $isFavorite;
    }
}
