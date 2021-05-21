<?php


namespace App\Application\UseCase\SearchTweets;


use Doctrine\Common\Collections\ArrayCollection;

class SearchTweetsByUsernameResponse
{
    private ArrayCollection $tweets;

    public function __construct(ArrayCollection $tweets)
    {
        $this->tweets = $tweets;
    }

    public function getTweets(): ArrayCollection
    {
        return $this->tweets;
    }
}
