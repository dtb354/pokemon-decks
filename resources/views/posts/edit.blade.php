<x-layout>
    <h1> Edit Post </h1>

    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Important: Use PUT or PATCH for updates --}}

        <div>
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $post->name) }}"
                required
            >
        </div>

        <div>
            <label for="text">Text</label>
            <textarea
                id="text"
                name="text"
                required
            >{{ old('text', $post->text) }}</textarea>
        </div>

        <div>
            <label for="type">Type Tag</label>
            <input
                type="number"
                id="type"
                name="type"
                value="{{ old('type', $post->type_tag_id) }}"
                required
            >
        </div>

        <div>
            <label for="strategy">Strategy Tag</label>
            <input
                type="number"
                id="strategy"
                name="strategy"
                value="{{ old('strategy', $post->strategy_tag_id) }}"
                required
            >
        </div>

        <div>
            <label>Current Image:</label><br>
            @if ($post->image)
                <img
                    src="{{ asset('storage/' . $post->image) }}"
                    alt="Post Image"
                    width="200"
                    style="border-radius: 10px;"
                >
            @else
                <p><em>No image uploaded.</em></p>
            @endif
        </div>

        <div>
            <label for="image">Upload New Image (optional)</label>
            <input type="file" id="image" name="image" value=""{{ old('image', $post->image) }}"">
        </div>


        <div>
            <button type="submit"> Opslaan </button>
        </div>
    </form>
</x-layout>




