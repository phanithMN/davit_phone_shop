<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Feature;
use App\Models\Blog;

class HomePageController extends Controller
{
    public function HomePage() {

        $slide_banners  = Banners::all();
        $products  = Product::all();
        $features_top  = Feature::where('type', 'Feature Top')->first();
        $features_bottom  = Feature::where('type', 'Feature Bottom')->take(2)->get();
        $features_center  = Feature::where('type', 'Feature Center')->take(2)->get();
        $posts = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $categories = Category::all();
        $brands = Brand::all();
        
        return view('web-page.home', [
            'slide_banners'=>$slide_banners,
            'products' => $products,
            'features_center' => $features_center,
            'features_top' => $features_top,
            'features_bottom' => $features_bottom,
            'posts' => $posts,
            'categories' => $categories,
            'brands'=>$brands
        ]);
    }

    public function quickView($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

    return response()->json($product);
}

}
