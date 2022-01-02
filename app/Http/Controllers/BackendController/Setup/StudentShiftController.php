<?php

namespace App\Http\Controllers\BackendController\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = StudentShift::all();

        return view('backend.setup.shift.view_shift', $data);
    }

    Public function AddShift(){

        return view('backend.setup.shift.add_shift');
    }

    public function StoreShift(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Shift Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function EditShift($id){
         $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }

    public function UpdateShift(Request $request, $id){
        
        $data = StudentShift::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Shift Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }

    public function StudentShiftDelete($id){
        $data = StudentShift::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Shift Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.shift.view')->with($notification);
    }
}
