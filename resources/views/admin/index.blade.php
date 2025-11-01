<x-layout>
    <div class="max-w-4xl mx-auto py-12 px-6">
        {{-- Dashboard Card --}}
        <div class="bg-white border-2 rounded-xl shadow-md p-8 text-center">

            {{-- Title --}}
            <h1 class="text-3xl font-bold text-gray-900 mb-8">Admin Dashboard</h1>

            {{-- Navigation Buttons --}}
            <div class="grid grid-cols-3 sm:grid-cols-1 gap-6 p-16">
                {{-- Posts --}}
                <a href="{{ route('admin.posts.index') }}"
                   class="bg-green-600 text-white py-4 rounded-lg hover:bg-green-700 transition shadow-md">
                    Manage Posts
                </a>

                {{-- Type Tags --}}
                <a href="{{ route('admin.type-tags.index') }}"
                   class="bg-blue-600 text-white py-4 rounded-lg hover:bg-blue-700 transition shadow-md">
                    Manage Type Tags
                </a>

                {{-- Strategy Tags --}}
                <a href="{{ route('admin.strategy-tags.index') }}"
                   class="bg-red-600 text-white py-4 rounded-lg hover:bg-red-500 transition shadow-md">
                    Manage Strategy Tags
                </a>
            </div>

        </div>
    </div>
</x-layout>

