@if ($errors->any())
    <div class="alert fixed bg-red-400 w-1/2 p-8 font-bold text-white alert-danger shadow-2xl">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
