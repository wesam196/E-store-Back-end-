<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prodects;


class products extends Controller
{
    public function index(){
        $item = prodects::all();

        return response()->json($item);
    }

    public function store(Request $request){
     

        $item = new prodects;

        $item->title = $request->title;
        $item->description = $request->description;
        $item->category = $request->category;
        $item->price = $request->price;
        $item->discount = $request->discount;

        $image = $request->image;
        $imageName=time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('product' , $imageName);

        $item->image =$imageName;

        $item->save();

        return response()->json($item, 200);
    }

    public function show($id){
        $item = prodects::find($id);
        return response()->json($item);
    }

    public function update(Request $request, $id){
        $item = prodects::FindOrFail($id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->category = $request->category;
        $item->price = $request->price;
        $item->discount = $request->discount;

        $image = $request->image;
        $imageName=time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('product' , $imageName);

        $item->image =$imageName;

        $item->save();

        return response()->json($item, 200);
    }

    public function delete($id) {
        $item = prodects::findOrFail($id); // Corrected spelling of 'products'
        
        $path = 'product/' . $item->image; // Adjust if your file structure differs

        // Check if the file exists in the public directory and delete it
        if (file_exists(public_path($path))) { // Use public_path() to get the absolute path
            unlink(public_path($path)); // Delete the file using unlink()
        }    
       
    
        $item->delete();
        return response()->json(null, 204);
    }

}
