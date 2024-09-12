<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductType;

class CategoryController extends Controller
{
    public function Category(Request $request) {
        $products_type = ProductType::all();
        $search_value = $request->query("search");
        $rowLength = $request->query('row_length', 10);
        
        $categories = DB::table('categories')
        ->join('products_type', 'categories.product_type', '=', 'products_type.id') 
        ->select('categories.*', 'products_type.name as products_type_name')
        ->where('categories.name', 'like', '%'.$request->input('search').'%')
        ->where('products_type.name', 'like', '%'.$request->input('product_type').'%')
        ->paginate($rowLength);

        return view('page.categories.index', [
            'categories'=>$categories,
            'search_value'=>$search_value,
            'products_type'=>$products_type
        ]);
    }

    public function Insert() {
        $products_type = ProductType::all();
        return view('page.categories.insert', ['products_type'=>$products_type]);
    }

    public function InsertData(Request $request) {
        $categories = new Category();
        $categories->name = $request->input('name');
        $categories->product_type = $request->input('product_type');
        $categories->save();
        return redirect()->route('category')->with('message', 'Categories Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $products_type = ProductType::all();
        $category = Category::find($id);
        return view('page.categories.edit', ['category'=>$category,'products_type'=>$products_type]);
    }

    public function DataUpdate(Request $request, $id) {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->product_type = $request->input('product_type');
        $category->update();
        
        return redirect()->route('category')->with('message','Category Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Category::destroy($request->id);
            return redirect()->route('category');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
