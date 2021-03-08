@if ($errors->any())
    <div class="alert fixed right-0 bg-red-400 w-1/4 p-8 font-bold text-white alert-danger shadow-2xl z-50">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
