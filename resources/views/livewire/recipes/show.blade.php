<div class="w-3/5 mx-auto flex flex-col items-center">
    <x-parts.alert />
    <x-parts.heading class="my-8">This is the recipes search</x-parts.heading>
    <div class="flex border rounded w-full focus:border-gray-500  md:border border-solid border-gray-500">
        <input wire:model.debounce.300ms="ingredient" placeholder="Your ingredient"
            wire:keydown.enter="addToIngredientsList" type="text" class="w-4/5 px-2 py-2 " />
        <button class="flex-auto font-semibold  z-10 text-gray-200  whitespace-nowrap px-1 bg-gray-500"
            wire:click="addToIngredientsList()">Add
            Ingredient</button>
    </div>

    <div class="text-xl font-bold my-4 w-full text-left">Ingredients:</div>

    @if (sizeof($ingredientsList) > 0)
        <div class="flex w-full">
            @foreach ($ingredientsList as $key => $ingredient)
                <div class="flex mr-2 flex-row border border-solid border-gray-200 bg-gray-200 rounded px-3 py-1">
                    <span class="mr-1">{{ $ingredient }}</span>
                    <button wire:click="removeFromIngredientsList({{ $key }})" class="text-gray-400">X</button>
                </div>
            @endforeach
        </div>
    @else
        <span>No Ingredients selected</span>
    @endif
    <div class="flex my-4 w-full justify-start">
        <x-inputs.button class="mr-4" version="primary" wire:click="searchRecipes()">Search Recipe</x-inputs.button>
        <x-inputs.button class="test" version="secondary" wire:click="clear()">Clear</x-inputs.button>
    </div>

    <div class="text-xl font-bold my-4 w-full text-left">Recipes:</div>
    {{-- {{ dump($recipes) }} --}}
    @if (isset($recipes))
        <div class="my-4 w-full">
            @foreach ($recipes as $item)
                {{ gettype($item) }}
                <div class="flex flex-row mb-2 w-full bg-gray-300 shadow-sm">
                    test
                    {{-- <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" width="200" height="133" />
                    <div class="flex flex-col">
                        <div>{{ $item['title'] }}</div>
                        <div>Likes: {{ $item['likes'] }}</div> --}}
                </div>
        </div>
    @endforeach
</div>
@endif
</div>
