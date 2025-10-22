<x-layout>



    <form action="{{ route('series.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Serie Name:</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" required>
        </div>
        <div>
            <label for="episodes">Episodes:</label>
            <input type="number" name="episodes" id="episodes" value="{{old('episodes')}}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="{{old('status')}}" required>
        </div>

        <div>
            <label for="info">info:</label>
            <input type="text" name="info" id="info" value="{{old('info')}}" required>
        </div>
        <div>
            <label for="image">image:</label>
            <input type="text" name="image" id="image" value="{{old('image')}}" required>
        </div>

        <div>
            <label for="category_id">category:</label>
            <input type="number" name="category_id" id="category_id" value="{{old('category')}}" required>
        </div>

{{--        <div>--}}
{{--            <label for="image">image:</label>--}}
{{--            <input type="image" name="image" id="image" required>--}}
{{--        </div>--}}

        <button type="submit">Save</button>
    </form>

</x-layout>
