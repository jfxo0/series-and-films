<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index()
    {


        $this->authorize('view-admin');
        $adminOverview = User::all();
//        dd($adminOverview);
//        dd(auth()->user());

        $seriesCount     = Serie::count();
        $categoriesCount = Category::count();
        $usersCount      = User::count();

        return view('admin', compact('adminOverview', 'seriesCount', 'categoriesCount', 'usersCount'));
    }


    public function series()
    {
        $series = Serie::with('category', 'user')->latest()->get();

        return view('admin.series', compact('series'));
    }

    public function categories()
    {
        $categories = Category::latest()->get();

        return view('admin.categories', compact('categories'));
    }

    public function users()
    {
        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }

    public function toggleActive(User $user)
    {
        $user->active = ! $user->active;
        $user->save();

        return back()->with('success', 'Status aangepast.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
