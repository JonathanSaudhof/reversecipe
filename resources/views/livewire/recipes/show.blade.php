<div>
    <x-parts.heading>This is the recipes search</x-parts.heading>
    <input wire:model.debounce.500ms="ingredient" type="text" />
    <div>{{ $ingredient }}</div>
    {{-- @if (isset($tomatoReceips))
        @foreach ($tomatoReceips as $item)
            <div class="flex flex-row mb-2">
                <img src="{{ $item->image }}" alt="{{ $item->title }}" width="200" height="133" />
                <div class="flex flex-col">
                    <div>{{ $item->title }}</div>
                    <div>Likes: {{ $item->likes }}</div>
                </div>
            </div>
        @endforeach
    @endif --}}


</div>
