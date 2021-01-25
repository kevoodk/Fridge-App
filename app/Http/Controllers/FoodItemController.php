<?php

namespace App\Http\Controllers;

use App\Imports\FoodImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\FoodItem;
use App\Models\FoodCategory;

class FoodItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodItems = FoodItem::all();
        $foods = [];

        foreach($foodItems as $foodItem) {
            $foodCat = $foodItem->cat->name;
            $foods[] = ['cat' => $foodCat, 'fname' => $foodItem->fname, 'id' => $foodItem->id];
        }

        return view('fooditem.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foodCats = FoodCategory::all();

        return view('fooditem.create', compact('foodCats'));
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
            'fname' => 'required',
            'cat_id' => 'required',
        ]);

        FoodItem::create($request->all());

        return redirect()->route('fooditem')
            ->with('success', 'created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodItem = FoodItem::find($id);

        return view('fooditem.show', compact('foodItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodItem = FoodItem::find($id);

        return view('fooditem.edit', compact('foodItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required',
        ]);
        $foodItem = FoodItem::find($id);

        $foodItem->update([
            'fname' => $request->input('fname'),
        ]);

        return redirect()->route('fooditem')
            ->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodItem =FoodItem::find($id);
        $foodItem->delete();

        return redirect()->route('fooditem')
            ->with('success', 'item deleted successfully');
    }

    public function import() {
        Excel::import(new FoodImport, storage_path('app/public/foods.xlsx'));

        return redirect('/')->with('success', 'All good!');
    }
}
