<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function Feature(Request $request) {

        $features = Feature::paginate(10);

        return view('page.features.index', ['features'=>$features]);
    }

    public function Insert() {
        return view('page.features.insert');
    }

    public function InsertData(Request $request) {
        $features = new Feature();
        $features->title = $request->input('title');
        $features->sub_title = $request->input('sub_title');
        $features->type = $request->input('type');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/features', $filename);
            $features->image = $filename;
        }
        $features->save();
        return redirect()->route('feature')->with('message', 'Feature Center Inserted Successfully');
    }

    // update 
    public function Update($id) {
        
        $feature = Feature::find($id);

        return view('page.features.edit', ['feature'=>$feature]);
    }

    public function DataUpdate(Request $request, $id) {
        $features = Feature::find($id);
        $features->title = $request->input('title');
        $features->sub_title = $request->input('sub_title');
        $features->type = $request->input('type');
        if($request->hasFile('image'))
        {
            $destination = 'uploads/features'. $features->image;
            if(Feature::exists($destination))
            {
                Feature::destroy($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/features', $filename);
            $features->image = $filename;
            
        }
        $features->update();
        
        return redirect()->route('feature')->with('message','Feature Center Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Feature::destroy($request->id);
            return redirect()->route('feature');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
