<x-layout>
    <x-header>Series </x-header>

    <div class="max-w-7xl mx-auto flex-row px-4 py-10">

        <form method="GET" action="{{ route('series.index') }}" class="mb-6 flex gap-4">
            <select name="category" class="bg-gray-800 border border-gray-700 rounded px-3 py-2">
                <option value="">All categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->type }} — {{ $category->genre }}
                    </option>
                @endforeach
            </select>


            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search in name or info..." class="bg-gray-800 border border-gray-700 rounded px-3 py-2 w-64">

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">
                Filter
            </button>

            <a href="{{ route('series.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded">
                Reset
            </a>
        </form>
    </div>

{{--    {{ $series = Serie::with('category')->get()}}--}}
{{--    {{$series = \App\Models\Serie::with('category')->get()}}--}}


    <div class="max-w-7xl mx-auto px-4 py-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($series as $serie)
                <div class="group relative bg-white rounded-lg shadow dark:bg-gray-900 overflow-hidden flex flex-col">


                    <div class="aspect-[4/3] w-full overflow-hidden">
                        <img src="{{ asset('storage/' . $serie->image) }}" alt="{{ $serie->name }}" class="h-full w-full object-cover object-center transition-transform duration-300 group-hover:scale-105"/>
                    </div>

                    <div class="flex flex-col flex-1 p-6 text-center">
                        <span class="text-sm font-medium text-indigo-500 mb-1">
                            <a href="{{ route('series.show', $serie) }}">
                                {{ $serie->name }}
                            </a>
                        </span>

                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">
                            {{ $serie->name }}
                        </h3>

                        <div class="mt-auto">
                            <a
                                href="{{ route('series.show', $serie) }}"
                                class="inline-block rounded-md border border-gray-300 px-5 py-2 text-sm font-medium text-gray-700 hover:bg-indigo-600 hover:text-white hover:border-indigo-600 transition dark:border-gray-700 dark:text-gray-200 dark:hover:bg-indigo-600 dark:hover:border-indigo-600"
                            >
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-8 flex justify-center">
        {{ $series->links() }}
    </div>
</x-layout>
