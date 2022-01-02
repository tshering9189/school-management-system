<?php

namespace App\Http\Controllers\BackendController\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;

use PDF; 

use Illuminate\Support\Facades\DB as FacadesDB;

class StudentRegController extends Controller
{
    public function StudentRegView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        // dd($data['year_id']);
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        // dd($data['class_id']);
        $data['allData'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->get();

        return view('backend.student.student_reg.student_view',$data);
    }

    public function StudentRegAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        return view('backend.student.student_reg.student_add',$data);
    }

    public function StudentRegStore(Request $request){
        FacadesDB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();

            if ($student == NULL) {
                $firstReg = 0;
                $studentId = $firstReg+1;
                if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '0'.$studentId;
                }
            }else{
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student+1;
                if ($studentId < 10) {
                    $id_no = '000'.$studentId;
                }elseif($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 100) {
                    $id_no = '0'.$studentId;
                }
            } //End Else

            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'), $filename);
            $user['image'] = $filename;
            }

            $user->save();

            $assign_students = new AssignStudent();
            $assign_students->student_id = $user->id;
            $assign_students->year_id = $request->year_id;
            $assign_students->class_id = $request->class_id;
            $assign_students->group_id = $request->group_id;
            $assign_students->shift_id = $request->shift_id;
            $assign_students->save();

            $discount_students = new DiscountStudent();
            $discount_students->assign_student_id = $assign_students->id;
            $discount_students->fee_category_id = 1; //For Registration Fee only
            $discount_students->discount = $request->discount;
            $discount_students->save();

        });

        $notification = array(
            'message' => 'Student Registration Successful',
            'alert-type' => 'info'
        );

        return redirect()->route('student.registration.view')->with($notification);
    } //End Method


    //Searching student 
    public function StudentClassYearWise(Request $request){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;
        $data['allData'] = AssignStudent::where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();

        return view('backend.student.student_reg.student_view',$data);
    }

    public function StudentRegEdit($student_id){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        // with(['student','discount']) relations of tables from the models // method name
        // dd($data['editData']->toArray());

        return view('backend.student.student_reg.student_edit',$data);
    }

    public function StudentRegUpdate(Request $request, $student_id){
        FacadesDB::transaction(function() use($request,$student_id){
            

            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/student_images/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'), $filename);
            $user['image'] = $filename;
            }

            $user->save();

            $assign_students = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            $assign_students->year_id = $request->year_id;
            $assign_students->class_id = $request->class_id;
            $assign_students->group_id = $request->group_id;
            $assign_students->shift_id = $request->shift_id;
            $assign_students->save();

            $discount_students = DiscountStudent::where('assign_student_id',$request->id)->first();
            $discount_students->discount = $request->discount;
            $discount_students->save();

        });

        $notification = array(
            'message' => 'Student Registration Updated Successful',
            'alert-type' => 'info'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }


    public function StudentRegPromote($student_id){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();

        return view('backend.student.student_reg.student_promotion',$data);
    }

    public function StudentUpdateRegPromote(Request $request, $student_id){
            FacadesDB::transaction(function() use($request,$student_id){
            

            $user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/student_images/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/student_images'), $filename);
            $user['image'] = $filename;
            }

            $user->save();

            $assign_students = new AssignStudent();
            $assign_students->student_id = $student_id;
            $assign_students->year_id = $request->year_id;
            $assign_students->class_id = $request->class_id;
            $assign_students->group_id = $request->group_id;
            $assign_students->shift_id = $request->shift_id;
            $assign_students->save();

            $discount_students = new DiscountStudent();
            $discount_students->assign_student_id = $assign_students->id;
            $discount_students->fee_category_id = 1; //For Registration Fee only
            $discount_students->discount = $request->discount;
            $discount_students->save();

        });

        $notification = array(
            'message' => 'Student Promoted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);

    }

    public function StudentRegDetails($student_id){
        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        $pdf = PDF::loadView('backend.student.student_reg.student_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

}
