<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
<!-- Navigation -->
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex space-x-8">
        <x-nav-link href="{{ url('/') }}" :active="request()->is('/')">
            Home
        </x-nav-link>

        <x-nav-link href="{{ url('/posts') }}" :active="request()->is('posts')">
            Posts
        </x-nav-link>

        <x-nav-link href="{{ url('/posts/create') }}" :active="request()->is('posts/create')">
            Create Post
        </x-nav-link>

        <x-nav-link href="{{ route('profile.show') }}" :active="request()->is('profile')">
            My Profile
        </x-nav-link>

        <x-nav-link :href="route('logout')" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Log Out') }}
        </x-nav-link>

        <form method="POST" action="{{ route('logout') }}" id="logout-form" class="hidden">
            @csrf
        </form>
    </div>
</nav>

<!-- Page Content -->
<main class="p-6">
    {{ $slot }}
</main>

</body>
</html>

