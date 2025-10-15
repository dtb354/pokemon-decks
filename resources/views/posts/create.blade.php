
<h1> Create Post </h1>

    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div>
            <label for="name"> Naam </label>
            <input type="text" id="name" name="name">
        </div>

        <div>
            <label for="name"> Text </label>
            <input type="text" id="text" name="text">
            @error('price')
                {{ $errormessage }}
            @enderror
        </div>

        <div>
            <label for="name">Type Tag</label>
            <input type="text" id="type" name="type">
        </div>

        <div>
            <label for="name>">Strategy Tag</label>
            <input type="text" id="strategy" name="strategy">
        </div>
        <div>
            <button type="submit"> Opslaan </button>
        </div>
    </form>
