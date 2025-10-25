<x-layout>
    <div class="max-w-7xl mx-auto py-10 px-6 bg-gray-50 min-h-screen">

        {{-- Header --}}
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Featured Post</h1>

        {{-- Featured Post --}}
        @if($firstPost)
            <div class="bg-white border-2 border-green-500 rounded-xl shadow-md p-6 mb-10 text-center w-full max-w-3xl mx-auto">
                <h2 class="text-2xl font-semibold mb-4">{{ $firstPost->name }}</h2>

                @if($firstPost->image)
                    <div class="w-full h-96 overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/' . $firstPost->image) }}"
                             alt="{{ $firstPost->name }}"
                             class="w-full h-full object-cover object-top">
                    </div>
                @endif

                <p class="mt-4 text-gray-700">{{ $firstPost->text }}</p>
            </div>
        @else
            <p class="text-gray-600 mb-8 text-center">No posts found.</p>
        @endif


        {{-- All Posts --}}
        <h1 class="text-3xl font-bold text-gray-900 mb-6">All Posts</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 justify-items-center">
            @foreach($posts as $post)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition duration-200 w-56 h-72 overflow-hidden flex flex-col">
                    {{-- Image --}}
                    @if($post->image)
                        <div class="w-full h-36 overflow-hidden">
                            <img src="{{ asset('storage/' . $post->image) }}"
                                 alt="{{ $post->name }}"
                                 class="w-full h-full object-cover object-top">
                        </div>
                    @else
                        <div class="w-full h-36 flex items-center justify-center bg-gray-100 text-gray-400 text-sm">
                            No Image
                        </div>
                    @endif

                    {{-- Text --}}
                    <div class="flex-1 flex flex-col justify-between p-3 text-center">
                        <h3 class="text-sm font-semibold text-blue-600 hover:text-blue-700 transition truncate">
                            <a href="{{ route('posts.show', $post) }}">{{ $post->name }}</a>
                        </h3>
                        <p class="text-xs text-gray-600 line-clamp-2 mt-2">{{ $post->text }}</p>
                    </div>

                    {{-- Tags --}}
                    <div class="mt-2 text-sm text-gray-500">
                        <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                            {{ $post->typeTag ? $post->typeTag->name : 'No Type Tag' }}
                        </span>
                        <span class="inline-block bg-green-100 text-green-800 px-2 py-1 rounded-full">
                            {{ $post->strategyTag ? $post->strategyTag->name : 'No Strategy Tag' }}
                        </span>
                    </div>

                    {{-- Author --}}
                    <p class="mt-2 text-xs text-gray-500">By {{ $post->user ? $post->user->first_name . ' ' . $post->user->last_name : 'Unknown' }}</p>
                    </div>
            @endforeach
        </div>

    </div>
</x-layout>
