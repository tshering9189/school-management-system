<?php

namespace App\Http\Controllers\BackendController\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    public function ViewYear(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);
    }

    Public function AddYear(){

        return view('backend.setup.year.add_year');
    }

    public function StoreYear(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Year Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function EditYear($id){
         $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('editData'));
    }

    public function UpdateYear(Request $request, $id){
        
        $data = StudentYear::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Year Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

    public function StudentYearDelete($id){
        $data = StudentYear::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Year Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.year.view')->with($notification);
    }

}
