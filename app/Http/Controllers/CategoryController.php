<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
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
    public function store(StoreCategoryRequest $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $category = Category::create([
            'name' => $validate['name'],
        ]);
        if ($category != NULL) {
            return redirect()->back();
        }
    }

    public function CategoryEvents($category)
    {
        $events = Category::with(['events' => function ($query) {
            $query->where('status', 0);
        }])->where('id', $category)->first();
        return view('category_events', compact('events'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UpdateCategoryRequest $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->input('name');
        $category->save();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
