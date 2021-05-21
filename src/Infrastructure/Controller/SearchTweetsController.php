<?php


namespace App\Infrastructure\Controller;


use App\Application\UseCase\SearchTweets\SearchTweetsByUsernameRequest;
use App\Application\UseCase\SearchTweets\SearchTweetsByUsernameUseCase;
use App\Infrastructure\Form\SearchTweets\SearchTweetsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class SearchTweetsController extends AbstractController
{
    private SearchTweetsByUsernameUseCase $searchTweetsByUsernameUseCase;

    public function __construct(SearchTweetsByUsernameUseCase $searchTweetsByUsernameUseCase)
    {
        $this->searchTweetsByUsernameUseCase = $searchTweetsByUsernameUseCase;
    }

    public function index(Request $request)
    {
        $form = $this->createForm(SearchTweetsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $username = $formData['username'];

            $searchTweetByUsernameRequest = new SearchTweetsByUsernameRequest($username);
            $searchTweetByUsernameResponse = $this->searchTweetsByUsernameUseCase->execute($searchTweetByUsernameRequest);

            $tweets = $searchTweetByUsernameResponse->getTweets();

            if ($tweets->isEmpty()) {
                return $this->render('pages/search_tweets/index.html.twig', [
                    'form' => $form->createView(),
                    'error' => true
                ]);
            }

            return $this->render('pages/search_tweets/index.html.twig', [
                'form' => $form->createView(),
                'username' => $username,
                'tweets' => $tweets
            ]);
        }

        return $this->render('pages/search_tweets/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}