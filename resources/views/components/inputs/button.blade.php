@props(['class'])
<button {{ $attributes }} class="{{ $style ? $style : '' }} {{ $class ?? '' }}">{{ $slot }}</button>
