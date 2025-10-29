<x-layout>
{{--    @auth--}}
{{--        --}}
{{--    @endauth--}}

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>

            @endforeach
        </ul>
    @endif

    <x-header>Edit {{$series->name}} </x-header>
    <form method="POST" action="{{ route('series.update', $series) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold">Name</label>
            <input class="border p-2 w-full" type="text" name="name" id="name" value="{{ old('name', $series->name) }}" required>
        </div>
        @error('name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror
        <div class="mb-4">
            <label for="episodes" class="block font-semibold">Episodes</label>
            <input class="border p-2 w-full" type="number" id="episodes" name="episodes" value="{{ old('episodes', $series->episodes) }}" required
            >
            @error('episodes')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block font-semibold">Status</label>
            <input class="border p-2 w-full" type="text" id="status" name="status" value="{{ old('status', $series->status) }}" required>
            @error('status')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="info" class="block font-semibold">Info</label>
            <textarea class="border p-2 w-full" name="info" id="info" rows="4" required>{{ old('info', $series->info) }}</textarea>
            @error('info')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id">category:</label>
            <select name="category_id" id="category_id">
                <option value="" selected="selected">Select a category</option>
                @foreach($categories as $category)
{{--                    <option value="{{ $category->id }}">{{ $category->type }}</option>--}}
                    <option value="{{ $category->id }}" @if(old('category_id', $series->category_id) == $category->id) selected @endif>
                        {{ $category->type }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('category_id')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

        {{-- Show current image --}}
        @if ($series->image)
            <div class="mb-4">
                <p class="font-semibold">Current image:</p>
                <img src="{{ asset('storage/' . $series->image) }}" alt="{{ $series->name }}" class="max-w-[200px] rounded shadow mb-2">
            </div>
        @endif

        {{-- Let user upload a new image (optional) --}}
        <div>
            <label for="image">image:</label>
            <input type="file" name="image" id="image" value="{{old('image')}}">
        </div>
        @error('image')
        <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror


        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">
            Save changes
        </button>

    </form>

</x-layout>
