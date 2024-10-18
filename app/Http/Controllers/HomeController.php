<?php

namespace App\Http\Controllers;

use App\Models\AccessaryType;
use App\Models\Stock;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $accessaries = AccessaryType::all();
        $brands = Brand::all();
        $stocks = Stock::all();
        $order_item = OrderItems::all();
        $users = User::all();
        $qty_products = $products->sum('quantity');
        $total_price = $order_item->sum('price');
        $total_stocks = $stocks->sum('quantity');

        
        return view('home', [
            'qty_products'=>$qty_products,
            'categories'=>$categories,
            'accessaries' => $accessaries,
            'brands' => $brands,
            'total_stocks' => $total_stocks,
            'total_price' => $total_price,
            'users'=>$users
        ]);
    }
}
