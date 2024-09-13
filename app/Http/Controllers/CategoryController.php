<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function Category(Request $request) {
        $search_value = $request->query("search");
        $rowLength = $request->query('row_length', 10);
        
        $categories = Category::where('categories.name', 'like', '%'.$request->input('search').'%')
        ->paginate($rowLength);

        return view('page.categories.index', [
            'categories'=>$categories,
            'search_value'=>$search_value,
        ]);
    }

    public function Insert() {
        return view('page.categories.insert');
    }

    public function InsertData(Request $request) {
        $categories = new Category();
        $categories->name = $request->input('name');
        $categories->save();
        return redirect()->route('category')->with('message', 'Categories Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $category = Category::find($id);
        return view('page.categories.edit', ['category'=>$category]);
    }

    public function DataUpdate(Request $request, $id) {
        $category = Category::find($id);
        $category->name = $request->input('name');
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
