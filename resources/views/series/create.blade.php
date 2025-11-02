{{--<x-layout>--}}
{{--    @if($errors->any())--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}

{{--            @endforeach--}}
{{--        </ul>--}}
{{--    @endif--}}

{{--    <x-header>Create new serie </x-header>--}}

{{--    <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        <div>--}}
{{--            <label for="name">Serie Name:</label>--}}
{{--            <input type="text" name="name" id="name" value="{{old('name')}}" required >--}}
{{--        </div>--}}
{{--        @error('name')--}}
{{--           <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <div>--}}
{{--            <label for="episodes">Episodes:</label>--}}
{{--            <input type="number" name="episodes" id="episodes" value="{{old('episodes')}}" required>--}}
{{--        </div>--}}
{{--        @error('episodes')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <div>--}}
{{--            <label for="status">Status:</label>--}}
{{--            <input type="text" name="status" id="status" value="{{old('status')}}" required>--}}
{{--        </div>--}}
{{--        @error('status')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <div>--}}
{{--            <label for="info">info:</label>--}}
{{--            <input type="text" name="info" id="info" value="{{old('info')}}" required>--}}
{{--        </div>--}}
{{--        @error('info')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <div>--}}
{{--            <label for="image">image:</label>--}}
{{--            <input type="file" name="image" id="image" value="{{old('image')}}">--}}
{{--        </div>--}}
{{--        @error('image')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}
{{--        <div>--}}
{{--            <label for="category_id">category:</label>--}}
{{--            <select name="category_id" id="category_id">--}}
{{--                <option value="" selected="selected">Select a category</option>--}}
{{--                @foreach($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">{{ $category->type }} - {{$category->genre}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        @error('category_id')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}

{{--        <div>--}}
{{--            <label for="genre">genre:</label>--}}
{{--            <select name="genre" id="genre">--}}
{{--                <option value="" selected="selected">Select genres</option>--}}
{{--                @foreach($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">{{ $category->genre }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        @error('genre')--}}
{{--        <p class="text-red-500">{{ $message }}</p>--}}
{{--        @enderror--}}


{{--        <button type="button">cancel</button>--}}
{{--        <button type="submit">Save</button>--}}
{{--    </form>--}}

{{--</x-layout>--}}


<x-layout>
    <div class="max-w-3xl mx-auto py-10">
        <h1 class="text-3xl font-bold mb-8">Create new serie</h1>

        @if ($errors->any())
            <div class="mb-6 rounded-lg bg-red-100 border border-red-200 px-4 py-3 text-red-700">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-xl shadow">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Serie name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div>
                <label for="episodes" class="block text-sm font-medium text-gray-700 mb-1">Episodes</label>
                <input type="number" name="episodes" id="episodes" value="{{ old('episodes') }}" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <input type="text" name="status" id="status" value="{{ old('status') }}" placeholder="finished / ongoing" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>

            <div>
                <label for="info" class="block text-sm font-medium text-gray-700 mb-1">Info</label>
                <textarea name="info" id="info" rows="5" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
 {{ old('info') }}
                </textarea>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" id="category_id" class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                            {{ $category->type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700  hover:file:bg-indigo-100">
            </div>

            <div class="flex items-center justify-between gap-4">
                <a href="{{ route('series.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>

                <button type="submit" class="inline-flex items-center px-6 py-2.5 rounded-md bg-indigo-600 text-white font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</x-layout>
