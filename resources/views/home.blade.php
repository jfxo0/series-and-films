<x-layout>

    @auth
        <h1>hello {{ Auth::user()->name }}</h1>

    @endauth

    @guest
        // The user is not authenticated...
        <p>ur not logged in</p>
    @endguest


</x-layout>
