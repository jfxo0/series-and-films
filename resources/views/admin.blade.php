<x-layout>
    <x-header>Admin Overview </x-header>
    @foreach($adminOverview as $user)
        <h3 class="text-lg font-bold text-gray-900 dark:text-black mb-4">
            {{ $user->name }}
        </h3>
        <h3 class="text-lg font-bold text-gray-900 dark:text-black mb-4">
            {{ $user->email }}
        </h3>

    @if($user->role)
            <h3>{{$user->name}} is admin</h3>
        @else
            <h3>{{$user->name}} is een gebruiker</h3>
    @endif

        <button href="">ACTIEF</button>

    @endforeach
</x-layout>
