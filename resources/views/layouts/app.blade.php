<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <title>Revcipe</title>
</head>

<body class="antialiased">
    <x-layout.master>
        @yield('content')
        {{ $slot }}
    </x-layout.master>
    @livewireScripts
</body>

</html>
