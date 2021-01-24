<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FridgeFood;
use App\Models\FoodItem;
use App\Models\Fridge;
use Auth;

class FridgeFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fridgeId = Fridge::get()->where('user_id', Auth::id())->first();
        $FridgeFood = FridgeFood::where('fridge_id', $fridgeId->id)->with('getFood')->get();

        return view('myfridge.index', compact('FridgeFood'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foodItems = FoodItem::all();

        return view('myfridge.create', compact('foodItems'));
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
            'food_id' => 'required',
            'exp_date' => 'required',
        ]);

        $fridgeId = Fridge::get()->where('user_id', Auth::id())->first();

        $name = FoodItem::find($request->input('food_id'));

        FridgeFood::create([
            'food_id' => $request->input('food_id'),
            'expire_date' => $request->input('exp_date'),
            'fridge_id' => $fridgeId->id,
        ]);

        return redirect()->route('myfridge')
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
        $fridgeFood = FridgeFood::find($id);

        return view('myfridge.show', compact('fridgeFood'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodItem =FridgeFood::find($id);
        $foodItem->delete();

        return redirect()->route('myfridge')
            ->with('success', 'item deleted successfully');
    }
}
