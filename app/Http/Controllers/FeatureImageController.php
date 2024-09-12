<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeatureImage;
use App\Models\Product;

class FeatureImageController extends Controller
{
    public function FeatureImage(Request $request) {
        $search_value = $request->query("search");
        $rowLength = $request->query('row_length', 10);
        $features_img = FeatureImage::join('products', 'feature_img.product_id', '=', 'products.id')
        ->select('feature_img.*', 'products.name as product_name')
        ->where('products.name', 'like', '%'.$request->input('search').'%')
        ->paginate($rowLength);
        return view('page.features-image.index', ['features_img'=>$features_img, 'search_value'=>$search_value]);
    }

    public function Insert() {
        $products = Product::all();
        return view('page.features-image.insert', ['products'=>$products]);
    }

    public function InsertData(Request $request) {
        $feature_img = new FeatureImage();
        $feature_img->product_id = $request->input('product_id');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/features-img', $filename);
            $feature_img->image = $filename;
        }
    
        $feature_img->save();
        return redirect()->route('feature.image')->with('message', 'Feature Image Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $feature_img = FeatureImage::find($id);
        $products = Product::all();
        return view('page.features-image.edit', ['feature_img'=>$feature_img, 'products'=>$products]);
    }

    public function DataUpdate(Request $request, $id) {
        $feature_image = FeatureImage::find($id);
        $feature_image->product_id = $request->input('product_id');
        if($request->hasFile('image'))
        {
            $destination = 'uploads/features-img'. $feature_image->image;
            if(FeatureImage::exists($destination))
            {
                FeatureImage::destroy($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/features-img', $filename);
            $feature_image->image = $filename;
            
        }
        $feature_image->update();
        
        return redirect()->route('feature.image')->with('message','Feature Image Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            FeatureImage::destroy($request->id);
            return redirect()->route('feature.image');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
