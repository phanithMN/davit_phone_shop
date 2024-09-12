<?php

namespace App\Http\Controllers;

use App\Models\AccessaryType;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductType;

class ProductController extends Controller
{
    public function Product(Request $request) {
        $search_value = $request->query("search");
        $rowLength = $request->query('row_length', 10);
        $categories = Category::all();
        $brands = Brand::all();
        $products_type = ProductType::all();
        $accessaries = AccessaryType::all();

        $products = Product::join('categories', 'products.category_id', '=', 'categories.id') 
            ->join('brands', 'products.brand_id', '=', 'brands.id') 
            ->join('accessaries_type', 'products.accessary_id', '=', 'accessaries_type.id') 
            ->join('products_type', 'products.product_type', '=', 'products_type.id') 
            ->select('products.*', 
            'categories.name as category_name', 
            'brands.name as brand_name', 
            'products_type.name as products_type_name',
            'accessaries_type.name as accessary_name',
            )
            ->where('products.name', 'like', '%'.$request->input('search').'%')
            ->where('products.type', 'like', '%'.$request->query("type").'%')
            ->where('categories.name', 'like', '%'.$request->query("category").'%')
            ->where('brands.name', 'like', '%'.$request->query("brand").'%')
            ->where('accessaries_type.name', 'like', '%'.$request->query("accessary_name").'%')
            ->where('products_type.name', 'like', '%'.$request->query("product_type").'%')
            ->paginate($rowLength);

        return view('page.products.index', [
            'products'=>$products, 
            'search_value' => $search_value,
            'categories'=>$categories,
            'brands'=>$brands,
            'products_type'=>$products_type,
            'accessaries'=>$accessaries
        ]);
    }

    public function Insert() {
        $categories = Category::all();
        $brands = Brand::all();
        $products_type = ProductType::all();
        $accessaries = AccessaryType::all();

        return view('page.products.insert', [
            'categories'=>$categories, 
            'brands'=>$brands, 
            'products_type'=>$products_type,
            'accessaries'=>$accessaries,
        ]);
    }

    public function InsertData(Request $request) {
        $products = new Product();
        $products->name = $request->input('name');
        $products->price = $request->input('price');
        $products->discount_price = $request->input('discount_price');
        $products->type = $request->input('type');
        $products->category_id = $request->input('category_id');
        $products->brand_id = $request->input('brand_id');
        $products->product_type = $request->input('product_type');
        $products->quantity = $request->input('quantity');
        $products->accessary_id = $request->input('accessary_id');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/products', $filename);
            $products->image = $filename;
        }
        $products->save();
        return redirect()->route('product')->with('message', 'Product Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $products_type = ProductType::all();
        $accessaries = AccessaryType::all();

        return view('page.products.edit', [
            'product' => $product, 
            'categories' => $categories,
            'brands'=> $brands,
            'products_type' => $products_type,
            'accessaries'=>$accessaries,
        ]);
    }

    public function DataUpdate(Request $request, $id) {
        $products = Product::find($id);
        $products->name = $request->input('name');
        $products->price = $request->input('price');
        $products->discount_price = $request->input('discount_price');
        $products->type = $request->input('type');
        $products->category_id = $request->input('category_id');
        $products->brand_id = $request->input('brand_id');
        $products->product_type = $request->input('product_type');
        $products->quantity = $request->input('quantity');
        $products->accessary_id = $request->input('accessary_id');
        if($request->hasFile('image'))
        {
            $destination = 'uploads/products'. $products->image;
            if(Product::exists($destination))
            {
                Product::destroy($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/products', $filename);
            $products->image = $filename;
            
        }
        $products->update();
        
        return redirect()->route('product')->with('message','Product Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Product::destroy($request->id);
            return redirect()->route('product')->with('message','Delete Successfully');
        } catch(\Exception $e) {
            report($e);
        }
    }

    
}
