<?php

namespace App\Http\Livewire\Recipes;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Show extends Component
{
    public $tomatoReceips=null;
    public $ingredient;

    public function mount()
    {

        // $response=Http::get("https://api.spoonacular.com/recipes/findByIngredients","apiKey=24f06d6637864a0780622eb080d5511f&ingredients=tomato");
        // $this->tomatoReceips=json_decode($response->body());
    }

    public function render()
    {
        return view('livewire.recipes.show');
    }
}
