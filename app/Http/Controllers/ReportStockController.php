<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportStockController extends Controller
{
    public function ReportStock(Request $request) {
        $rowLength = $request->query('row_length', 10);
       


        if ($request->has('start_date') && $request->has('end_date')) {
            $report_stocks = Stock::whereBetween('stock.created_at', [
                $request->input('start_date'), 
                $request->input('end_date')
            ])
            ->where('products.name', 'like', '%'.$request->input('search').'%')
            ->join('products', 'products.id', '=', 'stock.product_id') 
            ->select('stock.*', 'products.name as product_name')
            ->paginate($rowLength);
        } else {
            $report_stocks = Stock::join('products', 'products.id', '=', 'stock.product_id') 
            ->select('stock.*', 'products.name as product_name')
            ->where('products.name', 'like', '%'.$request->input('search').'%')->paginate($rowLength);
    
        }

        
        return view('page.report-stock.index',[
            'report_stocks' => $report_stocks
        ]);
    }
}
