<?php


namespace App\Application\UseCase\SearchTweets;


use App\Domain\TweetRepository;

class SearchTweetsByUsernameUseCase
{
    private TweetRepository $tweetRepository;

    public function __construct(TweetRepository $tweetRepository)
    {
        $this->tweetRepository = $tweetRepository;
    }

    public function execute(SearchTweetsByUsernameRequest $request)
    {
        $tweets = $this->tweetRepository->searchByUsername($request->getUserName());

        return new SearchTweetsByUsernameResponse($tweets);
    }
}