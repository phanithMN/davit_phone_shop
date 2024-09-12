<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use Illuminate\Http\Request;

class ReportSaleController extends Controller
{
    public function ReportSale(Request $request) {
        $rowLength = $request->query('row_length', 10);
       


        if ($request->has('start_date') && $request->has('end_date')) {
            $order_items = OrderItems::whereBetween('order_items.created_at', [
                $request->input('start_date'), 
                $request->input('end_date')
            ])
            ->where('products.name', 'like', '%'.$request->input('search').'%')
            ->join('products', 'products.id', '=', 'order_items.product_id') 
            ->join('products_type', 'products_type.id', '=', 'order_items.product_id') 
            ->select('order_items.*', 'products.name as product_name', 'products_type.name as products_type_name')
            ->paginate($rowLength);
        } else {
            $order_items = OrderItems::join('products', 'products.id', '=', 'order_items.product_id') 
            ->join('products_type', 'products_type.id', '=', 'order_items.product_id') 
            ->select('order_items.*', 'products.name as product_name', 'products_type.name as products_type_name')
            ->where('products.name', 'like', '%'.$request->input('search').'%')->paginate($rowLength);
    
        }

        
        return view('page.report-sale.index',[
            'order_items' => $order_items
        ]);
    }
}
