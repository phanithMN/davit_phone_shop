<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function brand(Request $request) {
        
        $rowLength = $request->query('row_length', 10);
        $brands = Brand::paginate($rowLength);

        return view('page.brands.index', ['brands'=>$brands]);
    }

    public function Insert() {
        return view('page.brands.insert');
    }

    public function InsertData(Request $request) {
        $brands = new Brand();
        $brands->name = $request->input('name');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/brands', $filename);
            $brands->image = $filename;
        }
        $brands->save();
        return redirect()->route('brand')->with('message', 'Brand Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $brand = Brand::find($id);
        return view('page.brands.edit', ['brand'=>$brand]);
    }

    public function DataUpdate(Request $request, $id) {
        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        if($request->hasFile('image'))
        {
            $destination = 'uploads/brands'. $brand->image;
            if(Brand::exists($destination))
            {
                Brand::destroy($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/brands', $filename);
            $brand->image = $filename;
            
        }
        $brand->update();
        
        return redirect()->route('brand')->with('message','Brand Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Brand::destroy($request->id);
            return redirect()->route('brand');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
