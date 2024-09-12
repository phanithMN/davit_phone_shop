<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function Coupon() {
        $coupons = Coupon::all();

        return view('page.coupons.index', [
            'coupons'=>$coupons,
        ]);
    }

    public function Insert() {
        return view('page.coupons.insert');
    }

    public function InsertData(Request $request) {
        $sku = $this->generateSku($request->input('title'));
        $coupon = new Coupon();
        $coupon->title = $request->input('title');
        $coupon->value = $request->input('value');
        $coupon->code = $sku;

     
        $coupon->save();
        return redirect()->route('admin-coupon')->with('message', 'Coupon Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $coupon = Coupon::find($id);

        return view('page.coupons.edit', [
            'coupon'=>$coupon,
        ]);
    }

    public function DataUpdate(Request $request, $id) {
        $coupon = Coupon::find($id);
        $coupon->title = $request->input('title');
        $coupon->value = $request->input('value');
        
        $coupon->update();
        
        return redirect()->route('admin-coupon')->with('message','Coupon Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Coupon::destroy($request->id);
            return redirect()->route('admin-coupon');
        } catch(\Exception $e) {
            report($e);
        }
    }

    private function generateSku($productName)
    {
        // Get the initials of the product name
        $initials = strtoupper(substr($productName, 0, 3));
        // Generate a random number
        $randomNumber = rand(100, 999);
        // Get current timestamp
        $timestamp = now()->format('YmdHis');
        // Concatenate to form the SKU
        return $initials . '-' . $randomNumber . '-' . $timestamp;
    }
}
