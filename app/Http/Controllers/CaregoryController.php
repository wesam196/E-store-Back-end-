<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CaregoryController extends Controller
{
    public function index()
    {
        $items = Category::all();
        return response()->json($items);
    }



    public function store(Request $request)
    {
        $item = new Category; 
        $item->category = $request->category;
        return response()->json($item, 201);
    }
/*
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        Item::destroy($id);
        return response()->json(null, 204);
    }
        */
}
