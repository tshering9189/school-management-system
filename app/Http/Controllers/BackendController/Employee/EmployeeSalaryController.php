<?php

namespace App\Http\Controllers\BackendController\Employee;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalaryLog;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    public function SalaryView(){
        $data['allData'] = User::where('usertype','Employee')->get();
        // dd($data['allData']->toArray());
        return view('backend.employee.employee_salary.employee_salary_view', $data);
    }

    public function SalaryIncrement($id){
        $data['allData'] = User::find($id);
        // dd($data['allData']);
        return view('backend.employee.employee_salary.employee_salary_increment', $data);
    }

    public function SalaryIncrementStore(Request $request, $id){
        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_salary = date('Y-m-d', strtotime($request->effected_salary));
        $salaryData->save();

        $notification = array(
            'message' => 'Employee Salary Increment Successful',
            'alert-type' => 'info'
        );

        return redirect()->route('employee.salary.view')->with($notification);
    }

    public function SalaryDetails($id){
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();
        // dd($data['salary_log']->toArray());

        return view('backend.employee.employee_salary.employee_salary_details',$data);
    }
}
