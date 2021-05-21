<?php


namespace App\Application\UseCase\SearchTweets;


class SearchTweetsByUsernameRequest
{
    private string $userName;

    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }
}
