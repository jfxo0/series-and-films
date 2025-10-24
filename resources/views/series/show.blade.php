<x-layout>

    <h1>{{ $series->name }}</h1>
    <p>{{ $series->info}}</p>

<x-button href="{{route('series.index')}}">
    button go back
</x-button>
    <a href="{{ route('series.edit',  $series) }}">Edit page</a>
</x-layout>
