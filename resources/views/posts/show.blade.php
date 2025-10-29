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
</x-layout>
