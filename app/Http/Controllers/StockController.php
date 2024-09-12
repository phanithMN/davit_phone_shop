<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function Stock(Request $request) {
        $rowLength = $request->query('row_length', 10);
        $stocks = Stock::join('products', 'stock.product_id', '=', 'products.id') 
        ->select('stock.*', 'products.name as product_name')
        ->where('products.name', 'like', '%'.$request->input('search').'%')
        ->paginate($rowLength);

        return view('page.stocks.index', [
            'stocks'=>$stocks,
        ]);
    }

    public function Insert() {
        $products = Product::all();
        return view('page.stocks.insert', ['products'=>$products]);
    }

    public function InsertData(Request $request) {

        $sku = $this->generateSku($request->input('product_id'));

        $stock = new Stock();
        $stock->quantity = $request->input('quantity');
        $stock->price = $request->input('price');
        $stock->product_id = $request->input('product_id');
        $stock->sku = $sku;
     
        $stock->save();
        return redirect()->route('stock')->with('message', 'Stock Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $stock = Stock::find($id);
        $products = Product::all();

        return view('page.stocks.edit', [
            'stock'=>$stock,
            'products'=>$products
        ]);
    }

    public function DataUpdate(Request $request, $id) {
        $stock = Stock::find($id);
        $stock->quantity = $request->input('quantity');
        $stock->price = $request->input('price');
        $stock->product_id = $request->input('product_id');

        $stock->update();
        
        return redirect()->route('stock')->with('message','Accessaries Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Stock::destroy($request->id);
            return redirect()->route('stock');
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
