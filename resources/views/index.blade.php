@extends('layouts.app')
@section('content')
    <x-parts.heading type="h2">hello world</x-parts.heading>
    @livewire('recipes.show')
@endsection
