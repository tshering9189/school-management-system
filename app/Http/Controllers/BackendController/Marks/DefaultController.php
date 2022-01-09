<?php

namespace App\Http\Controllers\BackendController\Marks;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function GetSubject(Request $request){ // To pass the data in JSON format, we have to do Request
        $class_id = $request->class_id;
        $allData = AssignSubject::with(['school_subject'])->where('class_id', $class_id)->get();

        return response()->json($allData);
    }

    public function GetStudents(Request $request){// To pass the data in JSON format, we have to do Request
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('class_id', $class_id)->get();
        return response()->json($allData);
    }
}
