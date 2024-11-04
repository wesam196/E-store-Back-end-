<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\requests;
class RequestsController extends Controller
{
    public function index(){
        $item = requests::all();

        return response()->json($item);
    }

    public function store(Request $request){
        $item = new requests;

        $item->user_id = $request->user_id;
        $item->product_id = $request->product_id;
        $item->payType = $request->payType;
        $item->save();

        return response()->json($item, 200);
    }

    public function show($id){
        $item = requests::find($id);
        return response()->json($item);
    }

   

    public function delete($id) {
        $item = requests::findOrFail($id); // Corrected spelling of 'products'
        
        
        $item->delete();
        return response()->json(null, 204);
    }
}
