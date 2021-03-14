@isset($recipe)
    <div>
        {{-- header --}}
        <div class="flex">
            @isset($recipe['image'])
                <img src="{{ $recipe['image'] }}" height="200" width="300" />
            @endisset
            <div class="flex flex-col">
                {{-- <x-parts.heading type="h1">{{ $recipe['title'] }}</x-parts.heading> --}}

            </div>
        </div>

        <x-parts.heading type="h2">Summary: </x-parts.heading>
        <span>{!! $recipe['summary'] !!}</span>
        <x-parts.heading type="h2">Instructions: </x-parts.heading>
        <span>{!! $recipe['instructions'] !!}</span>
        <x-parts.heading type="h2">Instructions: </x-parts.heading>
        <div>
            {{-- @dump($recipe["analyzedInstructions"][0]["steps"]) --}}
            @foreach ($recipe['analyzedInstructions'][0]['steps'] as $step)
                @dump($step)
                <div class="flex">
                    <span>#{{ $step['number'] }}</span>
                    <div clas="flex flex-col">
                        @foreach ($step['ingredients'] as $ingredient)
                            <x-parts.tag>
                                <img src="{{ env('SPOON_IIU') . $ingredient['image'] }}" class="w-7 h-7">
                                {{ $ingredient['name'] }}
                                @dump($ingredient)
                            </x-parts.tag>
                        @endforeach
                        {{-- #{{ $step['instruction'] }} --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endisset

{{-- array:34 [▼
"vegetarian" => false
"vegan" => false
"glutenFree" => true
"dairyFree" => true
"veryHealthy" => false
"cheap" => false
"veryPopular" => true
"sustainable" => false
"weightWatcherSmartPoints" => 11
"gaps" => "no"
"lowFodmap" => false
"aggregateLikes" => 1162
"spoonacularScore" => 96.0
"healthScore" => 41.0
"creditsText" => "In Sock Monkey Slippers"
"sourceName" => "In Sock Monkey Slippers"
"pricePerServing" => 429.54
"extendedIngredients" => array:10 [▶]
"id" => 481056
"title" => "Seared Pork Tenderloin and Sage Caramelized Mushrooms with Blackberry Red Wine Reduction"
"readyInMinutes" => 45
"servings" => 2
"sourceUrl" => "http://www.insockmonkeyslippers.com/seared-pork-tenderloin"
"image" => "https://spoonacular.com/recipeImages/481056-556x370.jpg"
"imageType" => "jpg"
"summary" => "Seared Pork Tenderloin and Sage Caramelized Mushrooms with Blackberry Red Wine Reduction is a <b>gluten
    free and dairy free</b> main course. One serving contain ▶"
"cuisines" => []
"dishTypes" => array:4 [▶]
"diets" => array:2 [▶]
"occasions" => []
"winePairing" => array:3 [▶]
"instructions" => "Evenly sprinkle the tenderloin with salt and pepper. Heat olive oil in a large saute pan over
medium-high heat. Place the tenderloin in the pan and sear for 5 m ▶"
"analyzedInstructions" => array:1 [▶]
"originalId" => null
] --}}
