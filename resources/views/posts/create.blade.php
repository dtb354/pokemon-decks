<x-layout>
    <h1 class="text-2xl font-bold mb-4">Create Post</h1>

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block font-semibold">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="border rounded px-3 py-2 w-full">
            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="text" class="block font-semibold">Text</label>
            <input type="text" id="text" name="text" value="{{ old('text') }}" class="border rounded px-3 py-2 w-full">
            @error('text')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="type" class="block font-semibold">Type Tag</label>
            <input type="number" id="type" name="type" value="{{ old('type') }}" class="border rounded px-3 py-2 w-full">
            @error('type')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="strategy" class="block font-semibold">Strategy Tag</label>
            <input type="number" id="strategy" name="strategy" value="{{ old('strategy') }}" class="border rounded px-3 py-2 w-full">
            @error('strategy')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image" class="block font-semibold">Image</label>
            <input type="file" name="image" id="image" accept="image/*" class="border rounded px-3 py-2 w-full">
            @error('image')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Save</button>
        </div>
    </form>
</x-layout>




