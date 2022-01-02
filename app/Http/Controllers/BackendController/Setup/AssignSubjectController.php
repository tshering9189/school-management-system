<?php

namespace App\Http\Controllers\BackendController\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function ViewAssignSubject(){
        // $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupby('class_id')->get();
        return view('backend.setup.assign_subject.view_assign_subject',$data);
    }

    public function AddAssignSubject(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject',$data);
    }

    public function StoreAssignSubject(Request $request){
        $subjectCount = count($request->subject_id);
        // dd($countClass);
        if ($subjectCount != NULL) {
            // dd("Store");
            for ($i=0; $i < $subjectCount; $i++) { 
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }//End for loop
        }//End IF Condition

        $notification = array(
            'message' => 'Subject Assign Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject.view')->with($notification);
    } //End StoreAssignSubject Method

    public function EditAssignSubject($class_id){
        $data['editData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();
        // dd($data['editData']->toArray());
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.edit_assign_subject',$data);
    }

    public function UpdateAssignSubject(Request $request, $class_id){
        if ($request->subject_id == NULL) {
            // dd('Error');
            $notification = array(
            'message' => 'Sorry, You have not selected any subject',
            'alert-type' => 'error'
            );

            return redirect()->route('assign.subject.edit', $class_id)->with($notification);

        }else{
            // dd('Perfect');
            $countClass = count($request->subject_id);
            AssignSubject::where('class_id', $class_id)->delete(); //this will delete all the previous data
                for ($i=0; $i < $countClass; $i++) {  //this for loop will again insert data
                    $assign_subject = new AssignSubject();
                    $assign_subject->class_id = $request->class_id;
                    $assign_subject->subject_id = $request->subject_id[$i];
                    $assign_subject->full_mark = $request->full_mark[$i];
                    $assign_subject->pass_mark = $request->pass_mark[$i];
                    $assign_subject->subjective_mark = $request->subjective_mark[$i];
                    $assign_subject->save();
                }//End for loop
        } //End if ELSE
        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('assign.subject.view')->with($notification);
    } //End MEthod

    public function DetailsAssignSubject($class_id){
        $data['detailsData'] = AssignSubject::where('class_id', $class_id)->orderBy('subject_id', 'asc')->get();

        return view('backend.setup.assign_subject.details_assign_subject', $data);

    }
}
