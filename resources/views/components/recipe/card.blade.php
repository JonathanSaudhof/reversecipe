@props(['recipe'])
<div class="flex flex-col w-full bg-gray-100 shadow-md ">
    <img src="{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" class="h-auto" />
    <div class="flex flex-col p-4">
        <div class="text-lg font-bold">{{ $recipe['title'] }}</div>
        <div>❤️ {{ $recipe['likes'] }}</div>

        @if ($recipe['missedIngredientCount'] > 0)
            <x-recipe.tags :items="$recipe['missedIngredients']" />
        @endif

    </div>
</div>
