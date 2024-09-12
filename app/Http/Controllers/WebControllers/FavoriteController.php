<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Blog;

class FavoriteController extends Controller
{
    public function Favorite() {
        $posts = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $favorites = Favorite::where('user_id', Auth::id())->get();
        return view('web-page.favorite.index', ['favorites' => $favorites, 'posts'=> $posts ]);
    }

    public function FavoriteAdd($id) {
        $product = Product::findOrFail($id);
        $favoriteExists = Favorite::where('user_id', Auth::id())
        ->where('product_id', $product->id)
        ->exists();
        if ($favoriteExists) {
            return redirect()->back()->with('message', 'Product added to favorite ready!');
        } else {
            $favorite = new Favorite();
            $favorite->user_id = Auth::id();
            $favorite->product_id = $product->id;
            $favorite->name = $product->name;
            $favorite->price = $product->price;
            $favorite->image = $product->image;
            $favorite->save();
            return redirect()->back()->with('message', 'Product added to favorite successfully!');
        }
    }


    // delete 
    public function RemoveFav(Request $request, $id){
        try {
            Favorite::destroy($request->id);
            return redirect()->back()->with('message', 'Product has been remove from fav. successfully!');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
