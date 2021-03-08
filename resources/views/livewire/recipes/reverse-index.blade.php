<div class="w-3/5 relative mx-auto flex flex-col items-center">
    <x-parts.alert />
    <x-parts.heading class="my-8 text-gray-600">
        REV◀️cipe 👩🏼‍🍳 </x-parts.heading>
    <x-parts.heading type="h2" class="italic text-gray-400 mb-8">Search your recipes by ingredients
    </x-parts.heading>
    <div
        class="flex  justify-items-stretch border rounded w-full my-8 focus:border-gray-500  md:border border-solid border-gray-500 overflow-hidden">
        <input wire:model.debounce.300ms="ingredient" placeholder="Your ingredient"
            wire:keydown.enter="addToIngredientsList" type="text" class="flex-auto w-4/5 px-4 py-4 " />
        <button class="w-1/8 px-8 font-bold z-10 text-gray-100  whitespace-nowrap  bg-gray-500"
            wire:click="addToIngredientsList()">+ Add
        </button>
    </div>

    <div class="text-xl font-bold my-8  w-full text-left">Ingredients:</div>

    <div class="w-full py-8">
        @if (sizeof($ingredientsList) > 0)
            <div class="flex w-full">
                @foreach ($ingredientsList as $key => $ingredient)
                    <div
                        class="flex mr-2 flex-row border border-solid border-gray-200 bg-gray-200 rounded px-3 py-1 shadow-md">
                        <span class="mr-1">{{ $ingredient }}</span>
                        <button wire:click="removeFromIngredientsList({{ $key }})"
                            class="text-gray-400">X</button>
                    </div>
                @endforeach
            </div>
        @else
            <span class="w-full py-3 italic text-gray-400 text-left">No Ingredients added!</span>
        @endif
    </div>

    <div class="flex my-8 p-4 border rounded border-solid border-gray-500 bg-gray-200 w-full justify-between ">
        <div>
            <x-inputs.button class="mr-4 px-4" version="primary" wire:click="searchRecipes()">Search Recipe
            </x-inputs.button>
            <x-inputs.button class="px-4" version="secondary" wire:click="clear()">Clear</x-inputs.button>
        </div>
        <livewire:drop-down title="Sort by" />
    </div>

    <div class="text-xl font-bold my-4 w-full text-left">Recipes:</div>
    {{-- {{ dump($recipes) }} --}}
    @if (isset($recipes))
        <div class="grid grid-cols-3 gap-8">
            @foreach ($recipes as &$item)
                <x-recipe.card :recipe="$item" />
            @endforeach
        </div>
    @else
        <span class="w-full italic text-gray-400 text-left">No recipes!</span>

    @endif
</div>
