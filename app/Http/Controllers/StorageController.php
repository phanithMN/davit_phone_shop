<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Storage;

class StorageController extends Controller
{
    public function Storage(Request $request) {

        $search_value = $request->query("search");
        $rowLength = $request->query('row_length', 10);
        $storages = Storage::join('products', 'storages.product_id', '=', 'products.id')
        ->select('storages.*', 'products.name as product_name')
        ->where('products.name', 'like', '%'.$request->input('search').'%')
        ->paginate($rowLength);
        return view('page.storages.index', ['storages'=>$storages, 'search_value'=>$search_value]);
    }

    public function Insert() {
        $products = Product::all();
        return view('page.storages.insert', ['products' => $products]);
    }

    public function InsertData(Request $request) {
        
        $storage = new Storage();
        $storage->size = $request->input("size");
        $storage->product_id = $request->input("product_id");
        $storage->save();

        return redirect()->route('storage')->with('message', 'Storage Inserted Successfully');
    }

    // update 
    public function Update($id) {

        $storage = Storage::find($id);
        $products = Product::all();

        return view('page.storages.edit', ['products'=>$products, 'storage' => $storage]);
    }

    public function DataUpdate(Request $request, $id) {

        $storage = Storage::find($id);
        $storage->size = $request->input("size");
        $storage->product_id = $request->input("product_id");
        $storage->update();
        
        return redirect()->route('storage')->with('message','storage Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {   
            Storage::destroy($request->id);
            return redirect()->route('storage');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
