<?php


namespace App\Infrastructure\Remote;


use App\Domain\Tweet;
use App\Domain\TweetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use GuzzleHttp\Client;

class TwitterTweetRepository implements TweetRepository
{
    private const BEARER_TOKEN = 'AAAAAAAAAAAAAAAAAAAAAGf3PgEAAAAAW2iZAOInF1tXRDgsfr7lEw3vAo0%3DvfHFJUV26TI6rLpwPdUoQeunaDZZAgpe8QrwVbI10KMCnSEL9D';
    private const SEARCH_TWEETS_URL = 'https://api.twitter.com/2/tweets/search/recent';

    public function searchByUsername(string $username): ArrayCollection
    {
        $headers = [
            'User-Agent' => 'bake250-technical-test',
            'authorization' => "Bearer " . self::BEARER_TOKEN
        ];

        $query = [
            'query' => "from:$username",
            'tweet.fields' => 'author_id'
        ];

        $client = new Client([
            'headers' => $headers,
            'query' => $query
        ]);

        $apiResponse = $client->get(self::SEARCH_TWEETS_URL);
        $decodedApiResponse = json_decode($apiResponse->getBody(), true);

        $tweets = new ArrayCollection();

        if (!isset($decodedApiResponse['data'])) {
            return $tweets;
        }

        foreach ($decodedApiResponse['data'] as $tweetData) {
            $tweetId = $tweetData['id'];
            $tweetText = $tweetData['text'];

            $tweet = new Tweet($tweetId, $username, $tweetText);
            $tweets->add($tweet);
        }

        return $tweets;
    }

}