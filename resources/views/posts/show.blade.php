<x-layout>
    <div class="max-w-7xl mx-auto py-10 px-6 bg-gray-50 min-h-screen">

        {{-- Back Button --}}
        <a href="{{ route('posts.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to All Posts
        </a>

        {{-- Main Content Container --}}
        <div class="flex flex-col lg:flex-row bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">

            {{-- LEFT SIDE: Post Information --}}
            <div class="w-full pl-4 flex flex-col justify-center">
                {{-- Title --}}
                <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ $post->name }}</h1>

                {{-- Author + Date --}}
                <p class="text-sm text-gray-500 mb-4">
                    By {{ $post->user ? $post->user->first_name . ' ' . $post->user->last_name : 'Unknown' }}
                    • {{ $post->created_at->format('F j, Y') }}
                </p>

                {{-- Text --}}
                <p class="text-gray-700 leading-relaxed whitespace-pre-line mb-6">
                    {{ $post->text }}
                </p>

                {{-- Tags --}}
                <div class="flex flex-wrap gap-2 mb-8">
                    <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                        {{ $post->typeTag?->name ?? 'No Type Tag' }}
                    </span>
                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                        {{ $post->strategyTag?->name ?? 'No Strategy Tag' }}
                    </span>
                </div>

            </div>

            {{-- RIGHT SIDE: Image --}}
            @if($post->image)
                <div class="w-full lg:w-1/2 max-h-screen overflow-hidden flex items-center justify-center bg-gray-100">
                    <img src="{{ asset('storage/' . $post->image) }}"
                         alt="{{ $post->name }}"
                         class="object-cover object-center w-full h-full max-h-screen">
                </div>
            @else
                <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-100 text-gray-400 text-sm">
                    No Image Available
                </div>
            @endif
        </div>
    </div>

    {{-- Comment Section --}}
    <div class="mt-8">
        <h3 class="text-xl font-semibold mb-4">Comments</h3>

        {{-- Add new comment --}}
        @auth
            <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea name="text" rows="3" class="w-full border rounded-lg p-2" placeholder="Write your comment..."></textarea>
                @error('text')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-2 hover:bg-blue-700">
                    Post Comment
                </button>
            </form>
        @else
            <p class="text-gray-600 mt-4">Please <a href="{{ route('login') }}" class="text-blue-600 underline">log in</a> to comment.</p>
        @endauth

        {{-- Existing comments --}}
        @foreach($post->comments as $comment)
            <div class="border-b border-gray-200 py-2">
                <p class="text-gray-700"><strong>{{ $comment->user->first_name }}</strong> <strong>{{ $comment->user->last_name }}</strong> said:</p>
                <p class="text-gray-800">{{ $comment->text }}</p>
                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
    </div>
</x-layout>
