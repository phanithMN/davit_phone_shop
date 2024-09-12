<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function Permission() {
        $permissions = Permission::all();

        return view('page.permissions.index', [
            'permissions'=>$permissions,
        ]);
    }

    public function Insert() {

        return view('page.permissions.insert');
    }

    public function InsertData(Request $request) {
        $permission = new Permission();
        $permission->name = $request->input('name');
     
        $permission->save();
        return redirect()->route('permission')->with('message', 'Permission Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $permission = Permission::find($id);

        return view('page.permissions.edit', [
            'permission'=>$permission,
        ]);
    }

    public function DataUpdate(Request $request, $id) {
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        
        $permission->update();
        
        return redirect()->route('permission')->with('message','Permission Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            Permission::destroy($request->id);
            return redirect()->route('permission');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
