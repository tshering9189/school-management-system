<?php

namespace App\Http\Controllers\BackendController\Report;

use App\Http\Controllers\Controller;
use App\Models\EmployeeAttendance;
use App\Models\User;
use Illuminate\Http\Request;

use PDF;

class AttendReportController extends Controller
{
    public function AttendReportView(){
        $data['employees'] = User::where('usertype', 'Employee')->get();
        return view('backend.report.attend_report.attend_report_view', $data);
    }

    public function AttendReportGet(Request $request){
        $employee_id = $request->employee_id;
        if ($employee_id != '') {
            $where[] = ['employee_id', $employee_id];
        }

        $date = date('Y-m', strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like' , $date.'%'];
        }

        $singleAttendance = EmployeeAttendance::with(['user'])->where($where)->get();
        if ($singleAttendance == true) {
            $data['allData'] = EmployeeAttendance::with(['user'])->where($where)->get();
            // dd($data['allData']->toArray());
            //count absent
            $data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status', 'Absent')->get()->count();
            $data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status', 'Leave')->get()->count();
            $data['month'] = date('m-Y', strtotime($request->date));

            $pdf = PDF::loadView('backend.report.attend_report.attend_report_pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');

        }else{
            $notification = array(
                'message' => 'Sorry, no data found',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

    } //End Method
}
