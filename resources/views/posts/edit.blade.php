<h1> Edit Post </h1>

<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $post->name) }}">
    </div>

    <div>
        <label for="name"> Text </label>
        <input type="text" id="text" name="text" value="{{ old('text', $post->text) }}">
        @error('price')
        {{ $errormessage }}
        @enderror
    </div>

    <div>
        <label for="name">Type Tag</label>
        <input type="text" id="type" name="type" value="{{ old('type', $post->type_tag_id) }}">
    </div>

    <div>
        <label for="name>">Strategy Tag</label>
        <input type="text" id="strategy" name="strategy" value="{{ old('strategy', $post->strategy_tag_id) }}">
    </div>
    <div>
        <button type="submit"> Opslaan </button>
    </div>
</form>
