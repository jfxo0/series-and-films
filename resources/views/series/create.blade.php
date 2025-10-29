<x-layout>
{{--    @if($errors->any())--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}

{{--            @endforeach--}}
{{--        </ul>--}}
{{--    @endif--}}

    <x-header>Create new serie </x-header>

    <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Serie Name:</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" required >
        </div>
        @error('name')
           <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
            <label for="episodes">Episodes:</label>
            <input type="number" name="episodes" id="episodes" value="{{old('episodes')}}" required>
        </div>
        @error('episodes')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="{{old('status')}}" required>
        </div>
        @error('status')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
            <label for="info">info:</label>
            <input type="text" name="info" id="info" value="{{old('info')}}" required>
        </div>
        @error('info')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
            <label for="image">image:</label>
            <input type="file" name="image" id="image" value="{{old('image')}}">
        </div>
        @error('image')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
            <label for="category_id">category:</label>
            <select name="category_id" id="category_id">
                <option value="" selected="selected">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->type }} - {{$category->genre}}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
        <p class="text-red-500">{{ $message }}</p>
        @enderror

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


        <button type="button">cancel</button>
        <button type="submit">Save</button>
    </form>

</x-layout>
