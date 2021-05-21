<?php


namespace App\Domain;


class Tweet
{
    private $id;
    private $username;
    private $text;

    public function __construct(int $id, string $username, string $text)
    {
        $this->id = $id;
        $this->username = $username;
        $this->text = $text;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
