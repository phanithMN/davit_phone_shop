<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Blog;

class CartController extends Controller
{
    
    public function Cart()
    {
        $posts = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $carts = Cart::where('user_id', Auth::guard('customer')->user()->id)->get();  
        return view('web-page.cart.cart', ['carts'=>$carts, 'posts' => $posts]);
    }

    public function AddToCart(Request $request, $id)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer.login')->with('error', 'You need to be logged in to add items to the cart.');
        }

        $product = Product::findOrFail($id);
        $userId = Auth::guard('customer')->user()->id;
        $cartItem = Cart::where('product_id', $product->id)
                    ->where('user_id', $userId)
                    ->first();
        
        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            $cartItem = new Cart();
            $cartItem->product_id = $product->id;
            $cartItem->product_type = $product->product_type;
            $cartItem->image = $product->image;
            $cartItem->name = $product->name;
            $cartItem->quantity = $request->input('quantity') ? $request->input('quantity') : 1;
            $cartItem->price = $product->price;
            $cartItem->user_id = $userId;
            $cartItem->color = $request->input('color');
            $cartItem->ram = $request->input('ram');
            $cartItem->storage = $request->input('storage');
            $cartItem->save();
        }
        return redirect()->back()->with('message', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */

     public function updateCart(Request $request, $id)
     {
        
        $request->validate([
            'quantity' => 'required|integer|min=1'
        ]);
        // Find the cart item
        $cartItem = Cart::findOrFail($id);

        if ($cartItem) {
            // Update the quantity
            $cartItem->quantity = $request->input('quantity');
            $cartItem->save();

            return response()->json(['success' => true, 'message' => 'Cart updated successfully!']);
        }

         
         return redirect()->back()->with('message', 'Cart updated successfully!');
    }
   
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function RemoveCart($id)
    {

        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->back()->with('message', 'Item has been removed!');
    }
}
