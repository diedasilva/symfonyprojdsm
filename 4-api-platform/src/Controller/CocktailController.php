<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class CocktailController extends AbstractController
{
    #[Route('/cocktails', name: 'cocktail_list')]
    public function list(): JsonResponse
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita');
        $data = $response->toArray();
        return $this->json($data);
    }
}
