{{--<x-layout>--}}
{{--<x-header>{{ $series->name }} </x-header>--}}
{{--    @if (session('error'))--}}
{{--        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">--}}
{{--            <strong>Let op!</strong> {{ session('error') }}--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <div class="flex">--}}
{{--        @if ($series->image)--}}
{{--            <img src="{{asset('storage/' . $series->image)}}" alt="{{$series->name}}" class="max-w-[335px]">--}}
{{--        @endif--}}

{{--        <div class="flex-col content-center">--}}
{{--            <div class="flex-row">--}}
{{--                <p class=" pl-3 pr-8"> the category is: {{$series->category->type}} </p>--}}
{{--                <p  class=" pl-3 pr-8"> the genre is: {{$series->category->genre}}</p>--}}
{{--            </div>--}}
{{--            <p class=" pl-3 pr-8">{{ $series->info}}</p>--}}
{{--        </div>--}}


{{--    </div>--}}

{{--    <x-button href="{{route('series.index')}}">--}}
{{--        go back--}}
{{--    </x-button>--}}
{{--    @can('update', $series)--}}
{{--    <x-button href="{{ route('series.edit',  $series) }}">Edit page</x-button>--}}
{{--    @endcan--}}


{{--    @can('update', $series)--}}
{{--        <x-button>--}}
{{--        <form action="{{ route('series.destroy', $series) }}" method="POST">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}

{{--           <button type="submit">Delete</button>--}}
{{--       </form>--}}
{{--   </x-button>--}}
{{--    @endcan--}}

{{--</x-layout>--}}

<x-layout>
    <div class="max-w-5xl mx-auto py-8">

        <x-header>{{ $series->name }}</x-header>

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <strong>Let op!</strong> {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col md:flex-row gap-6">
            @if ($series->image)
                <div class="md:w-1/3">
                    <img src="{{ asset('storage/' . $series->image) }}"
                         alt="{{ $series->name }}"
                         class="rounded-lg w-full object-cover">
                </div>
            @endif

            <div class="md:w-2/3 space-y-4">
                <div class="flex flex-wrap gap-3">
                    <p class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm">
                        Category: {{ $series->category->type }}
                    </p>
                    <p class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Genre: {{ $series->category->genre }}
                    </p>
                    <p class="bg-fuchsia-100 text-fuchsia-700 px-3 py-1 rounded-full text-sm">
                        Status: {{ $series->status }}
                    </p>
                    <p class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm">
                        Episodes: {{ $series->episodes}}
                    </p>
                </div>

                <p class="text-gray-700 leading-relaxed">
                    {{ $series->info }}
                </p>
            </div>
        </div>

        <div class="flex flex-wrap gap-3 mt-6">
            <x-button href="{{ route('series.index') }}">
                ← Go back
            </x-button>

            @can('update', $series)
                <x-button href="{{ route('series.edit', $series) }}">
                    Edit page
                </x-button>
            @endcan

            @can('update', $series)
                <x-button>
                    <form action="{{ route('series.destroy', $series) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>
                </x-button>
            @endcan
        </div>

    </div>
</x-layout>
