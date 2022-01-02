<?php

namespace App\Http\Controllers\BackendController\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    public function ViewSchoolSubject(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject', $data);
    }

    public function AddSchoolSubject(){
        return view('backend.setup.school_subject.school_subject_add');
    }

    public function StoreSchoolSubject(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function EditSchoolSubject($id){
         $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
    }

    public function UpdateSchoolSubject(Request $request, $id){
        
        $data = SchoolSubject::find($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'School Subject Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }

    public function SchoolSubjectDelete($id){
        $data = SchoolSubject::find($id);
        $data->delete();

        $notification = array(
            'message' => 'School Subject Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('school.subject.view')->with($notification);
    }
}
