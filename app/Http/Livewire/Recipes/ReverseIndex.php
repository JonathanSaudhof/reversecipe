<?php

namespace App\Http\Livewire\Recipes;

use Livewire\Component;
use App\Classes\Spoonacular;
use Illuminate\Support\Facades\Session;

class ReverseIndex extends Component
{
    public $recipes;
    public $ingredientSearchResult;
    public $ingredientsList;
    public $search;
    public $searching=false;
    private $spoonacular;


    public function __construct()
    {
        $this->spoonacular = new Spoonacular();
        $this->recipes=null;
        $this->ingredientsList=array();
    }

    public function mount()
    {
        $ingredientListsInSession = Session::get('ingredientsList') ?? null;
        $recipesInSession = Session::get('recipes') ?? null;

        if (isset($ingredientListsInSession)) {
            $this->ingredientsList=$ingredientListsInSession;
        }

        if (isset($ingredientListsInSession)) {
            $this->recipes = $recipesInSession;
        }
    }

    public function updatedSearch()
    {
        $this->searching=true;
        $this->ingredientSearchResult = $this->spoonacular->searchIngredients($this->search);
    }

    public function takeSearchResult($ingredient)
    {
        $this->search=$ingredient;
        $this->ingredientSearchResult=null;
        $this->searching=false;
    }

    public function addToIngredientsList()
    {
        $input = trim(trim($this->search, " "));
        if (strlen($input)>0) {
            array_push($this->ingredientsList, $input);
            $this->updateSession('ingredientsList');
        }
        $this->search="";
        $this->ingredientSearchResult=null;
    }

    public function clear()
    {
        $this->ingredientsList=array();
        $this->recipes=null;
        $this->search="";
        $this->updateSession('ingredientsList');
        $this->updateSession('recipes');
    }

    public function searchRecipes()
    {
        $data=$this->validate([
            'ingredientsList'=> 'required'
            ]);

        $result= $this->spoonacular->getReciepeForIngredient(implode(", ", $data['ingredientsList']));
        if (sizeof($result)===0) {
            dump('no recipes found');
        } else {
            $this->recipes=$result;
            $this->updateSession('recipes');
        }
    }


    public function removeFromIngredientsList($ingredientId)
    {
        if ($ingredientId >=0 && $ingredientId <= sizeof($this->ingredientsList)) {
            unset($this->ingredientsList[$ingredientId]);
        }
        $this->updateSession('ingredientsList');
    }

    private function updateSession($key)
    {
        $objectVars = get_object_vars($this);
        Session::put($key, $objectVars[$key]);
    }

    public function render()
    {
        return view('livewire.recipes.reverse-index');
    }
}
