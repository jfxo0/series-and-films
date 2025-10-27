<x-layout>
    <form
        method="POST" action="{{ route('series.update', $series) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Name</label>
            <input
                class="border p-2 w-full"
                type="text"
                name="name"
                value="{{ old('name', $series->name) }}"
                required
            >
            @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Episodes</label>
            <input
                class="border p-2 w-full"
                type="number"
                name="episodes"
                value="{{ old('episodes', $series->episodes) }}"
                required
            >
            @error('episodes')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Status</label>
            <input
                class="border p-2 w-full"
                type="text"
                name="status"
                value="{{ old('status', $series->status) }}"
                required
            >
            @error('status')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Info</label>
            <textarea
                class="border p-2 w-full"
                name="info"
                rows="4"
                required
            >{{ old('info', $series->info) }}</textarea>
            @error('info')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{--       --}}

        {{-- Show current image --}}
        @if ($series->image)
            <div class="mb-4">
                <p class="font-semibold">Current image:</p>
                <img
                    src="{{ asset('storage/' . $series->image) }}"
                    alt="{{ $series->name }}"
                    class="max-w-[200px] rounded shadow mb-2"
                >
            </div>
        @endif

        {{-- Let user upload a new image (optional) --}}
        <div>
            <label for="image">image:</label>
            <input type="file" name="image" id="image" value="{{old('image')}}">
            @error('image')
            <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

        </div>



        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">
            Save changes
        </button>

    </form>

</x-layout>


{{--<x-layout>--}}
{{--    @if($errors->any())--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}

{{--            @endforeach--}}
{{--        </ul>--}}
{{--    @endif--}}


{{--  <h1>--}}
{{--      edit page--}}
{{--  </h1>--}}

{{--    <form action="{{route('series.update', $series)}}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--@method('PUT')--}}

{{--        <div>--}}
{{--            <label for="name">Serie Name:</label>--}}
{{--            <input type="text" name="name" id="name" value="{{$series->name}}" required >--}}
{{--        </div>--}}
{{--        @error('name')--}}
{{--           <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <div>--}}
{{--            <label for="episodes">Episodes:</label>--}}
{{--            <input type="number" name="episodes" id="episodes" value="{{$series->episodes}}" required>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="status">Status:</label>--}}
{{--            <input type="text" name="status" id="status" value="{{$series->status}}" required>--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <label for="info">info:</label>--}}
{{--            <input type="text" name="info" id="info" value="{{$series->info}}" required>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for="image">image:</label>--}}
{{--            <input type="file" name="image" id="image" value="{{old('image')}}">--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <label for="category_id">category:</label>--}}
{{--            <input type="number" name="category_id" id="category_id" value="{{$series->category_id}}" required>--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <label for="image">image:</label>--}}
{{--            <input type="image" name="image" id="image" required>--}}
{{--        </div>--}}

{{--        <a href="{{ route('series.show', $series)}}">Cancel</a>--}}
{{--        <button type="submit">Update</button>--}}
{{--    </form>--}}

{{--</x-layout>--}}
