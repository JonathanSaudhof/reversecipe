<?php
namespace App\Classes;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class Spoonacular
{
    protected $client;
    protected $baseUrl="https://api.spoonacular.com/";
    protected $apiKey="24f06d6637864a0780622eb080d5511f";

    public function __construct()
    {
        $this->client= new Client(['base_uri' => $this->baseUrl,
        'defaults' => [
            'query'  => [
                'apiKey' => $this->apiKey,
            ]
        ],
        ]);
    }

    public function getReciepeForIngredient($ingredients)
    {
        try {
            $response = $this->client->get("/recipes/findByIngredients", ["query"=>['apiKey'=>$this->apiKey,'ingredients'=>$ingredients]]);
            $recipes = json_decode($response->getBody());
            return $recipes;
        } catch (RequestException $e) {
            dump($e);
        }
    }
}
