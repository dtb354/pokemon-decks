<x-layout>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-6">Manage Type Tags</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.type-tags.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">+ Add New Tag</a>

        <table class="w-full mt-6 border border-gray-300">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td class="border px-4 py-2">{{ $tag->id }}</td>
                    <td class="border px-4 py-2">{{ $tag->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
