<x-layout>
    <div class="max-w-md mx-auto py-10 px-6">
        <h1 class="text-xl font-bold mb-4">Add Type Tag</h1>

        <form method="POST" action="{{ route('admin.strategy-tags.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm mb-2" for="name">Name</label>
                <input type="text" name="name" id="name" class="border rounded w-full p-2" required>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button class="bg-green-600 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
</x-layout>
