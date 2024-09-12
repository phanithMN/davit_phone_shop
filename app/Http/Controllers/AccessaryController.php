<?php

namespace App\Http\Controllers;

use App\Models\AccessaryType;
use Illuminate\Http\Request;

class AccessaryController extends Controller
{
    public function Accessaries(Request $request) {
        $search_value = $request->query("search");
        $rowLength = $request->query('row_length', 10);
        $accessaries_type = AccessaryType::paginate($rowLength);

        return view('page.accessaries.index', [
            'accessaries_type'=>$accessaries_type,
            'search_value'=>$search_value,
        ]);
    }

    public function Insert() {

        return view('page.accessaries.insert');
    }

    public function InsertData(Request $request) {
        $accessary_type = new AccessaryType();
        $accessary_type->name = $request->input('name');
     
        $accessary_type->save();
        return redirect()->route('accessaries')->with('message', 'Accessaries Type Inserted Successfully');
    }

    // update 
    public function Update($id) {
        $accessary_type = AccessaryType::find($id);

        return view('page.accessaries.edit', [
            'accessary_type'=>$accessary_type,
        ]);
    }

    public function DataUpdate(Request $request, $id) {
        $accessary_type = AccessaryType::find($id);
        $accessary_type->name = $request->input('name');
        
        $accessary_type->update();
        
        return redirect()->route('accessaries')->with('message','Accessaries Updated Successfully');
    }

    // delete 
    public function Delete(Request $request, $id){
        try {
            AccessaryType::destroy($request->id);
            return redirect()->route('accessaries');
        } catch(\Exception $e) {
            report($e);
        }
    }
}
