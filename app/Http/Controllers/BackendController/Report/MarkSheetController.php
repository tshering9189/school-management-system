<?php

namespace App\Http\Controllers\BackendController\Report;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use App\Models\MarksGrade;
use App\Models\StudentClass;
use App\Models\StudentMarks;
use App\Models\StudentYear;
use Illuminate\Http\Request;

use PDF;

class MarkSheetController extends Controller
{
    public function MarkSheetView(){
        $data['years'] = StudentYear::orderBy('id', 'desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();
        return view('backend.report.marksheet.marksheet_view',$data);
    }

    public function MarkSheetGet(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $count_fail = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->where('marks', '<' , '33')->get()->count();
        // dd($count_fail); // count fail

        $singleStudent = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->first();

        if ($singleStudent == true) {
            $allMarks = StudentMarks::with(['assign_subject', 'year'])->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->get();
            // dd($allMarks->toArray());
            $allGrades = MarksGrade::all();
            return view('backend.report.marksheet.marksheet_pdf',compact('allMarks','allGrades', 'count_fail'));
        }else{
            $notification = array(
                'message' => 'Sorry, no data found',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
 
    }// End Method
}
