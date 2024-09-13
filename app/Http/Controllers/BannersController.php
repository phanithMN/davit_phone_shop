<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banners;

class BannersController extends Controller
{
    public function Banner(Request $request) {
        $banners = Banners::paginate(10);
        return view('page.banners.banner', ['banners'=>$banners]);
    }

    public function Insert() {
        return view('page.banners.insert');
    }

    public function InsertData(Request $request) {
        $banners = new Banners();
        $banners->title = $request->input('title');
        $banners->sub_title = $request->input('sub_title');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/banners', $filename);
            $banners->image = $filename;
        }
        $banners->save();
        return redirect()->route('banner')->with('message', 'Slide Banner Inserted Successfully');
    }

    
    // update 
    public function Update($id) {
        $banner = Banners::find($id);
        return view('page.banners.edit', ['banner'=>$banner]);
    }

    public function DataUpdate(Request $request, $id) {
        $banner = Banners::find($id);
        $banner->title = $request->input('title');
        $banner->sub_title = $request->input('sub_title');
        if($request->hasFile('image'))
        {
            $destination = 'uploads/banner'. $banner->image;
            if(Banners::exists($destination))
            {
                Banners::destroy($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/banners', $filename);
            $banner->image = $filename;
            
        }
        $banner->update();
        
        return redirect()->route('banner')->with('message','Slide Banner Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Banners::destroy($request->id);
            return redirect()->route('banner');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
