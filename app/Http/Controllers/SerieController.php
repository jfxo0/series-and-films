<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Serie;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\ExampleFinder;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $series = Serie::all();
//        dd($series);



        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $categories = Category::all();
//        return view('series.create');
          return view('series.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'episodes' => $request-> input('required', 'string'),
            'status' => $request-> input('required', 'string'),
            'info' => $request-> input('required', 'string'),
//            'category_id'=> ['exists:categories'],
            'image' => $request-> input('required', 'string'),
        ]);

        $serie = new Serie();
        $serie->name = $request->input('name');
        $serie->episodes = $request->input('episodes');
        $serie->status = $request->input('status');
        $serie->info = $request->input('info');
        $serie->category_id = $request->input('category_id');
        $serie->image = $request->input('image');

        $serie->save();

        return redirect()->route('series.index');
//        $request ->name = $request-> input("name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Serie $series)
    {

        return view('series.show', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serie $serie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serie $serie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie)
    {
        $serie->delete();
        return redirect()->route('series.index');
    }
}
