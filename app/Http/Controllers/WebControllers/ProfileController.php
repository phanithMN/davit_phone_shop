<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Blog;
class ProfileController extends Controller
{
    public function Profile() {
        $user = Auth::user();
        $posts = Blog::orderBy('created_at', 'desc')->take(2)->get();
        
        return view('web-page.profile.index', ['user' =>  $user, 'posts' => $posts]);
    }

    public function UpdateData(Request $request) {
        $user = Auth::guard('customer')->user();
        $user = Customer::find($user->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        $user->dob = $request->input('dob');
        if($request->hasFile('image'))
        {
            $destination = 'uploads/users'. $user->image;
            if(Customer::exists($destination))
            {
                Customer::destroy($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/users', $filename);
            $user->image = $filename;
            
        }
        $user->save();
        return redirect()->route('profile')->with('message', 'Update is successfully !');
    }
}
