<x-layout>
    <h1>Welcome to the Home Page</h1>

    @auth
        <p>You are logged in as <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong></p>
    @endauth

    @guest
        <p>You are not logged in. <a href="{{ route('login') }}" class="text-blue-600" >Login here</a>.</p>
    @endguest

</x-layout>

