<x-layout>

    <h1>{{ $series->name }}</h1>

    @if ($series->image)
        <img src="{{asset('storage/' . $series->image)}}" alt="{{$series->name}}" class="max-w-[335px]">
    @endif

    <p>{{ $series->info}}</p>

    <x-button href="{{route('series.index')}}">
        button go back
    </x-button>
    <x-button href="{{ route('series.edit',  $series) }}">Edit page</x-button>
    <form action="{{ route('series.destroy', $series) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>

</x-layout>
