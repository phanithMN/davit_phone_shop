<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Product;

class ColorController extends Controller
{
    public function Color(Request $request) {

        $search_value = $request->query("search");
        $rowLength = $request->query('row_length', 10);
        $colors = Color::join('products', 'colors.product_id', '=', 'products.id')
        ->select('colors.*', 'products.name as product_name')
        ->where('products.name', 'like', '%'.$request->input('search').'%')
        ->paginate($rowLength);
        return view('page.colors.index', ['colors'=>$colors, 'search_value'=>$search_value]);
    }

    public function Insert() {
        $products = Product::all();
        return view('page.colors.insert', ['products' => $products]);
    }

    public function InsertData(Request $request) {
        
        $color = new Color();
        $color->color_code = $request->input("color_code");
        $color->color_name = $request->input("color_name");
        $color->product_id = $request->input("product_id");
        $color->save();

        return redirect()->route('color')->with('message', 'Color Inserted Successfully');
    }

    // update 
    public function Update($id) {

        $color = Color::find($id);
        $products = Product::all();

        return view('page.colors.edit', ['products'=>$products, 'color' => $color]);
    }

    public function DataUpdate(Request $request, $id) {

        $color = Color::find($id);
        $color->color_code = $request->input("color_code");
        $color->color_name = $request->input("color_name");
        $color->product_id = $request->input("product_id");
        $color->update();
        
        return redirect()->route('color')->with('message','Color Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {   
            Color::destroy($request->id);
            return redirect()->route('storage');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
