<?php
namespace App\Classes;

use CurlHandle;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\Client;

class Spoonacular
{
    protected $client;
    protected $baseUrl="https://api.spoonacular.com/";


    public function __construct()
    {
        $this->client= new Client(['base_uri' => $this->baseUrl,
        ]);
    }
    public function getRecipe($id)
    {
        try {
            $response = $this->client->get("/recipes/{$id}/information", ['query'=> ['apiKey'=> env('SPOON_APIKEY')]]);
            $recipes = json_decode($response->getBody()->getContents(), true);
            return $recipes;
        } catch (RequestException $e) {
            dump($e);
        }
    }

    public function getReciepeForIngredient($ingredients)
    {
        try {
            $response = $this->client->get("/recipes/findByIngredients", ["query"=>['apiKey'=>env('SPOON_APIKEY'),'ingredients'=>$ingredients]]);
            $recipes = json_decode($response->getBody()->getContents(), true);
            return $recipes;
        } catch (RequestException $e) {
            dump($e);
        }
    }

    public function searchIngredients($search)
    {
        try {
            $response = $this->client->get("/food/ingredients/search", ["query"=>['apiKey'=>env('SPOON_APIKEY'),'query'=>$search]]);
            $ingredient = json_decode($response->getBody()->getContents(), true);
            return $ingredient["results"];
        } catch (RequestException $e) {
            dump($e);
        }
    }
}
