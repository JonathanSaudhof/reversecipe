<?php

namespace App\Http\Livewire\Recipes;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Classes\Spoonacular;
use Dotenv\Exception\ValidationException;

class Show extends Component
{
    public $recipes;
    public $ingredient;
    private $spoonacular;
    public $ingredientsList;

    public function __construct()
    {
        $this->spoonacular = new Spoonacular();
        $this->recipes=null;
        $this->ingredientsList=array();
    }


    public function mount()
    {
    }

    public function addToIngredientsList()
    {
        $input = trim(trim($this->ingredient, " "));
        if (strlen($input)>0) {
            array_push($this->ingredientsList, $input);
        }
        $this->ingredient="";
    }
    public function clear()
    {
        $this->ingredientsList=array();
        $this->recipes=null;
        $this->ingredient="";
    }

    public function searchRecipes()
    {
        $data=$this->validate([
            'ingredientsList'=> 'required'
            ]);
        // dump($data['ingredientsList']);
        $result= $this->spoonacular->getReciepeForIngredient(implode(", ", $data['ingredientsList']));
        if (sizeof($result)===0) {
            dump('no recipes found');
        } else {
            $this->recipes=$result;
        }
    }

    public function removeFromIngredientsList($ingredientId)
    {
        if ($ingredientId >=0 && $ingredientId <= sizeof($this->ingredientsList)) {
            unset($this->ingredientsList[$ingredientId]);
        }
    }

    public function render()
    {
        return view('livewire.recipes.show');
    }
}
