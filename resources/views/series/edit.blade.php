<x-layout>
{{--    @if($errors->any())--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}

{{--            @endforeach--}}
{{--        </ul>--}}
{{--    @endif--}}


  <h1>
      edit page
  </h1>



    <form action="{{route('series.update', $series)}}" method="POST">
        @csrf
@method('PUT')
        <div>
            <label for="name">Serie Name:</label>
            <input type="text" name="name" id="name" value="{{$series->name}}" required >
        </div>
        @error('name')
           <p class="text-red-500">{{ $message }}</p>
        @enderror
        <div>
            <label for="episodes">Episodes:</label>
            <input type="number" name="episodes" id="episodes" value="{{$series->episodes}}" required>
        </div>
        <div>
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="{{$series->status}}" required>
        </div>

        <div>
            <label for="info">info:</label>
            <input type="text" name="info" id="info" value="{{$series->info}}" required>
        </div>
        <div>
            <label for="image">image:</label>
            <input type="text" name="image" id="image" value="{{$series->image}}" required>
        </div>

        <div>
            <label for="category_id">category:</label>
            <input type="number" name="category_id" id="category_id" value="{{$series->category_id}}" required>
        </div>

{{--        <div>--}}
{{--            <label for="image">image:</label>--}}
{{--            <input type="image" name="image" id="image" required>--}}
{{--        </div>--}}

        <a href="{{ route('series.show', $series)}}">Cancel</a>
        <button type="submit">Update</button>
    </form>

</x-layout>
