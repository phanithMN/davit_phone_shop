<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Blog;

class CheckoutController extends Controller
{
    public function Checkout() {

        $posts = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $carts = Cart::where('user_id', Auth::guard('customer')->user()->id)->get();    

        return view('web-page.checkout.index', ['carts' => $carts, 'posts' => $posts]);
    }

    public function PlaceOrder(Request $request) {
        $request->validate([
            'contact' => 'required',
            'country' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'shipping' => 'required',
            'payment' => 'required',
        ]);

        // Create Order
        $order = Orders::create([
            'contact' => $request->input('contact'),
            'country' => $request->input('country'),
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'address' => $request->input('address'),
            'apartment' => $request->input('apartment'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postal_code'),
            'shipping' => $request->input('shipping'),
            'payment' => $request->input('payment'),
            'status' => $request->input('shipping'),  
            'tracking_no' => 'Davit Phone Shop' . rand(1111, 9999),
        ]);

        // Get Cart Items
        $userId = Auth::guard('customer')->user()->id;
        $cartitems = Cart::where('user_id', $userId)->get();
        // Create Order Items
        foreach ($cartitems as $cartitem) {
            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartitem->product_id,
                'product_type' => $cartitem->product_type,
                'user_id' => $userId,
                'product_name' => $cartitem->name,
                'quantity' => $cartitem->quantity,
                'price' => $cartitem->price,
                'ram' => $cartitem->ram,
                'storage' => $cartitem->storage,
                'color' => $cartitem->color,
            ]);
        }

        // Update User Address if not set
        $user = Auth::guard('customer')->user();
        if (is_null($user->id)) {
            $user->update([
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'address' => $request->input('address'),
                'apartment' => $request->input('apartment'),
                'city' => $request->input('city'),
                'postal_code' => $request->input('postal_code'),
            ]);
        }

        $cartitems = Cart::where('user_id', Auth::guard('customer')->user()->id)->get();
        Cart::destroy($cartitems);
        return redirect()->route('home-page')->with('message', 'Order placed Successfully');
    }
}
