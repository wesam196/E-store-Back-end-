<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class cartController extends Controller
{
    public function index(){
        $items = Cart::all();
        return response()->json($items);
    }

    public function store(Request $request){
       
        $item = new Cart;
        $item->user_id = $request->user_id;
        $item->product_id = $request->product_id;
        $item->totla = $request->totla;
        $item->save();
        return response()->json($item, 201);
    }


    public function show($id)
    {
        $item = Cart::where('user_id', $id)->get();
        return response()->json($item);
    }

   

    public function update(Request $request, $id)
    {
        $Item = Cart::FindOrFail($id);
        
        $item->totla = $request->totla;
        $item->save();
        return response()->json($item, 200);
    }

    public function delete($id)
    {
        $Item = Cart::FindOrFail($id);
        $item->delete();
        return response()->json(null, 204);
    }
}
