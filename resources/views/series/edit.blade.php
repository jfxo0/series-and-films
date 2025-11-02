{{--<x-layout>--}}
{{--    @auth--}}
{{--        --}}
{{--    @endauth--}}

{{--    @if($errors->any())--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}

{{--            @endforeach--}}
{{--        </ul>--}}
{{--    @endif--}}

{{--    <x-header>Edit {{$series->name}} </x-header>--}}
{{--    <form method="POST" action="{{ route('series.update', $series) }}" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}

{{--        <div class="mb-4">--}}
{{--            <label for="name" class="block font-semibold">Name</label>--}}
{{--            <input class="border p-2 w-full" type="text" name="name" id="name" value="{{ old('name', $series->name) }}" required>--}}
{{--        </div>--}}
{{--        @error('name')--}}
{{--        <p class="text-red-500 text-sm">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <div class="mb-4">--}}
{{--            <label for="episodes" class="block font-semibold">Episodes</label>--}}
{{--            <input class="border p-2 w-full" type="number" id="episodes" name="episodes" value="{{ old('episodes', $series->episodes) }}" required--}}
{{--            >--}}
{{--            @error('episodes')--}}
{{--            <p class="text-red-500 text-sm">{{ $message }}</p>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div class="mb-4">--}}
{{--            <label for="status" class="block font-semibold">Status</label>--}}
{{--            <input class="border p-2 w-full" type="text" id="status" name="status" value="{{ old('status', $series->status) }}" required>--}}
{{--            @error('status')--}}
{{--            <p class="text-red-500 text-sm">{{ $message }}</p>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div class="mb-4">--}}
{{--            <label for="info" class="block font-semibold">Info</label>--}}
{{--            <textarea class="border p-2 w-full" name="info" id="info" rows="4" required>{{ old('info', $series->info) }}</textarea>--}}
{{--            @error('info')--}}
{{--            <p class="text-red-500 text-sm">{{ $message }}</p>--}}
{{--            @enderror--}}
{{--        </div>--}}

{{--        <div>--}}
{{--            <label for="category_id">category:</label>--}}
{{--            <select name="category_id" id="category_id">--}}
{{--                <option value="" selected="selected">Select a category</option>--}}
{{--                @foreach($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">{{ $category->type }}</option>--}}
{{--                    <option value="{{ $category->id }}" @if(old('category_id', $series->category_id) == $category->id) selected @endif>--}}
{{--                        {{ $category->type }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        @error('category_id')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}

{{--        --}}{{-- Show current image --}}
{{--        @if ($series->image)--}}
{{--            <div class="mb-4">--}}
{{--                <p class="font-semibold">Current image:</p>--}}
{{--                <img src="{{ asset('storage/' . $series->image) }}" alt="{{ $series->name }}" class="max-w-[200px] rounded shadow mb-2">--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        --}}{{-- Let user upload a new image (optional) --}}
{{--        <div>--}}
{{--            <label for="image">image:</label>--}}
{{--            <input type="file" name="image" id="image" value="{{old('image')}}">--}}
{{--        </div>--}}
{{--        @error('image')--}}
{{--        <p class="text-red-500 text-sm">{{ $message }}</p>--}}
{{--        @enderror--}}


{{--        <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded">--}}
{{--            Save changes--}}
{{--        </button>--}}

{{--    </form>--}}

{{--</x-layout>--}}


<x-layout>
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-2xl font-semibold mb-6">
            Edit: {{ $series->name }}
        </h1>

        @if (session('error'))
            <div class="mb-6 rounded-md bg-red-100 border border-red-300 text-red-700 px-4 py-3">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-md bg-red-50 border border-red-200 px-4 py-3">
                <p class="font-semibold text-red-700 mb-2">Er zijn fouten gevonden:</p>
                <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('series.update', $series) }}" method="POST" enctype="multipart/form-data" class="bg-white border rounded-xl shadow-sm p-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $series->name) }}" class="w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required />
            </div>

            <div>
                <label for="episodes" class="block text-sm font-medium text-gray-700 mb-1">Episodes</label>
                <input type="number" name="episodes" id="episodes" value="{{ old('episodes', $series->episodes) }}" class="w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" min="1" />
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <input type="text" name="status" id="status" value="{{ old('status', $series->status) }}" class="w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <div>
                <label for="info" class="block text-sm font-medium text-gray-700 mb-1">Info</label>
                <textarea name="info" id="info" rows="5" class="w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">{{ old('info', $series->info) }}</textarea>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $series->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->type ?? $category->name ?? 'Category '.$category->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <p class="block text-sm font-medium text-gray-700 mb-2">Current image:</p>
                @if ($series->image)
                    <img src="{{ asset('storage/' . $series->image) }}" alt="{{ $series->name }}" class="h-40 rounded-md border object-cover">
                @else
                    <p class="text-sm text-gray-500">No image uploaded.</p>
                @endif
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload new image <span class="text-gray-400 text-xs">(optional)</span></label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-700" accept="image/*" />
                <p class="mt-1 text-xs text-gray-400">Als je hier niets kiest blijft de oude afbeelding staan.</p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('series.show', $series) }}" class="inline-flex items-center px-4 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
                    Save changes
                </button>
            </div>
        </form>
    </div>
</x-layout>
