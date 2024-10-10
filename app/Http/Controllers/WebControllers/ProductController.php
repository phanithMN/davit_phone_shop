<?php
namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;

use App\Models\Accessaries;
use App\Models\ColorFeature;
use App\Models\RamFeature;
use App\Models\StorageFeature;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\FeatureImage;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Specification;
use App\Models\SoftInfo;
use App\Models\Ram;
use App\Models\Storage;
use App\Models\Color;
use App\Models\Blog;

class ProductController extends Controller
{
    public function Product(Request $request) {
        $sort_by = $request->query('sort_by');
        $rowLength = $request->query('row_length', 20);
        $posts = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $products_type = ProductType::all();
        $brands = Brand::all();
        $categories = Category::all();
        
        $products = Product::join('categories', 'products.category_id', '=', 'categories.id') 
        ->join('brands', 'products.brand_id', '=', 'brands.id') 
        ->join('accessaries_type', 'products.accessary_id', '=', 'accessaries_type.id') 
        ->join('products_type', 'products.product_type', '=', 'products_type.id') 
        ->select('products.*', 
            'categories.name as category_name', 
            'brands.name as brand_name', 
            'products_type.name as products_type_name',
            'accessaries_type.name as accessary_name'
        )
        ->where('products.name', 'like', '%'.$request->query("search_name").'%')
        ->where('products_type.name', 'like', '%'.$request->query("product_type_name").'%')
        ->where('brands.name', 'like', '%'.$request->query("brand_name").'%')
        ->where('accessaries_type.name', 'like', '%'.$request->query("accessary_name").'%')
        ->where('categories.name', 'like', '%'.$request->query("category_name").'%')
        ->paginate($rowLength);
       

        // Add sorting condition based on the selected option
        switch ($sort_by) {
            case 'title-ascending':
                $products = Product::orderBy('name', 'asc')->paginate($rowLength);
                break;
            case 'title-descending':
                $products = Product::orderBy('name', 'desc')->paginate($rowLength);
                break;
            case 'price-ascending':
                $products = Product::orderBy('price', 'asc')->paginate($rowLength);
                break;
            case 'price-descending':
                $products = Product::orderBy('price', 'desc')->paginate($rowLength);
                break;
            default:
                // Default sorting option or error handling
        }


        return view('web-page.product.shop', 
        [
            'products' => $products,
            'products_type' => $products_type,
            'brands' => $brands,
            'categories' => $categories,
            'sort_by' => $sort_by,
            'posts' => $posts,

        ]);
    }

    public function ProductDetail($id) {

        $posts = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $product = Product::findOrFail($id);
        $products = Product::orderBy('created_at', 'desc')->get();
        $specifications = Specification::where('product_id', $id)->get();
        $softinfos = SoftInfo::where('product_id', $id)->get();
        $features_img = FeatureImage::where('product_id', $id)->get();
        $rams = RamFeature::join('rams', 'rams.id', '=', 'rams_feature.ram_id') 
        ->select('rams_feature.*', 'rams.size as size')
        ->where('product_id', $id)->get();
        $storages = StorageFeature::join('storages', 'storages.id', '=', 'storages_feature.storage_id') 
        ->select('storages_feature.*', 'storages.size as size')
        ->where('product_id', $id)->get();
        $colors = ColorFeature::join('colors', 'colors.id', '=', 'colors_feature.color_id') 
        ->select('colors_feature.*', 'colors.color_name as color_name', 'colors.color_code as color_code')
        ->where('product_id', $id)->get();

        return view('web-page.product.product-detail', [
            'product' => $product,
            'products' => $products,
            'specifications' => $specifications,
            'softinfos' => $softinfos,
            'features_img' => $features_img,
            'rams' => $rams,
            'storages' => $storages,
            'colors' => $colors,
            'posts' => $posts
        ]);
    }

    public function show($id)
    {
        // Find the product by ID
        $product = Product::find($id);

        // Check if the product exists
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found.');
        }

        // Return the product details view with the product data
        return view('web-page.home', compact('product'));
    }
}
