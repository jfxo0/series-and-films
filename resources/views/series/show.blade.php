<x-layout>
<x-header>{{ $series->name }} </x-header>


    <div class="flex">
        @if ($series->image)
            <img src="{{asset('storage/' . $series->image)}}" alt="{{$series->name}}" class="max-w-[335px]">
        @endif

        <div class="flex-col content-center">
            <div class="flex-row">
                <p class=" pl-3 pr-8"> the category is: {{$series->category->type}} </p>
                <p  class=" pl-3 pr-8"> the genre is: {{$series->category->genre}}</p>
            </div>
            <p class=" pl-3 pr-8">{{ $series->info}}</p>
        </div>


    </div>

    <x-button href="{{route('series.index')}}">
        go back
    </x-button>
    <x-button href="{{ route('series.edit',  $series) }}">Edit page</x-button>
    <x-button>
        <form action="{{ route('series.destroy', $series) }}" method="POST">
            @csrf
            @method('DELETE')

           <button type="submit">Delete</button>
       </form>
   </x-button>


</x-layout>
