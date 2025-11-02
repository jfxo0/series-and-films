{{--<x-layout>--}}

{{--    @auth--}}
{{--        <h1>hello {{ Auth::user()->name }}</h1>--}}

{{--    @endauth--}}

{{--    @guest--}}
{{--        // The user is not authenticated...--}}
{{--        <p>ur not logged in</p>--}}
{{--    @endguest--}}

{{--</x-layout>--}}
<x-layout>
    <div class="max-w-3xl mx-auto py-12">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">Welcome {{ auth()->user()->name ?? 'guest' }}</h1>

        <p class="text-gray-600 mb-6">
            Dit is Serie lijst. Hier kun je zelf een serie toevoegen en andere series op de lijst bekijken
        </p>

        <div class="flex gap-3">
            <x-button href="{{ route('series.index') }}">
                Bekijk alle series
            </x-button>

        </div>
    </div>
</x-layout>
