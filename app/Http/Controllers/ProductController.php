<?php

namespace App\Http\Controllers;

use App\Models\AccessaryType;
use App\Models\ColorFeature;
use App\Models\FeatureImage;
use App\Models\Ram;
use App\Models\RamFeature;
use App\Models\Storage;
use App\Models\StorageFeature;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductType;
use App\Models\Color;

class ProductController extends Controller
{
    public function Product(Request $request) {
        $search_value = $request->query("search");
        $rowLength = $request->query('row_length', 10);
        $categories = Category::all();
        $brands = Brand::all();
        $products_type = ProductType::all();
        $accessaries = AccessaryType::all();

        $products = Product::leftJoin('categories', 'products.category_id', '=', 'categories.id') 
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id') 
            ->leftJoin('accessaries_type', 'products.accessary_id', '=', 'accessaries_type.id') 
            ->leftJoin('products_type', 'products.product_type', '=', 'products_type.id') 
            ->select('products.*', 
            'categories.name as category_name', 
            'brands.name as brand_name', 
            'products_type.name as products_type_name',
            'accessaries_type.name as accessary_name',
            )
            ->where('products.name', 'like', '%'.$request->input('search').'%')
            ->where(function($query) use ($request) {
                $query->where('categories.name', 'like', '%'.$request->query("category").'%')->orWhereNull('categories.name');
            })
            ->where(function($query) use ($request) {
                $query->where('products.type', 'like', '%'.$request->query("type").'%')->orWhereNull('products.type');
            })
            ->where(function($query) use ($request) {
                $query->where('brands.name', 'like', '%'.$request->query("brand").'%')->orWhereNull('brands.name');
            })
            ->where(function($query) use ($request) {
                $query->where('accessaries_type.name', 'like', '%'.$request->query("accessary_name").'%')->orWhereNull('accessaries_type.name');
            })
            ->where(function($query) use ($request) {
                $query->where('products_type.name', 'like', '%'.$request->query("product_type").'%')->orWhereNull('products_type.name');
            })
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
        $rams = Ram::orderBy('size', 'ASC')->get();
        $storages = Storage::orderBy('size', 'ASC')->get();
        $colors = Color::get();

        return view('page.products.insert', [
            'categories'=>$categories, 
            'brands'=>$brands, 
            'products_type'=>$products_type,
            'accessaries'=>$accessaries,
            'rams'=>$rams,
            'storages'=>$storages,
            'colors'=>$colors
        ]);
    }

    public function InsertData(Request $request) {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'price' => 'required|numeric|min:0',
        //     'quantity' => 'required|numeric|min:0',
        //     'discount_price' => 'required|numeric|lt:price',
        //     'category_id' => 'required|exists:categories,id', 
        //     'brand_id' => 'required|exists:brands,id', 
        //     'product_type' => 'required|string',
        //     'accessary_id' => 'required|exists:accessaries,id', 
        //     'type' => 'required|string',
        //     'images' => 'required|array',
        //     'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        // ]);

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


        $feature_img = new FeatureImage();
        $feature_img->product_id = $products->id;

        if ($request->hasFile('thumbnails')) {
            // Loop through each file in the 'thumbnails' array
            foreach ($request->file('thumbnails') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;  

                // Move each file to the designated folder
                $file->move('uploads/features-img', $filename);
                // Save the file name in the database for each image
                $feature_img = new FeatureImage();  
                $feature_img->product_id = $products->id;
                $feature_img->image = $filename;
                $feature_img->save();  // Save the image
            }
        }

        // rams 
        if ($request->has('rams')) {
            $rams = Ram::whereIn('id', $request->rams)->pluck('id')->toArray(); 
            foreach ($rams as $ram_id) {
                RamFeature::insert([
                    'product_id' => $products->id,
                    'ram_id' => $ram_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // storages 
        if ($request->has('storages')) {
            $storages = Storage::whereIn('id', $request->storages)->pluck('id')->toArray(); 
            foreach ($storages as $storage_id) {
                StorageFeature::insert([
                    'product_id' => $products->id,
                    'storage_id' => $storage_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // color 
        if ($request->has('colors')) {
            $colors = Color::whereIn('id', $request->colors)->pluck('id')->toArray(); 
            foreach ($colors as $color_id) {
                ColorFeature::insert([
                    'product_id' => $products->id,
                    'color_id' => $color_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        return redirect()->route('product')->with('message', 'Product Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $products_type = ProductType::all();
        $accessaries = AccessaryType::all();
        $rams = Ram::orderBy('size', 'ASC')->get();
        $storages = Storage::orderBy('size', 'ASC')->get();
        $colors = Color::get();
        $rams_feature = $product->rams->pluck('id')->toArray();
        $storages_feature = $product->storages->pluck('id')->toArray();
        $colors_feature = $product->colors->pluck('id')->toArray();

        return view('page.products.edit', [
            'product' => $product, 
            'categories' => $categories,
            'brands'=> $brands,
            'products_type' => $products_type,
            'accessaries'=>$accessaries,
            'rams'=>$rams,
            'rams_feature'=>$rams_feature,
            'storages'=>$storages,
            'storages_feature'=>$storages_feature,
            'colors'=>$colors,
            'colors_feature'=>$colors_feature
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

        // image feature thumbnail 
        if ($request->hasFile('thumbnails')) {
            $oldImages = FeatureImage::where('product_id', $products->id)->get();
            foreach ($oldImages as $oldImage) {
                if (file_exists(public_path('uploads/features-img/' . $oldImage->image))) {
                    unlink(public_path('uploads/features-img/' . $oldImage->image));
                }
                $oldImage->delete();
            }
        
            foreach ($request->file('thumbnails') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;  
        
                $file->move(public_path('uploads/features-img'), $filename);
        
                $feature_img = new FeatureImage();  
                $feature_img->product_id = $products->id;
                $feature_img->image = $filename;
                $feature_img->save();  
            }
        }

        // rams 
        if ($request->has('rams')) {
            $rams = $request->input('rams');
            $products->rams()->sync($rams);
        } else {
            $products->rams()->detach();
        }

        //storages
        if ($request->has('storages')) {
            $storages = $request->input('storages');
            $products->storages()->sync($storages);
        } else {
            $products->storages()->detach();
        }

        //colors
        if ($request->has('colors')) {
            $colors = $request->input('colors');
            $products->colors()->sync($colors);
        } else {
            $products->colors()->detach();
        }
        
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
