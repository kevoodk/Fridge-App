<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodCats = FoodCategory::all();

        return view('foodcat.index', compact('foodCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foodcat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        FoodCategory::create($request->all());

        return redirect()->route('foodcat')
            ->with('success', 'created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodCat = FoodCategory::find($id);

        return view('foodcat.show', compact('foodCat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodCat = FoodCategory::find($id);

         return view('foodcat.edit', compact('foodCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $foodCat = FoodCategory::find($id);

        $foodCat->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('foodcat')
            ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodCat = FoodCategory::find($id);
        $foodCat->delete();

        return redirect()->route('foodcat')
            ->with('success', 'item deleted successfully');
    }
}
