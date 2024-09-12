<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function Role() {
        $roles = Role::all();

        return view('page.roles.index', [
            'roles'=>$roles,
        ]);
    }

    public function Insert() {

        return view('page.roles.insert');
    }

    public function InsertData(Request $request) {
        $role = new Role();
        $role->name = $request->input('name');
     
        $role->save();
        return redirect()->route('role')->with('message', 'Role Insert Successfully');
    }

    // update 
    public function Update($id) {
        $role = Role::find($id);

        return view('page.roles.edit', [
            'role'=>$role,
        ]);
    }

    public function DataUpdate(Request $request, $id) {
        $role = Role::find($id);
        $role->name = $request->input('name');
        
        $role->update();
        
        return redirect()->route('role')->with('message','Role Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Role::destroy($request->id);
            return redirect()->route('role');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
