<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function User() {

        $users = Admin::paginate(10);

        return view('page.users.index', ['users'=>$users]);
    }

    public function Insert() {
        return view('page.users.insert');
    }

    public function InsertData(Request $request) {


        $user = new Admin();
        $user->name = $request->input("name");
        $user->username = $request->input("username");
        $user->email = $request->input("email");
        $user->phone_number = $request->input("phone_number");
        $user->address = $request->input("address");
        $user->password = Hash::make($request->input("password"));
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/users', $filename);
            $user->image = $filename;
        }
        $user->save();

        return redirect()->route('user')->with('message', 'User Inserted Successfully');
    }

    // update 
    public function Update($id) {

        $user = Admin::find($id);

        return view('page.users.edit', ['user' => $user]);
    }

    public function DataUpdate(Request $request, $id) {

        $user = Admin::find($id);
        $user->name = $request->input("name");
        $user->username = $request->input("username");
        $user->email = $request->input("email");
        $user->phone_number = $request->input("phone_number");
        $user->address = $request->input("address");
        if($request->hasFile('image'))
        {
            $destination = 'uploads/users'. $user->image;
            if(Admin::exists($destination))
            {
                Admin::destroy($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension;
            $file->move('uploads/users', $filename);
            $user->image = $filename;
            
        }
        $user->update();
        
        return redirect()->route('user')->with('message','User Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {   
            Admin::destroy($request->id);
            return redirect()->route('user');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
