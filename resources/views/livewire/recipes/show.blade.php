<div>
    <x-parts.heading>This is the recipes search</x-parts.heading>
    <input wire:model.debounce.300ms="ingredient" wire:keydown.enter="addToIngredientsList" type="text"
        class="border  md:border border-solid border-gray-500" />
    <button wire:click="searchRecipes()">Search Recipes</button>
    <button wire:click="clear()">Clear</button>
    <div>Ingredients:</div>

    @if (isset($ingredientsList))
        @foreach ($ingredientsList as $key => $ingredient)
            <div class="flex flex-row">
                <span>{{ $ingredient }}</span>
                <button wire:click="removeFromIngredientsList({{ $key }})">X</button>
            </div>
        @endforeach
    @else
        <span>No Ingredients selected</span>
    @endif

    @if (isset($recipes))
        @foreach ($recipes as $item)
            <div class="flex flex-row mb-2">
                <img src="{{ $item->image }}" alt="{{ $item->title }}" width="200" height="133" />
                <div class="flex flex-col">
                    <div>{{ $item->title }}</div>
                    <div>Likes: {{ $item->likes }}</div>
                </div>
            </div>
        @endforeach
    @endif
</div>
