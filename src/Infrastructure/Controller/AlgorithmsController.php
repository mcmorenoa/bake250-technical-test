<?php


namespace App\Infrastructure\Controller;


use App\Domain\Developer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AlgorithmsController extends AbstractController
{
    public function sort()
    {
        $developers = [
            new Developer(uniqid(), 'John Doe', 28),
            new Developer(uniqid(), 'Vaughn Vernon', 42),
            new Developer(uniqid(), 'Martin Fowler', 54)
        ];

        usort($developers, function ($a, $b) {
            return $a->getAge() > $b->getAge() ? 1 : -1;
        });

        return new JsonResponse(json_encode($developers, true));
    }

    public function replace()
    {
        return new Response($this->encryptData('Bake250').PHP_EOL);
    }

    private function encryptData($str)
    {
        $encryption = ['a' => 4, 'A' => 4, 'e' => 3, 'E' => 3, 'i' => 1, 'I' => 1, 'o' => 0, 'O' => 0, 'u' => 5, 'U' => 5];

        return strtr($str, $encryption);
    }

}