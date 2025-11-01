<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use phpDocumentor\Reflection\DocBlock\ExampleFinder;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use AuthorizesRequests;

    public function index(Request $request)
    {
//
//        $series = Serie::all();
//        dd($series);



        $series = Serie::with('category')
            ->filter(request(['search', 'category']))
            ->paginate(12)
            ->withQueryString();

        $categories = Category::all();

        return view('series.index', compact('series', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

         $categories = Category::all();
        return view('series.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'episodes' => ['required', 'string'],
            'status' => ['required', 'string'],
            'info' => ['required', 'string'],
            'category_id'=> ['exists:categories,id'],
            'image' => ['required', 'image', 'max:2048'],
        ]);

        $nameOfFile = $request->file('image')->storePublicly('series', 'public');

        $serie = new Serie();
        $serie->name = $request->input('name');
        $serie->episodes = $request->input('episodes');
        $serie->status = $request->input('status');
        $serie->info = $request->input('info');
        $serie->category_id = $request->input('category_id');
        $serie->image = $nameOfFile;
        $serie->user_id = auth()->id();

//
        $serie->save();

        return redirect()->route('series.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Serie $series)
    {
        $categories = Category::all();
        return view('series.show', compact('series', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serie $series)
    {

        $this->authorize('update', $series);
        $categories = Category::all();
        return view('series.edit', compact('series', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serie $series)
    {

        $this->authorize('update', $series);
        $request->validate([
            'name' => ['required', 'string'],
            'episodes' => ['required', 'string'],
            'status' => ['required', 'string'],
            'info' => ['required', 'string'],
            'category_id'=> ['required','exists:categories,id'],
            'image' => [ 'image', 'max:2048'],
        ]);

        $series->name        = $request['name'];
        $series->episodes    = $request['episodes'];
        $series->status      = $request['status'];
        $series->info        = $request['info'];
        $series->category_id = $request['category_id'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storePublicly('series', 'public');
            $series->image = $path;
        }

        $series->save();
        return redirect()->route('series.show', compact('series'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $series)
    {
        $this->authorize('delete', $series);
        $series->delete();
        return redirect()->route('series.index');
    }
}
