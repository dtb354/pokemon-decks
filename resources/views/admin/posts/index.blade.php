<x-layout>
    <div class="max-w-7xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold mb-6">Admin Post Management</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">

            <form method="GET" action="{{ route('admin.posts.index') }}" class="flex items-center space-x-2">
                <label for="filter" class="text-sm font-medium text-gray-700">Show:</label>
                <select id="filter" name="filter" onchange="this.form.submit()"
                        class="border border-gray-300 rounded-md px-2 py-1 text-sm">
                    <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>All</option>
                    <option value="active" {{ $filter === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $filter === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </form>
        </div>


        <table class="w-full border border-gray-300 text-sm">
            <thead>
            <tr class="bg-gray-200">
                <th class="px-3 py-2 border">ID</th>
                <th class="px-3 py-2 border">Name</th>
                <th class="px-3 py-2 border">Author</th>
                <th class="px-3 py-2 border">Image</th>
                <th class="px-3 py-2 border">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="hover:bg-gray-100">
                    <td class="border px-3 py-2">{{ $post->id }}</td>
                    <td class="border px-3 py-2">{{ $post->name }}</td>
                    <td class="border px-3 py-2">
                        {{ $post->user ? $post->user->first_name . ' ' . $post->user->last_name : 'Unknown' }}
                    </td>
                    <td class="border px-3 py-2">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-12 h-12 object-cover rounded">
                        @endif
                    </td>
                    <td class="border px-3 py-2 space-x-2">
                        <form action="{{ route('admin.posts.toggle', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-yellow-600 hover:underline">
                                {{ $post->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>

                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this post?')" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
