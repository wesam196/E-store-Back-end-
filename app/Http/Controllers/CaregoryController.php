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
        $item->save();
        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Category::find($id);
        return response()->json($item);
    }

   

    public function update(Request $request, $id)
    {
        $item = Category::find($id);
        $item->category = $request->category;
        $item->save();
        return response()->json($item, 200);
    }

    public function delete($id)
    {
        Item::delete($id);
        return response()->json(null, 204);
    }
        
}
