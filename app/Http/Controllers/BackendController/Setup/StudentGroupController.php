<?php

namespace App\Http\Controllers\BackendController\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function ViewGroup(){
         $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);
    }

    public function AddGroup(){
        return view('backend.setup.group.add_group');
    }

    public function StoreGroup(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Group Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function EditGroup($id){
         $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('editData'));
    }

    public function UpdateGroup(Request $request, $id){
        
        $data = StudentGroup::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Group Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.group.view')->with($notification);
    }

    public function StudentGroupDelete($id){
        $data = StudentGroup::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Group Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('student.group.view')->with($notification);
    }
}
