@props(['items'])
<div class="mt-2">
    @isset($items)
        <span class="italic">Missing ingredients:</span>
        <div class="w-full flex mt-2">
            @foreach ($items as $item)
                <x-parts.tag class="mr-2 text-xs font-semibold" type="alert">{{ $item['name'] }}</x-parts.tag>
            @endforeach
        </div>
    @endisset
</div>
