<x-layout>
    <h1> Edit Post </h1>

    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Important: Use PUT or PATCH for updates --}}

        <div>
            <label for="name" class="block font-semibold">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $post->name) }}"
                class="border rounded px-3 py-2 w-full"
                required
            >
            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="text" class="block font-semibold">Text</label>
            <textarea
                id="text"
                name="text"
                class="border rounded px-3 py-2 w-full"
                required
            >{{ old('text', $post->text) }}</textarea>
            @error('text')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="type" class="block font-semibold">Type Tag</label>
            <select name="type" id="type_tag" class="border rounded-lg px-3 py-2">
                <option value="">Select a type</option>
                @foreach($typeTags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ old('type', $post->type_tag_id) == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('type')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="strategy" class="block font-semibold">Strategy Tag</label>
            <select name="strategy" id="strategy" class="border rounded-lg px-3 py-2">
                <option value="">Select a strategy</option>
                @foreach($strategyTags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ old('strategy', $post->strategy_tag_id) == $tag->id ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('strategy')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
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
            @error('image')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <button type="submit"> Opslaan </button>
        </div>
    </form>
</x-layout>




