<x-layout>

    <ul>
        @foreach($series as $serie)
            <li><a href="{{ route('series.show', $serie)}}"> {{ $serie -> name}}</a></li>
        @endforeach


    </ul>

</x-layout>
