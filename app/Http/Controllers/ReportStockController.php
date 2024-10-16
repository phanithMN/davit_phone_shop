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
            ->leftJoin('products', 'products.id', '=', 'stock.product_id') 
            ->select('stock.*', 'products.name as product_name')
            ->paginate($rowLength);
        } else {
            $report_stocks = Stock::leftJoin('products', 'products.id', '=', 'stock.product_id') 
            ->select('stock.*', 'products.name as product_name')
            ->where('products.name', 'like', '%'.$request->input('search').'%')->paginate($rowLength);
    
        }

        
        return view('page.report-stock.index',[
            'report_stocks' => $report_stocks
        ]);
    }

    public function ExportCSV()
    {
        $filename = 'report-stock.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');

            // Add BOM (Byte Order Mark) to support special characters in Excel
            fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));

            // Add CSV headers
            fputcsv($handle, [
                'ID',
                'Date',
                'Name',
                'Quantity',
                'Price',
                'Total',
            ]);

            // Fetch item data with relations in chunks to avoid memory overload
            Stock::with(['product'])->chunk(25, function ($stocks) use ($handle) {
                foreach ($stocks as $key => $item) {
                    // Extract data from each item along with product, category, and status
                    $data = [
                        isset($key) ? $key : '',
                        isset($item->created_at) ? $item->created_at->format('Y-m-d') : '',
                        isset($item->product->name) ? $item->product->name : '', 
                        isset($item->quantity) ? $item->quantity : '0',  
                        isset($item->price) ? '$'.number_format($item->price, 2) : '0',  
                        isset($item->quantity) ? '$'.number_format($item->quantity * $item->price, 2) : '0', 
                    ];

                    // Write data to the CSV file, ensuring UTF-8 support
                    fputcsv($handle, $data);
                }
            });

            // Close CSV file handle
            fclose($handle);
        }, 200, $headers);
    }
}
