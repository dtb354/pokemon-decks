<x-layout>
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-8">
        <h1 class="text-2xl font-bold mb-4">My Profile</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold">User Information</h2>
            <p><strong>Name:</strong> {{ $user->name ?? $user->first_name . ' ' . $user->last_name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <div>
            <h2 class="text-xl font-semibold mb-3">My Posts</h2>

            @if ($posts->isEmpty())
                <p>You haven’t created any posts yet.</p>
            @else
                <ul class="space-y-3">
                    @foreach ($posts as $post)
                        <li class="border p-3 rounded-lg">
                            <h3 class="font-semibold">{{ $post->name }}</h3>
                            <p>{{ $post->text }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:underline">
                                View Post
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-600 hover:underline">
                                Edit Post
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-layout>
